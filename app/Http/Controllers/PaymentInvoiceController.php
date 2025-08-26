<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaymentInvoiceController extends Controller
{
    public function download(Payment $payment)
    {
        $pdf = Pdf::loadView('payments.invoice', compact('payment'));

        $filename = 'invoice-' . $payment->id . '.pdf';
        return $pdf->download($filename);
    }
}
