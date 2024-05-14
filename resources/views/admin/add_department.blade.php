@extends('admin.layout')
@section('content')
    <div class="container card">
        <div class="col-sm-6 p-md-2">
            <div class="welcome-text">
                <h4>Add Department</h4>

            </div>

        </div>

        <div class="card">
            <form action="{{ route('insert_department') }}" method="post" enctype="multipart/form">
                @csrf
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Title</h4>
                    </div>
                    <input name="title" type="text" class="form-control" id="example name">
                </div>
                <br>
                @error('detail')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Details</h4>
                    </div>
                    <input name="detail" type="text" class="form-control" id="example name">
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection
