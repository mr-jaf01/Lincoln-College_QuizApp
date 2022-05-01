@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Profile Settings')
@section('content')
@if (!Session::get('studentid'))
   <script>window.location.href="{{route('auth.login')}}"</script>
@endif
<style>
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        color : rgb(243, 40, 40);
        width:130px;
        border-bottom: 2px solid rgb(243, 40, 40);
    }
</style>
<div class="conatiner-fluid">
    <form action="{{route('dashboard.profile.settings.update')}}" method="POST">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card animate__animated animate__fadeInUp">
                <div class="card-header d-flex flex-row justify-content-between">
                    <span class="text-red-400"><a href="{{ route('dashboard')}}">Dashboard</a><i class="fe fe-arrow-right"></i><a href="{{route('dashboard.profile')}}">Profile</a><i class="fe fe-arrow-right"></i>Settings</span>
                </div>
                <div class="card-body animate__animated animate__fadeInUp">
                    <center>
                        @if(Session::get('success'))
                            <span class="alert alert-success">{{Session::get('success')}}</span>
                        @endif

                        @if(Session::get('fail'))
                            <span class="alert alert-info">{{Session::get('fail')}}</span>
                        @endif
                    </center>
                    <div class="card">
                        <div class="card-header d-flex flex-row justify-content-between">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a  class="nav-link active font-weight-normal" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true">Personal Info</a>
                                </li>
                                <li class="nav-item">
                                  <a  class="nav-link font-weight-normal" id="social-tab" data-toggle="tab" href="#social" role="tab" aria-controls="social" aria-selected="false">Socials links</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link font-weight-normal" id="parent-tab" data-toggle="tab" href="#parent" role="tab" aria-controls="parent" aria-selected="false">Parent Info</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link font-weight-normal" id="cpassword-tab" data-toggle="tab" href="#cpassword" role="tab" aria-controls="cpassword" aria-selected="false">Change Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                                        <div class="rounded-md shadow-sm -space-y-px">
                                            <div>
                                            <label for="studentname" class="sr-only">Student Full Name</label>
                                            <input id="studentname" value="{{ $student->studentname}}" name="name" type="text"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student Full Name">
                                            </div>
                                            <div>
                                            <label for="email-address" class="sr-only">Student Email</label>
                                            <input id="email-address"  value="{{ $student->email}}"  name="email"  type="email"   class="appearance-none  relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                                            </div>
                                            <div>
                                            <label for="phone" class="sr-only">Student Phone</label>
                                            <input id="phone" value="{{ $student->phone}}" name="studphone" type="text"   class="appearance-none  relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student Phone Number">
                                            </div>
                                            <div>
                                            <label for="address" class="sr-only">Student Address</label>
                                            <input id="address" value="{{ $student->address}}" name="studadd" type="text"   class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student Address">
                                            </div>
                                            <div class="flex justify-between">
                                            <label for="gender" class="sr-only">Student Gender</label>
                                            <select id="gender" name="studgender" type="text"  class="w-full px-3 py-2 focus:outline-none border rounded-b focus:border-indigo-500">
                                                <option value="{{ $student->gender}}">{{ $student->gender}}</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>

                                            <label for="gender" class="sr-only">Intrested Program After SPM</label>
                                            <select id="program" name="program" type="text"   class="w-full px-3 py-2 focus:outline-none border rounded-b focus:border-indigo-500">
                                                <option class="" value="{{ $student->program}}">{{ $student->program}}</option>
                                                <option value="program1">Program 1</option>
                                                <option value="program1">Program 2</option>
                                                <option value="program1">Program 3</option>
                                                <option value="program1">Program 4</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="social" role="tabpanel" aria-labelledby="social-tab">
                                        <div class="flex flex-row">
                                            <label for="flink" class="sr-only">Facebook Link</label>
                                            <input id="flink" value="{{ $student->flink}}" name="flink" type="text"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Facebook Link">
                                            <label for="instalink" class="sr-only">Instagram link</label>
                                            <input id="instalink" value="{{$student->instalink}}" name="instalink" type="text"   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Instagram link">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="parent" role="tabpanel" aria-labelledby="parent-tab">
                                        <div class="flex">
                                            <label for="pemail" class="sr-only">Parent Email</label>
                                            <input id="pemail" value="{{ $student->parentemail}}" name="pemail" type="email"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Parent Email">
                                            <label for="pphone" class="sr-only">Parent Phone</label>
                                            <input id="pphone" value="{{ $student->parentphone}}" name="pphone" type="text"   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Parent Phone">
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="cpassword" role="tabpanel" aria-labelledby="cpassword-tab">
                                            <div class="flex">
                                                <label for="password" class="sr-only">New Password</label>
                                                <input id="password" name="password" type="password"  class="appearance-none  relative  w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="New Password">
                                                <label for="cpassword" class="sr-only">Comfirm New Password</label>
                                                <input id="cpassword" name="cpassword" type="password"   class="appearance-none relative  w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Confirm New Password">
                                            </div>
                                            <div class="mt-2">
                                                <button class="btn btn-danger">Save Changes</button>
                                            </div>
                                    </div>
                              </div>
                        </div>
                      </div>
                </div>
              </div>
        </div>
    </div>
</div>
</form>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/simplebar.min.js')}}"></script>
<script src="{{asset('js/tinycolor-min.js')}}"></script>
<script src="{{asset('js/config.js')}}"></script>
<script src="{{asset('js/apps.js')}}"></script>
@endsection

