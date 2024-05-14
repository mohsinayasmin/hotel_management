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
            <h3>Customer Details</h3>
            <hr>

        </div>

    </div>
    
    <div class="r row p-3">
        <div class="col-6">Full Name :</div>
        <div class="col-6">{{$data->full_name}}</div>
        <hr>
    </div>
   
    <div class="r row p-3">
        <div class="col-6">Email :</div>
        <div class="col-6">{{$data->email}}</div>
        <hr>
    </div>
    
    <div class="r row p-3">
        <div class="col-6">Mobile</div>
        <div class="col-6">{{$data->mobile}}</div>
        <hr>
    </div>
    
    <div class="r row p-3">
        <div class="col-6">Address</div>
        <div class="col-6">{{$data->address}}</div>
        <hr>
    </div>

    <div class="r row p-3">
        <div class="col-6">Picture</div>
        <img src="/storage/{{$data->photo}}" height="50"  alt="..."></td>
        <hr>
    </div>
 
    <div class="r row p-3">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{url('/edit_customer'.'/'.$data->id)}}" type="button" class="btn btn-primary text-white ">Edit</a>
          </div>
       
    </div>
   
</div>
  
@endsection