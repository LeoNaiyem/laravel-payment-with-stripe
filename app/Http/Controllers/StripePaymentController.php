<?php

namespace App\Http\Controllers;

use App\Mail\PaymentInvoiceMail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Payment of $' . $request->amount,
            ]);

            $payment = Payment::create([
                'charge_id' => $charge->id,
                'user_id' => auth()->id(),
                'amount' => $charge->amount,
                'currency' => $charge->currency,
                'status' => $charge->status,
                'receipt_url' => $charge->receipt_url,
                'payment_method' => $charge->payment_method,
            ]);

            $customerEmail = $request->email ?? auth()->user()->email ?? null;

            if ($customerEmail) {
                try {
                    // Send the email
                    Mail::to($customerEmail)->send(new PaymentInvoiceMail($payment));
                    $emailStatus = "Invoice email sent successfully!";
                } catch (\Exception $e) {
                    $emailStatus = "Payment succeeded, but failed to send email: " . $e->getMessage();
                }
            } else {
                $emailStatus = "Payment succeeded, but no email provided.";
            }

            return back()->with([
                'success' => 'Payment successful!',
                'email_status' => $emailStatus
            ]);

        } catch (\Stripe\Exception\CardException $e) {
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
