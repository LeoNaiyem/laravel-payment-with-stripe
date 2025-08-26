<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Confirmation</title>
</head>

<body
    style="margin: 0; padding: 0; background-color: #f8f9fa; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #212529;">
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="padding: 40px 10px;">
                <!-- Container -->
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="600"
                    style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 5px rgba(0,0,0,0.1);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #0d6efd; padding: 20px; text-align: center;">
                            <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Payment Confirmation</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="padding: 30px;">
                            <p style="margin: 0 0 15px;">Dear Customer,</p>

                            <p style="margin: 0 0 15px;">
                                Thank you for your payment of
                                <strong>${{ number_format($payment->amount / 100, 2) }}</strong>.
                            </p>

                            <p style="margin: 0 0 15px;">
                                We've attached a PDF copy of your invoice for your records.
                            </p>

                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%"
                                style="margin-top: 20px;">
                                <tr>
                                    <td style="padding: 10px 0;"><strong>Invoice ID:</strong></td>
                                    <td style="padding: 10px 0;">{{ $payment->id }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0;"><strong>Status:</strong></td>
                                    <td style="padding: 10px 0;">{{ ucfirst($payment->status) }}</td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 0;"><strong>Date:</strong></td>
                                    <td style="padding: 10px 0;">{{ $payment->created_at->format('d M, Y h:i A') }}</td>
                                </tr>
                            </table>

                            <p style="margin-top: 30px;">
                                If you have any questions, feel free to reply to this email.
                            </p>

                            <p style="margin-top: 20px;">Best regards,</p>
                            <p style="margin: 0;"><strong>Laravel Stripe Team</strong></p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td
                            style="background-color: #f1f1f1; padding: 20px; text-align: center; font-size: 12px; color: #6c757d;">
                            &copy; {{ now()->year }} Laravel Stripe System. All rights reserved.
                        </td>
                    </tr>
                </table>
                <!-- End Container -->
            </td>
        </tr>
    </table>
</body>

</html>