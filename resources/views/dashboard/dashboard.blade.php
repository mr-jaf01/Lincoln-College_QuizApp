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
                <div class="mt-4">
                    <img src="{{asset('dashboard_banner.png')}}" id="myImg" class="img-fluid animate__animated animate__fadeInLeft" />
                </div>
            </div>
        @endif
    </div>
</div>


<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span class="close">&times;</span>

    <!-- Modal Content (The Image) -->
    <img class="modal-content" id="img01">

    <!-- Modal Caption (Image Text) -->
    <div id="caption"></div>
</div>
<style>
      /* Style the Image Used to Trigger the Modal */
      #myImg {
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
      }

      #myImg:hover {opacity: 0.7;}

      /* The Modal (background) */
      .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
      }

      /* Modal Content (Image) */
      .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      }

      /* Caption of Modal Image (Image Text) - Same Width as the Image */
      #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
      }

      /* Add Animation - Zoom in the Modal */
      .modal-content, #caption {
      animation-name: zoom;
      animation-duration: 0.6s;
      }

      @keyframes zoom {
      from {transform:scale(0)}
      to {transform:scale(1)}
      }

      /* The Close Button */
      .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
      }

      .close:hover,
      .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
      }

      /* 100% Image Width on Smaller Screens */
      @media only screen and (max-width: 700px){
      .modal-content {
          width: 100%;
      }
      }
</style>
<script>
      var modal = document.getElementById("myModal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img = document.getElementById("myImg");
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
      }

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
      modal.style.display = "none";
      }
</script>


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
