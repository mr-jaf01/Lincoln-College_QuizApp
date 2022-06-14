@extends('auth.layouts.masterview')
@section('tittle', 'Login')
@section('content')
<div class="bg-red-600">
    <img src=" {{asset('logo_NEW.png')}}" />
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6" style="margin-top:-40px">
          <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
            <div class=" w-full space-y-8">
              <div>
                <p>Language<span id="google_translate_element"></span></p>
                <!--<img class="mx-auto" src="{{ asset('linlogo.png') }}" width="250" height="250" alt="linlogo">-->
                <h4 class="mt-1 text-center text-red-600"> <b>SPM STUDENT PREPARATION SYSTEM</b></h4>
              </div>
              <div>
                <center>
                @if(Session::get('success'))
                    <span class="p-3 w-full rounded bg-green-400">{{Session::get('success')}}</span>
                @endif

                @if(Session::get('fail'))
                    <span class="p-3 w-full rounded bg-red-400">{{Session::get('fail')}}</span>
                @endif
                </center>
              </div>
              <form class="mt-8 space-y-6" action="/auth/login" method="POST">
                @csrf
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm -space-y-px">
                  <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                  </div>
                  <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">

                </div>
                </div>
                <div class="flex items-center justify-between">
                  <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
                  </div>

                  <div class="text-sm">

                  </div>
                </div>
                <div>
                  <button style="border-radius: 19px;"  type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign in
                  </button>
                </div>
              </form>

              <div class="flex items-center justify-between">
                <div class="flex items-center">

                </div>

                <p class="text-center">
                    <span>New on our platform?</span>
                    <a href="{{route('auth.register')}}" class="text-red-400">
                      <span >Create an account</span>
                    </a>
                  </p>
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-6"><img src=" {{asset('bannerranking.png')}}" /></div>
  </div>

  <div class="row mt-1">
    <div class="col-md-12 text-center">
      <p><b>Copyright © {{date('Y')}} Lincoln University College. All rights reserved.</b></p>
    </div>
  </div>
</div>
@endsection

