<?php

use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stripe', [StripePaymentController::class, 'index'])->name('stripe.index');
Route::post('/stripe', [StripePaymentController::class, 'store'])->name('stripe.store');