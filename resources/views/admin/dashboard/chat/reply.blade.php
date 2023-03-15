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
                    <h5 class="card-header mb-2" style="border-radius: 19px;">Replying to <strong class="bg-success p-1 rounded-sm text-white">{{Str::upper(request('n'))}}</strong> - {{request('email')}}</h5>

                    <div class="card-body">
                        <p style="margin-bottom: 20px;">{{request('msg')}}</p>
                        <hr style="margin-bottom: 55px;" />
                        <form action="/admin/dashboard/chat-support-center/reply" method="POST">

                            @csrf
                            <label for="message">Type your message</label>
                            <textarea autofocus required placeholder="Type here..." name="message" id="message" cols="30" rows="10" class="form-control"></textarea>



                            <input type="hidden" name="name" value={{request('n')}}>
                            <input type="hidden" name="email" value={{request('email')}}>
                            <input type="hidden" name="id" value={{request('id')}}>

                            <input type="submit" value="Send Message" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700" style="border-radius: 19px; margin-top:20px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
