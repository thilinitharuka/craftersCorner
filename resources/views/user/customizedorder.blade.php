@extends('layouts.appUser')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Customized Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Images</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Generated Images List</h3>
            </div>

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Order</th>
                </tr>
                </thead>
                <tbody>
                @php $n = 1; @endphp
                @foreach ($images as $image)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>
                            <img src="{{ $image->image_base64 }}"
                                 alt="Generated Image" width="120" height="120">
                        </td>
                        <td>{{ $image->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            @if(!$image->is_approved)
                                <span class="badge badge-warning">Pending</span>
                            @else
                                <span class="badge badge-success">Approved</span>
                            @endif
                        </td>
                        <td> Rs. {{ $image->price ?? '-' }}</td>
                        <td>
                            @if($image->is_paid)
                                <span class="badge badge-success">Paid</span>
                            @else
                                @if($image->is_approved)
                                    <form action="{{ route('generated-images.approve', $image->id) }}" method="POST">
                                        @csrf
                                        <a href="{{ route('checkout.image', $image->id) }}"
                                           class="btn btn-primary btn-sm">Pay</a>
                                    </form>
                                @else
                                    <button disabled type="submit" class="btn btn-primary btn-sm">Pay</button>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
