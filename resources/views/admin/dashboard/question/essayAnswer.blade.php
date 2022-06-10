@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Essay Answers')
@section('content')
 <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 19px;">
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
                        <p class="alert alert-danger">{{Session::get('fail')}}</p>
                    </div>
                </div>
                @endif
                    <h5 class="card-header mb-2 d-flex flex-row justify-content-between" style="border-radius: 19px;">
                        <span>All ESSAY ANSWERS</span>
                    </h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered small" id="myTable">
                          <thead>
                            <tr>
                              <th>Submission ID</th>
                              <th>Subject</th>
                              <th>Year</th>
                              <th>Question Type</th>
                              <th>Score</th>
                              <th>status</th>
                              <th>View</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($essayAnswer as $answer)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$answer->id}}</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$answer->subject_id}}</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$answer->year}}</strong></td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$answer->qmode}}</strong></td>
                                @if ($answer->score > 0)
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Pass</strong></td>
                                @endif
                                @if ($answer->score <= 0)
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Fail</strong></td>
                                @endif
                                @if ($answer->score > 0)
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong class="text-green-600">Marked</strong></td>
                                @endif
                                @if ($answer->score <= 0)
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong class="text-red-600">Not Marked</strong></td>
                                @endif
                                <td><a href="/admin/dashboard/answer/essay/answer/{{$answer->id}}" class="btn btn-primary btn-sm">View Answer</a></td>

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


