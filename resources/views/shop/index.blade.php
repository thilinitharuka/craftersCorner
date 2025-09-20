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
                            <div class="mb-3">
                                <input type="number" name="min_price" class="form-control mb-2"
                                       placeholder="Minimum Price" value="{{ request('min_price') }}">
                                <input type="number" name="max_price" class="form-control"
                                       placeholder="Maximum Price" value="{{ request('max_price') }}">
                            </div>

                            <!-- Sort -->
                            <h5 class="mb-3">Sort By</h5>
                            <select name="sort" onchange="this.form.submit()" class="form-control">
                                <option value="">Default</option>
                                <option value="low_high" {{ request('sort') == 'low_high' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="high_low" {{ request('sort') == 'high_low' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                            </select>

                            <div class="d-flex" style="gap: 0;">
                                <button type="submit"
                                        class="btn w-50"
                                        style="background-color: #4285f4; color: white; border: none; padding: 8px 10px; font-weight: 500; border-radius: 0; margin-right: 2px;">
                                    Apply Filters
                                </button>
                                <a href="{{ route('shop.index') }}"
                                   class="btn w-50"
                                   style="background-color: #6c757d; color: white; border: none; padding: 8px 10px; font-weight: 500; text-decoration: none; display: flex; align-items: center; justify-content: center; border-radius: 0;">
                                    Clear
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Sidebar End -->

                <!-- Products Start -->
                <div class="col-lg-9">
                    <div class="row mb-n-30px">
                        @forelse($products as $product)
{{--                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">--}}
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                <div class="product">
{{--                                    <span class="badges"><span class="new">New</span></span>--}}
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
                                    <div class="actions">
                                        <button onclick="addToCart('{{$product->id}}');" title="Add To Cart" class="action add-to-cart" {{--data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"--}}><i
                                                class="pe-7s-shopbag"></i></button>
{{--                                        <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"><i--}}
{{--                                                class="pe-7s-like"></i></button>--}}
                                        {{--                                                <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>--}}
                                        {{--                                            <button class="action compare" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal-Compare"><i--}}
                                        {{--                                                    class="pe-7s-refresh-2"></i></button>--}}
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
@section('script')
    <script>
        function addToCart(productId) {
            $.ajax({
                url: 'cart/store',
                type: 'PUT',
                data: {
                    productId: productId,
                    quantity: 1 // You can adjust this if quantity is dynamic
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        var count = parseInt($('#itemCount').text());
                        $('#itemCount').text(count + 1); // Adjust if you want to increment by more
                    }
                    $('#exampleModal-Cart').modal('show');
                    $('#modelMessage').html('<i class="pe-7s-check"></i>' + response.message);
                },
                error: function(xhr) {
                    var response = xhr.responseJSON;
                    var errorMessage = response.message || 'An error occurred. Please try again.';
                    $('#exampleModal-Cart').modal('show');
                    $('#modelMessage').html('<i class="pe-7s-close"></i>' + errorMessage);
                }
            });
        }

    </script>
@endsection
