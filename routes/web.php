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

Route::get('/billing-portal', [App\Http\Controllers\BillingController::class, 'redirectToBillingPortal']);

Route::get('/purchase/{id}', [App\Http\Controllers\BillingController::class, 'purchase'])->name('purchase');
