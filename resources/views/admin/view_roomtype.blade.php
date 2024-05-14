@extends('admin.layout')
@section('content')
<style>
    .r{
color: rgb(0, 0, 0)
    }
</style>
<div class="container">
    <div class="col-sm-6 p-md-2">
        <div class="welcome-text">
            <h3>Roomtype Details</h3>
            <hr>

        </div>

    </div>
    
    <div class="r row p-3">
        <div class="col-6">Room Type :</div>
        <div class="col-6">{{$data->title}}</div>
        <hr>
    </div>
   
    <div class="r row p-3">
        <div class="col-6">Details :</div>
        <div class="col-6">{{$data->detail}}</div>
        <hr>
    </div>
    
    <div class="r row p-3">
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
 
    <div class="r row p-3">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{url('/edit_roomtype'.'/'.$data->id)}}" type="button" class="btn btn-primary text-white ">Edit</a>
          </div>
       
    </div>
   
</div>
  
@endsection