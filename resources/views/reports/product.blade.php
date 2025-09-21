@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Product Reports</h2>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text display-6">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-5">Products per Category</h4>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Category</th>
                <th>Total Products</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productsPerCategory as $category => $count)
                <tr>
                    <td>{{ $category }}</td>
                    <td>{{ $count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h4 class="mt-5">Top 5 Reviewed Products</h4>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Product Name</th>
                <th>Total Reviews</th>
            </tr>
            </thead>
            <tbody>
            @foreach($topReviewedProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->reviews_count }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h4 class="mt-5">Unsold Products (Never Ordered)</h4>
        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th>Product Name</th>
                <th>Category</th>
            </tr>
            </thead>
            <tbody>
            @forelse($unsoldProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->categories ? $product->categories->name : 'N/A' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2" class="text-center">All products have been sold at least once</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div>
        <div class="row">
            <button onclick="window.print()" style="margin:auto;background-color: #4285f4; color: white; border: none; padding: 8px 10px; font-weight: 500; border-radius: 0; " type="button" class="btn btn-primary">Print</button>
        </div>
    </div>
@endsection
