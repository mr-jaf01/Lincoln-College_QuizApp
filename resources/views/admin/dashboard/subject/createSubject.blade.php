@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Create Subject')
@section('content')

@if(isset($_GET['hide']))
<div class="container card mt-2" style="height:550px; border-radius: 19px;">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <p id="respone"></p>
            <div class="card">
                <h5 class="card-header" style="border-radius: 19px;">CREATING NEW SUBJECT</h5>
                <div class="card-body">
                    <form action="{{route('admin.dashboard.subject.save')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Subject Name:</label>
                            <textarea required name="subject" class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span></span>
                            <button style="border-radius: 19px;" class="btn bg-red-500 hover:bg-red-600 text-white">Save Subject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(isset($_GET['update']))
<div class="container card" style="height:550px;">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <p id="respone2"></p>
            <div class="card">
                <h5 class="card-header">UPDATING SUBJECT</h5>
                <div class="card-body">
                    <form action="{{route('admin.dashboard.subject.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Subject Name:</label>
                            <input type="text" required name="subject" value="{{$_GET['subject']}}" class="form-control p-5" id="message-text" />
                            <input type="hidden" name="subjectID" value="{{$_GET['subjectID']}}" />
                        </div>
                        <div class="d-flex justify-content-between">
                            <span></span>
                            <button class="btn bg-red-500 hover:bg-red-600 text-white">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

    <script src="{{asset('client/js/jquery.min.js')}}"></script>
    <script src="{{asset('client/js/popper.min.js')}}"></script>
    <script src="{{asset('client/js/moment.min.js')}}"></script>
    <script src="{{asset('client/js/simplebar.min.js')}}"></script>
    <script src="{{asset('client/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('client/js/config.js')}}"></script>
    <script src="{{asset('client/js/apps.js')}}"></script>
@endsection
