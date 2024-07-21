@extends('layouts.guest')
@section('content')
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
                                        <tr data-product-id="{{ $item['product_id'] }}">
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px"
                                                                 src="{{asset('storage/'.$item['image'])}}" alt=""/></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{$item['name']}}</a></td>
                                            <td class="product-price-cart" data-amount="{{ $item['price'] }}"><span class="amount">${{ $item['price'] }} </span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                           value="{{ $item['quantity'] }}"/>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-product-id="{{ $item['product_id'] }}">${{ $item['subTotal'] }}</td>
                                            <td class="product-remove">
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
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('.inc,.dec,input').on('click input',function () {
            var txt = $(this).text();
            var unitPrice = $(this).closest('tr').find('.product-price-cart').attr('data-amount')
            var qty = $(this).closest('tr').find('.product-quantity input').val()
            $(this).closest('tr').find('.product-subtotal').text(`$${qty*unitPrice}`)

            /*
            var productId = $(this).closest('tr').attr('data-product-id');

            $.ajax({
                url:'cart/store',
                type:'PUT',
                data:{
                    productId:productId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(){
                    $('#exampleModal-Cart').modal('show')
                    var count = parseInt($('#itemCount').text())
                    $('#itemCount').text(count+1)
                }
            })*/
        })
    });
</script>
@endsection
