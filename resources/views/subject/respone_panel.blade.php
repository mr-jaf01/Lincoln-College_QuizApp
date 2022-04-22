<div class="row justify-content-center">
    <div class="col-md-12">
     <div class="card rounded">
         <div class="card-header">
             <style>
                 .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
                     color : rgb(243, 40, 40);
                     width:200px;
                     border-bottom: 2px solid rgb(243, 40, 40);
                 }
             </style>
             <ul class="d-flex flex-row justify-content-around nav nav-tabs" id="myTab" role="tablist">
                 <li class="nav-item" role="presentation">
                     <a class="nav-link active link-danger d-flex flex-column align-items-center" id="video-tab" data-toggle="tab" href="#video" role="tab" aria-controls="video" aria-selected="true"><i class="bi bi-collection-play"></i>Video </a>
                 </li>
                 <li class="nav-item" role="presentation">
                     <a class="nav-link link-danger d-flex flex-column align-items-center" id="quiz-tab" data-toggle="tab" href="#quiz" role="tab" aria-controls="quiz" aria-selected="false"><i class="bi bi-question-circle"></i>Quiz</a>
                 </li>
             </ul>
         </div>
         <div class="card-body">
             <div class="tab-content" id="myTabContent">
                 <div class="tab-pane fade show active" id="video" role="tabpanel" aria-labelledby="video-tab">
                     <center><span class="alert alert-success text-center">No Content Yet!! - Check back later</span></center>
                 </div>
                 <div class="tab-pane fade" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
                     <div class="row">
                         <div class="col-md-3 mb-2">
                             <div class="card">
                                 <div class="card-header alert alert-info">
                                   Subject
                                 </div>
                                 <div class="card-body">
                                     <span class="font-weight-bold">{{ $subject }} - <small>{{ $year }}</small></span>
                                 </div>
                               </div>
                         </div>
                         <div class="col-md-9">
                             <div class="row justify-content-center d-flex mb-2">
                                 <div role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="--value:{{ $totalnumber_answer }}"></div>
                             </div>
                             <div class="row">
                                 <div class="col-md-4 alert alert-secondary"><p><i class="bi bi-question-circle"></i> Total Number of Questions : <span class="">{{ $totalnumberofquestion }}</span></p></div>
                                 <div class="col-md-4 alert alert-danger"><p><i class="bi bi-x-circle"></i> Unanswered Questions : <span class="font-weight-bold text-red-600">{{ $totalnumber_unanswered }}</span></p></div>
                                 <div class="col-md-4 alert alert-success"><p><i class="bi bi-check-circle"></i> Answered Questions : <span class="font-weight-bold text-green-600">{{ $totalnumber_answer }}</span></p></div>
                             </div>
                             <div class="row justify-content-around d-flex mt-3 mb-3">
                                 <a href="/dashbaord/quiz/{{$subject}}/{{$year}}" class="group relative  flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                     Start Quiz
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
       </div>
    </div>
</div>

