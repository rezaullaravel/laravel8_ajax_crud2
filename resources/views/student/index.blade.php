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

    <title>Laravel Ajax Crud</title>
  </head>
  <body>

    <div class="container my-3">

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3>Student List(Laravel ajax crud)
                    <a href="" class="btn btn-success" data-toggle="modal" data-target="#addModal" style="float:right;">Add Student</a>
                </h3>



                <div class="alert alert-success" style="display: none;"></div>

                <input type="text" name="search_string" id="search_string" class="mb-3 form-control" placeholder="Search here.....">

                <div class="studentPage">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <th>
                                    <button type="button" class="btn btn-success updateForm"
                                    data-id={{ $student->id }}
                                    data-name={{ $student->name }}
                                    data-email={{ $student->email }}
                                    >Edit</button>
                                    <a href="" class="btn btn-danger delete_student"
                                    data-id={{ $student->id }}
                                    >Delete</a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('student.add_modal')
    @include('student.update_modal')
    @include('student.student_js')

    {!! Toastr::message() !!}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
</html>
