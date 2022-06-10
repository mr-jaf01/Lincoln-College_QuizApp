<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\answers;
use Session;

class quizController extends Controller
{

    /**
     * It gets all the questions from the database and displays them to the user.
     *
     * @param subject The subject you want to take the quiz on.
     * @param year The year of the question paper
     */
   /**/
    public function start($subject, $year){
        $all_question = getallquestion($subject, $year);
        if(count($all_question) <= 0){
            return back()->with('alert','No Available Questions, Please Select other Subject or Select diffrent Year');
        }else{
            quiz_history(Session::get('studentid'),$subject,$year);
            return view('quiz.start',compact('all_question'));
        }

    }


    /**
     * It returns a view called `check_answer`
     *
     * @param Request request This is the request object that contains all the information about the
     * current request.
     *
     * @return A view called check_answer.
     */
    public function check_answer(Request $request){
        return view('quiz.check_answer');
    }


   /**
    * It saves the answer to the database
    *
    * @param Request request The request object.
    *
    * @return the view of the page.
    */
   /**
    * It checks if the user has answered the question before, if yes, it updates the answer, if no, it
    * saves the answer
    *
    * @param Request request This is the request object that contains all the information about the
    * request.
    *
    * @return the view of the page.
    */
   /**
    * It checks if the answer is correct, if it is, it updates the score to 1, if not, it updates the
    * score to 0
    *
    * @param Request request The request object.
    *
    * @return A function is being returned.
    */
    public function save_answer(Request $request){
        if(getCorrectAns($request->qtion,$request->subject,$request->year) == $request->option){
            $check_option = answers::where('qtion_id',$request->qtion)->where('answer_by',$request->answer_by)->update(['qtion_ans'=> $request->option,'score'=>1]);
        }else{
            $check_option = answers::where('qtion_id',$request->qtion)->where('answer_by',$request->answer_by)->update(['qtion_ans'=> $request->option,'score'=>0]);
        }
       if($check_option){
           $request->session()->put('selectedoption',$request->option);
           return back()->with('pagination','Record Updated')->with('button',$request->button);
        }else{
            $save = new answers();
            $save->qtion_id = $request->qtion;
            $save->qtion_ans = $request->option;
            $save->answer_by = $request->answer_by;
            $save->subject_id = $request->subject;
            $save->qmode = $request->qmode;
            if(getCorrectAns($request->qtion,$request->subject,$request->year) == $request->option){
                $save->score = 1;
            }else{
                $save->score = 0;
            }
            $save->year = $request->year;
            $save->save();
            $request->session()->put('selectedoption',$request->option);
            return back()->with('pagination','Answer Recorded')->with('button',$request->button);
        }
    }

    /**
     * The function quizDone() returns the view quiz_done.blade.php
     *
     * @return A view called quiz_done.
     */
    public function quizDone(){
        return view('quiz.quiz_done');
    }
}
