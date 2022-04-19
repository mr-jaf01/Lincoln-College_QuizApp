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

