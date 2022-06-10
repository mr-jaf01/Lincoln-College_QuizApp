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
}
