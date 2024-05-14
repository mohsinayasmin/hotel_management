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
            <h3>Staff Details</h3>
            <hr>

        </div>

    </div>
    
    <div class="r row p-3">
        <div class="col-6">Full Name :</div>
        <div class="col-6">{{$data->full_name}}</div>
        <hr>
    </div>
   
    <div class="r row p-3">
        <div class="col-6">Mobile :</div>
        <div class="col-6">{{$data->mobile}}</div>
        <hr>
    </div>
    
    <div class="r row p-3">
        <div class="col-6">Department</div>
        <div class="col-6">{{$data->department->title}}</div>
        <hr>
    </div>
    
    <div class="r row p-3">
        <div class="col-6">BioData</div>
        <div class="col-6">{{$data->bio}}</div>
        <hr>
    </div>

    <div class="r row p-3">
        <div class="col-6">Salary Type</div>
        <div class="col-6">{{$data->salary_type}}</div>
        <hr>
    </div>
    
    <div class="r row p-3">
        <div class="col-6">Salary Amount</div>
        <div class="col-6">{{$data->salary_amt}}</div>
        <hr>
    </div>

    <div class="r row p-3">
        <div class="col-6">Picture</div>
        <img src="/storage/{{$data->photo}}" height="50"  alt="..."></td>
        <hr>
    </div>
 
    <div class="r row p-3">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{url('/edit_staff'.'/'.$data->id)}}" type="button" class="btn btn-primary text-white ">Edit</a>
          </div>
       
    </div>
   
</div>
  
@endsection