@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Subject')
@section('content')
 <div class="container mt-2">
    <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius:19px;">
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
                    @if (Session::get('updated'))
                    <div class="row">
                        <div class="col-md-12">
                            <p class="alert alert-success">{{Session::get('updated')}}</p>
                        </div>
                    </div>
                    @endif
                    <h5 class="card-header mb-2 d-flex flex-row justify-content-between" style="border-radius: 19px;">
                        <span class="">ALL QUIZ SUBJECT</span>
                        <a style="border-radius: 19px;" href="{{route('admin.dashboard.subject.createSubject')}}?hide" class="btn bg-red-500 text-white btn-sm hover:bg-red-600">CREATE NEW SUBJECT</a>
                    </h5>
                    <div class="card-body">
                      <div class="table-responsive text-nowrap">
                        <table class="table table-bordered" id="myTable">
                          <thead>
                            <tr>
                              <th>Subject ID</th>
                              <th>Subject Name</th>
                              <th>Created At</th>
                              <th>Updated At</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($subjects as $subject)
                            <tr>
                                <td>
                                  <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$subject->id}}</strong>
                                </td>
                                <td>{{$subject->subjectname}}</td>
                                <td>{{$subject->created_at}}</td>
                                <td>{{$subject->updated_at}}</td>
                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/admin/dashboard/subject/createSubject?update=1&subjectID={{$subject->id}}&subject={{$subject->subjectname}}">Edit</a>
                                    <a class="dropdown-item" href="{{route('admin.dashboard.subject.delete',['id' => $subject->id])}}">Remove</a>
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


