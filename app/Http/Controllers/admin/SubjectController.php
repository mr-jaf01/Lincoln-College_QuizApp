<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    // subject get function
    public function subject(){
        return view('admin.dashboard.subject.createSubject');
    }

    // save new subject function
    public function saveSubject(Request $request){
        return $request->input();
    }

    //show all subject function
    public function showSubject(){
        return view('admin.dashboard.subject.viewSubject');
    }
}
