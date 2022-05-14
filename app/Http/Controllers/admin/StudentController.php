<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    /**
     * It returns all the students in the database.
     */
    public function allStudent(){
        $all_stud = student::all();
        return view('admin.dashboard.student.viewStudent', compact('all_stud'));
    }
}
