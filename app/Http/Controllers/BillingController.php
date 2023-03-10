<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Plan;

class BillingController extends Controller
{
    /**
     * Redirect user to the billing portal on stripe.
     *
     * @param   Request  $request
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
     * Purchase a product.
     *
     * @param   Request  $request
     *
     * @return  \Illuminate\Http\RedirectResponse | \Illuminate\View\View
     */
    public function purchase(Plan $id, Request $request)
    {
        // Any user that reaches will be have a stripe customer
        $user = auth()->user();
        $stripeCustomer = $user->createOrGetStripeCustomer();

        return view('checkout.stripe', ['intent' => $user->createSetupIntent()]);
    }
}
