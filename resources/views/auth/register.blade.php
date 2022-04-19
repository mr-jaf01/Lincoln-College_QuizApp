@extends('auth.layouts.masterview')
@section('tittle', 'Register')
@section('content')
@if (Session::get('studentid'))
    <script>window.location.href="{{ route('dashboard')}}"</script>
@endif
<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div>
        <img class="mx-auto h-12 w-auto" src="{{ asset('linlogo.png') }}" alt="linlogo">
        <h2 class="mt-2 text-center text-2xl  text-red-600">Quiz App</h2>
        <p class="mt-1 text-center text-2xl f text-gray-900">
           Registration
        </p>
      </div>
      <div id="respone" >

      </div>
      <form class="mt-8 space-y-6" autocomplete="off" hx-post="{{route('auth.register')}}" hx-trigger='click' hx-target="#respone">
        @csrf
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="studentname" class="sr-only">Student Full Name</label>
            <input id="studentname" name="name" type="text"   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student Full Name">
          </div>
          <div>
            <label for="email-address" class="sr-only">Student Email</label>
            <input id="email-address"  hx  name="email"  type="email"   class="appearance-none  relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
          </div>
          <div>
            <label for="phone" class="sr-only">Student Phone</label>
            <input id="phone" name="studphone" type="text"   class="appearance-none  relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student Phone Number">
          </div>
          <div>
            <label for="address" class="sr-only">Student Address</label>
            <input id="address" name="studadd" type="text"   class="appearance-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Student Address">
          </div>
          <div class="flex justify-between">
            <label for="gender" class="sr-only">Student Gender</label>
            <select id="gender" name="studgender" type="text"  class="w-full px-3 py-2 focus:outline-none border rounded-b focus:border-indigo-500">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="gender" class="sr-only">Intrested Program After SPM</label>
            <select id="program" name="program" type="text"   class="w-full px-3 py-2 focus:outline-none border rounded-b focus:border-indigo-500">
                <option class="" value="program1">Intrested Program After SPM</option>
                <option value="program1">Program 1</option>
                <option value="program1">Program 2</option>
                <option value="program1">Program 3</option>
                <option value="program1">Program 4</option>
            </select>
          </div>
          <div class="flex">
            <label for="password" class="sr-only">Password</label>
            <input id="password" name="password" type="password"  class="appearance-none  relative  w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
            <label for="cpassword" class="sr-only">Comfirm Password</label>
            <input id="cpassword" name="cpassword" type="password"   class="appearance-none relative  w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Comfirm Password">
          </div>

          <div class="flex flex-row">
            <label for="flink" class="sr-only">Facebook Link</label>
            <input id="flink" name="flink" type="text"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Facebook Link">
            <label for="instalink" class="sr-only">Instagram link</label>
            <input id="instalink" name="instalink" type="text"   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Instagram link">
          </div>
          <div class="flex ">
            <label for="pemail" class="sr-only">Parent Email</label>
            <input id="pemail" name="pemail" type="email"  required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Parent Email">
            <label for="pphone" class="sr-only">Parent Phone</label>
            <input id="pphone" name="pphone" type="text"   class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Parent Phone">
          </div>
        </div>

        <div>
          <button  type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Register
          </button>
        </div>
      </form>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
        </div>
        <div class="text-sm">
          <a href="{{route('auth.login')}}" class="text-indigo-600 hover:text-indigo-500"> Already Have an Account? Login </a>
        </div>
      </div>

    </div>
  </div>
@endsection
