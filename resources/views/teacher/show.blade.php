<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <title>Laravel Ajax Image Crud</title>
  </head>
  <body>

    <div class="container my-3">

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3>Teacher List(Laravel ajax image crud)
                    
                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal" style="float:right;">Add Teacher</a>
                </h3>



                <div class="alert alert-success" style="display: none;"></div>

             

                <div class="teacherPage">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                           @foreach($teachers as $row)
                            <tr>
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->phone}}</td>
                                <td>
                                    <img src="{{asset($row->image)}}" width="60" height="60">
                                </td>
                                
                                
                                <th>
                                    <button type="button" class="btn btn-success editButton" data-id="{{ $row->id }}"
                                 
                                    >Edit</button>
                                    <button href="" data-id="{{$row->id}}" class="btn btn-danger delete_teacher"
                                    >Delete</button>
                                </th>
                            </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </div>


@include('teacher.teacher_js') 
@include('teacher.add_modal')
@include('teacher.edit_modal')

  </body>
</html>
