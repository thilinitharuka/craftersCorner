@extends('layouts.guest')

@section('content')

    <div class="shop-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <!-- Sidebar Start -->
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <form method="GET" action="{{ route('shop.index') }}">

                            <!-- Categories -->
                            <h5 class="mb-3">Categories</h5>
                            <select name="category" class="form-control mb-3">
                                <option value="all">All</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            <!-- Price Range -->
                            <h5 class="mb-3">Price Range</h5>
                            <div class="d-flex mb-3">
                                <input type="number" name="min_price" class="form-control me-2"
                                       placeholder="Min" value="{{ request('min_price') }}">
                                <input type="number" name="max_price" class="form-control"
                                       placeholder="Max" value="{{ request('max_price') }}">
                            </div>

                            <!-- Sort -->
                            <h5 class="mb-3">Sort By</h5>
                            <select name="sort" onchange="this.form.submit()" class="form-control">
                                <option value="">Default</option>
                                <option value="low_high" {{ request('sort') == 'low_high' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="high_low" {{ request('sort') == 'high_low' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                            </select>

                            <div class="d-flex">
                                <button type="submit" class=" btn-secondary w-50 me-2">Apply Filters</button>
                                <a href="{{ route('shop.index') }}" class=" btn-outline-danger w-50">Clear</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Sidebar End -->

                <!-- Products Start -->
                <div class="col-lg-9">
                    <div class="row mb-n-30px">
                        @forelse($products as $product)
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                <div class="product">
                                    <span class="badges"><span class="new">New</span></span>
                                    <div class="thumb">
                                        <a href="{{ route('product.show', $product->id) }}" class="image">
                                            <img style="width:270px;height:274px;"
                                                 src="{{ asset('storage/'.$product->image) }}"
                                                 class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        @if($product->categories)
                                            <span class="category">{{ $product->categories->name }}</span>
                                        @endif
                                        <h5 class="title">{{ $product->name }}</h5>
                                        <span class="price"><span class="new">Rs. {{ $product->price }}</span></span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No products found.</p>
                        @endforelse
                    </div>

                </div>
                <!-- Products End -->
            </div>
        </div>
    </div>

@endsection
