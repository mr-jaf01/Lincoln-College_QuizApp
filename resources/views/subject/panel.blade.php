@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Panel')
@section('content')
@if (!Session::get('studentid'))
   <script>window.location.href="{{route('auth.login')}}"</script>
@endif
<div class="container-fluid mt-3">
<form hx-get="/dashboard/question" hx-trigger='click' hx-target="#respone">
   <div class="row">
       <div class="col-md-4">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text bg-red-400 text-white" for="inputGroupSelect01">Select Year</label>
            </div>
            <select name="year" class="custom-select  shadow-none" id="inputGroupSelect01" >
              <option selected>Choose...</option>
              @foreach(getSubject_year($subjectdetails->subjectname) as $year)
                  <option value="{{ $year }}">{{ $year }}</option>
              @endforeach
            </select>



          </div>
          <input type="hidden" name="subject" value="{{$subjectdetails->subjectname}}" />
       </div>
       <div class="col-md-4">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text bg-red-400 text-white" for="inputGroupSelect02">Select Question Type</label>
            </div>
            <select name="qmode" class="custom-select  shadow-none" id="inputGroupSelect02" >
              <option value="mcq">MCQ</option>
              <option value="essay">ESSAY</option>
            </select>
          </div>
       </div>
       <div class="col-md-4"></div>
   </div>
</form>
   <hr class="my-1" />
   <div class="d-flex justify-content-center">
        @if (Session::get('alert'))
            <p class="alert alert-success d-flex flex-column align-items-center"><i class="bi bi-info-circle" style="font-size: 40px;"></i> <span>{{ Session::get('alert') }}</span></p>
        @endif
   </div>
   <div id="respone"></div>
</div>











<script src="{{asset('client/js/jquery.min.js')}}"></script>
<script src="{{asset('client/js/popper.min.js')}}"></script>
<script src="{{asset('client/js/moment.min.js')}}"></script>
<script src="{{asset('client/js/simplebar.min.js')}}"></script>
<script src="{{asset('client/js/tinycolor-min.js')}}"></script>
<script src="{{asset('client/js/config.js')}}"></script>
<script src="{{asset('client/js/apps.js')}}"></script>
@endsection
<style>
    @keyframes growProgressBar {
      0%, 33% { --pgPercentage: 0; }
      100% { --pgPercentage: var(--value); }
    }

    @property --pgPercentage {
      syntax: '<number>';
      inherits: false;
      initial-value: 0;
    }

    div[role="progressbar"] {
      --size: 12rem;
      --fg: rgb(170, 213, 255);
      --bg: #def;
      --pgPercentage: var(--value);
      animation: growProgressBar 3s 1 forwards;
      width: var(--size);
      height: var(--size);
      border-radius: 50%;
      display: grid;
      place-items: center;
      background:
        radial-gradient(closest-side, white 80%, transparent 0 99.9%, white 0),
        conic-gradient(var(--fg) calc(var(--pgPercentage) * 1%), var(--bg) 0)
        ;
      font-family: Helvetica, Arial, sans-serif;
      font-size: calc(var(--size) / 5);
      color: var(--fg);
    }

    div[role="progressbar"]::before {
      counter-reset: percentage var(--value);
      content: counter(percentage) '%';
    }
</style>
