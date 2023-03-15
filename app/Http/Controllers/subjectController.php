<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Session;

class subjectController extends Controller
{
    public function subject(){
        $route = Route::current()->getName();
        if($route == "History"){

           $subjectdetails = getsubjectID("History");
           return view('subject.panel', compact('subjectdetails'));


        }else if($route == "Mathematics"){

            $subjectdetails = getsubjectID("Mathematics");
            return view('subject.panel', compact('subjectdetails'));


        }else if($route == "English"){

            $subjectdetails = getsubjectID("English");
            return view('subject.panel', compact('subjectdetails'));


        }else if($route == "Biology"){

            $subjectdetails = getsubjectID("Biology");
            return view('subject.panel', compact('subjectdetails'));


        }else if($route == "Chemistry"){

            $subjectdetails = getsubjectID("Chemistry");
            return view('subject.panel', compact('subjectdetails'));


        }else if($route == "Physics"){

            $subjectdetails = getsubjectID("Physics");
            return view('subject.panel', compact('subjectdetails'));

        }else if($route == "Sejarah"){
            $subjectdetails = getsubjectID("Sejarah");
            return view('subject.panel', compact('subjectdetails'));
        }else if($route == "Bahasa-Melayu"){
            $subjectdetails = getsubjectID("Bahasa-Melayu");
            return view('subject.panel', compact('subjectdetails'));
        }else{
            return "No Content for this Subject";
        }

    }


    //subject details function to panel blade view
    public function qdetails(Request $request){
        $subject = $request->subject;
        $qmode = $request->qmode;
        $year = $request->year;
        $all_question = getallquestion($subject, $year, $qmode);
        $totalnumberofquestion = numberofquestions($subject,$year,$qmode);
        $totalnumber_unanswered = max(numberofquestions($subject,$year,$qmode) - number_of_answered_questions($subject,$year,Session::get('studentid'), $qmode),0);
        $totalnumber_answer = number_of_answered_questions($subject,$year,Session::get('studentid'),$qmode);
        return view('subject.respone_panel', compact('subject', 'qmode', 'year','totalnumberofquestion','totalnumber_unanswered','totalnumber_answer'));;
    }
}
