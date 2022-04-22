<?php
use App\Models\student;
use App\Models\subject;


//function to return date format
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}


//function to get user profile
function getstudent($studentid){
    return student::where('id','=',$studentid)->first();
}

//get all subject function
function getsubject(){
    return subject::all();
}
//get single subject ID
function getsubjectID($subjectname){
    return DB::table('subjects')->where('subjectname','=',$subjectname)->first();
}

//get all question acording to subject and year
function getallquestion($subject, $year){
    return DB::table('questions')->where('subject_id',$subject)->where('year',$year)->get();
}

//get total number of questions
function numberofquestions($subject,$year){
    $query = DB::table('questions')->where('subject_id',$subject)->where('year',$year)->get();
    return $query->count();
}

//get total number of unanswered questions
function number_of_unanswered_questions($subject,$year,$answered_by){
    return 30;
}

//get total number of answered questions
function number_of_answered_questions($subject,$year,$answered_by){
    return 10;
}
