@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Create Question')
@section('content')

<div class="container mt-2 card p-3" style="height:550px; border-radius: 19px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                @if (Session::get('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-success">{{Session::get('success')}}</p>
                        </div>
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-danger">{{Session::get('fail')}}</p>
                        </div>
                    </div>
                @endif
                <h5 class="card-header" style="border-radius: 19px;">CREATING NEW QUESTION</h5>
                <div class="card-body">
                  <h5 class="card-text text-muted mb-3">What type of Question you wish to create? Select below Please!.</h5>
                  <form action="{{route('admin.dashboard.question.questionmodecheck')}}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-red-400 text-white" for="inputGroupSelect01">Question type</label>
                        </div>
                        <select name="questiontype"class="custom-select  shadow-none" id="inputGroupSelect01" required>
                          <option value="Choose">Choose</option>
                          <option value="mcq">MCQ (Multiple Choice Question)</option>
                          <option value="essay">ESSAY (Essay Question)</option>
                        </select>
                      </div>

                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-red-400 text-white" for="inputGroupSelect01">Subject</label>
                        </div>
                        <select name="subject" class="custom-select  shadow-none" id="inputGroupSelect01" required>
                          <option value="Choose">Choose</option>
                          @foreach (getsubject() as $item)
                          <option value="{{$item->subjectname}}"> {{$item->subjectname}}</option>
                          @endforeach
                        </select>
                      </div>


                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-red-400 text-white" for="inputGroupSelect01">Year</label>
                        </div>
                        <select name="year" class="custom-select  shadow-none" id="inputGroupSelect01" required>
                            <option value="Choose">Choose</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                      </div>
                      <div class="d-flex flex-row justify-content-between">
                          <p></p>
                        <button style="border-radius: 19px;" class="btn bg-red-500 hover:bg-red-600 text-white btn-sm">CONTINUE</button>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






    <script src="{{asset('client/js/jquery.min.js')}}"></script>
    <script src="{{asset('client/js/popper.min.js')}}"></script>
    <script src="{{asset('client/js/moment.min.js')}}"></script>
    <script src="{{asset('client/js/simplebar.min.js')}}"></script>
    <script src="{{asset('client/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('client/js/config.js')}}"></script>
    <script src="{{asset('client/js/apps.js')}}"></script>
@endsection
