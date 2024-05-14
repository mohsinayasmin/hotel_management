@extends('admin.layout')
@section('content')
    <div class="container card">
        <div class="col-sm-6 p-md-2">
            <div class="welcome-text">
                <h4>Add Roomtype</h4>

            </div>

        </div>

        <div class="card">
            <form action="{{ route('insert_roomtype') }}" method="post" enctype="multipart/form-data">
                @csrf
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Title</h4>
                    </div>
                    <input name="title" type="text" class="form-control" id="example name="title"Password1">
                </div>
                <br>
                @error('detail')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="card-header">
                    <h4 class="card-title">Textarea</h4>
                </div>

                <div class="form-group">
                    <textarea name="detail" class="form-control" rows="10" id="comment"></textarea>
                </div>
                <br>
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Gallery</h4>
                    </div>
                    <input name="imgs[]" multiple  type="file" class="form-control" id="example name">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection
