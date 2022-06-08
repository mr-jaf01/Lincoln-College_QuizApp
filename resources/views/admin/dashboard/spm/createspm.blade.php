@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Create SPM Programs')
@section('content')

@if(isset($_GET['new']))
<div class="container card mt-2" style="height:550px; border-radius: 19px;">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <p id="respone"></p>
            <div class="card">
                <h5 class="card-header" style="border-radius: 19px;">CREATING NEW SPM PROGRAM</h5>
                <div class="card-body">
                    <form action="{{route('admin.dashboard.spm.save')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">SPM Program Name:</label>
                            <textarea required name="spm" class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span></span>
                            <button style="border-radius: 19px;" class="btn bg-red-500 hover:bg-red-600 text-white">Save SPM Program</button>
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
                <h5 class="card-header">UPDATING SPM PROGRAM</h5>
                <div class="card-body">
                    <form action="{{route('admin.dashboard.spm.update')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">SPM Program Name:</label>
                            <input type="text" required name="spm" value="{{$_GET['spmname']}}" class="form-control p-5" id="message-text" />
                            <input type="hidden" name="spmID" value="{{$_GET['spmID']}}" />
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
