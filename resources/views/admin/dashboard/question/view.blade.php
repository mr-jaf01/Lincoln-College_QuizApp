@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Question Details')
@section('content')
@if (isset($_GET['info']))
<div class="container mt-2">
    <div class="row card p-3" style="border-radius: 19px;">
        <div class="col-md-12">
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
                            <p class="alert alert-success">{{Session::get('fail')}}</p>
                        </div>
                    </div>
                @endif
                <h5 class="card-header d-flex flex-row justify-content-between">
                    <p>
                    Question Info Page <br><small class="text-muted">Below is the full details of the question</small>
                    </p>
                    <span class="rounded btn btn-success btn-sm text-white">{{$qtion->subject_id}} | {{$qtion->qmode == 'mcq' ? Str::upper($qtion->qmode) :Str::ucfirst($qtion->qmode) }} | {{$qtion->year}}</span>
                </h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                            Question
                        </div>
                        <div class="col-md-6 text-muted">
                            <p>{!! $qtion->qtions !!}<p>
                        </div>
                    </div>

                    @if ($qtion->qmode == 'mcq')
                    <hr class="my-1" />
                    <div class="p-5">
                        <div class="row mb-3">
                            <div class="col-md-6 font-weight-bold">
                                Option 1
                            </div>
                            <div class="col-md-6 text-muted">
                                <p>{!! $qtion->opt1 !!}<p>
                            </div>
                        </div>
                        <hr class="my-1" />


                        <div class="row mb-3">
                            <div class="col-md-6 font-weight-bold">
                                Option 2
                            </div>
                            <div class="col-md-6 text-muted">
                                <p>{!! $qtion->opt2 !!}<p>
                            </div>
                        </div>
                        <hr class="my-1" />

                        <div class="row mb-3">
                            <div class="col-md-6 font-weight-bold">
                                Option 3
                            </div>
                            <div class="col-md-6 text-muted">
                                <p>{!! $qtion->opt3 !!}<p>
                            </div>
                        </div>
                        <hr class="my-1" />

                        <div class="row mb-3">
                            <div class="col-md-6 font-weight-bold">
                                Option 4
                            </div>
                            <div class="col-md-6 text-muted">
                                <p>{!! $qtion->opt4 !!}<p>
                            </div>
                        </div>
                        <hr class="my-1" />

                        <div class="row mb-3">
                            <div class="col-md-6 font-weight-bold">
                                Option 5
                            </div>
                            <div class="col-md-6 text-muted">
                                <p>{!! $qtion->opt5 !!}<p>
                            </div>
                        </div>
                    </div>
                    @endif

                    <hr class="my-1" />
                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                            Subject
                        </div>
                        <div class="col-md-6 text-muted">
                            <p>{{$qtion->subject_id}}<p>
                        </div>
                    </div>

                    <hr class="my-1" />
                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                            Question Type
                        </div>
                        <div class="col-md-6 text-muted">
                            <p>{{$qtion->qmode == 'mcq' ? Str::upper($qtion->qmode) :Str::ucfirst($qtion->qmode) }}<p>
                        </div>
                    </div>
                    <hr class="my-1" />
                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                            Year
                        </div>
                        <div class="col-md-6 text-muted">
                            <p>{{$qtion->year}}<p>
                        </div>
                    </div>
                    <hr class="my-1" />
                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                           Question Instructions
                        </div>
                        @if ($qtion->instruction != "")
                            <div class="col-md-6 alert alert-danger text-white">
                                <p>{!! $qtion->instruction !!}<p>
                            </div>
                        @endif

                    </div>

                    <hr class="my-1" />
                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                           Question Image
                        </div>
                        <div class="col-md-6 text-muted">
                            <img src="{{$qtion->qimage ? asset($qtion->qimage) : ''}}" alt="Question Image" srcset="">
                        </div>
                    </div>

                    <hr class="my-1" />
                    <div class="row justify-content-center mb-3">
                        <div class="col-md-6">
                           <a href="/admin/dashboard/question/view/{{$qtion->id}}?update" class="btn w-full bg-red-500 rounded text-white">Edit & Update</a>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endif




