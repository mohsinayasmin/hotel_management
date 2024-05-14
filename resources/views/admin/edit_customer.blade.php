@extends('admin.layout')
@section('content')
    <div class="container card">
        <div class="col-sm-6 p-md-2">
            <div class="welcome-text">
                <h4>Add Customer</h4>

            </div>

        </div>

        <div class="card">
            <form action="{{ url('update_customer/'.$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @error('full_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Full Name</h4>
                    </div>
                    <input value="{{ $data->full_name }}" required name="full_name" type="text" class="form-control" id="example name">
                </div>
                <br>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Email</h4>
                    </div>
                    <input value="{{ $data->email }}" required name="email" type="email" class="form-control" id="example name">
                </div>
                <br>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Password</h4>
                    </div>
                    <input value="{{ $data->password }}" required name="password" type="password" class="form-control" id="example name">
                </div>
                <br>
                @error('mobile')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Mobile</h4>
                    </div>
                    <input value="{{ $data->mobile }}" required name="mobile" type="text" class="form-control" id="example name">
                </div>
                <br>

                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Address</h4>
                    </div>
                    <input value="{{ $data->address }}" required name="address" type="text" class="form-control" id="example name">
                </div>
                <br>
                
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Photo</h4>
                    </div>
                    <img src="/storage/{{$data->photo}}" height="50"  alt="..."></td>
                    <input  name="photo" type="file" class="form-control" id="example name">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection
