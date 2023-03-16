@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Quiz Done')
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
                       @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])) < 70)
                       <div class="d-flex flex-column align-items-center mb-1"><span class="font-weight-bold text-green-600" style="font-size: 150px;">&#128532;</span>  <span style="font-size: 17px;" class="alert alert-danger">Ooops! Please try Again! - FAIL</span> <span style="font-size: 20px;">Total Point Score:{{get_sum($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode'])}}</span> <span>{{ get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode']))}}%</span></div>
                       @endif

                       @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])) >= 70)
                       <div class="d-flex flex-column align-items-center mb-1"><span class="font-weight-bold text-green-600" style="font-size: 150px;">&#128525;</span>  <span style="font-size: 17px;" class="alert alert-success">CONGRATULATIONS! - PASSED</span> <span class="alert alert-success white-text">Total Point Score:{{get_sum($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode'])}}</span> <span>{{ get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])) }}%</span></div>
                       @endif
                   </div>
                 </div>
                 <hr class="my-1" />

                 {{sendEmail(getparentEmail($_GET['answerBy'])->parentemail, $_GET['subject'], $_GET['year'],get_sum($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])) )}}
                 @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])) < 70 )
                 {{performance($_GET['answerBy'],$_GET['subject'], $_GET['year'], get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])) ,$_GET['qmode'], 'fail')}}
                 @endif



                 @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])) >= 70)
                 {{performance($_GET['answerBy'],$_GET['subject'], $_GET['year'], get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])) ,$_GET['qmode'], 'pass')}}
                 @endif



                 <div class="row">
                    <div class="col-md-4 alert alert-secondary"><p><i class="bi bi-question-circle"></i> Total Number of Questions : <span class="">{{numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])}}</span></p></div>
                    <div class="col-md-4 alert alert-danger"><p><i class="bi bi-x-circle"></i> Number of Fail Answers: <span class="font-weight-bold text-red-600">{{Number_of_failAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode'])}}</span></p></div>
                    <div class="col-md-4 alert alert-success"><p><i class="bi bi-check-circle"></i> Number of Correct Answers :<span class="font-weight-bold text-green-600">{{Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode'])}}</span></p></div>
                 </div>
                 <hr class="my-1" />

                 <div class="row py-5">
                    @foreach (answerPreview(request('answerBy'), request('subject'), request('qmode'), request('year')) as $ansPreview)

                    <div class="card-body animate__animated animate__fadeInRight">
                        <div class="flex flex-row justify-between">
                            <span class="rounded btn btn-success text-white my-2">{{ getQtionById($ansPreview->qtion_id)->subject_id }} {{ getQtionById($ansPreview->qtion_id)->year }} - Question </span>
                            @if ($ansPreview->score == 1)
                                <i class="bi bi-check-circle text-green-500 text-2xl"></i>
                            @else
                                <i class="bi bi-x-circle text-red-500 text-2xl"></i>
                            @endif
                        </div>

                        <h5 class="card-title">
                        {!! html_entity_decode( getQtionById($ansPreview->qtion_id)->qtions, ENT_QUOTES, 'UTF-8') !!}
                        </h5>

                        <div class="form-check">

                            <label class="form-check-label w-full {{ $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt1 ? 'alert alert-success' :  ($ansPreview->qtion_ans != getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt1 ? 'alert alert-danger' : '')  }}" for="flexRadioDefault5">
                                {!! html_entity_decode(getQtionById($ansPreview->qtion_id)->opt1, ENT_QUOTES, 'UTF-8') !!}
                            </label>

                        </div>
                        <hr class="my-1" />


                        <div class="form-check">
                            <label class="form-check-label w-full {{ $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt2 ? 'alert alert-success'  : ($ansPreview->qtion_ans != getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt2 ? 'alert alert-danger' : '')}}" for="flexRadioDefault5">
                                {!! html_entity_decode(getQtionById($ansPreview->qtion_id)->opt2, ENT_QUOTES, 'UTF-8') !!}
                            </label>
                        </div>
                        <hr class="my-1" />



                        <div class="form-check">
                            <label class="form-check-label w-full  {{ $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt3 ? 'alert alert-success'  : ($ansPreview->qtion_ans != getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt3 ? 'alert alert-danger' : '')}}" for="flexRadioDefault5">
                                {!! html_entity_decode(getQtionById($ansPreview->qtion_id)->opt3, ENT_QUOTES, 'UTF-8') !!}
                            </label>
                        </div>
                        <hr class="my-1" />



                        <div class="form-check">
                            <label class="form-check-label w-full  {{ $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt4 ? 'alert alert-success'  : ($ansPreview->qtion_ans != getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt4 ? 'alert alert-danger' : '')}}" for="flexRadioDefault5">
                                {!! html_entity_decode(getQtionById($ansPreview->qtion_id)->opt4, ENT_QUOTES, 'UTF-8') !!}
                            </label>
                        </div>
                        <hr class="my-1" />


                        <div class="form-check">
                          <label class="form-check-label w-full  {{ $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt5 ? 'alert alert-success'  : ($ansPreview->qtion_ans != getQtionById($ansPreview->qtion_id)->correct_opt && $ansPreview->qtion_ans == getQtionById($ansPreview->qtion_id)->opt5 ? 'alert alert-danger' : '')}}" for="flexRadioDefault5">
                              {!! html_entity_decode(getQtionById($ansPreview->qtion_id)->opt5, ENT_QUOTES, 'UTF-8') !!}
                          </label>
                        </div>
                        <hr class="my-1" />

                    </div>

                    @endforeach
                 </div>

                 <hr class="my-1" />
                       @if (get_percentage(Number_of_correctAnswer($_GET['subject'], $_GET['year'], $_GET['answerBy'],$_GET['qmode']), numberofquestions($_GET['subject'], $_GET['year'],$_GET['qmode'])) < 70)
                        <div class="row p-5">
                            You are Recommended to Retake the Quiz
                            <a href="{{route('dashboard')}}" class="btn bg-red-500 p-2 text-white w-full" style="border-radius: 19px;">Retake Quiz</a>
                        </div>
                       @endif
                 <hr class="my-1" />
                 <div class="row">

                    <a href="{{route('dashboard')}}" class="btn bg-red-500 p-2 text-white  hover:bg-red-700" style="border-radius: 19px;">Dashboard</a>

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
