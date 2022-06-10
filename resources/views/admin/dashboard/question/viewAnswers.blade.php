@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Essay Answers')
@section('content')
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
                    Submitted Answer by <br><small class="text-muted">Below is the full details of the Submission</small>
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
                           Answer Image
                        </div>

                        <div class="col-md-6">
                            {{getQtion($answer->qtion_id)->qimage}}
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
