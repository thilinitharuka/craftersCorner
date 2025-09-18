@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Customers Orders</h1>
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
                <h3 class="card-title">Customized Order List</h3>
            </div>

            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Approve</th>
                </tr>
                </thead>
                <tbody>
                @php $n = 1; @endphp
                @foreach ($images as $image)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $image->user->name ?? 'N/A' }}</td>
                        <td>{{ $image->user->email ?? 'N/A' }}</td>
                        <td>
                            <img src="{{ $image->image_base64 }}"
                                 alt="Generated Image" width="120" height="120">
                        </td>
                        <td>{{ $image->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            @if(!$image->is_approved)
                                <form action="{{ route('generated-images.approve', $image->id) }}" method="POST" class="d-flex align-items-center">
                                    @csrf
                                    <div class="input-group">
                                        <input style="width: 100px;" type="text" name="price" class="form-control" placeholder="Enter Price"
                                               value="{{ old('price') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Approve</button>
                                        </div>
                                    </div>

                                    {{-- Show validation error for price --}}
                                    @error('price')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                    @enderror
                                </form>

                            @else
                                Rs. {{ $image->price ?? '-' }}
                            @endif
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
