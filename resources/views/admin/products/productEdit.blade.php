@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
            </div>
            <!-- /.card-header -->
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if ($errors->any())

                <div class="alert alert-danger">

                    <strong>Whoops!</strong> There were some problems with your input.<br><br>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif
            <!-- form start -->
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter product name"
                               value="{{ old('name', $product->name) }}">
                    </div>

                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea class="form-control" name="description"
                                  placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter product price"
                               value="{{ old('price', $product->price) }}">
                    </div>

                    <div class="form-group">
                        <label for="productCategory">Category</label>
                        <select class="form-control" name="category">
                            <option
                                value="electronics" {{ old('category', $product->category) == 'electronics' ? 'selected' : '' }}>
                                Personalized Creations
                            </option>
                            <option
                                value="clothing" {{ old('category', $product->category) == 'clothing' ? 'selected' : '' }}>
                                Home Deco
                            </option>
                            <option
                                value="home" {{ old('category', $product->category) == 'home' ? 'selected' : '' }}>
                                Gifts and Souvenirs
                            </option>
                            <option
                                value="beauty" {{ old('category', $product->category) == 'beauty' ? 'selected' : '' }}>
                                Stationery and Paper Good
                            </option>
                            <!-- Add more options based on your specific categories -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="productImage">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                               name="exampleCheck1" {{ old('exampleCheck1', $product->exampleCheck1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
            </form>

        </div>
    </section>
    <!-- /.content -->
@endsection
