@extends('dashboard.layouts.masterlayout')
@section('tittle', 'Dashboard - Chat Support')
@section('content')

    <section>
                <!--- teacher Chat window --->
        <div id="chat_window" class="mr-8 w-1/5 p-2 shadow-lg bg-white  right-0 bottom-0 absolute rounded-md   z-10">

            <form action="/chat-support" method="POST">
                <div class="modal-body">
                    <label for="name">Your Name</label>
                    <input type="text" required name="name" id="name" class="form-control">

                    <br>


                    <label for="email">Your Email</label>
                    <input type="email" required name="email" id="email" class="form-control" placeholder="example@domain.com">
                    <br>


                    <label for="message">Message / Question</label>
                    <textarea required name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700" style="border-radius: 19px;">Send Message</button>
                </div>
            </form>

        </div>

    </section>
@endsection
