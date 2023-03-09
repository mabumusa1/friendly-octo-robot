<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    public function checkout(Request $request)
    {
        return view('checkout.index', ['title' => 'Purchase']);
    }
}
