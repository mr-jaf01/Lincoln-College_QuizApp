@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Dashboard')
@section('content')

<div class="container mt-3">
    @if (Session::get('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">{{Session::get('success')}}</div>
            </div>
        </div>
    @endif
    <div class="row">
        @if (!get_quiz_history(Session::get('studentid'))->isEmpty())
            @foreach (get_quiz_history(Session::get('studentid')) as $quiz)
            <div class="col-md-6 mb-3">
                <div class="card p-1" style="border-radius: 19px;">
                    <div class="card-header d-flex flex justify-content-between" style="border-radius: 19px">
                    <p class="rounded btn btn-success text-white">{{$quiz->subject_id}} - {{$quiz->year}} Quiz</p>
                    <a href="{{route('dashboard.history.remove')}}?userid={{Session::get('studentid')}}&subject={{$quiz->subject_id}}&year={{$quiz->year}}" class="text-red-500"><i class="bi bi-x-circle text-red-500"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 alert alert-secondary"><p><i class="bi bi-question-circle"></i> Total Number of Questions : <span class="">{{numberofquestions($quiz->subject_id,$quiz->year)}}</span></p></div>
                            <div class="col-md-4 alert alert-danger"><p><i class="bi bi-x-circle"></i> Unanswered Questions : <span class="font-weight-bold text-red-600">{{(numberofquestions($quiz->subject_id,$quiz->year) - number_of_answered_questions($quiz->subject_id,$quiz->year,Session::get('studentid')))}}</span></p></div>
                            <div class="col-md-4 alert alert-success"><p><i class="bi bi-check-circle"></i> Answered Questions : <span class="font-weight-bold text-green-600">{{number_of_answered_questions($quiz->subject_id,$quiz->year,Session::get('studentid'))}}</span></p></div>
                        </div>
                        @if (!empty(get_performance(Session::get('studentid'), $quiz->subject_id, $quiz->year)))
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                <span>Total Point Score : </span>
                                <span class="text-red-500">{{get_sum($quiz->subject_id, $quiz->year, Session::get('studentid'))}}</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="row justify-content-end d-flex mb-2">
                                    <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="--value:{{(int)(get_performance(Session::get('studentid'), $quiz->subject_id, $quiz->year)->percentage)}}"></div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <hr class="my-1" />
                        <div class="d-flex flex-row justify-content-between">
                            <p></p>
                            @if (!empty(get_performance(Session::get('studentid'), $quiz->subject_id, $quiz->year)) && get_performance(Session::get('studentid'), $quiz->subject_id, $quiz->year)->status == 'fail')
                                <a href="/dashboard/quiz/{{$quiz->subject_id}}/{{$quiz->year}}" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700" style="border-radius: 19px;">Retake Quiz <i class="bi bi-arrow-right-circle"></i></a>
                            @endif

                            @if (empty(get_performance(Session::get('studentid'), $quiz->subject_id, $quiz->year)))
                            <a href="/dashboard/quiz/{{$quiz->subject_id}}/{{$quiz->year}}" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700" style="border-radius: 19px;">Continue... <i class="bi bi-arrow-right-circle"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-md-12">
                <div class="alert alert-info">No Quiz History, Kindly Start a New Quiz from Question Bank.</div>
            </div>
        @endif
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
      --size: 8rem;
      --fg:rgb(200, 24, 24);
      --bg: #def;
      --pgPercentage: var(--value);
      animation: growProgressBar 3s 1 forwards;
      width: 100px;
      height: 100px;
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
