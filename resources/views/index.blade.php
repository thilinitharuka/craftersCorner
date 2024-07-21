@extends('layouts.guest')
   @section('content')
    <!-- Hero/Intro Slider Start -->
    <div class="section ">
        <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
            <!-- Hero slider Active -->
            <div class="swiper-wrapper">
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide bg-color1" data-bg-image="assets/img/hero/bg/main.jpg">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">Welcome To Crafters’ Corner</span>
                                    <h2 class="title-1">Your Ideas, <br>
                                        Our Artistry,<br>
                                        Timeless Craft. </h2>
                                    <a href="shop-left-sidebar.html" class="btn btn-primary text-capitalize">Shop All Crafts</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                                <div class="show-case">
                                    <div class="hero-slide-image">
                                        <img src="assets/img/hero/inner-img/hero-1-1.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single slider item -->
                <div class="hero-slide-item slider-height swiper-slide bg-color1" data-bg-image="assets/img/hero/bg/main.jpg">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                                <div class="hero-slide-content slider-animated-1">
                                    <span class="category">Welcome To Crafters’ Corner</span>
                                    <h2 class="title-1">Your Ideas, <br>
                                        Our Artistry,<br>
                                        Timeless Craft. </h2>
                                    <a href="shop-left-sidebar.html" class="btn btn-primary text-capitalize">Shop All Crafts</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                                <div class="show-case">
                                    <div class="hero-slide-image">
                                        <img src="assets/img/hero/inner-img/hero-1-2.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
    <!-- Hero/Intro Slider End -->
    <!-- Product Area Start -->
    <div class="product-area pb-100px">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row">
                <div class="col-12">
                    <!-- Tab Start -->
                    <div class="tab-slider d-md-flex justify-content-md-between align-items-md-center">
                        <ul class="product-tab-nav nav justify-content-start align-items-center">
                            <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#newarrivals">New Arrivals</button>
                            </li>
                        </ul>
                    </div>
                    <!-- Tab End -->
                </div>
            </div>
            <!-- Section Title & Tab End -->
            <div class="row">
                <div class="col">
                    <div class="tab-content mt-60px">
                        <!-- 1st tab start -->
                        <div class="tab-pane fade show active" id="newarrivals">
                            <div class="row mb-n-30px">
                                @foreach($products as $product)
                                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                        <div class="product">
                                            <span class="badges">
                                                <span class="new">New</span>
                                            </span>
                                            <div class="thumb">
                                                <a href="single-product.html" class="image">
                                                    <img style="width:270px;height: 274px;"  src="{{asset('storage/'.$product->image)}}" class="img-fluid" alt="">
                                                    {{--                                             <img class="hover-image" src="assets/images/product-image/1.webp" alt="Product" />--}}
                                                </a>
                                            </div>
                                            <div class="content">
                                                <span class="category">{{ $product->category }}</span>
                                                <h5 class="title">
                                                    {{ $product->name }}
                                                </h5>
                                                <span class="price">
                                                    <span class="new">Rs. {{ $product->price }}</span>
                                                </span>
                                            </div>
                                            <div class="actions">
                                                <button onclick="addToCart('{{$product->id}}');" title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                                        class="pe-7s-shopbag"></i></button>
                                                <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"><i
                                                        class="pe-7s-like"></i></button>
                                                <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-look"></i></button>
                                                {{--                                            <button class="action compare" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal-Compare"><i--}}
                                                {{--                                                    class="pe-7s-refresh-2"></i></button>--}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- 1st tab end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End -->
   @endsection

@section('script')
<script>
    function addToCart(productId){
        $.ajax({
            url:'cart/store',
            type:'PUT',
            data:{productId:productId},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(){
                $('#exampleModal-Cart').modal('show')
                var count = parseInt($('#itemCount').text())
                $('#itemCount').text(count+1)
            }
        })
    }
</script>
@endsection
