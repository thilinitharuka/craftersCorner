@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Orders Report</h2>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text display-6">{{ $totalOrders }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-5">Orders Per Month ({{ now()->year }})</h4>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Month</th>
                <th>Orders</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ordersPerMonth as $month => $count)
                <tr>
                    <td>{{ \Carbon\Carbon::create()->month($month)->format('F') }}</td>
                    <td>{{ $count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h4 class="mt-5">Top Customers (by Orders)</h4>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Customer</th>
                <th>Total Orders</th>
            </tr>
            </thead>
            <tbody>
            @foreach($topCustomers as $customer)
                <tr>
                    <td>{{ $customer->user->name ?? 'Unknown' }}</td>
                    <td>{{ $customer->total_orders }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
