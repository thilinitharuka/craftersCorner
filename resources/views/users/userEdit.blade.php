@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
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
                <h3 class="card-title">Edit User</h3>
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
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="userName">User Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter user name"
                               value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="form-group">
                        <label for="usersEmail">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address"
                               value="{{ old('email', $user->email) }}">
                    </div>


                    <div class="form-group">
                        <label for="usersPhoneNumber">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="Enter phone number"
                               value="{{ old('phoneNumber', $user->phone_number) }}">
                    </div>

                    <div class="form-group">
                        <label for="usersAddress">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter address"
                               value="{{ old('address', $user->address) }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="userImage">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                               name="exampleCheck1" {{ old('exampleCheck1', $user->exampleCheck1) ? 'checked' : '' }}>
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>

        </div>
    </section>
    <!-- /.content -->
@endsection
