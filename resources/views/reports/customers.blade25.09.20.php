@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Customer Reports</h2>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Customers</h5>
                        <p class="card-text display-6">{{ $totalCustomers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">New Customers (This Month)</h5>
                        <p class="card-text display-6">{{ $newCustomers }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">New Customers (Today)</h5>
                        <p class="card-text display-6">{{ $todayCustomers }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-5">Customers Per Month ({{ now()->year }})</h4>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Month</th>
                <th>Customers Added</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customersPerMonth as $month => $count)
                <tr>
                    <td>{{ $month }}</td>
                    <td>{{ $count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <div class="row">
            <button onclick="window.print()" style="margin:auto;background-color: #4285f4; color: white; border: none;
            padding: 8px 10px; font-weight: 500; border-radius: 0; " type="button" class="btn btn-primary">Print</button>
        </div>
    </div>
@endsection
