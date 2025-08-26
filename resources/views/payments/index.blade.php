@extends('layouts.main-layout')

@section('title', 'Payment History')

@section('content')
<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
                <th scope="col">Receipt</th>
                <th scope="col">Created</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $payment)
                <tr>
                    <td>{{ $payment->id }}</td>
                    <td>{{ $payment->user->name ?? 'Guest' }}</td>
                    <td>${{ number_format($payment->amount / 100, 2) }}</td>
                    <td>
                        <span class="badge 
                                        @if($payment->status === 'succeeded') bg-success 
                                        @elseif($payment->status === 'failed') bg-danger 
                                        @else bg-secondary 
                                        @endif">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td>
                        @if($payment->receipt_url)
                            <a href="{{ $payment->receipt_url }}" target="_blank"
                                class="btn btn-sm btn-outline-primary">View</a>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td>
                        @if($payment->status === 'succeeded')
                            <a href="{{ route('payments.invoice', $payment->id) }}">Download PDF</a>
                        @endif
                    </td>
                    <td>{{ $payment->created_at->format('M d, Y h:i A') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No payment records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection