<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\student as student;

use Session;



class AuthController extends Controller
{
    //get login page
    public function login()
    {
        if(Session::get('studentid')){
            return redirect('/dashboard');
        }
        return view('auth.login');
    }

    //get register page
    public function register()
    {
        if(Session::get('studentid')){
            return redirect('/dashboard');
        }
        return view('auth.register');
    }

    //authenticate user and login function
    public function userlogin(Request $request){
       $studentinfo = student::where('email','=',$request->email)->first();
       if(!$studentinfo){
           return back()->with('fail','Invalid Login Credentials');
       }else{
           if(Hash::check($request->password, $studentinfo->password)){
             $request->session()->put('studentid',$studentinfo->id);
             return redirect('dashboard');
           }else{
            return back()->with('fail', 'Invalid Login Credentials');
           }
       }
    }

    //add new student to db
    public function addstudent(Request $request)
    {
        if($request->password == $request->cpassword){
            $checkstudent = student::where('email', '=', $request->email)->get();
        $checkcount = $checkstudent->count();
        if ($checkcount > 0) {
            $status = 2;
            return view('auth.success', compact('status'));
        } else {
            $student = new student();
            $student->studentname = $request->name;
            $student->email = $request->email;
            $student->phone = $request->studphone;
            $student->address = $request->studadd;
            $student->gender = $request->studgender;
            $student->program = $request->program;
            $student->password = Hash::make($request->password);
            $student->flink = $request->flink;
            $student->instalink = $request->instalink;
            $student->parentemail = $request->pemail;
            $student->parentphone = $request->pphone;
            $student->save();
            $status = 1;
            return view('auth.success', compact('status'));
        }
        }else{
            $status = 3;
            return view('auth.success', compact('status'));
        }
    }
    // user logout function
    public function logout(Request $request){
        $request->session()->forget('studentid');
        return redirect('/auth/login');
    }

}
