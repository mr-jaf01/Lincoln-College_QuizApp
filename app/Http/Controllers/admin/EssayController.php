<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\answers;

class EssayController extends Controller
{
    public function getEssayAnswer(){
        $essayAnswer = answers::where('qmode', 'essay')->get();
        return  view('admin.dashboard.question.essayAnswer', compact('essayAnswer'));
    }

    public function getsingleAnswer($id){
        $answer = answers::find($id);
        return view('admin.dashboard.question.viewAnswers', compact('answer'));
    }

    public function saveRemark(Request $request){
        if($request->remark == 'pass'){
            $save_remark = answers::where('qtion_id',$request->qtion_id)->where('answer_by', $request->answer)->update(['score'=>1]);
        }else{
            $save_remark = answers::where('qtion_id',$request->qtion_id)->where('answer_by', $request->answer)->update(['score'=>0]);
        }
        return back()->with('success', 'Remark Updated Success');
    }
}
