<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;


class UserController extends Controller
{
  /**
   * It returns all the users in the database.
   */
   public function Users(){
       $allUsers = User::all();
       return view('admin.dashboard.users.viewUsers',compact('allUsers'));
   }



  /**
   * It returns the view of the createUsers page.
   *
   * @return The view is being returned.
   */
   public function CreateUser(){
        return view('admin.dashboard.users.createUsers');
   }

  /**
   * It saves the user data to the database.
   *
   * @param Request request The request object.
   */
   public function SaveUser(Request $request){
       if($request->password == $request->cpassword){
        $addUser = new User();
        $addUser->name = $request->name;
        $addUser->email = $request->email;
        $addUser->role = $request->role;
        $addUser->password = Hash::make($request->password);
        $status = $addUser->save();
        if($status){
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
                    ->subject('SPM STUDENT PREPARATION SYSTEM (ADMIN)')
                    ->html('
                        <center><img width="300" height="150" src="https://lincoln.edu.my/wp-content/uploads/2021/06/cropped-logoLincoln.png" /></center>
                        <h2>Congratulations!</h2>
                        <p>Welcome!</p>
                        <p>You were successfully added as a Teacher on the SPM SPS Platform.</p>
                        <p>You can now login and start creating and reviewing SPM Questions.</p>

                        <p style="padding-top:10px;">All the best<p>
                        <div style="padding-top:10px;"></div>
                        <h4>Your Login info :</h4>
                        <p style=" color:blue;">Email:'.$request->email.'</p>
                        <p style=" color:blue;">Password:'.$request->password.'</p>

                        <p style="padding-top:20px;">SSPS Support</p>
                    ');

                $mailer->send($email);
            return redirect('/admin/dashboard/users')->with('success','User Added Successfully');
        }else{
            return redirect('/admin/dashboard/users')->with('fail','Adding New User Fail');
        }

       }else{
           return back()->with('fail','Password & Comfirm Password Mismatch');
       }
   }


/**
 * This function is used to update the user details.
 *
 * @param Request request The request object.
 */

   public function update(Request $request){
       if(!empty($request->password)){
            if($request->password == $request->cpassword){
                $update_user = User::find($request->id);
                $update_user->name = $request->name;
                $update_user->email = $request->email;
                $update_user->role = $request->role;
                $update_user->password = Hash::make($request->password);
                $status = $update_user->save();
                if($status){
                    return redirect('/admin/dashboard/users')->with('success','Record Updated Successfully');
                }else{
                    return redirect('/admin/dashboard/users')->with('fail', 'Record Updating Fail');
                }

            }else{
            return back()->with('fail','Password & Confirm Password Mismatch');
            }

       }else{
            $update_user = User::find($request->id);
            $update_user->name = $request->name;
            $update_user->email = $request->email;
            $update_user->role = $request->role;
            $status = $update_user->save();
            if($status){
                return redirect('/admin/dashboard/users')->with('success','Record Updated Successfully');
            }else{
                return redirect('/admin/dashboard/users')->with('fail', 'Record Updating Fail');
            }
       }

   }

  /**
   * Delete User
   *
   * @param id The id of the user to be deleted.
   */
   public function deleteUser($id){
        $delUser = User::find($id);
        $status = $delUser->delete();
        if($status){
            return back()->with('success','User Remove Successfully');
        }else{
            return back()->with('fail','User Remove not Fail');
        }
    }
}
