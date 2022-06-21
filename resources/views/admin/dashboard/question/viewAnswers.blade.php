@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Essay Answers')
@section('content')
<div class="container mt-2">
    <div class="row card p-3" style="border-radius: 19px;">
        <div class="col-md-12">
            <div class="card">
                @if (Session::get('success'))
                <script>
                    toastr.success("{!! Session::get('success') !!}")
                </script>
                <!--<div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-success"></p>
                    </div>
                </div>-->
            @endif
            @if (Session::get('fail'))
                <script>
                    toastr.error("{!! Session::get('fail') !!}")
                </script>
                <!--<div class="row">
                    <div class="col-md-12">
                        <p class="alert alert-success"></p>
                    </div>
                </div>-->
            @endif
                <h5 class="card-header d-flex flex-row justify-content-between">
                    <p>
                    Submitted Answer by <strong>{{getstudent($answer->answer_by)->studentname}}</strong> On <strong>{{$answer->created_at}}</strong> <br><small class="text-muted">Below is the full details of the Submission</small>
                    </p>
                    <span class="rounded btn btn-success btn-sm text-white">{{$answer->subject_id}} | {{$answer->qmode == 'mcq' ? Str::upper($answer->qmode) :Str::ucfirst($answer->qmode) }} | {{$answer->year}}</span>
                </h5>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                            Question
                        </div>
                        <div class="col-md-6 text-muted">
                            <p>{!!  html_entity_decode(getQtion($answer->qtion_id)->qtions, ENT_QUOTES, 'UTF-8') !!}<p>
                        </div>
                    </div>
                    <hr class="my-1" />
                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                           Question Instructions
                        </div>

                        <div class="col-md-6">
                            {!! html_entity_decode(getQtion($answer->qtion_id)->Instruction) !!}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                           Answer
                        </div>

                        <div class="col-md-6">
                            {!! html_entity_decode($answer->qtion_ans) !!}
                        </div>
                    </div>

                    <hr class="my-1" />
                    <div class="row mb-3">
                        <div class="col-md-6 font-weight-bold">
                           Answer Images or Files
                        </div>

                        <div class="col-md-6 d-flex flex-column">
                          @foreach (json_decode($answer->ans_image) as $image)
                                <a class="btn btn-info btn-sm rounded mb-1" style="width: 100px;" href="{{asset('answer_images/'.$image)}}">Solution {{ $loop->iteration }}</a>
                          @endforeach
                        </div>
                    </div>
                    <hr class="my-1" />
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="{{route('save.remark')}}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text bg-red-400 text-white" for="inputGroupSelect01">Select Remark Status</label>
                                    </div>
                                    <select name="remark" class="custom-select  shadow-none" id="inputGroupSelect01" >
                                      <option value="pass">Pass</option>
                                      <option value="fail">Fail</option>
                                    </select>
                                  </div>
                                  <input type="hidden" name="qtion_id" value="{{$answer->qtion_id}}" />
                                  <input type="hidden" name="answer_by" value="{{$answer->answer_by}}" />
                                  <button style="border-radius: 19px;" class="btn w-full bg-red-500 text-white hover:bg-red-700" type="submit">Save Remark</button>
                            </form>
                        </div>
                    </div>

                </div>
              </div>
        </div>
    </div>
</div>
@endsection
