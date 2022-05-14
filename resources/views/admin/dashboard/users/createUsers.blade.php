@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Create Teacher')
@section('content')

@if(isset($_GET['new']))
<div class="container card mt-2" style="height:550px; border-radius: 19px;">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <p id="respone"></p>
            <div class="card">
                @if (Session::get('fail'))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-success">{{Session::get('fail')}}</p>
                        </div>
                    </div>
                @endif
                <h5 class="card-header" style="border-radius: 19px;">CREATING NEW USER</h5>
                <div class="card-body">
                    <form action="{{route('admin.dashboard.users.save')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Full Name</label>
                            <input type="text" required name="name" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Email</label>
                            <input type="email" required name="email" class="form-control" />
                        </div>
                        <div class="input-group">
                            <label class="input-group-text bg-red-500 text-white" for="inputGroupSelect01">Role</label>
                            <select name="role" class="form-control" id="inputGroupSelect01">
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="developer">Developer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password</label>
                            <input type="password" required name="password" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Confirm Password</label>
                            <input type="password" required name="cpassword" class="form-control" />
                        </div>

                        <div class="d-flex justify-content-between">
                            <span></span>
                            <button style="border-radius: 19px;" class="btn bg-red-500 hover:bg-red-600 text-white">Save User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(isset($_GET['update']))
<div class="container card mt-2" style="height:550px; border-radius: 19px;">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <p id="respone"></p>
            <div class="card">
                @if (Session::get('fail'))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-danger">{{Session::get('fail')}}</p>
                        </div>
                    </div>
                @endif
                <h5 class="card-header" style="border-radius: 19px;">UPDATING USER RECORD</h5>
                <div class="card-body">
                    <form action="{{route('admin.dashboard.users.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Full Name</label>
                            <input type="text" required name="name" value="{{getsingleUser($_GET['UserID'])->name}}" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Email</label>
                            <input type="email" required name="email" value="{{getsingleUser($_GET['UserID'])->email}}" class="form-control" />
                        </div>
                        <div class="input-group">
                            <label class="input-group-text bg-red-500 text-white" for="inputGroupSelect01">Role</label>
                            <select name="role" class="form-control" id="inputGroupSelect01">
                            <option value="{{getsingleUser($_GET['UserID'])->role}}">{{Str::upper(getsingleUser($_GET['UserID'])->role)}}</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Teacher</option>
                            <option value="developer">Developer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Confirm Password</label>
                            <input type="password" name="cpassword" class="form-control" />
                        </div>

                        <div class="d-flex justify-content-between">
                            <span></span>
                            <button style="border-radius: 19px;" class="btn bg-red-500 hover:bg-red-600 text-white">Save User</button>
                        </div>
                        <input type="hidden" name="id" value="{{$_GET['UserID']}}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

    <script src="{{asset('client/js/jquery.min.js')}}"></script>
    <script src="{{asset('client/js/popper.min.js')}}"></script>
    <script src="{{asset('client/js/moment.min.js')}}"></script>
    <script src="{{asset('client/js/simplebar.min.js')}}"></script>
    <script src="{{asset('client/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('client/js/config.js')}}"></script>
    <script src="{{asset('client/js/apps.js')}}"></script>
@endsection
