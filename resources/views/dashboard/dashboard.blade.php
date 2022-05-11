@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Dashboard')
@section('content')
<div>
    @if (Session::get('studentid'))
    <h1>Hello world {{Session::get('studentid')}}</h1>
    @endif
</div>




    <script src="{{asset('client/js/jquery.min.js')}}"></script>
    <script src="{{asset('client/js/popper.min.js')}}"></script>
    <script src="{{asset('client/js/moment.min.js')}}"></script>
    <script src="{{asset('client/js/simplebar.min.js')}}"></script>
    <script src="{{asset('client/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('client/js/config.js')}}"></script>
    <script src="{{asset('client/js/apps.js')}}"></script>
@endsection
