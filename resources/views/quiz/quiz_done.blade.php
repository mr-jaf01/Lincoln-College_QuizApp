@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Quiz start')
@section('content')

<div class="container-fluid card mt-2" style="border-radius: 19px; height:100%;">
    <div class="row justify-content-center mt-4 mb-4">
        <div class="col-md-10">
            <div class="card" style="border-radius: 19px;">
                <div class="card-header" style="border-radius: 19px;">
                    Quiz Result
                </div>
                <div class="card-body">
                 <div class="row">
                   <div class="col-md-12">
                       @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year'])) < 70)
                       <div class="d-flex flex-column align-items-center mb-1"><span class="font-weight-bold text-green-600" style="font-size: 150px;">&#128532;</span>  <span style="font-size: 17px;" class="alert alert-danger">Ooops! Please try Again! - FAIL</span> <span style="font-size: 20px;">Total Point Score:{{get_sum($_GET['subject'], $_GET['year'], $_GET['answerBy'])}}</span> <span>{{ get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year']))}}%</span></div>
                       @endif

                       @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year'])) >= 70)
                       <div class="d-flex flex-column align-items-center mb-1"><span class="font-weight-bold text-green-600" style="font-size: 150px;">&#128525;</span>  <span style="font-size: 17px;" class="alert alert-success">CONGRATULATIONS! - PASSED</span> <span class="alert alert-success white-text">Total Point Score:{{get_sum($_GET['subject'], $_GET['year'], $_GET['answerBy'])}}</span> <span>{{ get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year'])) }}%</span></div>
                       @endif
                   </div>
                 </div>
                 <hr class="my-1" />

                 {{sendEmail(getparentEmail($_GET['answerBy'])->parentemail,$_GET['subject'], $_GET['year'],get_sum($_GET['subject'], $_GET['year'], $_GET['answerBy']), get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year'])) )}}

                 @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year'])) < 70 )
                 {{performance($_GET['answerBy'],$_GET['subject'], $_GET['year'], get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year'])), 'fail')}}
                 @endif



                 @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year'])) >= 70)
                 {{performance($_GET['answerBy'],$_GET['subject'], $_GET['year'], get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year'])), 'pass')}}
                 @endif



                 <div class="row">
                    <div class="col-md-4 alert alert-secondary"><p><i class="bi bi-question-circle"></i> Total Number of Questions : <span class="">{{numberofquestions($_GET['subject'], $_GET['year'])}}</span></p></div>
                    <div class="col-md-4 alert alert-danger"><p><i class="bi bi-x-circle"></i> Number of Fail Answers: <span class="font-weight-bold text-red-600">{{Number_of_failAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'])}}</span></p></div>
                    <div class="col-md-4 alert alert-success"><p><i class="bi bi-check-circle"></i> Number of Correct Answers :<span class="font-weight-bold text-green-600">{{Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'])}}</span></p></div>
                 </div>
                 <hr class="my-1" />
                       @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy']), numberofquestions($_GET['subject'], $_GET['year'])) < 70)
                       <div class="row p-5">
                        You are Recommended to Retake the Quiz
                        <a href="#" class="btn bg-red-500 p-2 text-white w-full" style="border-radius: 19px;">Retake Quiz</a>
                        </div>
                       @endif
                 <hr class="my-1" />
                 <div class="row">
                    <center><a href="{{route('dashboard')}}" class="btn bg-red-500 p-2 text-white  hover:bg-red-700 w-full" style="border-radius: 19px;">Dashboard</a></center>
                 </div>
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
