@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Dashboard')
@section('content')
@if (!Session::get('studentid'))
   <script>window.location.href="{{route('auth.login')}}"</script>
@endif
<div>
    @if (Session::get('studentid'))
    <h1>Hello world {{Session::get('studentid')}}</h1>
    @endif
</div>


@endsection