@extends('admin.dashboard.layouts.masterview')
@section('tittle', 'Dashboard')
@section('content')

<div class="container mt-2">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card" style="border-radius: 19px;">
                <h5 class="card-header d-flex flex-row justify-content-between" style="border-radius: 19px;">
                    QUESTIONS BANK
                    <i class="bi bi-question-square text-red-500"></i>
                </h5>
                <div class="card-body">
                  <h5 class="card-title">Total Number Of Questions : <span class="font-weight-bold text-red-500">{{floor(number_format(number_of_all_questions(), 2))}}</span></h5>
                  <div class="">
                    <div id="piechart" style="width: 100%; height: 100%"></div>
                  </div>
                  <hr class="my-1" />
                  <div class="d-flex flex-row justify-content-between">
                      <span></span>
                      <a href="{{route('admin.dashboard.question.viewQuestion')}}" style="border-radius:19px;" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700">See all Questions <i class="bi bi-arrow-right-circle"></i></a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="border-radius: 19px;">
                <h5 class="card-header d-flex flex-row justify-content-between" style="border-radius: 19px;">
                    SUBJECTS MODULE
                    <i class="bi bi-book text-red-500"></i>
                </h5>
                <div class="card-body">
                  <h5 class="card-title">Total Number Of Subjects : <span class="font-weight-bold text-red-500">{{floor(number_format(numberofsubject(), 2))}}</span></h5>
                <div class="d-flex flex-row justify-content-between">
                    <span></span>
                    <a href="{{route('admin.dashboard.subject.viewSubject')}}" style="border-radius:19px;" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700">See all Subjects <i class="bi bi-arrow-right-circle"></i></a>
                </div>
                </div>
              </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card" style="border-radius: 19px;">
                <h5 class="card-header d-flex flex-row justify-content-between" style="border-radius: 19px;">
                    STUDENTS MODULE
                    <i class="bi bi-people text-red-500"></i>
                </h5>
                <div class="card-body">
                  <h5 class="card-title">Total Number Of Students : <span class="font-weight-bold text-red-500">{{floor(number_format(numberofstudents(), 2))}}</span></h5>
                <div class="d-flex flex-row justify-content-between">
                    <span></span>
                    <a href="{{route('admin.dashboard.question.viewQuestion')}}" style="border-radius:19px;" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700">See all Students <i class="bi bi-arrow-right-circle"></i></a>
                </div>
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="border-radius: 19px;">
                <h5 class="card-header d-flex flex-row justify-content-between" style="border-radius: 19px;">
                    TEACHERS MODULE
                    <i class="bi bi-person text-red-500"></i>
                </h5>
                <div class="card-body">
                  <h5 class="card-title">Total Number Of Teachers : <span class="font-weight-bold text-red-500">{{floor(number_format(numberofusers(), 2))}}</span></h5>
                <div class="d-flex flex-row justify-content-between">
                    <span></span>
                    <a href="{{route('admin.dashboard.users')}}" style="border-radius:19px;" class="btn bg-red-500 p-2 text-white btn-sm hover:bg-red-700">See all Users <i class="bi bi-arrow-right-circle"></i></a>
                </div>
                </div>
              </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card" style="border-radius: 19px;">
                <h5 class="card-header" style="border-radius: 19px;">Log</h5>
                <div class="card-body">
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <p class="card-text font-italic text-red-500">Last Login on {{now()}}</p>
                </div>
              </div>
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

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['English',{{number_Qtion_by_subject('English')}}],
          ['Mathematics',{{number_Qtion_by_subject('Mathematics')}}],
          ['Physics',{{number_Qtion_by_subject('Physics')}}],
          ['Chemistry',{{number_Qtion_by_subject('Chemistry')}}],
          ['Biology',{{number_Qtion_by_subject('Biology')}}],
          ['History',{{number_Qtion_by_subject('History')}}]
        ]);
        var options = {
          title: 'Question by Subject'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
@endsection
