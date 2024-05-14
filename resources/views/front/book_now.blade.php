<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Book</title>
  </head>
  <body>
    

    <div class="mt-5">
        <div class="m-5">
            <div class="container-fluid booking mt-5 pb-5">
                <div class="container pb-5">
                    <div class="bg-light shadow" style="padding: 30px;">
                        <form action="{{route('search_room')}}" method="post" enctype="multipart/form-data">
                           @csrf
                            <div class="row align-items-center" style="min-height: 60px;">
                                <div class="col-md-10">
                                    <div class="row">
                                       
                                        <div class="col-md-3">
                                            <div class="mb-3 mb-md-0">
                                                <input id="in" name="check_in" type="date" class="form-control" id="example name">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3 mb-md-0">
                                               <input id="in" name="check_out" type="date" class="form-control" id="example name">
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success btn-block" type="submit"
                                        style="height: 47px; margin-top: -2px;">Search</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

  