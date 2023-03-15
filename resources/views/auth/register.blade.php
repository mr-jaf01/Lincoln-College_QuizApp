@extends('auth.layouts.masterview')
@section('tittle', 'Register')
@section('content')

<div class="bg-red-600">
    <img src=" {{asset('logo_NEW.png')}}" />
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6  animate__animated animate__fadeInLeft" style="margin-top:-40px">
        <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md space-y-8">
              <!--<div>
                <p>Language<span id="google_translate_element"></span></p>
                <h4 class="mt-1 text-center  text-red-600"><b>SPM STUDENT PREPARATION SYSTEM</b></h4>
                <p class="mt-1 text-center  text-gray-900">
                   <b>Registration</b>
                </p>
              </div>-->
              <div>
                <center>
                @if(Session::get('success'))
                    <span class="p-3 w-full rounded bg-green-400">{{Session::get('success')}}</span>
                @endif

                @if(Session::get('fail'))
                    <span class="p-3 w-full rounded bg-red-400">{{Session::get('fail')}}</span>
                @endif
                @if(Session::get('exit'))
                     <span class="p-3 w-full rounded bg-red-400">{{Session::get('exit')}}</span>
                 @endif
                </center>
              </div>
              <form class="mt-2 space-y-6" autocomplete="off" action="{{route('auth.register')}}" method="POST">
                @csrf
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm -space-y-px">

                  <div>
                    <label for="studentname" class="sr-only">Student Full Name</label>
                    <input id="studentname" name="name" type="text" required  pattern="[a-zA-Z\s]*" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student Full Name">
                  </div>

                  <div>
                    <label for="email-address" class="sr-only">Student Email</label>
                    <input id="email-address"   name="email" required  type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="appearance-none  relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student Email Address">
                  </div>

                  <div>
                    <label for="phone" class="sr-only">Student Phone</label>
                    <input id="phone" name="studphone" type="number" required   class="appearance-none  relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Phone Number (555-555-5555) ">
                  </div>

                  <div>
                    <label for="address" class="sr-only">Student Address</label>
                    <input id="address" name="studadd" type="text" required   class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student Address">
                  </div>

                  <div class="flex justify-between">
                    <label for="gender" class="sr-only">Student Gender</label>
                    <select id="gender" name="studgender" type="text" required  class="w-full px-3 py-2 focus:outline-none border rounded-b focus:border-indigo-500">
                        <option selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                    <label for="gender" class="sr-only">Intrested Program After SPM</label>
                    <select id="program" name="program" type="text" required   class="w-full px-3 py-2 focus:outline-none border rounded-b focus:border-indigo-500">
                        <option class="" value="program1">Intrested Program After SPM</option>
                        @foreach (getspmprogram() as $spm)
                        <option value="{{$spm->program_name}}">{{$spm->program_name}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="flex">
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required  class="appearance-none  relative  w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                    <label for="cpassword" class="sr-only">Comfirm Password</label>
                    <input id="cpassword" name="cpassword" type="password" required   class="appearance-none relative  w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Comfirm Password">
                  </div>

                  <div class="flex flex-row">
                    <label for="flink" class="sr-only">Facebook Link</label>
                    <input id="flink" name="flink" type="text"   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Facebook Link">
                    <label for="instalink" class="sr-only">Instagram link</label>
                    <input id="instalink" name="instalink" type="text"   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Instagram link">
                  </div>

                  <div class="flex ">
                    <label for="pemail" class="sr-only">Parent Email</label>
                    <input id="pemail" name="pemail" type="email"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Parent Email">
                    <label for="pphone" class="sr-only">Parent Phone</label>
                    <input id="pphone" name="pphone" type="number" required   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Parent Phone (555-555-5555)">
                  </div>
                </div>

                <div>
                  <button style="border-radius: 19px;"   type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Register
                  </button>
                </div>
              </form>

              <div class="flex items-center justify-between">
                <div class="flex items-center">
                </div>

                <p class="text-center">
                    <span>Already Have an Account?</span>
                    <a href="{{route('auth.login')}}" class="text-red-400">
                      <span>Login</span>
                    </a>
                  </p>
              </div>

            </div>
        </div>
    </div>
    <div class="col-md-6 animate__animated animate__fadeInUp"><img src=" {{asset('bannerranking.png')}}" /></div>
  </div>

  <div class="row mt-1">
    <div class="col-md-12 text-center">
      <p><b>Copyright © {{date('Y')}} Lincoln University College. All rights reserved.</b></p>
    </div>
  </div>
</div>
@endsection
