@extends('admin.layout')
@section('content')
    <div class="container card">
        <div class="col-sm-6 p-md-2">
            <div class="welcome-text">
                <h4>Edit Roomtype</h4>

            </div>

        </div>

        <div class="card">
            <form action="{{ url('update_roomtype' . '/' . $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Title</h4>
                    </div>
                    <input value="{{ $data->title }}" name="title" type="text" class="form-control" id="example name="
                        title="Password1">
                </div>
                <br>
                <div class="card-header">
                    <h4 class="card-title">Textarea</h4>
                </div>

                <div class="form-group">
                    <textarea name="detail" class="form-control" rows="10" id="comment">{{ $data->detail }}</textarea>
                </div>
                <div class="card-header">
                    <h4 class="card-title">Gallery</h4>
                </div>

                <div class="form-group">
                    <div class="mb-3">
                       
                        <input name="imgs[]" multiple  type="file" class="form-control" id="example name">
                    </div>


                    <div class="container">
                        <div class="row">
                            @foreach ($data->roomtypeimg as $img)
                                <div class="card p-2 col-1.5 imgcol{{ $img->id }}" style="width: 8rem;">
                              
                                    <img src="/storage/{{ $img->img_src }}" height="70px" alt="..."></td>
                                    <div class="card-body">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a  href="{{url('/room_type_image_delete'.'/'.$img->id)}}" type="button" class="btn btn-danger text-white "><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></a>
                                          </div>
                                      
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

@endsection
