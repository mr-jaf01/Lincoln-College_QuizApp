<?php
use App\Models\student;
use App\Models\subjects;
use App\Models\questions;
use App\Models\answers;
use App\Models\User;
use App\Models\performance;
use App\Models\history;
use App\Models\spmprogram;
use Illuminate\Support\Facades\DB;

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;




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
    return DB::table('questions')->inRandomOrder('id')->where('subject_id',$subject)->where('year',$year)->paginate(1);
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
function getoption($qtion,$user,$subject,$year){
    return DB::table('answers')->select('qtion_ans')->where('qtion_id',$qtion)->where('answer_by',$user)->where('subject_id',$subject)->where('year',$year)->pluck('qtion_ans')->first();
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

/**
 * It returns the correct answer for a question, given the question ID, subject and year
 *
 * @param qtionID The question ID
 * @param subject The subject ID
 * @param year The year of the exam
 *
 * @return The correct answer for the question.
 */
function getCorrectAns($qtionID,$subject,$year){
    return DB::table('questions')->select('correct_opt')->where('id',$qtionID)->where('subject_id',$subject)->where('year',$year)->pluck('correct_opt')->first();
}

/**
 * It checks if the user has taken the quiz before, if not, it saves the quiz history.
 *
 * @param user_id The user's ID
 * @param subject_id The id of the subject you want to get the questions from.
 * @param year the year of the quiz
 */
function quiz_history($user_id,$subject_id,$year){
    $check_update = history::where('user_id',$user_id)->where('subject_id',$subject_id)->where('year',$year)->count();
    if($check_update > 0){

    }else{
        $save_quiz = new history();
        $save_quiz->user_id = $user_id;
        $save_quiz->subject_id = $subject_id;
        $save_quiz->year = $year;
        $save_quiz->save();
    }
}

/**
 * It returns all the history objects where the user_id is equal to the user_id passed to the function.
 *
 * @param user_id The user's id
 *
 * @return An array of history objects
 */
function get_quiz_history($user_id){
    return DB::table('histories')->where('user_id',$user_id)->orderBy('id','desc')->get();

}



/**
 * It returns the sum of the score column in the answers table where the subject_id is equal to the
 *  variable, the year is equal to the  variable, and the answer_by column is equal to the
 *  variable
 *
 * @param subject the subject id
 * @param year the year of the exam
 * @param userid the user id of the user who answered the question
 *
 * @return The sum of the score column in the answers table where the subject_id is equal to the
 *  variable, the year is equal to the  variable, and the answer_by is equal to the
 *  variable.
 */
function get_sum($subject, $year, $userid){
    return DB::table('answers')->where('subject_id',$subject)->where('year',$year)->where('answer_by',$userid)->sum('score');
}



function Number_of_failAnswer($subject,$year,$userid){
    return DB::table('answers')->where('subject_id',$subject)->where('year',$year)->where('answer_by',$userid)->where('score',0)->count();
}

/**
 * <code>returns the number of correct answers for a given subject, year and userid</code>
 *
 * @param subject the subject id
 * @param year the year of the exam
 * @param userid The user id of the user who answered the question
 *
 * @return The number of correct answers for a particular subject, year and userid.
 */
function Number_of_correctAnswer($subject,$year,$userid){
    return DB::table('answers')->where('subject_id',$subject)->where('year',$year)->where('answer_by',$userid)->where('score',1)->count();
}


/**
 * It checks if a record exists in the database, if it does, it updates it, if it doesn't, it creates
 * it.
 *
 * @param userid The user's id
 * @param subject The subject ID
 * @param year The year of the exam
 * @param per percentage
 * @param status 1 = Pass, 2 = Fail, 3 = Absent
 */
function performance($userid,$subject,$year,$per,$status){
    $check_exit = performance::where('user_id',$userid)->where('subject_id',$subject)->where('year',$year)->update(['percentage'=>$per,'status'=>$status]);
    if($check_exit){
    }else{
        $save_performance = new performance();
        $save_performance->user_id = $userid;
        $save_performance->subject_id = $subject;
        $save_performance->year = $year;
        $save_performance->percentage = $per;
        $save_performance->status = $status;
        $save_performance->save();
    }
}


/**
 * It returns the performance of a student in a particular subject in a particular year.
 *
 * @param userid The id of the user
 * @param subject the subject id
 * @param year the year of the performance
 *
 * @return A single row from the performance table.
 */
function get_performance($userid,$subject,$year){
    return performance::where('user_id',$userid)->where('subject_id',$subject)->where('year',$year)->first();
}


/**
 * It takes the number of correct answers and the total number of questions and returns the percentage
 * of correct answers.
 *
 * @param QAns The number of questions answered correctly
 * @param numberOfQ The total number of questions in the quiz.
 *
 * @return The percentage of correct answers.
 */
function get_percentage($QAns, $numberOfQ){
   return round((($QAns / $numberOfQ) * 100),2);
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

/**
 * It returns the parent's email address of a student.
 *
 * @param user_id The user_id of the student
 *
 * @return the student object.
 */
function getparentEmail($user_id){
   return student::find($user_id);
}

/**
 * It sends an email to the address specified in the  variable.
 *
 * @param to The email address of the person you're sending the email to.
 * @param subject The subject of the email.
 * @param year The year of the exam
 * @param score The score of the user
 * @param percentage The percentage of the year that has passed.
 */
function sendEmail($to,$subject,$year,$score,$percentage){
    $transport = Transport::fromDsn('smtp://SPMSPS@1690.tk:1994_Xujaf@1690.tk:465');
    //$mailer = new Mailer($transport);

    //$transport = Transport::fromDsn('smtp://localhost');
    $mailer = new Mailer($transport);

    $email = (new Email())
        ->from('SPMSPS@1690.tk')
        ->to($to)
        //->cc('cc@example.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject('SPM STUDENT PREPARATION SYSTEM QUIZ SCORE')
        ->html('<p>Your Score for '.$subject.' '.$year.' Quiz is '.$score.' '.' and the Percentage is '.$percentage.'%'.'</p>');

    $mailer->send($email);

}

/**
 * It returns all the rows from the spmprogram table
 *
 * @return All the data in the spmprogram table.
 */
function getspmprogram(){
    return spmprogram::all();
}

/**
 * It returns a question object from the database based on the question id.
 *
 * @param qtion_id The ID of the question you want to get.
 *
 * @return The question with the id of
 */
function getQtion($qtion_id){
    return questions::find($qtion_id);
}
