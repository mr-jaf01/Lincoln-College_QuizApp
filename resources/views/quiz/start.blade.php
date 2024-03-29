@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Quiz start')
@section('content')
<div class="container-fluid mt-3">
    <div class="row justify-content-center d-flex">
        @if (Session::get('success'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                </div>
            </div>
         @endif
        <div class="col-md-12">
            <div class="card p-2" style="border-radius:19px;">
            @foreach ($all_question as $question)

            <!----
                Answer panel for all MCQ questions.
            -->
            @if ($question->qmode == "mcq")
            <form action="{{ route('save_answer')}}" method="POST">
                @csrf
                <h5 class="card-header" style="border-radius:19px;"></small>
                    @if (isset($_GET['page']))
                        <span class="rounded btn btn-success text-white">{{ $question->subject_id }} {{ $question->year }} - Question {{$_GET['page']}}</span>
                    @endif
                </h5>

                <div class="card-body animate__animated animate__fadeInRight">
                    <h5 class="card-title">
                    {!! html_entity_decode( $question->qtions, ENT_QUOTES, 'UTF-8') !!}
                    </h5>
                    <div class="row mb-8">
                        <div class="col-md-6 d-flex flex-row justify-content-center">
                            <img  src="{{$question->qimage ? asset($question->qimage) : ''}}" id="myImg" class="img-fluid" style=""/>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row mb-5">
                        @if ($question->instruction)
                        <div class="col-md-12 alert alert-danger mt-lg-4" style="margin-top: 30px;">
                            <span>Instruction:</span>
                            <hr class="my-1" />
                            <p class="">
                                {!! html_entity_decode($question->instruction, ENT_QUOTES, 'UTF-8') !!}
                            </p>
                        </div>
                        @endif
                    </div>
                    <div class="form-check">
                      <input hx-get="{{ route('check_answer')}}" hx-target="#respone" {{ getoption($question->id, Session::get('studentid'), $question->subject_id, $question->year) == $question->opt1 ? 'checked':''}}  hx-trigger="click" class="form-check-input" value="{{$question->opt1}}" type="radio" name="option" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        {!! html_entity_decode($question->opt1, ENT_QUOTES, 'UTF-8') !!}
                      </label>
                    </div>
                    <hr class="my-1" />
                    <div class="form-check">
                      <input hx-get="{{ route('check_answer')}}" hx-target="#respone"  {{ getoption($question->id, Session::get('studentid'), $question->subject_id, $question->year) == $question->opt2 ? 'checked':''}} hx-trigger="click" class="form-check-input" value="{{$question->opt2}}"  type="radio" name="option" id="flexRadioDefault2">
                      <label class="form-check-label" for="flexRadioDefault2">
                          {!! html_entity_decode($question->opt2, ENT_QUOTES, 'UTF-8') !!}
                      </label>
                    </div>
                    <hr class="my-1" />
                    <div class="form-check">
                      <input hx-get="{{ route('check_answer')}}" hx-target="#respone" {{ getoption($question->id, Session::get('studentid'), $question->subject_id, $question->year) == $question->opt3 ? 'checked':''}} hx-trigger="click" class="form-check-input" value="{{$question->opt3}}" type="radio" name="option" id="flexRadioDefault3">
                      <label class="form-check-label" for="flexRadioDefault3">
                          {!! html_entity_decode($question->opt3, ENT_QUOTES, 'UTF-8') !!}
                      </label>
                    </div>
                    <hr class="my-1" />
                    <div class="form-check">
                      <input hx-get="{{ route('check_answer')}}" hx-target="#respone" {{ getoption($question->id, Session::get('studentid'), $question->subject_id, $question->year) == $question->opt4 ? 'checked':''}} hx-trigger="click" class="form-check-input" value="{{$question->opt4}}" type="radio" name="option" id="flexRadioDefault4">
                      <label class="form-check-label" for="flexRadioDefault4">
                          {!! html_entity_decode($question->opt4, ENT_QUOTES, 'UTF-8') !!}
                      </label>
                    </div>
                    <hr class="my-1" />
                    <div class="form-check">
                      <input hx-get="{{ route('check_answer')}}" hx-target="#respone" {{ getoption($question->id, Session::get('studentid'), $question->subject_id, $question->year) == $question->opt5 ? 'checked':''}} hx-trigger="click" class="form-check-input" value="{{$question->opt5}}" type="radio" name="option" id="flexRadioDefault5">
                      <label class="form-check-label" for="flexRadioDefault5">
                          {!! html_entity_decode($question->opt5, ENT_QUOTES, 'UTF-8') !!}
                      </label>
                    </div>
                    <hr class="my-1" />
                </div>

                <input type="hidden" name="qtion" value="{{$question->id}}" />
                <input type="hidden" name="answer_by" value="{{Session::get('studentid')}}" />
                <input type="hidden" name="subject" value="{{$question->subject_id}}" />
                <input type="hidden" name="year" value="{{$question->year}}" />
                <input type="hidden" name="qmode" value="{{$question->qmode}}" />
                <div id="respone"></div>
            </form>
            @endif

             <!-----

            Answer panel for all essay questions.

            --->
            @if ($question->qmode == "essay")
            <form action="{{ route('save_answer')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5 class="card-header"></small>
                    @if (isset($_GET['page']))
                        <span class="rounded btn btn-success text-white">{{ $question->subject_id }} {{ $question->year }} - Question {{$_GET['page']}}</span>
                    @endif
                </h5>
                <div class="card-body animate__animated animate__fadeInRight">
                    <h5 class="card-title">
                    {!!  html_entity_decode($question->qtions, ENT_QUOTES, 'UTF-8') !!}
                    </h5>
                    <div class="row">
                        <div class="col-md-8 justify-content-center">
                            <img src="{{$question->qimage ? asset($question->qimage) : ''}}" id="myImg" class="img-fluid" style=""/>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <div class="row">
                        @if ($question->instruction)
                        <div class="col-md-12 alert alert-danger mt-lg-4" style="margin-top: 30px;">
                            <span>Instruction:</span>
                            <hr class="my-1" />
                            <p class="">
                                {!! html_entity_decode($question->instruction, ENT_QUOTES, 'UTF-8') !!}
                            </p>
                        </div>
                        @endif
                    </div>
                    <hr class="my-1" />
                        @if (getoption($question->id, Session::get('studentid'), $question->subject_id, $question->year) == '')
                        <h4 class="alert alert-info">Write Your Answer Below</h4>
                            <textarea name="option" class="editor"></textarea>
                            <div class="row justify-content-center">
                                <div class="col-md-12 d-flex flex-column">
                                    <div class="card shadow mb-4">
                                        <div class="card-body">

                                        <div class="dropzone bg-light rounded-lg" id="tinydash-dropzone">
                                            <div class="dz-message needsclick d-flex flex-column align-items-center">
                                            <div class="circle circle-lg bg-red-600">
                                                <i class="fe fe-upload  fe-24 text-white"></i>
                                            </div>
                                            <input type="file" name="filename[]" multiple='multiple'/>
                                            </div>
                                        </div>
                                        <!-- Preview -->
                                        <!-- <div class="dropzone-previews mt-3" id="file-previews"></div> -->
                                        <!-- file preview template -->
                                        <div class="d-none" id="uploadPreviewTemplate">
                                            <div class="card mt-1 mb-0 shadow-none border">
                                            <div class="p-2">
                                                <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                                </div>
                                                <div class="col pl-0">
                                                    <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                                                    <p class="mb-0" data-dz-size></p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                    <i class="dripicons-cross"></i>
                                                    </a>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div> <!-- .card-body -->
                                    </div> <!-- .card -->
                                </div>
                            </div>
                            <div>
                                <a hx-get="{{ route('check_answer')}}" hx-target="#respone" hx-trigger="click" class="btn btn-success rounded text-white">Submit Answer</a>
                            </div>
                        @endif
                        @if (getoption($question->id, Session::get('studentid'), $question->subject_id, $question->year) != '')
                        <p class="alert alert-dark"> Answer Submitted</p>
                        @endif
                </div>
                <input type="hidden" name="qtion" value="{{$question->id}}" />
                <input type="hidden" name="answer_by" value="{{Session::get('studentid')}}" />
                <input type="hidden" name="subject" value="{{$question->subject_id}}" />
                <input type="hidden" name="year" value="{{$question->year}}" />
                <input type="hidden" name="qmode" value="{{$question->qmode}}" />
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
            <div class="animate__animated animate__fadeInUp mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        {{ $all_question->links() }}
                    </div>
                </div>
            </div>
                <div class="d-flex flex-row justify-content-between mt-4">
                    <p></p>
                    <p>
                        <a data-toggle="modal" data-target="#exampleModal" href="#" class="btn btn-danger text-white animate__animated animate__fadeInLeft" style="border-radius:19px;"><i class="bi bi-chat-dots"></i> Ask for Help</a>
                        @if(isset($_GET['page']))
                            @if(numberofquestions($question->subject_id, $question->year, $question->qmode, ) == $_GET['page'])
                                <a href="/quizDone?subject={{$question->subject_id}}&year={{$question->year}}&answerBy={{Session::get('studentid')}}&qmode={{$question->qmode}}" class="btn btn-primary" style="border-radius:19px;">Quiz Done</a>
                            @endif
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--- send email for support --->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">


            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Support Center</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/chat-support" method="POST">
                    @csrf
                <div class="modal-body">
                    <label for="name">Your Name</label>
                    <input type="text" required name="name" id="name" class="form-control">

                    <br>


                    <label for="email">Your Email</label>
                    <input type="email" required name="email" id="email" class="form-control" placeholder="example@domain.com">
                    <br>


                    <label for="message">Message / Question</label>
                    <textarea required name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                  <input type="submit" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700" style="border-radius: 19px;" value="Send Message">
                </div>
            </form>
              </div>

    </div>
  </div>


<!-- The Modal -->
<div id="myModal" class="modalmyimg">

  <!-- The Close Button -->
  <span class="closemyimg">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-contentmyimg" id="img01">

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
    .modalmyimg {
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
    .modal-contentmyimg {
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
    .modal-contentmyimg, #caption {
    animation-name: zoom;
    animation-duration: 0.6s;
    }

    @keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
    }

    /* The Close Button */
    .closemyimg {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
    }

    .closemyimg:hover,
    .closemyimg:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px){
    .modal-contentmyimg {
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
        tinymce.init({selector:'.editor'})
</script>


@endsection
