@extends('admin.layout')
@section('content')
<head>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
   
   
    <title>Hello, world!</title>
</head>
<div class="container card">
    <div class="col-sm-6 p-md-2">
        <div class="welcome-text">
            <h4>Staff Payment</h4>

        </div>

    </div>

    <div class="card">
        <form action="{{url('/room_availability')}}" method="get" enctype="multipart/form">
            @csrf
           
            @error('detail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <div class="card-header">
                    <h4 class="card-title">Checkin Date </h4>
                </div>
                <input id="in" name="check_in" type="date" class="form-control" id="example name">
            </div>
            <br>

            @error('detail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <div class="card-header">
                    <h4 class="card-title">Checkout Date </h4>
                </div>
                <input id="out"  name="check_out" type="date" class="form-control" id="example name">
            </div>
            <br>

            <button id="searchButton" type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

</div>





{{-- 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    $(document).ready(function() {
  $('#searchButton').click(function(e) {
    e.preventDefault();
   
    let check_in = $('#in').val();
    let check_out = $('#out').val();
 

    $.ajax({
      type: 'GET',
      url: "{{url('/room_availability')}}",
      data: { check_in: check_in , check_out:check_out },
      dataType: "json",
      success: function(data) {
       console.log("yes",data)
      }
    });
  });
});

</script> --}}


    @endsection
