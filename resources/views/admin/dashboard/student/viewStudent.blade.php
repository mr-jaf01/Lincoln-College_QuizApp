@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Student')
@section('content')
 <div class="container mt-2">
    <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius:19px;">
                    @if (Session::get('success'))
                        <div class="row">
                            <div class="col-md-12">
                                <p class="alert alert-success">{{Session::get('success')}}</p>
                            </div>
                        </div>
                    @endif
                    @if (Session::get('fail'))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-success">{{Session::get('fail')}}</p>
                        </div>
                    </div>
                    @endif
                    @if (Session::get('updated'))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-success">{{Session::get('updated')}}</p>
                        </div>
                    </div>
                    @endif
                    <h5 class="card-header mb-2 d-flex flex-row justify-content-between" style="border-radius: 19px;">
                        <span class="">ALL STUDENTS</span>
                        <!--<a style="border-radius: 19px;" href="#" class="btn bg-red-500 text-white btn-sm hover:bg-red-600"></a>-->
                    </h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="myTable">
                          <thead>
                            <tr>
                              <th>Student ID</th>
                              <th>Student Name</th>
                              <th>Student Email</th>
                              <th>Phone Number</th>
                              <th>Gender</th>
                              <th>Programme</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($all_stud as $student)
                            <tr>
                                <td>
                                  <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$student->id}}</strong>
                                </td>
                                <td>{{$student->studentname}}</td>
                                <td>{{$student->email}}</td>
                                <td>{{$student->phone}}</td>
                                <td>{{$student->gender}}</td>
                                <td>{{$student->program}}</td>
                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#"></a>
                                    <a class="btn btn-primary btn-sm">View Details</a>
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
    </div>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>

    <script src="{{asset('client/js/popper.min.js')}}"></script>
    <script src="{{asset('client/js/moment.min.js')}}"></script>
    <script src="{{asset('client/js/simplebar.min.js')}}"></script>
    <script src="{{asset('client/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('client/js/config.js')}}"></script>
    <script src="{{asset('client/js/apps.js')}}"></script>
@endsection


