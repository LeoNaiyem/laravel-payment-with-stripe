<?php

namespace App\Mail;

use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public Payment $payment;

    /**
     * Create a new message instance.
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Payment Invoice',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.payment_invoice', 
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        $invoiceFolder = storage_path('app/invoices/');
        if (!file_exists($invoiceFolder)) {
            mkdir($invoiceFolder, 0777, true);
        }

        // PDF file path
        $pdfFile = $invoiceFolder . 'invoice-' . $this->payment->id . '.pdf';

        // Generate PDF
        Pdf::loadView('payments.invoice', ['payment' => $this->payment])
            ->save($pdfFile);


        return [
            Attachment::fromPath($pdfFile)
                ->as('invoice-' . $this->payment->id . '.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
