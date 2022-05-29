@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Create Question')
@section('content')

<div class="container card p-3" style="border-radius: 19px;">
    <form action="{{route('admin.dashboard.question.createsave')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">CREATING NEW QUESTION <br><small class="text-muted">Please Fill all the require field</small></h5>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                What is your Question ?
                            </div>
                            <div class="col-md-8 d-flex flex-column">
                                <small class="text-muted">Write Question Below</small>
                                <textarea name="question" id="qeditor"></textarea>
                            </div>
                        </div>
                        <hr class="my-1" />
                    @if ($qtiontype == 'mcq')
                    <div class="option-hide-or-show">
                        <div class="row mb-3">
                            <div class="col-md-4">Option 1</div>
                            <div class="col-md-8">
                                <small class="text-muted">Write Option 1 Below</small>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="option1" id="option1"  class="optioneditor form-control form-control-lg">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-check-label text-muted" for="flexRadioDefault1">
                                            <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                        </label>
                                        <input class="form-check-input ml-1"  onclick="clickoption1()" type="radio" name="correct_answer" id="flexRadioDefault1">
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
                                        <input name="option2" id="option2" class="optioneditor form-control form-control-lg" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-check-label text-muted" for="flexRadioDefault2">
                                            <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                        </label>
                                        <input class="form-check-input ml-1"  onclick="clickoption2()" type="radio" name="correct_answer" id="flexRadioDefault2">
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
                                        <input name="option3" id="option3" class="optioneditor form-control form-control-lg" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-check-label text-muted" for="flexRadioDefault3">
                                            <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                        </label>
                                        <input class="form-check-input ml-1"  onclick="clickoption3()" type="radio" name="correct_answer" id="flexRadioDefault3">
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
                                        <input name="option4" id="option4" class="optioneditor form-control form-control-lg" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-check-label text-muted" for="flexRadioDefault4">
                                            <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                        </label>
                                        <input class="form-check-input ml-1"  onclick="clickoption4()" type="radio" name="correct_answer" id="flexRadioDefault4">
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
                                        <input name="option5" id="option5" class="optioneditor form-control form-control-lg" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-check-label text-muted" for="flexRadioDefault5">
                                            <i class="bi bi-check2-all"></i><small>Mark As Correct Answer</small>
                                        </label>
                                        <input class="form-check-input ml-1"  onclick="clickoption5()" type="radio" name="correct_answer" id="flexRadioDefault5">
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
                                <textarea name="instruction" class="editor"></textarea>
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
                            <button style="border-radius: 19px;" class="btn w-full bg-red-500 text-white hover:bg-red-700" type="submit">Save Question</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="qtiontype" value="{{$qtiontype}}">
        <input type="hidden" name="subject" value="{{$subject}}" >
        <input type="hidden" name="year" value="{{$year}}">
    </form>
</div>


    <script src="{{asset('client/js/jquery.min.js')}}"></script>
    <script src="{{asset('client/js/popper.min.js')}}"></script>
    <script src="{{asset('client/js/moment.min.js')}}"></script>
    <script src="{{asset('client/js/simplebar.min.js')}}"></script>
    <script src="{{asset('client/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('client/js/config.js')}}"></script>
    <script src="{{asset('client/js/apps.js')}}"></script>
    <script>
        //var editor = new FroalaEditor('#qeditor');
        tinymce.init({ selector:'.optioneditor',menubar : false,
            toolbar: [
            "superscript subscript bold italic underline",
            ],
            height : "140"
        });

        tinymce.init({selector:'textarea'})
    </script>
     <script>
        function clickoption1(){
          const inputval1 = tinymce.get("option1").getContent();
          const option1 = document.getElementById('flexRadioDefault1').value= inputval1;
          alert(option1)
       }
       function clickoption2(){
          const inputval2 = tinymce.get("option2").getContent();
          const option2 = document.getElementById('flexRadioDefault2').value= inputval2;
          alert(option2)
       }
       function clickoption3(){
           const inputval3 = tinymce.get("option3").getContent();
           const option3 = document.getElementById('flexRadioDefault3').value= inputval3;
           alert(option3)
       }
       function clickoption4(){
           const inputval4 = tinymce.get("option4").getContent();
           const option4 = document.getElementById('flexRadioDefault4').value= inputval4;
           alert(option4)
       }
       function clickoption5(){
           const inputval5 = tinymce.get("option5").getContent();
           const option5 = document.getElementById('flexRadioDefault5').value= inputval5;
           alert(option5)
       }
   </script>
@endsection
