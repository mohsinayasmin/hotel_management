@extends('admin.layout')
@section('content')
    <div class="container card">
        <div class="col-sm-6 p-md-2">
            <div class="welcome-text">
                <h4>Edit Department</h4>

            </div>

        </div>

        <div class="card">
            <form action="{{ url('/update_department'.'/'.$data->id) }}" method="post" enctype="multipart/form">
                @csrf
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Title</h4>
                    </div>
                    <input value="{{$data->title}}" name="title" type="text" class="form-control" id="example name">
                </div>
                <br>
                @error('detail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Details</h4>
                    </div>
                    <input value="{{$data->detail}}" name="detail" type="text" class="form-control" id="example name">
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
@endsection
