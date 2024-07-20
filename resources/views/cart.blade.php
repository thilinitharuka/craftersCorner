<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crafters' Corner - Home</title>
    <meta name="robots" content="index, follow"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Hmart-Smart Product eCommerce html Template">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('user_assets/images/favicon.ico')}}"/>
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('user_assets/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('user_assets/css/font.awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('user_assets/css/pe-icon-7-stroke.css')}}"/>
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

                                @guest
                                    <li><a href="{{route('login')}}"><i class="fa fa-user"></i>Login</a></li>
                                    <li><a href="{{route('register')}}"><i class="fa fa-user"></i>Register</a></li>
                                @else
                                    <li><a href="my-account.html"><i class="fa fa-user"></i> Account</a></li>
                                    <li><a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> Logout</a></li>
                                    <form style="display: none;" id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" class="d-none">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">                </form>
                                @endguest
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
                            <a href="{{route('cart.index')}}" class="header-action-btn header-action-btn-cart pr-0">
                                <i class="pe-7s-shopbag"></i>
                                <span id="itemCount" class="header-action-num">
                                    @if(isset($totItemCount) )
                                        {{ $totItemCount }}
                                    @else
                                        0
                                    @endif
                                </span>
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
                            <li class="dropdown"><a href="/">Home</a> </li>
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
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/1.webp"
                                                                         alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Modern Smart Phone</a>
                            <span class="quantity-price">1 x <span class="amount">$21.86</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/2.webp"
                                                                         alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Bluetooth Headphone</a>
                            <span class="quantity-price">1 x <span class="amount">$13.28</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/3.webp"
                                                                         alt="Cart product Image"></a>
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
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/1.webp"
                                                                         alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Modern Smart Phone</a>
                            <span class="quantity-price">1 x <span class="amount">$18.86</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/2.webp"
                                                                         alt="Cart product Image"></a>
                        <div class="content">
                            <a href="single-product.html" class="title">Bluetooth Headphone</a>
                            <span class="quantity-price">1 x <span class="amount">$43.28</span></span>
                            <a href="#" class="remove">×</a>
                        </div>
                    </li>
                    <li>
                        <a href="single-product.html" class="image"><img src="assets/images/product-image/3.webp"
                                                                         alt="Cart product Image"></a>
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
                <li><a href="tel:0123456789"><i class="fa fa-phone"></i> +012 3456 789</a></li>
                <li><a href="mailto:demo@example.com"><i class="fa fa-envelope-o"></i> demo@example.com</a></li>
                <li><a href="/"><i class="fa fa-user"></i> Account</a></li>
                <li><a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> Logout</a></li>
            </ul>
        </div>
        <form style="display: none;" id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" class="d-none">
            <input type="hidden" name="_token" value="{{csrf_token()}}">                </form>
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
                                            Right</a></li>
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

    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="container">
            <h3 class="cart-page-title">Your cart items</h3>
            <div class="row">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}

                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="{{ route('checkout') }}" method="GET">
                        @csrf
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Until Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!empty($cartItems))
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px"
                                                                 src="{{asset('storage/'.$item['image'])}}" alt=""/></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{$item['name']}}</a></td>
                                            <td class="product-price-cart"><span class="amount">${{ $item['price'] }} </span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                           value="{{ $item['quantity'] }}"/>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-product-id="{{ $item['product_id'] }}">${{ $item['subTotal'] }}</td>
                                            <td class="product-remove">
                                                <a href="#"><i class="fa fa-pencil"></i></a>
                                                <a href="#" onclick="deleteCartItem()"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="cart-shiping-update-wrapper">
            <div class="cart-shiping-update">
                <a href="#">Continue Shopping</a>
            </div>
            <div class="cart-clear">
{{--                <button type="submit" class="btn btn-primary">Checkout</button>--}}
                <a href="{{ route('checkout') }}" class="btn btn-secondary">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->


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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const qtyInputs = document.querySelectorAll('.qty-input');

        qtyInputs.forEach(input => {
            input.addEventListener('change', function () {
                const productId = this.getAttribute('data-product-id');
                const newQuantity = parseInt(this.value);
                const unitPrice = parseFloat(this.closest('tr').querySelector('.product-price').getAttribute('data-unit-price'));
                const newSubtotal = (newQuantity * unitPrice).toFixed(2);

                const subtotalElement = document.querySelector(`.product-subtotal[data-product-id="${productId}"]`);
                subtotalElement.textContent = `$${newSubtotal}`;
            });
        });
    });
</script>


<!-- Minify Version -->
<!-- <script src="assets/js/vendor.min.js"></script>
<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/main.min.js"></script> -->

<!--Main JS (Common Activation Codes)-->
<script src="{{asset('user_assets/js/main.js')}}"></script>
</body>

</html>
