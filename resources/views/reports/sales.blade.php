@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Sales Report</h2>

        <div class="row mt-4">

            <h4 class="mt-5">Top 5 Best-Selling Products</h4>
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Total Sold</th>
                </tr>
                </thead>
                <tbody>
                @foreach($topProducts as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->total_sold }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <div class="row">
            <button onclick="window.print()" style="margin:auto;background-color: #4285f4; color: white; border: none; padding: 8px 10px; font-weight: 500; border-radius: 0; " type="button" class="btn btn-primary">Print</button>
        </div>
    </div>
@endsection
