<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\answers;
use Session;

class quizController extends Controller
{
    //quiz start function.
    public function start($subject, $year){
        $all_question = getallquestion($subject, $year);
        if(count($all_question) <= 0){
            return back()->with('alert','No Available Questions, Please Select other Subject or Select diffrent Year');
        }else{
            return view('quiz.start',compact('all_question'));
        }

    }

    //check if you are sure about your answer function
    public function check_answer(Request $request){
        return view('quiz.check_answer');
    }

    //save answer to db function
    public function save_answer(Request $request){
       $check_option = answers::where('qtion_id',$request->qtion)->where('answer_by',$request->answer_by)->update(['qtion_ans'=> $request->option]);
       if($check_option){
           $request->session()->put('selectedoption',$request->option);
           return back()->with('pagination','Record Updated')->with('button',$request->button);
        }
        $save = new answers();
        $save->qtion_id = $request->qtion;
        $save->qtion_ans = $request->option;
        $save->answer_by = $request->answer_by;
        $save->save();
        $request->session()->put('selectedoption',$request->option);
        return back()->with('pagination','Answer Recorded')->with('button',$request->button);
    }
}
