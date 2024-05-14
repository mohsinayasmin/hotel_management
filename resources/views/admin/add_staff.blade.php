@extends('admin.layout')
@section('content')
    <div class="container card">
        <div class="col-sm-6 p-md-2">
            <div class="welcome-text">
                <h4>Add New Staff</h4>

            </div>

        </div>

        <div class="card">
            <form action="{{ route('insert_staff') }}" method="post" enctype="multipart/form-data">
                @csrf
                @error('full_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Full Name</h4>
                    </div>
                    <input name="full_name" type="text" class="form-control" id="example name">
                </div>
                <br>

                @error('mobile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Mobile</h4>
                    </div>
                    <input name="mobile" type="text" class="form-control" id="example name">
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
                            <option>--select--</option>
                           
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
                    <input name="bio" type="text" class="form-control" id="example name">
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
                            <div class="col-2"> <input name="salary_type" type="radio" value="Weekly" > <span>Weekly</span></div>
                            <div class="col-2">  <input name="salary_type" type="radio" value="Monthly" ><span>Monthly</span></div>
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
                    <input name="salary_amt" type="text" class="form-control" id="example name">
                </div>
                <br>
                <div class="mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Photo</h4>
                    </div>
                    <input  name="photo" type="file" class="form-control" id="example name">
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection
