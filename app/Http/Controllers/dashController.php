<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\student;
use App\Models\answers;
use App\Models\performance;
use App\Models\history;
use Session;

class dashController extends Controller
{

  /**
   * It checks if the user is logged in, if not it redirects to the login page.
   *
   * @return A view called dashboard.dashboard
   */
   public function dashboard(){
       if(!Session::get('studentid')){
            return redirect('/auth/login');
       }
       return view('dashboard.dashboard');
   }


   /**
    * It returns a view of the profile page, and passes the student object to the view
    *
    * @return A view called profile.blade.php
    */
   public function profile(){
        $student = getstudent(Session::get('studentid'));
        return view('dashboard.profile.profile', compact('student'));
   }


  /**
   * It returns a view called profile_settings, and passes the variable  to the view
   *
   * @return A view of the profile settings page.
   */
   public function profile_settings(){
        $student = getstudent(Session::get('studentid'));
        return view('dashboard.profile.profile_settings', compact('student'));
   }



  /**
   * If the password field is not empty, then check if the password and confirm password fields match.
   * If they do, then update the student's details. If they don't, then return an error message. If the
   * password field is empty, then update the student's details
   *
   * @param Request request The request object.
   */
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

   function remove_history(Request $request){
        history::where('user_id',$request->userid)->where('subject_id',$request->subject)->where('year',$request->year)->delete();
        return back()->with('success','Quiz Remove Successfully');
   }
}
