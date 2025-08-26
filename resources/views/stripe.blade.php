@extends('layouts.main-layout')

@section('title', 'Stripe Payment')
@section('styles')
    <style>
        .StripeElement {
            background-color: white;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .StripeElement--focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .loading-spinner {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Stripe Payment</h4>
                </div>
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('email_status'))
                        <div style="color: blue; margin-bottom: 10px;">
                            {{ session('email_status') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('stripe.store') }}" method="POST" id="payment-form">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email', auth()->user()->email ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount (USD)</label>
                            <input type="number" name="amount" id="amount" class="form-control" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="card-element" class="form-label">Card Details</label>
                            <div id="card-element" class="form-control"></div>
                        </div>

                        <div id="card-errors" class="text-danger mb-3"></div>

                        <button type="submit" class="btn btn-success w-100" id="pay-button">
                            <span id="button-text">Pay Now</span>
                            <span class="spinner-border spinner-border-sm loading-spinner" role="status"
                                aria-hidden="true"></span>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        const button = document.getElementById('pay-button');
        const buttonText = document.getElementById('button-text');
        const spinner = document.querySelector('.loading-spinner');
        const cardErrors = document.getElementById('card-errors');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            button.disabled = true;
            buttonText.textContent = 'Processing...';
            spinner.style.display = 'inline-block';

            const { token, error } = await stripe.createToken(card);

            if (error) {
                cardErrors.textContent = error.message;
                button.disabled = false;
                buttonText.textContent = 'Pay Now';
                spinner.style.display = 'none';
            } else {
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'stripeToken';
                hidden.value = token.id;
                form.appendChild(hidden);

                form.submit();
            }
        });
    </script>
@endsection