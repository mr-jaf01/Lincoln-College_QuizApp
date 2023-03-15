@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Essay Answers')
@section('content')

    <div id="container mt-2">
                 @if (Session::get('success'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                        </div>
                    </div>
                 @endif
                 @if (Session::get('error'))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                        </div>
                    </div>
                @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border-radius: 19px;">
                    <h5 class="card-header mb-2 d-flex flex-row justify-content-between" style="border-radius: 19px;">Support Center</h5>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">

                          <table class="table table-bordered small" id="myTable">
                            <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>NAME</th>
                                  <th>EMAIL</th>
                                  <th>MESSAGE</th>
                                  <th>Actions</th>
                                </tr>

                                <tbody>
                                    @foreach ($all_msg as $msg)
                                        <tr>
                                            <td>{{$msg->id}}</td>
                                            <td>{{$msg->name}}</td>
                                            <td>{{$msg->email}}</td>
                                            <td>{{$msg->message}}</td>
                                            <td>
                                                @if ($msg->replied == 'no')
                                                <a href="/admin/dashboard/chat-support-center/reply?id={{$msg->id}}&n={{$msg->name}}&email={{$msg->email}}&msg={{$msg->message}}" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700" style="border-radius: 19px;">Send a Reply</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </thead>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
