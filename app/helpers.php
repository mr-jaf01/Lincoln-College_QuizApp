<?php
use App\Models\student;
use App\Models\subjects;
use App\Models\questions;
use App\Models\answers;
use App\Models\User;



/**
 * It takes a date in the format of Y-m-d and returns it in the format you specify
 *
 * @param date The date you want to change the format of.
 * @param date_format The format you want to convert the date to.
 */
function changeDateFormate($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

/**
 * It returns the first student object from the database where the id is equal to the studentid passed
 * in
 *
 * @param studentid The id of the student you want to get.
 *
 * @return The first student in the database with the id of
 */
function getstudent($studentid){
    return student::where('id','=',$studentid)->first();
}



/**
 * It returns all the subjects in the database
 *
 * @return All the subjects in the database.
 */
function getsubject(){
    return subjects::all();
}



/**
 * It returns the first row of the subjects table where the subjectname column is equal to the
 *  parameter.
 *
 * @param subjectname The name of the subject you want to get the ID of.
 *
 * @return The first row of the table subjects where the subjectname is equal to the subjectname passed
 * in.
 */
function getsubjectID($subjectname){
    return DB::table('subjects')->where('subjectname','=',$subjectname)->first();
}



/**
 * It returns a paginated list of questions from the database where the subject_id and year are equal
 * to the parameters passed to the function.
 *
 * @param subject the subject id
 * @param year the year of the question
 *
 * @return A collection of questions
 */
function getallquestion($subject, $year){
    return DB::table('questions')->where('subject_id',$subject)->where('year',$year)->simplePaginate(1);
}


/**
 * It returns the number of questions in a particular subject and year.
 *
 * @param subject The subject id
 * @param year the year of the exam
 *
 * @return The number of questions in the database for a given subject and year.
 */
function numberofquestions($subject,$year){
    $query = DB::table('questions')->where('subject_id',$subject)->where('year',$year)->get();
    return $query->count();
}


/**
 * It returns the number of answered questions for a particular subject, year and answered by.
 *
 * @param subject the subject id
 * @param year the year of the exam
 * @param answered_by The user id of the user who answered the question
 *
 * @return The number of answered questions
 */
function number_of_answered_questions($subject,$year,$answered_by){
    $getcount = DB::table('answers')->where('subject_id',$subject)->where('year',$year)->where('answer_by',$answered_by)->get();
    $totalnum = $getcount->count();
    return $totalnum;
}


/**
 * It returns the answer to a question by a user.
 *
 * @param qtion The question ID
 * @param user The user id of the user who answered the question
 */
function getoption($qtion,$user){
    return DB::table('answers')->select('qtion_ans')->where('qtion_id',$qtion)->where('answer_by',$user)->pluck('qtion_ans')->first();
}

/**
 * It returns all the answers for a given subject, year and user
 *
 * @param subject The subject ID
 * @param year the year of the exam
 * @param user the user id
 */
function AnswerByuser($subject,$year,$user){
    return answers::where('subject_id',$subject)->where('year',$year)->where('answer_by',$user)->get();
}










//Admin helper functions below
/**
 * It returns the number of all questions in the database.
 *
 * @return The number of all questions in the database.
 */
function number_of_all_questions(){
    return questions::all()->count();
}


/**
 * It returns the number of questions in a subject.
 *
 * @param subject The subject ID
 *
 * @return The number of questions in the database
 */
function number_Qtion_by_subject($subject){
    return questions::where('subject_id',$subject)->count();
}

/**
 * It returns a single user from the database based on the id passed to it
 *
 * @param id The id of the user you want to get.
 *
 * @return The user with the id of
 */
function getsingleUser($id){
    return User::find($id);
}

/**
 * It returns the number of subjects in the database.
 *
 * @return The number of subjects in the database.
 */
function numberofsubject(){
    return subjects::all()->count();
}

/**
 * It returns the number of students in the database
 *
 * @return The number of students in the database.
 */
function numberofstudents(){
    return student::all()->count();
}

/**
 * It returns the number of users in the database
 *
 * @return The number of users in the database.
 */
function numberofusers(){
    return User::all()->count();
}


