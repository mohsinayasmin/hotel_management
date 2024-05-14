@extends('admin.layout')
@section('content')
<style>
    .body{
        color: rgb(43, 41, 41);
    }
</style>
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>All Roomtype</h4>
                </div>
               
            </div>
           
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                
               
                    <ol class="breadcrumb">
                       
                          
                       
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Roomtype</a></li>
                    </ol>
               
                
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                        <a href="" class="btn btn-primary ">Add New</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        
                                        <th>Full Name</th>
                                        <th>Email</th>
                                 
                                        <th>Photo</th>
                                        <th>action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="body" >
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->full_name}}</td>
                                        <td>{{$item->email}}</td>
                                        
                                        <td> <img src="/storage/{{$item->photo}}" height="50"  alt="..."></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/view_customer'.'/'.$item->id)}}" type="button" class="btn btn-primary text-white ">View</a>
                                              </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a  href="{{url('/delete_customer'.'/'.$item->id)}}" type="button" class="btn btn-danger text-white ">Delete</a>
                                              </div>
                                           
                                        </td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                    
                                 
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
  
@endsection