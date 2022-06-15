<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\student as student;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

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
            return back()->with('exit', 'Student Already Registered');
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
            $transport = Transport::fromDsn('smtp://SPMSPS@1690.tk:1994_Xujaf@1690.tk:465');
                //$mailer = new Mailer($transport);

                //$transport = Transport::fromDsn('smtp://localhost');
                $mailer = new Mailer($transport);

                $email = (new Email())
                    ->from('SPMSPS@1690.tk')
                    ->to($request->email)
                    //->cc('cc@example.com')
                    //->bcc('bcc@example.com')
                    //->replyTo('fabien@example.com')
                    //->priority(Email::PRIORITY_HIGH)
                    ->subject('SPM STUDENT PREPARATION SYSTEM')
                    ->html('
                        <center><img width="300" height="150" src="https://lincoln.edu.my/wp-content/uploads/2021/06/cropped-logoLincoln.png" /></center>
                        <h2>Congratulations!</h2>
                        <p>Welcome!</p>
                        <p>You have successfully registered on the SPM SPS Platform.</p>
                    ');

                $mailer->send($email);
            return redirect('/auth/login')->with('success','Registration Successfully');
        }
        }else{
            return back()->with('fail','Password & Comfirm Password Mismatch');
        }
    }
    // user logout function
    public function logout(Request $request){
        $request->session()->forget('studentid');
        return redirect('/auth/login');
    }

}
