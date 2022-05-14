<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
