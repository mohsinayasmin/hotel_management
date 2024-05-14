@extends('admin.layout')
@section('content')
    <div class="container card">
        <div class="col-sm-6 p-md-2">
            <div class="welcome-text">
                <h4>Room Booking</h4>

            </div>

        </div>

        <div class="card">
              

        <div class="modal-content">
            <div class="container">
                <form action="{{url('/room_booking')}}" method="post" enctype="multipart/form">
                    @csrf
                   
                    @error('customer_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <div class="card-header">
                            <h4 class="card-title"> Select Customer </h4>
                        </div>
                        <div class="form-group">
                            <select name="customer_id" class="form-control">
                              
                                <option default>--select--</option>
                                @foreach ($customer as $item)
                                    <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    
                 
                    <div class="mb-3">
                        <div class="card-header">
                            <h4 class="card-title"> Room  : {{$data->title}}</h4>
                        </div>
                        <input name="room_id" type="hidden" value="{{$data->id}}" />
                    </div>
                    <br>
                    @error('checkin_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <div class="card-header">
                            <h4 class="card-title"> Check in Date :{{$in}} </h4>
                        </div>
                        <input value="{{$in}}" name="checkin_date" type="hidden" class="form-control" id="example name">
                    </div>
                    <br>
                    @error('checkout_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <div class="card-header">
                            <h4 class="card-title"> Check out Date:{{$out}} </h4>
                        </div>
                        <input value="{{$out}}" name="checkout_date" type="hidden" class="form-control" id="example name">
                    </div>
                    <br>
                    @error('total_adult')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <div class="card-header">
                            <h4 class="card-title"> Total Adult </h4>
                        </div>
                        <div class="form-group">
                            <select name="total_adult" class="form-control">
                              
                                <option default>--select--</option>
                               
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                               
                            </select>
                        </div>
                    </div>
                    <br>
                    @error('total_clildren')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <div class="card-header">
                            <h4 class="card-title"> Total Children </h4>
                        </div>
                        <div class="form-group">
                            <select name="total_clildren" class="form-control">                             
                                <option default>--select--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <br>
        
                   
        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Confirm Booking</button>
                    </div>
                </form>
            </div>
            
            
        </div>
   
        </div>

    </div>
@endsection
