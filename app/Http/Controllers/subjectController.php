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


        }else{
            return "No Content for this Subject";
        }

    }

    //subject details function to panel blade view
    public function qdetails(Request $request){
        $subject = $request->subject;
        $qtype = $request->qtype;
        $year = $request->year;
        $all_question = getallquestion($subject, $year);
        $totalnumberofquestion = numberofquestions($subject,$year);
        $totalnumber_unanswered = max(numberofquestions($subject,$year) - number_of_answered_questions($subject,$year,Session::get('studentid')),0);
        $totalnumber_answer = number_of_answered_questions($subject,$year,Session::get('studentid'));
        return view('subject.respone_panel', compact('subject', 'qtype', 'year','totalnumberofquestion','totalnumber_unanswered','totalnumber_answer'));;
    }
}
