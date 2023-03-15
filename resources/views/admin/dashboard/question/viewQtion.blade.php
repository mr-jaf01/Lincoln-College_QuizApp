@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'View Questions')
@section('content')
 <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 19px;">
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
                            <p class="alert alert-danger"></p>
                        </div>
                    </div>-->
                @endif
                    <h5 class="card-header mb-2 d-flex flex-row justify-content-between" style="border-radius: 19px;">
                        <span>All Quiz Questions</span>
                        <a href="{{route('admin.dashboard.question.questionmode')}}" style="border-radius: 19px;" class="btn bg-red-500 hover:bg-red-600 text-white btn-sm">CREATE NEW QUESTION</a>
                    </h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">

                        <table class="table table-bordered small" id="myTable">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Question</th>
                              <th>Subject</th>
                              <th>Year</th>
                              <th>Question Type</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($questions as $question)
                            <tr>
                                <td>
                                  <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$question->id}}</strong>
                                </td>
                                <td><a href="/admin/dashboard/question/view/{{$question->id}}?info" class="btn btn-primary btn-sm">View Question</a></td>
                                <td>{{$question->subject_id}}</td>
                                <td>{{$question->year}}</td>
                                <td>{{$question->qmode}}</td>
                                    <td>
                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted sr-only">Action</span>
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="/admin/dashboard/question/view/{{$question->id}}?update">Edit</a>
                                        <a class="dropdown-item" href="/admin/dashboard/question/delete/{{$question->id}}">Remove</a>
                                      </div>
                                    </td>
                              </tr>
                            @endforeach

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>

<!-- Button trigger modal -->
<!-- Modal -->
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
    </script>
<script src="{{asset('client/js/popper.min.js')}}"></script>
<script src="{{asset('client/js/moment.min.js')}}"></script>
<script src="{{asset('client/js/simplebar.min.js')}}"></script>
<script src="{{asset('client/js/tinycolor-min.js')}}"></script>
<script src="{{asset('client/js/config.js')}}"></script>
<script src="{{asset('client/js/apps.js')}}"></script>
@endsection


