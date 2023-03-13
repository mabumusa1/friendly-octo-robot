<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Prod;
use App\Models\Plan;
class BillingController extends Controller
{
    /**
     * Redirect user to the billing portal on stripe.
     *
     *
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function redirectToBillingPortal(Request $request)
    {
        $user = $request->user();
        $user->createOrGetStripeCustomer();

        return $user->redirectToBillingPortal(route('filament.pages.prod'));
    }

    /**
     * Add payment method then subscribe to a plan
     *
     *
     * @return  \Illuminate\Http\RedirectResponse | \Illuminate\View\View
     */
    public function addPaymentMethod(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['bail', 'required'],
            'payment_method' => ['bail', 'required'],
            'planId' => ['bail', 'required', 'exists:plans,id'],
        ]);

        try {
            $user = $request->user();
            if ($user->hasDefaultPaymentMethod()) {
                throw new \Exception('Default payment method already exists');
            }

            $plan = Plan::find($validatedData['planId']);
            $request->user()->addPaymentMethod($validatedData['payment_method']);
            $user->newSubscription($plan->slug, $plan->stripe_plan)->create($validatedData['payment_method']);
            $prod = Prod::create([
                'name' => $validatedData['name'],
                'data_center_id' => 1,
                'user_id' => $request->user()->id,
                'plan_id' => $validatedData['planId'],
                'properties' => ['planId' => $validatedData['planId'], 'status' => 'creating']
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Payment method added successfully',
                'redirect' => route('filament.pages.prod', ['id' => $prod->id]),
            ]);
        } catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 422);
        }
    }

    /**
     * Add subscription to a plan
     *
     *
     * @return  \Illuminate\Http\RedirectResponse | \Illuminate\View\View
     */
    public function addSubscription(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['bail', 'required'],
            'planId' => ['bail', 'required', 'exists:plans,id'],
        ]);

        try {
            $user = $request->user();
            if (!$user->hasDefaultPaymentMethod()) {
                throw new \Exception('Default payment method does not exists');
            }

            $plan = Plan::find($validatedData['planId']);
            $user->newSubscription($plan->slug, $plan->stripe_plan)->create($user->defaultPaymentMethod()->id);
            $prod = Prod::create([
                'name' => $validatedData['name'],
                'data_center_id' => 1,
                'user_id' => $request->user()->id,
                'plan_id' => $validatedData['planId'],
                'properties' => ['planId' => $validatedData['planId'], 'status' => 'creating']
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Subscription added successfully',
                'redirect' => route('filament.pages.prod', ['id' => $prod->id]),
            ]);
        } catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 422);
        }
    }
}
