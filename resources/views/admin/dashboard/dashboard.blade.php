@extends('admin.dashboard.layouts.masterlayout')
@section('tittle', 'Dashboard')
@section('content')

<div class="container mt-2">
    {{Session::get('adminID')}}
</div>

@endsection
