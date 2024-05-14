@extends('admin.layout')
@section('content')
    <div class="container card">
        <div class="col-sm-6 p-md-2">
            <div class="welcome-text">
                <h4>Update Staff</h4>

            </div>

        </div>

        <div class="card">
            <form action="{{ url('update_staff/'.$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @error('full_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Full Name</h4>
                    </div>
                    <input value="{{$data->full_name}}" name="full_name" type="text" class="form-control" id="example name">
                </div>
                <br>

                @error('mobile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Mobile</h4>
                    </div>
                    <input value="{{$data->mobile}}" name="mobile" type="text" class="form-control" id="example name">
                </div>
                <br>
                @error('department_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Choose department</h4>
                    </div>
                    <div class="form-group">
                        <select name="department_id" class="form-control">
                            <option value="{{ $data->department_id }}" default>{{$data->department->title}}</option>
                           
                            @foreach ($department as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                @error('bio')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Biodata</h4>
                    </div>
                    <input value="{{$data->bio}}" name="bio" type="text" class="form-control" id="example name">
                </div>
                <br>

                @error('salary_type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Salary Type</h4>
                    </div>
                    <div class="container">
                        <div class="row">
                           @if ($data->salary_type =='Weekly')
                           <div class="col-2"> <input checked name="salary_type" type="radio" value="Weekly" > <span>Weekly</span></div>
                           <div class="col-2">  <input name="salary_type" type="radio" value="Monthly" ><span>Monthly</span></div>
                           @else
                           <div class="col-2"> <input  name="salary_type" type="radio" value="Weekly" > <span>Weekly</span></div>
                           <div class="col-2">  <input checked name="salary_type" type="radio" value="Monthly" ><span>Monthly</span></div>
                           @endif
                            
                        </div>
                    </div>
                   
                  
                </div>
                <br>

                @error('salary_amt')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Salary Amount</h4>
                    </div>
                    <input value="{{$data->salary_amt}}" name="salary_amt" type="text" class="form-control" id="example name">
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

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

    </div>
@endsection
