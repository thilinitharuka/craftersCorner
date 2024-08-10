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
                                                <a href="#" onclick="deleteCartItem(this,{{ $item['product_id'] }})"><i class="fa fa-times"></i></a>
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
        <div class="cart-shiping-update-wrapper d-flex justify-content-end align-items-center mt-4">
            <div class="cart-shiping-update">
                <a href="{{ route('index') }}" class="btn btn-outline-primary">Continue Shopping</a>
            </div>
            <div class="cart-clear ml-2">
                <a href="{{ route('checkout') }}" class="btn btn-primary" style="margin-right: 85px;">Checkout</a>
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
            var productId = $(this).closest('tr').attr('data-product-id');
            $(this).closest('tr').find('.product-subtotal').text(`$${qty*unitPrice}`)

            //update cart
            $.ajax({
                url: 'cart/update',
                type: 'PUT',
                data: {
                    productId: productId,
                    qty:qty
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                complete:function (){
                    fetchCartItemCount();
                }
            });
        })
    });

    function deleteCartItem(obj,productId){
        $.ajax({
            url: 'cart/destroy',
            type: 'PUT',
            data: {
                productId: productId,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $(obj).closest('tr').remove();
                }
                $('#exampleModal-Cart').modal('show');
                $('#modelMessage').html('<i class="pe-7s-check"></i>' + response.message);
            },
            error: function(xhr) {
                var response = xhr.responseJSON;
                var errorMessage = response.message || 'An error occurred. Please try again.';
                $('#exampleModal-Cart').modal('show');
                $('#modelMessage').html('<i class="pe-7s-close"></i>' + errorMessage);
            },
            complete:function (){
                fetchCartItemCount();
            }
        });
    }

    function fetchCartItemCount() {
        $.ajax({
            url: '/cart/count',
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    $('#itemCount').text(response.totalItemCount); // Update the cart item count in the UI
                } else {
                    console.log(response.message); // Log any error message
                }
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
            }
        });
    }
</script>
@endsection
