@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Quiz start')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @foreach (AnswerByuser($_GET['subject'],$_GET['year'],$_GET['answerBy']) as $all_ans)
                {{$all_ans->qtion_id}}
                {{$all_ans->qtion_ans}}
                {{$all_ans->subject_id}}
                {{$all_ans->year}}
                <hr class="my-1" />
            @endforeach
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
