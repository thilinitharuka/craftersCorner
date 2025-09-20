@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Customer Reports</h2>

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
@endsection
