<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('billing-portal', [App\Http\Controllers\BillingController::class, 'redirectToBillingPortal'])->name('billingPortal');

Route::post('addPaymentMethod', [App\Http\Controllers\BillingController::class, 'addPaymentMethod'])->name('addPaymentMethod');

Route::post('addSubscription', [App\Http\Controllers\BillingController::class, 'addSubscription'])->name('addSubscription');
