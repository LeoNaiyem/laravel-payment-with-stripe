<?php

use App\Http\Controllers\PaymentInvoiceController;
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

Route::get('/payments/{payment}/invoice', [PaymentInvoiceController::class, 'download'])
    ->name('payments.invoice');



Route::get('/test-mail', function () {
    try {
        Mail::raw('Test email from Laravel', function ($message) {
            $message->to('sumaiya.israt.17@gmail.com')
                ->subject('Test Email');
        });
        return 'Mail sent!';
    } catch (\Exception $e) {
        return 'Mail failed: ' . $e->getMessage();
    }
});
