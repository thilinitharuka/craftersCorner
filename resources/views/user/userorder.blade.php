

@extends('layouts.appUser')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Orders</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <!-- /.card-header -->
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                    Success
                </div>
            @endif
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @forelse($orders as $order)
                <div class="card mb-3">
                    <div class="card-header">
                        Order #{{ $order->id }} - {{ $order->created_at->format('d M Y') }}
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $order->name }}</p>
                        <p><strong>Address:</strong> {{ $order->order_address }}</p>
                        <p><strong>Phone Number:</strong> {{ $order->phone_number }}</p>
{{--                        <p><strong>Status:</strong> {{ $order->status }}</p>--}}

                        <h5>Order Details</h5>
                        <ul>
                                <?php $total = 0;  ?>
                            @foreach($order->order_details as $detail)
                                <li>
                                    <strong>Product:</strong> {{ $detail->product->name }}<br>
                                    <strong>Quantity:</strong> {{ $detail->quantity }}<br>
                                    <strong>Price:</strong> {{ $detail->product->price }}
                                    <?php $total += $detail->product->price;  ?>
                                </li>
                            @endforeach
                            <li><strong>Total:</strong> {{$total }} </li>
                        </ul>
                    </div>
                </div>
            @empty
                <p>You have no orders.</p>
            @endforelse
        </div>
    </section>
    <!-- /.content -->

@endsection
