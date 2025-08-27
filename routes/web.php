<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentInvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripePaymentController;
use App\Models\Payment;
use Illuminate\Support\Facades\Route;

// 🔐 All protected routes
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/',[DashboardController::class, 'index'])->name('home');
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Stripe Payment
    Route::get('/stripe', [StripePaymentController::class, 'index'])->name('stripe.index');
    Route::post('/stripe', [StripePaymentController::class, 'store'])->name('stripe.store');

    // Payments
    Route::get('/payments', function () {
        $payments = Payment::latest()->get();
        return view('payments.index', compact('payments'));
    })->name('payments.index');

    Route::get('/payments/{payment}/invoice', [PaymentInvoiceController::class, 'download'])
        ->name('payments.invoice');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Authentication routes (login, register, forgot password, etc.)
require __DIR__ . '/auth.php';
