@extends('layouts.main-layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <!-- Summary Cards -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Revenue</h5>
                    <p class="card-text h4">${{ number_format($totalRevenue / 100, 2) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Payments</h5>
                    <p class="card-text h4">{{ $totalPayments }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Successful Payments</h5>
                    <p class="card-text h4">{{ $successfulPayments }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Failed Payments</h5>
                    <p class="card-text h4">{{ $failedPayments }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mt-4">
        <!-- Monthly Revenue Bar Chart -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">Monthly Revenue</div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center" style="height: 400px; width: 100%;">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Status Pie Chart -->
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header">Payment Status Distribution</div>
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center" style="height: 400px; width: 100%;">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const statusCtx = document.getElementById('statusChart').getContext('2d');

        // Example data — replace with
        const monthlyRevenue = @json($monthlyRevenue);
        const statusCounts = @json($paymentStatusCounts);

        // Revenue Bar Chart
        new Chart(revenueCtx, {
            type: 'bar',
            data: {
                labels: Object.keys(monthlyRevenue),
                datasets: [{
                    label: 'Revenue ($)',
                    data: Object.values(monthlyRevenue),
                    backgroundColor: ['#28a745', '#dc3545', '#ffc107', '#007bff', '#6610f2', '#6f42c1'],
                    borderRadius: 5,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Status Pie Chart
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: Object.keys(statusCounts),
                datasets: [{
                    label: 'Payments',
                    data: Object.values(statusCounts),
                    backgroundColor: ['#dc3545', '#ffc107', '#007bff','#28a745'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    </script>
@endsection