@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Dashboard')
@section('content')
@if (!Session::get('studentid'))
   <script>window.location.href="{{route('auth.login')}}"</script>
@endif
<div>
    <h1>Hello all subject here, {{ getsubject() }}</h1>
</div>


@endsection
