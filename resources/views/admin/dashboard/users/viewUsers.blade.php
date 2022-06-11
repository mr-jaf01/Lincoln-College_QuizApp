@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Users')
@section('content')

<div class="container mt-2">
    <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius:19px;">
                    @if (Session::get('success'))
                        <script>
                            toastr.success("{!! Session::get('success') !!}")
                        </script>
                        <!--<div class="row">
                            <div class="col-md-12">
                                <p class="alert alert-success"></p>
                            </div>
                        </div>-->
                    @endif
                    @if (Session::get('fail'))
                        <script>
                            toastr.error("{!! Session::get('fail') !!}")
                        </script>
                    <!--<div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-danger"></p>
                        </div>
                    </div>-->
                    @endif
                    @if (Session::get('updated'))
                        <script>
                            toastr.success("{!! Session::get('updated') !!}")
                        </script>
                    <!--<div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-success"></p>
                        </div>
                    </div>-->
                    @endif
                    <h5 class="card-header mb-2 d-flex flex-row justify-content-between" style="border-radius: 19px;">
                        <span class="">
                            USERS
                            <br><small></small>
                        </span>
                        <a style="border-radius: 19px;" href="{{route('admin.dashboard.users.create')}}?new" class="btn bg-red-500 text-white btn-sm hover:bg-red-600">CREATE NEW USER</a>
                    </h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="myTable">
                          <thead>
                            <tr>
                              <th>User ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Password</th>
                              <th>Created At</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($allUsers as $user)
                            <tr>
                                <td>
                                  <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$user->id}}</strong>
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{Str::upper($user->role)}}</td>
                                <td>
                                    <input type="password" name="" disabled value="{{$user->password}}" id="">
                                </td>
                                <td>{{$user->created_at}}</td>
                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('admin.dashboard.users.create')}}?update&UserID={{$user->id}}">Edit</a>
                                    <a class="dropdown-item" href="/admin/dashboard/users/delete/{{$user->id}}">Remove</a>
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
<script src="{{asset('client/js/jquery.min.js')}}"></script>
<script src="{{asset('client/js/popper.min.js')}}"></script>
<script src="{{asset('client/js/moment.min.js')}}"></script>
<script src="{{asset('client/js/simplebar.min.js')}}"></script>
<script src="{{asset('client/js/tinycolor-min.js')}}"></script>
<script src="{{asset('client/js/config.js')}}"></script>
<script src="{{asset('client/js/apps.js')}}"></script>
@endsection
