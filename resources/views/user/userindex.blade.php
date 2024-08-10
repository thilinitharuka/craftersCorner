

@extends('layouts.appUser')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Account</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">My Account</li>
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
            <!-- form start -->
            <form method="post" action="{{ route('update.account',auth()->user()) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="userName">User Name</label>
                            <input value="{{$user->name ?? ''}}" type="text" class="form-control" name="userName" placeholder="Enter Your User Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First Name</label>
                            <input value="{{$customer->firstName ?? ''}}" type="text" class="form-control" name="firstName" placeholder="Enter Your First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input value="{{$customer->lastName?? '' }}" type="text" class="form-control" name="lastName" placeholder="Enter Your Last Name">
                        </div>
                    </div>
                    <!-- Address Information -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input value="{{$customer->address ?? ''}}" type="text" class="form-control" name="address" placeholder="Enter Your Address">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input value="{{$customer->city ?? ''}}" type="text" class="form-control" name="city" placeholder="Enter Your City">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="zipCode">ZIP Code</label>
                            <input value="{{$customer->zip_code ?? ''}}" type="text" class="form-control" name="zipCode" placeholder="Enter Your ZIP Code">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input value="{{$user->email ?? ''}}" type="email" class="form-control" name="email" placeholder="Enter Your Email Address">
                    </div>
                    <!-- Phone Number -->
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input value="{{$customer->phone_number ?? ''}}" type="text" class="form-control" name="phone_number" placeholder="Enter Your Phone Number">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('password.change') }}" class="btn btn-secondary">Change Password</a>
                    </div>
                    <!-- /.card-body -->
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->

@endsection
