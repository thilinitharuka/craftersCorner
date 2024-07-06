<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crafters' Corner - Home</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Hmart-Smart Product eCommerce html Template">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user_assets/images/favicon.ico')}}" />
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('user_assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('user_assets/css/font.awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('user_assets/css/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('user_assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/venobox.css')}}">
    <link rel="stylesheet" href="{{asset('user_assets/css/jquery-ui.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('user_assets/css/style.css')}}">
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>
<div class="main-wrapper">
    <header>
        <!-- Header top area start -->
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        <div class="welcome-text">
{{--                            <p>World Wide Completely Free Returns and Shipping</p>--}}
                        </div>
                    </div>
                    <div class="col d-none d-lg-block">
                        <div class="top-nav">
                            <ul>
                                <li><a href="tel:0123456789"><i class="fa fa-phone"></i> +012 3456 789</a></li>
                                <li><a href="mailto:demo@example.com"><i class="fa fa-envelope-o"></i> crafters'corner@gmail.com</a></li>
                                <li>
                                    @guest
                                    <a href="{{route('login')}}"><i class="fa fa-user"></i>Login</a>
                                    @else
                                        <a href="my-account.html"><i class="fa fa-user"></i> Account</a>
                                    @endguest
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header top area end -->
        <!-- Header action area start -->
        <div class="header-bottom  d-none d-lg-block">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-3 col">
                        <div class="header-logo" style="color: white; font-family: 'Playfair Display', serif;">
                            <h2 style="color: white;">Crafters' <br> Corner</h2>
                        </div>

                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="search-element">
                            <form action="#">
                                <input type="text" placeholder="Search" />
                                <button><i class="pe-7s-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col">
                        <div class="header-actions">
                            <!-- Single Wedge Start -->
                            <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                                <i class="pe-7s-like"></i>
                            </a>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num">01</span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="pe-7s-menu"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header action area end -->
        <!-- Header action area start -->
        <div class="header-bottom d-lg-none sticky-nav style-1">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-3 col">
                        <div class="header-logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="search-element">
                            <form action="#">
                                <input type="text" placeholder="Search" />
                                <button><i class="pe-7s-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col">
                        <div class="header-actions">
                            <!-- Single Wedge Start -->
                            <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                                <i class="pe-7s-like"></i>
                            </a>
                            <!-- Single Wedge End -->
                            <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span class="header-action-num">01</span>
                                <!-- <span class="cart-amount">€30.00</span> -->
                            </a>
                            <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                <i class="pe-7s-menu"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header action area end -->
        <!-- header navigation area start -->
        <div class="header-nav-area d-none d-lg-block sticky-nav">
            <div class="container">
                <div class="header-nav">
                    <div class="main-menu position-relative">
                        <ul>
                            <li class="dropdown"><a href="#">Home</a> </li>
                            <li class="dropdown"><a href="#">Shop</a> </li>
                            <li class="dropdown"><a href="#">Custom Craft Corner</a> </li>
                            <li class="dropdown"><a href="#">About Us</a> </li>
                            <li class="dropdown"><a href="#">Contact Us</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- header navigation area end -->
        <div class="mobile-search-box d-lg-none">
            <div class="container">
                <!-- mobile search start -->
                <div class="search-element max-width-100">
                    <form action="#">
                        <input type="text" placeholder="Search" />
                        <button><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- mobile search start -->
            </div>
        </div>
    </header>
    <!-- offcanvas overlay start -->
    <div class="offcanvas-overlay"></div>
    <!-- offcanvas overlay end -->
    <!-- OffCanvas Wishlist Start -->
    <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
        <div class="inner">
            <div class="head">
                <span class="title">Wishlist</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/1.webp" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Modern Smart Phone</a>
                            <span class="quantity-price">1 x <span class="amount">$21.86</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/2.webp" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Bluetooth Headphone</a>
                            <span class="quantity-price">1 x <span class="amount">$13.28</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/3.webp" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Smart Music Box</a>
                            <span class="quantity-price">1 x <span class="amount">$17.34</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="buttons">
                    <a href="wishlist.html" class="btn btn-dark btn-hover-primary mt-30px">view wishlist</a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Wishlist End -->
    <!-- OffCanvas Cart Start -->
    <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
        <div class="inner">
            <div class="head">
                <span class="title">Cart</span>
                <button class="offcanvas-close">×</button>
            </div>
            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/1.webp" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Modern Smart Phone</a>
                            <span class="quantity-price">1 x <span class="amount">$18.86</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/2.webp" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Bluetooth Headphone</a>
                            <span class="quantity-price">1 x <span class="amount">$43.28</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/3.webp" alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Smart Music Box</a>
                            <span class="quantity-price">1 x <span class="amount">$37.34</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="foot">
                <div class="buttons mt-30px">
                    <a href="cart.html" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                    <a href="checkout.html" class="btn btn-outline-dark current-btn">checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- OffCanvas Cart End -->
    <!-- OffCanvas Menu Start -->
    <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
        <button class="offcanvas-close"></button>
        <div class="user-panel">
            <ul>
                <li><a href="tel:0123456789"><i class="fa fa-phone"></i> +94 3456 789</a></li>
                <li><a href="mailto:demo@example.com"><i class="fa fa-envelope-o"></i> CraftersConer@gmail.com</a></li>
                <li><a href="my-account.html"><i class="fa fa-user"></i> Account</a></li>
            </ul>
        </div>
        <div class="inner customScroll">
            <div class="offcanvas-menu mb-4">
                <ul>
                    <li><a href="#"><span class="menu-text">Home</span></a>
                        <ul class="sub-menu">
                            <li><a href="index.html"><span class="menu-text">Home 1</span></a></li>
                            <li><a href="index-2.html"><span class="menu-text">Home 2</span></a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li>
                        <a href="#"><span class="menu-text">Pages</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#"><span class="menu-text">Inner Pages</span></a>
                                <ul class="sub-menu">
                                    <li><a href="404.html">404 Page</a></li>
                                    <li><a href="order-tracking.html">Order Tracking</a></li>
                                    <li><a href="faq.html">Faq Page</a></li>
                                    <li><a href="coming-soon.html">Coming Soon Page</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text"> Other Shop Pages</span></a>
                                <ul class="sub-menu">
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                    <li><a href="compare.html">Compare Page</a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Related Shop Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="my-account.html">Account Page</a></li>
                                    <li><a href="login.html">Login & Register Page</a></li>
                                    <li><a href="empty-cart.html">Empty Cart Page</a></li>
                                    <li><a href="thank-you-page.html">Thank You Page</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="menu-text">Shop</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#"><span class="menu-text">Shop Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                    <li><a href="shop-4-column.html">Shop 4 Column</a></li>
                                    <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                    <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                    </li>
                                    <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a>
                                    </li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">product Details Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="single-product.html">Product Single</a></li>
                                    <li><a href="single-product-variable.html">Product Variable</a></li>
                                    <li><a href="single-product-affiliate.html">Product Affiliate</a></li>
                                    <li><a href="single-product-group.html">Product Group</a></li>
                                    <li><a href="single-product-tabstyle-2.html">Product Tab 2</a></li>
                                    <li><a href="single-product-tabstyle-3.html">Product Tab 3</a></li>
                                    <li><a href="single-product-slider.html">Product Slider</a></li>
                                    <li><a href="single-product-gallery-left.html">Product Gallery Left</a>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="menu-text">Single Product Page</span></a>
                                <ul class="sub-menu">
                                    <li><a href="single-product-gallery-right.html">Product Gallery
                                            Right</a> </li>
                                    <li><a href="single-product-sticky-left.html">Product Sticky Left</a>
                                    </li>
                                    <li><a href="single-product-sticky-right.html">Product Sticky Right</a>
                                    </li>
                                    <li><a href="compare.html">Compare Page</a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                    <li><a href="my-account.html">Account Page</a></li>
                                    <li><a href="login.html">Login & Register Page</a></li>
                                    <li><a href="empty-cart.html">Empty Cart Page</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><span class="menu-text">Blog</span></a>
                        <ul class="sub-menu">
                            <li><a href="blog-grid.html">Blog Grid Page</a></li>
                            <li><a href="blog-grid-left-sidebar.html">Grid Left Sidebar</a></li>
                            <li><a href="blog-grid-right-sidebar.html">Grid Right Sidebar</a></li>
                            <li><a href="blog-list.html">Blog List Page</a></li>
                            <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a></li>
                            <li><a href="blog-list-right-sidebar.html">List Right Sidebar</a></li>
                            <li><a href="blog-single.html">Blog Single Page</a></li>
                            <li><a href="blog-single-left-sidebar.html">Single Left Sidebar</a></li>
                            <li><a href="blog-single-right-sidebar.html">Single Right Sidbar</a>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
            <!-- OffCanvas Menu End -->
            <div class="offcanvas-social mt-auto">
                <ul>
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- OffCanvas Menu End -->
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
                                                    <span class="new">{{ $product->price }}</span>
                                                </span>
                                        </div>
                                        <div class="actions">
                                            <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
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

    <!-- Footer Area Start -->
    <div class="footer-area">
        <div class="footer-container">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Start single blog -->
                        <div class="col-md-6 col-lg-3 mb-md-30px mb-lm-30px">
                            <div class="single-wedge">
                                <div class="header-logo" >
                                    <h2 style="color: black;">Crafters' <br> Corner</h2>
                                </div>
                                <p class="about-text">Crafters' Corner celebrates personalized creations with customized crafts, wall art, bags, baskets, and intricate paper quilling arts. Discover unique elegance!
                                </p>
                                <ul class="link-follow">
                                    <li>
                                        <a class="m-0" title="Twitter" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-facebook"
                                                                                                                             aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a title="Tumblr" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-tumblr" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Facebook" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Instagram" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-60px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Contact Info</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            <li class="li"><a class="single-link" href="my-account.html">+94778562544</a></li>
                                            <li class="li"><a class="single-link" href="contact.html">CraftersCorner@gmail.com</a></li>
                                            <li class="li"><a class="single-link" href="cart.html">Kurunegala, Sri Lanka.</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-40px">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Quick Links</h4>
                                <div class="footer-links">
                                    <div class="footer-row">
                                        <ul class="align-items-center">
                                            <li class="li"><a class="single-link" href="my-account.html">Home</a></li>
                                            <li class="li"><a class="single-link" href="contact.html">Shop</a></li>
                                            <li class="li"><a class="single-link" href="cart.html">Custom Craft Corner</a></li>
                                            <li class="li"><a class="single-link" href="shop-left-sidebar.html">Contact Us</a></li>
                                            <li class="li"><a class="single-link" href="login.html">Services Login</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                        <!-- Start single blog -->
                        <div class="col-md-6 col-lg-3 col-sm-12">
                            <div class="single-wedge">
                                <h4 class="footer-herading">Categories</h4>
                                <div class="footer-links">
                                    <!-- News letter area -->
                                    <p class="address">Customized crafts/Gifts</p>
                                    <p class="phone"><a href="tel:0123456789">Wall Art</a></p>
                                    <p class="mail"><a href="mailto:demo@example.com">Bags & Baskets</a></p>
                                    <p class="mail"><a href="https://demo@example.com">Paper qulling Arts</a></p>
                                    <!-- News letter area  End -->
                                </div>
                            </div>
                        </div>
                        <!-- End single blog -->
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="line-shape-top line-height-1">
                        <div class="row flex-md-row-reverse align-items-center">
                            <div class="col-md-6 text-center text-md-end">
{{--                                <div class="payment-mth"><a href="#"><img class="img img-fluid" src="assets/images/icons/payment.png" alt="payment-image"></a></div>--}}
                            </div>
{{--                            <div class="col-md-6 text-center text-md-start">--}}
{{--                                <p class="copy-text"> © 2021 <strong>Hmart</strong> Made With <i class="fa fa-heart"--}}
{{--                                                                                                 aria-hidden="true"></i> By <a class="company-name" href="https://themeforest.net/user/codecarnival/portfolio">--}}
{{--                                        <strong> Codecarnival </strong></a>.</p>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area End -->
</div>


<!-- Modal -->
<div class="modal modal-2 fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="pe-7s-close"></i></button>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                        <!-- Swiper -->
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/1.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/2.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/3.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/4.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/zoom-image/5.webp" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container gallery-thumbs mt-20px slider-nav-style-1 small-nav">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/small-image/1.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/small-image/2.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/small-image/3.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/small-image/4.webp" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="assets/images/product-image/small-image/5.webp" alt="">
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-details-content quickview-content">
                            <h2>Modern Smart Phone</h2>
                            <div class="pricing-meta">
                                <ul class="d-flex">
                                    <li class="new-price">$20.90</li>
                                </ul>
                            </div>
                            <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="read-review"><a class="reviews" href="#">( 2 Review )</a></span>
                            </div>
                            <p class="mt-30px">Lorem ipsum dolor sit amet, consecte adipisicing elit, sed do eiusmll tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mill veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip exet commodo consequat. Duis aute irure dolor</p>
                            <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>SKU:</span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">Ch-256xl</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>Categories: </span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">Smart Device, </a>
                                    </li>
                                    <li>
                                        <a href="#">ETC</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>Tags: </span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">Smart Device, </a>
                                    </li>
                                    <li>
                                        <a href="#">Phone</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                </div>
                                <div class="pro-details-cart">
                                    <button class="add-cart"> Add To
                                        Cart</button>
                                </div>
                                <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                    <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                                </div>
                            </div>
                            <div class="payment-img">
                                <a href="#"><img src="assets/images/icons/payment.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->
<!-- Modal Cart -->
<div class="modal customize-class fade" id="exampleModal-Cart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-messages">
                    <i class="pe-7s-check"></i> Added to cart successfully!
                </div>
                <div class="tt-modal-product">
                    <div class="tt-img">
                        <img src="assets/images/product-image/1.webp" alt="Modern Smart Phone">
                    </div>
                    <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal wishlist -->
<div class="modal customize-class fade" id="exampleModal-Wishlist" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-messages">
                    <i class="pe-7s-check"></i> Added to Wishlist successfully!
                </div>
                <div class="tt-modal-product">
                    <div class="tt-img">
                        <img src="assets/images/product-image/1.webp" alt="Modern Smart Phone">
                    </div>
                    <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal compare -->
<div class="modal customize-class fade" id="exampleModal-Compare" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-messages">
                    <i class="pe-7s-check"></i> Added to compare successfully!
                </div>
                <div class="tt-modal-product">
                    <div class="tt-img">
                        <img src="assets/images/product-image/1.webp" alt="Modern Smart Phone">
                    </div>
                    <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Global Vendor, plugins JS -->
<!-- JS Files
============================================ -->
<script src="{{asset('user_assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('user_assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('user_assets/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
<script src="{{asset('user_assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>
<script src="{{asset('user_assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('user_assets/js/plugins/swiper-bundle.min.js')}}"></script>
<script src="{{asset('user_assets/js/plugins/scrollUp.js')}}"></script>
<script src="{{asset('user_assets/js/plugins/venobox.min.js')}}"></script>
<script src="{{asset('user_assets/js/plugins/jquery-ui.min.js')}}"></script>
<script src="{{asset('user_assets/js/plugins/mailchimp-ajax.js')}}"></script>

<!-- Minify Version -->
<!-- <script src="assets/js/vendor.min.js"></script>
<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/main.min.js"></script> -->

<!--Main JS (Common Activation Codes)-->
<script src="{{asset('user_assets/js/main.js')}}"></script>
</body>

</html>
