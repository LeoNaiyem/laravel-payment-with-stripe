<?php

use App\Http\Controllers\StripePaymentController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stripe', [StripePaymentController::class, 'index'])->name('stripe.index');
Route::post('/stripe', [StripePaymentController::class, 'store'])->name('stripe.store');
Route::get('/payments', function () {
    $payments = Payment::latest()->get();
    return view('payments.index', compact('payments'));
})->name('payments.index');