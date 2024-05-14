@extends('front.front_layout')

@section('content')
    <!-- Booking Start -->
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h3>All Rooms Available for {{ $start_date }} to {{ $end_date }}</h3>
            </div>
            <div class="row">
                @foreach ($data as $item)
                @php
                $image = DB::table('roomtypeimages')->where('room_type_id', $item->room_type->id)->first();
                @endphp
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <img class="img-fluid" src="/storage/{{ $image->img_src }}" alt="">
                            </td>
                            <form action="{{url('/room_details'.'/'.$item->id)}}" method="get" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="check_in" value=" {{ $start_date }}" >
                                <input type="hidden" name="check_out" value="{{ $end_date }}" >
                            <a  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">>
                                <h5 class="text-white">{{ $item->title }}</h5>
                                <span>Category : {{ $item->room_type->title }}</span>
                                <span> Cost : {{ $item->price }}</span>
                                <br>
                                <span> Ac or Non Ac : {{ $item->a_c }}</span>
                                <br>
                                <span> Details : {{ $item->room_details }}</span>
                                <br>
                                <button type="submit" class="btn btn-success"  >Book Now</button>
                                
                            </a>
                        </form>
                        </div>
                    </div>
                    @php
                    $room_image = DB::table('roomtypeimages')->where('room_type_id', $item->room_type->id)->get();
                    @endphp
                    <div class="modal fade modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Room Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <div class="row px-3">
                            @foreach ($room_image as $img)
                                <div class="card p-2 col-1.5 imgcol{{ $img->id }}" style="width: 8rem;">
                                    <img src="/storage/{{ $img->img_src }}" height="70px" alt="..."></td>
                                    
                                </div>
                            @endforeach
                            </div>
                            </div>
                            <div class="row px-3">
                            <form action="{{url('/room_details'.'/'.$item->id)}}" method="get" enctype="multipart/form-data" class="px-3">
                                @csrf
                                <input type="hidden" name="check_in" value=" {{ $start_date }}" >
                                <input type="hidden" name="check_out" value="{{ $end_date }}" >
                            
                                <h5 class="text-white">{{ $item->title }}</h5>
                                <br>
                                <span>Category : {{ $item->room_type->title }}</span>
                                <br>
                                <span> Cost : {{ $item->price }}</span>
                                <br>
                                <span> Ac or Non Ac : {{ $item->a_c }}</span>
                                <br>
                                <span> Details : {{ $item->room_details }}</span>
                                <br>
                               
                                
                            
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">book Now
                            </form>
                            </div>
                        </div>
</div>

                @endforeach

            </div>
            
        </div>
    </div>

    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->

@endsection
