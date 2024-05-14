@extends('admin.layout')
@section('content')

<style>
    .body{
        color: rgb(43, 41, 41);
    }
</style>
<div class="card-body">
    <div class="table-responsive">
        <div class="welcome-text">
            <h4>Available room for  {{$start_date}}  To  {{$end_date}}</h4>
        </div>
        <br>
        <table id="example" class="display" style="min-width: 845px">
            <thead>
                <tr>
                    
                    <th>Room </th>
                    <th>Price</th>                                
                    <th>Category</th>
                    <th>Action</th>
                    
                   
                    
                </tr>
            </thead>
            <tbody class="body" >
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->room_type->title}}</td>
                      
                    
                    <td>
                       
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a  href="{{url('/final_booking'.'/'.$item->id.'/'.$start_date.'/'.$end_date)}}" type="button" class="btn btn-danger text-white ">Book Now</a>
                          </div>
                       
                    </td>
                    
                    
                </tr>
                @endforeach
                
             
            </tbody>
            
        </table>
    </div>
</div>
  

@endsection


