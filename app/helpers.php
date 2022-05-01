<?php
use App\Models\student;
use App\Models\subjects;
use App\Models\questions;
use App\Models\answers;


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
    return subjects::all();
}
//get single subject ID
function getsubjectID($subjectname){
    return DB::table('subjects')->where('subjectname','=',$subjectname)->first();
}

//get all question acording to subject and year
function getallquestion($subject, $year){
    return DB::table('questions')->where('subject_id',$subject)->where('year',$year)->simplePaginate(1);
}

//get total number of questions
function numberofquestions($subject,$year){
    $query = DB::table('questions')->where('subject_id',$subject)->where('year',$year)->get();
    return $query->count();
}

//get total number of answered questions
function number_of_answered_questions($subject,$year,$answered_by){
    $getcount = DB::table('answers')->where('subject_id',$subject)->where('year',$year)->where('answer_by',$answered_by)->get();
    $totalnum = $getcount->count();
    return $totalnum;
}

// get selected user option for a particular question
function getoption($qtion,$user){
    return DB::table('answers')->select('qtion_ans')->where('qtion_id',$qtion)->where('answer_by',$user)->pluck('qtion_ans')->first();
}
