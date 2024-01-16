@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Product</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                <h3 class="card-title">Create Product</h3>
            </div>
            <!-- /.card-header -->
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                    Success
                </div>
            @endif
            <!-- form start -->
            <form method="post" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" name="productName" placeholder="Enter product name">
                    </div>


                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <textarea class="form-control" name="productDescription"
                                  placeholder="Enter product description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="number" class="form-control" name="productPrice" placeholder="Enter product price">
                    </div>

                    <div class="form-group">
                        <label for="productCategory">Category</label>
                        <select class="form-control" name="productCategory">
                            <option value="electronics">Personalized Creations</option>
                            <option value="clothing">Home Deco</option>
                            <option value="home">Gifts and Souvenirs</option>
                            <option value="beauty">Stationery and Paper Good</option>
                            <!-- Add more options based on your specific categories -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="productImage" id="productImage">
                                <label class="custom-file-label" for="productImage">Choose file</label>
                            </div>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit item</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->

@endsection
