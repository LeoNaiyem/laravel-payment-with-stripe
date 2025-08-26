<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    public function index()
    {
        return view('stripe');
    }

    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = Charge::create([
                'amount' => $request->amount * 100, // cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment of $' . $request->amount,
            ]);

            // Save payment info in DB
            Payment::create([
                'charge_id' => $charge->id,
                'user_id' => auth()->id(), // null if guest
                'amount' => $charge->amount,
                'currency' => $charge->currency,
                'status' => $charge->status,
                'receipt_url' => $charge->receipt_url,
                'payment_method' => $charge->payment_method,
            ]);

            return back()->with('success', 'Payment successful! Receipt: ' . $charge->receipt_url);

        } catch (\Stripe\Exception\CardException $e) {
            // Store failed payment
            Payment::create([
                'user_id' => auth()->id(),
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'status' => 'failed',
                'failure_message' => $e->getError()->message,
            ]);

            return back()->with('error', $e->getError()->message);
        }
    }
}