@if (isset($_GET['update']))
<div class="container card p-3" style="border-radius: 19px;">
    <form action="{{route('admin.dashboard.question.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">UPDATING QUESTION <br><small class="text-muted">Please Update the Required Fields</small></h5>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-red-400 text-white" for="inputGroupSelect01">Question type</label>
                                </div>
                                <select name="questiontype" class="custom-select  shadow-none" id="inputGroupSelect01" >
                                  <option value="{{$qtion->qmode}}">{{$qtion->qmode}}</option>
                                  <option value="mcq">MCQ (Multiple Choice Question)</option>
                                  <option value="essay">ESSAY (Essay Question)</option>
                                </select>
                              </div>

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-red-400 text-white" for="inputGroupSelect01">Subject</label>
                                </div>
                                <select name="subject" class="custom-select  shadow-none" id="inputGroupSelect01" >
                                  <option value="{{$qtion->subject_id}}">{{$qtion->subject_id}}</option>
                                  @foreach (getsubject() as $item)
                                  <option value="{{$item->subjectname}}"> {{$item->subjectname}}</option>
                                  @endforeach
                                </select>
                              </div>


                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-red-400 text-white" for="inputGroupSelect01">Year</label>
                                </div>
                                <select name="year" class="custom-select  shadow-none" id="inputGroupSelect01" >
                                    <option value="{{$qtion->year}}">{{$qtion->year}}</option>
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
                        </div>
                        <hr class="my-1" />
                        <div class="row mb-3">
                            <div class="col-md-4">
                                What is your Question ?
                            </div>
                            <div class="col-md-8 d-flex flex-column">
                                <small class="text-muted">Write Question Below</small>
                                <textarea name="question">{{ $qtion->qtions }}</textarea>
                            </div>
                        </div>
                        @if ($qtion->qmode == 'mcq')
                        <hr class="my-1" />
                        <div class="option-hide-or-show">
                            <div class="row mb-3">
                                <div class="col-md-4">Option 1</div>
                                <div class="col-md-8">
                                    <small class="text-muted">Write Option 1 Below</small>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="option1" class="optioneditor form-control form-control-lg" type="text" value="{{$qtion->opt1}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-check-label text-muted" for="flexRadioDefault1">
                                                <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                            </label>
                                            <input {{getCorrectAns($qtion->qtions,$qtion->subject_id,$qtion->year) == $qtion->opt1 ? 'checked' : '' }} class="form-check-input ml-1" value="{{$qtion->opt1}}" type="radio" name="correct_answer" id="flexRadioDefault1">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-1" />
                            <div class="row mb-3">
                                <div class="col-md-4">Option 2</div>
                                <div class="col-md-8">
                                    <small class="text-muted">Write Option 2 Below</small>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="option2" class="optioneditor form-control form-control-lg" type="text" value="{{$qtion->opt2}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-check-label text-muted" for="flexRadioDefault2">
                                                <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                            </label>
                                            <input {{getCorrectAns($qtion->qtions,$qtion->subject_id,$qtion->year) == $qtion->opt2 ? 'checked' : '' }} class="form-check-input ml-1" value="{{$qtion->opt2}}" type="radio" name="correct_answer" id="flexRadioDefault2">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-1" />
                            <div class="row mb-3">
                                <div class="col-md-4">Option 3</div>
                                <div class="col-md-8">
                                    <small class="text-muted">Write Option 3 Below</small>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="option3" class="optioneditor form-control form-control-lg" type="text" value="{{$qtion->opt3}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-check-label text-muted" for="flexRadioDefault3">
                                                <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                            </label>
                                            <input {{getCorrectAns($qtion->qtions,$qtion->subject_id,$qtion->year) == $qtion->opt3 ? 'checked' : '' }} class="form-check-input ml-1" value="{{$qtion->opt3}}" type="radio" name="correct_answer" id="flexRadioDefault3">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-1" />
                            <div class="row mb-3">
                                <div class="col-md-4">Option 4</div>
                                <div class="col-md-8">
                                    <small class="text-muted">Write Option 4 Below</small>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="option4" class="optioneditor form-control form-control-lg" type="text" value="{{$qtion->opt4}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-check-label text-muted" for="flexRadioDefault4">
                                                <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                            </label>
                                            <input {{getCorrectAns($qtion->qtions,$qtion->subject_id,$qtion->year) == $qtion->opt4 ? 'checked' : '' }} class="form-check-input ml-1" value="{{$qtion->opt4}}" type="radio" name="correct_answer" id="flexRadioDefault4">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-1" />
                            <div class="row mb-3">
                                <div class="col-md-4">Option 5</div>
                                <div class="col-md-8">
                                    <small class="text-muted">Write Option 5 Below</small>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input name="option5" class="optioneditor form-control form-control-lg" type="text" value="{{$qtion->opt5}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-check-label text-muted" for="flexRadioDefault5">
                                                <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                            </label>
                                            <input {{getCorrectAns($qtion->qtions,$qtion->subject_id,$qtion->year) == $qtion->opt5 ? 'checked' : '' }} class="form-check-input ml-1" value="{{$qtion->opt5}}" type="radio" name="correct_answer" id="flexRadioDefault5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <hr class="my-1"/>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Question Instruction (Optional)
                            </div>
                            <div class="col-md-8 d-flex flex-column">
                                <small class="text-muted">Write your Instruction Below</small>
                                <textarea name="instruction">{{$qtion->instruction}}</textarea>
                            </div>
                        </div>
                        <hr class="my-1"/>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                Question Image (Optional)
                            </div>
                            <div class="col-md-8 d-flex flex-column">
                                <div class="card shadow mb-4">
                                    <div class="card-body">

                                      <div class="dropzone bg-light rounded-lg" id="tinydash-dropzone">
                                        <div class="dz-message needsclick d-flex flex-column align-items-center">
                                          <div class="circle circle-lg bg-red-600">
                                            <i class="fe fe-upload  fe-24 text-white"></i>
                                          </div>
                                          <input type="file" name="image"/>
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
                        <hr class="my-1"/>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                               <button style="border-radius: 19px;" class="btn w-full bg-red-500 text-white hover:bg-red-700" type="submit">Save Changes</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="image_link" value="{{$qtion->qimage}}">
        <input type="hidden" name="id" value="{{$qtion->id}}">
    </form>
</div>
@endif


<script src="{{asset('client/js/popper.min.js')}}"></script>
<script src="{{asset('client/js/moment.min.js')}}"></script>
<script src="{{asset('client/js/simplebar.min.js')}}"></script>
<script src="{{asset('client/js/tinycolor-min.js')}}"></script>
<script src="{{asset('client/js/config.js')}}"></script>
<script src="{{asset('client/js/apps.js')}}"></script>
<script>
     tinymce.init({ selector:'.optioneditor',menubar : false,
            toolbar: [
            "superscript subscript bold italic underline",
            ],
            height : "140"
        });

        tinymce.init({selector:'textarea'})
</script>



<!--
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
-->
@endsection

