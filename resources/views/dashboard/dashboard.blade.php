@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Dashboard')
@section('content')
<div>
    @if (Session::get('studentid'))
    <h1>Hello world {{Session::get('studentid')}}</h1>
    @endif
</div>


@endsection
