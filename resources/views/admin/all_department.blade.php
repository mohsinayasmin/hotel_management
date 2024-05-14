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
                    <h4>All Department</h4>
                </div>
               
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
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Details</th>
                                  
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="body" >
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->detail}}</td>
                                      
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{url('/edit_department'.'/'.$item->id)}}" type="button" class="btn btn-primary text-white ">Edit</a>
                                              </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a  href="{{url('/delete_department'.'/'.$item->id)}}" type="button" class="btn btn-danger text-white ">Delete</a>
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