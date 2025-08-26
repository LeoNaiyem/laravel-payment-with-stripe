<!-- Header / Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-credit-card"
                viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2H0z" />
                <path d="M0 7h16v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm3 3.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H3z" />
            </svg>
            StripePay
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payments.index') }}">Payments</a>
                    </li>
                    <li class="nav-item">
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-outline-light ms-2">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('stripe.index') }}">Pay</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payments.index') }}">Payments History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>