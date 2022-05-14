@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Profile')
@section('content')
@if (!Session::get('studentid'))
   <script>window.location.href="{{route('auth.login')}}"</script>
@endif
<div class="conatiner-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card" style="border-radius: 19px;">
                <div class="card-header d-flex flex-row justify-content-between" style="border-radius: 19px;">
                    <span class="text-red-400"><a href="/dashboard">Dashboard</a><i class="fe fe-arrow-right"></i>Profile</span>
                </div>
                <div class="card-body">
                 <div class="row animate__animated animate__fadeInUp">
                     <div class="col-md-6 d-flex justify-content-center mb-2" style="height: 150px">
                         <img src="{{ asset('client/assets/avatars/default.jpg')}}" width="150" class="rounded" />
                     </div>
                     <div class="col-md-6">
                         <div class="personal-info">
                             <div>
                                 <span class="font-weight-bold text-red-400">Personal Info</span>
                             </div>
                             <hr class="my-1"/>
                            <p class="d-flex flex-row justify-content-between mb-2"><span class=" font-weight-bold">Name :</span> <span> {{ $student->studentname}} </span></p>
                            <p class="d-flex flex-row justify-content-between mb-2"><span class=" font-weight-bold">Email:</span> <span> {{ $student->email}} </span></p>
                            <p class="d-flex flex-row justify-content-between mb-2"><span class=" font-weight-bold">Phone:</span> <span>{{ $student->phone}} </span></p>
                            <p class="d-flex flex-row justify-content-between mb-2"><span class=" font-weight-bold">Adddress:</span> <span> {{ $student->address}} </span></p>
                            <p class="d-flex flex-row justify-content-between mb-2"><span class=" font-weight-bold">Gender: </span><span> {{ $student->gender}} </span></p>
                            <p class="d-flex flex-row justify-content-between mb-2"><span class=" font-weight-bold">Program After SPM: </span> <span> {{ $student->program}} </span></p>
                         </div>
                         <hr class="my-1"/>

                         <div class="social-link">
                            <div>
                                <span class="font-weight-bold text-red-400">Socials Link</span>
                            </div>
                            <hr class="my-1"/>
                            <p class="text-primary"><a href="https://{{ $student->flink}}"> <i class="fe fe-facebook"></i> Facebook </a> | <a href="https://{{$student->instalink}}"><i class="fe fe-instagram"></i> Instagram</a></p>
                            <p></p>
                         </div>
                         <hr class="my-1"/>

                         <div class="parent-details">
                            <div>
                                <span class="font-weight-bold text-red-400">Parent Details</span>
                            </div>
                            <hr class="my-1"/>
                            <p class="d-flex flex-row justify-content-between"><span>{{ $student->parentemail}} </span> | <span>{{ $student->parentphone}} </span></p>
                            <p></p>
                         </div>
                     </div>
                 </div>
                 <hr class="my-1"/>
                 <div class="d-flex flex-row justify-content-between">
                     <p></p>
                     <a style="border-radius: 19px;" href="{{route('dashboard.profile.settings')}}" class=" mt-3 btn btn-sm btn-primary">Edit & Update</a>
                 </div>
                </div>
              </div>


        </div>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/simplebar.min.js')}}"></script>
<script src="{{asset('js/tinycolor-min.js')}}"></script>
<script src="{{asset('js/config.js')}}"></script>
<script src="{{asset('js/apps.js')}}"></script>
@endsection
