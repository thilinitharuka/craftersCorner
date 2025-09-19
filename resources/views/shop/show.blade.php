@extends('layouts.guest')

@section('content')
    <div class="product-details-area pt-100px pb-100px">
        <div class="container">
            <div class="row">
                <!-- Product Image -->
                <div class="col-lg-6 col-sm-12 mb-30px">
                    <img class="img-fluid" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}">
                </div>

                <!-- Product Content -->
                <div class="col-lg-6 col-sm-12">
                    <div class="product-details-content ml-25px">
                        <h2>{{ $product->name }}</h2>
                        <div class="pricing-meta">
                            <ul class="d-flex">
                                <li class="new-price">Rs. {{ $product->price }}</li>
                            </ul>
                        </div>

                        <p class="mt-30px">{{ $product->description }}</p>

                        <div class="pro-details-categories-info d-flex">
                            <span>Category: </span>
                            <ul class="d-flex ms-2">
                                <li><a href="#">{{ $product->categories?->name }}</a></li>
                            </ul>
                        </div>

                        <div class="pro-details-quality mt-3">
                            <input type="number" id="quantity" value="1" min="1" class="form-control d-inline" style="width: 150px; height: 45px; margin-right: 2px;">
                            <button style="background-color: #4285f4; color: white; border: none; width: 150px; height: 45px; font-weight: 500; border-radius: 0; margin-right: 2px;" onclick="addToCart('{{ $product->id }}')" class="btn btn-primary">
                                Add to Cart
                            </button>
                        </div>
                    </div>

                    <!-- Tabs: Description / Reviews -->
                    <div class="description-review-wrapper mt-4">
                        <div class="description-review-topbar nav">
                            <button class="active" data-bs-toggle="tab" data-bs-target="#desc">Description</button>
                            <button data-bs-toggle="tab" data-bs-target="#reviews">
                                Reviews ({{ $product->reviews->count() }})
                            </button>
                        </div>

                        <div class="tab-content">
                            <!-- Description -->
                            <div id="desc" class="tab-pane active">
                                <p>{{ $product->description }}</p>
                            </div>

                            <!-- Reviews -->
                            <div id="reviews" class="tab-pane">
                                @forelse($product->reviews as $review)
                                    <div class="single-review">
                                        <h5>
                                            {{ $review->customer?->user?->name ?? 'Anonymous' }}
                                            - {{ $review->rating }} ⭐
                                        </h5>
                                        <p>{{ $review->comment }}</p>
                                    </div>
                                @empty
                                    <p>No reviews yet.</p>
                                @endforelse


                                <!-- Review Form -->
                                @auth
                                    <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                                        @csrf
                                        <label>Your Rating:</label>
                                        <select name="rating" class="form-control mb-2">
                                            <option value="5">⭐ 5</option>
                                            <option value="4">⭐ 4</option>
                                            <option value="3">⭐ 3</option>
                                            <option value="2">⭐ 2</option>
                                            <option value="1">⭐ 1</option>
                                        </select>
                                        <textarea name="comment" class="form-control mb-2" placeholder="Write a review..."></textarea>
                                        <button style="background-color: #4285f4; color: white; border: none; padding: 8px 10px; font-weight: 500; border-radius: 0; margin-right: 2px;" type="submit" class="btn btn-primary">Submit Review</button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Area Start -->
                <div class="product-area related-product mt-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title text-center m-0">
                                    <h2 class="title">Related Products</h2>
                                    <p>Products from the same category</p>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-n-30px mt-4">
                            @forelse($relatedProducts as $related)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-30px">
                                    <div class="product">
                                        <div class="thumb">
                                            <a href="{{ route('product.show', $related->id) }}" class="image">
                                                <img style="width:100%;height:250px;object-fit:cover;"
                                                     src="{{ asset('storage/'.$related->image) }}"
                                                     alt="{{ $related->name }}">
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="title">
                                                <a href="{{ route('product.show', $related->id) }}">{{ $related->name }}</a>
                                            </h5>
                                            <span class="price">Rs. {{ $related->price }}</span>
                                        </div>
                                        <div class="actions">
                                            <button onclick="addToCart('{{ $related->id }}')" class="action add-to-cart">
                                                <i class="pe-7s-shopbag"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">No related products found.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <!-- Product Area End -->

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function addToCart(productId) {
            $.ajax({
                url: '/cart/store',
                type: 'PUT',
                data: {
                    productId: productId,
                    quantity: $('#quantity').val()
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        var count = parseInt($('#itemCount').text());
                        $('#itemCount').text(count + 1);
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
