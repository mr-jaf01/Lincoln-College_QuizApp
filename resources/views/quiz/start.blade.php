@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Quiz start')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center d-flex">
        <div class="col-md-12">
            <div class="card p-4">
            <form action="{{ route('save_answer')}}" method="GET">
                @foreach ($all_question as $question)
                <h5 class="card-header"></small>
                    @if (isset($_GET['page']))
                    <span class="rounded btn btn-success text-white">{{ $question->subject_id }} {{ $question->year }} - Question {{$_GET['page']}}</span>
                    @endif
                </h5>
                <div class="card-body animate__animated animate__fadeInRight">
                    <h5 class="card-title">
                    {{$question->qtions}}
                    </h5>
                    <div class="row">
                        <div class="col-md-6 d-flex flex-row justify-content-center">
                            <img src="{{$question->qimage ? asset($question->qimage) : ''}}"/>
                        </div>
                        @if ($question->instruction)
                        <div class="col-md-6 alert alert-danger">
                            <span>Instruction:</span>
                            <hr class="my-1" />
                            <p class="">
                                {{$question->instruction}}
                            </p>
                        </div>
                        @endif
                    </div>
                  <div class="form-check" >
                    <input hx-get="{{ route('check_answer')}}" hx-target="#respone" {{ getoption($question->qtions, Session::get('studentid')) == $question->opt1 ? 'checked':''}}  hx-trigger="click" class="form-check-input" value="{{$question->opt1}}" type="radio" name="option" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      {{$question->opt1}}
                    </label>
                  </div>
                  <hr class="my-1" />
                  <div class="form-check">
                    <input hx-get="{{ route('check_answer')}}" hx-target="#respone"  {{ getoption($question->qtions, Session::get('studentid')) == $question->opt2 ? 'checked':''}} hx-trigger="click" class="form-check-input" value="{{$question->opt2}}"  type="radio" name="option" id="flexRadioDefault2">
                    <label class="form-check-label" for="flexRadioDefault2">
                        {{$question->opt2}}
                    </label>
                  </div>
                  <hr class="my-1" />
                  <div class="form-check">
                    <input hx-get="{{ route('check_answer')}}" hx-target="#respone" {{ getoption($question->qtions, Session::get('studentid')) == $question->opt3 ? 'checked':''}} hx-trigger="click" class="form-check-input" value="{{$question->opt3}}" type="radio" name="option" id="flexRadioDefault3">
                    <label class="form-check-label" for="flexRadioDefault3">
                        {{$question->opt3}}
                    </label>
                  </div>
                  <hr class="my-1" />
                  <div class="form-check">
                    <input hx-get="{{ route('check_answer')}}" hx-target="#respone" {{ getoption($question->qtions, Session::get('studentid')) == $question->opt4 ? 'checked':''}} hx-trigger="click" class="form-check-input" value="{{$question->opt4}}" type="radio" name="option" id="flexRadioDefault4">
                    <label class="form-check-label" for="flexRadioDefault4">
                        {{$question->opt4}}
                    </label>
                  </div>
                  <hr class="my-1" />
                  <div class="form-check">
                    <input hx-get="{{ route('check_answer')}}" hx-target="#respone" {{ getoption($question->qtions, Session::get('studentid')) == $question->opt5 ? 'checked':''}} hx-trigger="click" class="form-check-input" value="{{$question->opt5}}" type="radio" name="option" id="flexRadioDefault5">
                    <label class="form-check-label" for="flexRadioDefault5">
                        {{$question->opt5}}
                    </label>
                  </div>
                  <hr class="my-1" />
                </div>
                <input type="hidden" name="qtion" value="{{$question->qtions}}" />
                <input type="hidden" name="answer_by" value="{{Session::get('studentid')}}" />
                <input type="hidden" name="subject" value="{{$question->subject_id}}" />
                <input type="hidden" name="year" value="{{$question->year}}" />
                <div id="respone"></div>
                @endforeach
                @if (Session::get('button'))
                <div class="row animate__animated animate__fadeInUp">
                    <div class="col-md-12">
                        @if (Session::get('button') == 'note-sure')
                        <p style="font-size: 4rem" class="alert text-white d-flex justify-content-center">&#128532;</p>
                        @endif
                        @if (Session::get('button') == 'partially')
                        <p style="font-size: 4rem" class="alert text-white d-flex justify-content-center">&#129300;</p>
                        @endif
                        @if (Session::get('button') == 'very-sure')
                        <p style="font-size: 4rem" class="alert text-white d-flex justify-content-center">&#128525;</p>
                        @endif
                    </div>
                </div>
                @endif
                <span class="d-flex flex-row justify-content-around animate__animated animate__fadeInUp mt-3">{{ $all_question->links() }}</span>
            </form>
                <div class="d-flex flex-row justify-content-between">
                    <p></p>
                    <a href="#" class="btn btn-success text-white animate__animated animate__fadeInLeft" style="border-radius:40%;"><i class="bi bi-chat-dots"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
