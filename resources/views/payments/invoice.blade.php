<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $payment->id }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            font-size: 14px;
            padding: 40px;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            border: 1px solid #eee;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            margin: 0;
            font-size: 28px;
            color: #2c3e50;
        }

        .header p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }

        .details,
        .footer {
            margin-top: 20px;
        }

        .details p {
            margin: 6px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            font-size: 13px;
            color: #999;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <div class="header">
            <h2>Invoice</h2>
            <p>Laravel Stripe Payment</p>
        </div>

        <div class="details">
            <p><strong>Invoice ID:</strong> {{ $payment->id }}</p>
            <p><strong>Charge ID:</strong> {{ $payment->charge_id }}</p>
            <p><strong>Date:</strong> {{ $payment->created_at->format('d M, Y h:i A') }}</p>
            <p><strong>Status:</strong>
                @if($payment->status === 'succeeded')
                    <span style="color: green;">{{ ucfirst($payment->status) }}</span>
                @elseif($payment->status === 'failed')
                    <span style="color: red;">{{ ucfirst($payment->status) }}</span>
                @else
                    <span>{{ ucfirst($payment->status) }}</span>
                @endif
            </p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Currency</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Stripe Payment</td>
                    <td>${{ number_format($payment->amount / 100, 2) }}</td>
                    <td>{{ strtoupper($payment->currency) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>Thank you for your payment!</p>
            <p>&copy; {{ now()->year }} Laravel Stripe System</p>
        </div>
    </div>
</body>

</html>