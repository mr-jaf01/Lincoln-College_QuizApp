<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\student;
use Session;

class dashController extends Controller
{
   // index dashboad view
   public function dashboard(){
       if(!Session::get('studentid')){
            return redirect('/auth/login');
       }
       return view('dashboard.dashboard');
   }

   //profile function
   public function profile(){
        $student = getstudent(Session::get('studentid'));
        return view('dashboard.profile.profile', compact('student'));
   }

   //profile settings function
   public function profile_settings(){
        $student = getstudent(Session::get('studentid'));
        return view('dashboard.profile.profile_settings', compact('student'));
   }

   //update profile function
   public function update(Request $request){

    if(!empty($request->password)){
        if($request->password == $request->cpassword){
            $updatestudent = student::find(Session::get('studentid'));
            $updatestudent->studentname = $request->name;
            $updatestudent->email = $request->email;
            $updatestudent->phone = $request->studphone;
            $updatestudent->address = $request->studadd;
            $updatestudent->gender = $request->studgender;
            $updatestudent->program = $request->program;
            $updatestudent->password = Hash::make($request->password);
            $updatestudent->flink = $request->flink;
            $updatestudent->instalink = $request->instalink;
            $updatestudent->parentemail = $request->pemail;
            $updatestudent->parentphone = $request->pphone;
            $updatestudent->save();
            return back()->with('success','Updated Successfully');
        }else{
            return back()->with('fail', 'Password & Comfirm Password Mismatch');
        }
    }else{
        $updatestudent = student::find(Session::get('studentid'));
        $updatestudent->studentname = $request->name;
        $updatestudent->email = $request->email;
        $updatestudent->phone = $request->studphone;
        $updatestudent->address = $request->studadd;
        $updatestudent->gender = $request->studgender;
        $updatestudent->program = $request->program;
        //$updatestudent->password = Hash::make($request->password);
        $updatestudent->flink = $request->flink;
        $updatestudent->instalink = $request->instalink;
        $updatestudent->parentemail = $request->pemail;
        $updatestudent->parentphone = $request->pphone;
        $updatestudent->save();
        return back()->with('success','Updated Successfully');
    }
   }
}
