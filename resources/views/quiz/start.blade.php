@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Quiz start')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center d-flex">
        <div class="col-md-12">
            <div class="card p-4" style="border-radius:19px;">
            @foreach ($all_question as $question)

            <!----
                Answer panel for all MCQ questions.
            -->
            @if ($question->qmode == "mcq")
            <form action="{{ route('save_answer')}}" method="GET">
                <h5 class="card-header" style="border-radius:19px;"></small>
                    @if (isset($_GET['page']))
                    <span class="rounded btn btn-success text-white">{{ $question->subject_id }} {{ $question->year }} - Question {{$_GET['page']}}</span>
                    @endif
                </h5>
                <div class="card-body animate__animated animate__fadeInRight">
                    <h5 class="card-title">
                    {!! $question->qtions !!}
                    </h5>
                    <div class="row">
                        <div class="col-md-6 d-flex flex-row justify-content-center">
                            <img src="{{$question->qimage ? asset($question->qimage) : ''}}" id="myImg" class="img-fluid" style=""/>
                        </div>
                        @if ($question->instruction)
                        <div class="col-md-6 alert alert-danger">
                            <span>Instruction:</span>
                            <hr class="my-1" />
                            <p class="">
                                {!! $question->instruction !!}
                            </p>
                        </div>
                        @endif
                    </div>
                    <div class="form-check">
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
            </form>
            @endif

             <!-----

            Answer panel for all essay questions.

            --->
            @if ($question->qmode == "essay")
            <form action="{{ route('save_answer')}}" method="GET">
                <h5 class="card-header"></small>
                    @if (isset($_GET['page']))
                    <span class="rounded btn btn-success text-white">{{ $question->subject_id }} {{ $question->year }} - Question {{$_GET['page']}}</span>
                    @endif
                </h5>
                <div class="card-body animate__animated animate__fadeInRight">
                    <h5 class="card-title">
                    {!! $question->qtions !!}
                    </h5>
                    <div class="row">
                        <div class="col-md-6 d-flex flex-row justify-content-center">
                            <img src="{{$question->qimage ? asset($question->qimage) : ''}}" id="myImg" class="img-fluid" style=""/>
                        </div>
                        @if ($question->instruction)
                        <div class="col-md-6 alert alert-danger">
                            <span>Instruction:</span>
                            <hr class="my-1" />
                            <p class="">
                                {!! $question->instruction !!}
                            </p>
                        </div>
                        @endif
                    </div>
                    <hr class="my-1" />
                        @if (getoption($question->qtions, Session::get('studentid')) == '')
                        <h4 class="alert alert-info">Write Your Answer Below</h4>
                            <textarea name="option" id="editor"></textarea>
                            <div>
                                <a hx-get="{{ route('check_answer')}}" hx-target="#respone" hx-trigger="click" class="btn btn-success rounded text-white">Submit Answer</a>
                            </div>
                        @endif
                        @if (getoption($question->qtions, Session::get('studentid')) != '')
                        <p class="alert alert-dark"> Answer Submitted</p>
                        @endif
                    <hr class="my-1" />
                </div>
                <input type="hidden" name="qtion" value="{{$question->qtions}}" />
                <input type="hidden" name="answer_by" value="{{Session::get('studentid')}}" />
                <input type="hidden" name="subject" value="{{$question->subject_id}}" />
                <input type="hidden" name="year" value="{{$question->year}}" />
                <div id="respone"></div>
            </form>
            @endif
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
                <div class="d-flex flex-row justify-content-between">
                    <p></p>
                    <p>
                        <a href="#" class="btn btn-danger text-white animate__animated animate__fadeInLeft" style="border-radius:19px;"><i class="bi bi-chat-dots"> Ask for Help</i></a>
                    @if(isset($_GET['page']))
                        @if(numberofquestions($question->subject_id, $question->year) == $_GET['page'])
                            <a href="/quizDone" class="btn btn-primary" style="border-radius:19px;">Quiz Done</a>
                        @endif
                    @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>







<style>
    input[type='radio']:checked:after {
        width: 15px;
        height: 15px;
        border-radius: 15px;
        top: -2px;
        left: -1px;
        position: relative;
        background-color: #329572;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 2px solid white;
    }
</style>
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
    <!--<script>tinymce.init({ selector:'textarea' });</script>-->
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


@endsection
