<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\questions;

class QuestionController extends Controller
{
     /**
      * It returns the view of createQtion.
      *
      * @return A view
      */
      public function question(){
        return view('admin.dashboard.question.createQtion');
    }

   /**
    * It saves the question in the database.
    *
    * @param Request request The request object.
    *
    * @return The return value is the value of the last expression evaluated.
    */
    public function saveQuestion(Request $request){
        $qtionimage_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move('question_image/',$qtionimage_name);
        $new_question = new questions();
        $new_question->qtions = $request->question;
        $new_question->opt1 = $request->option1;
        $new_question->opt2 = $request->option2;
        $new_question->opt3 = $request->option3;
        $new_question->opt4 = $request->option4;
        $new_question->opt5 = $request->option5;
        $new_question->correct_opt = $request->correct_answer;
        $new_question->subject_id = $request->subject;
        $new_question->year = $request->year;
        $new_question->instruction = $request->instruction;
        $new_question->qimage = 'question_image/'.$qtionimage_name;
        $new_question->qmode = $request->qtiontype;
        $status = $new_question->save();
        if($status){
            return redirect('/admin/dashboard/question/questionmode')->with('success','Question Created Successfully');
        }else{
            return redirect('/admin/dashboard/question/questionmode')->with('fail','Unable to create Question');
        }

    }

    /**
     * It returns the view of the question mode.
     */
    public function questionmode(){
        return view('admin.dashboard.question.qtionMode');
    }

   /**
    * A function that is used to check the question type.
    *
    * @param Request request The request object.
    */
    public function questionmodecheck(Request $request){
        $qtiontype = $request->questiontype;
        $subject = $request->subject;
        $year = $request->year;
        return view('admin.dashboard.question.createQtion', compact('qtiontype','subject','year'));
    }

    /**
     * It gets a question by its ID and returns a view with the question
     *
     * @param id The id of the question you want to view.
     */
    public function getquestionByID($id){
        $qtion = questions::findorfail($id);
        return view('admin.dashboard.question.view',compact('qtion'));
    }

    /**
     * It shows the question
     */
    public function showQuestion(){
        $questions = questions::all();
        return view('admin.dashboard.question.viewQtion', compact('questions'));
    }

   /**
    * It updates the question.
    *
    * @param Request request The request object.
    *
    * @return The return value is the value of the last expression evaluated.
    */
    public function Update(Request $request){
        if ($request->has('image')){
            $qtionimage_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->move('question_image/',$qtionimage_name);
            $new_question = questions::find($request->id);
            $new_question->qtions = $request->question;
            $new_question->opt1 = $request->option1;
            $new_question->opt2 = $request->option2;
            $new_question->opt3 = $request->option3;
            $new_question->opt4 = $request->option4;
            $new_question->opt5 = $request->option5;
            $new_question->correct_opt = $request->correct_answer;
            $new_question->subject_id = $request->subject;
            $new_question->year = $request->year;
            $new_question->instruction = $request->instruction;
            $new_question->qimage = 'question_image/'.$qtionimage_name;
            $new_question->qmode = $request->questiontype;
            $status = $new_question->save();
            if($status){
                return redirect('/admin/dashboard/question/view/'.$request->id.'?info')->with('success','Question Updated Successfully');
            }else{
                return redirect('/admin/dashboard/question/view/'.$request->id.'?info')->with('fail','Question Update Fail');
            }
        }else{
            $new_question = questions::find($request->id);
            $new_question->qtions = $request->question;
            $new_question->opt1 = $request->option1;
            $new_question->opt2 = $request->option2;
            $new_question->opt3 = $request->option3;
            $new_question->opt4 = $request->option4;
            $new_question->opt5 = $request->option5;
            $new_question->correct_opt = $request->correct_answer;
            $new_question->subject_id = $request->subject;
            $new_question->year = $request->year;
            $new_question->instruction = $request->instruction;
            $new_question->qimage = $request->image_link;
            $new_question->qmode = $request->questiontype;
            $status = $new_question->save();
            if($status){
                return redirect('/admin/dashboard/question/view/'.$request->id.'?info')->with('success','Question Updated Successfully');
            }else{
                return redirect('/admin/dashboard/question/view/'.$request->id.'?info')->with('fail','Question Update Fail');
            }
        }
    }


   /**
    * Delete the question
    *
    * @param id The id of the question you want to delete.
    */
    public function delete($id){
        $deleteqtion = questions::find($id);
        $status = $deleteqtion->delete();
        if($status){
            return back()->with('success','Question Remove Successfully');
        }else{
            return back()->with('fail','Subject Remove Fail');
        }
    }
}
