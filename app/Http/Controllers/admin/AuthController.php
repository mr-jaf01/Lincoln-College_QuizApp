<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('email','=',$request->email)->first();
       if(!$user){
           return back()->with('fail','Invalid Login Credentials')->with('password', Hash::make('password'));
       }else{
           if(Hash::check($request->password, $user->password)){
             $request->session()->put('adminID',$user->id);
             return redirect(route('admin.dashboard'));
           }else{
            return back()->with('fail', 'Invalid Login Credentials');
           }
       }
    }


    public function logout(Request $request){
        $request->session()->forget('adminID');
        return redirect('admin/auth/login');
    }
}
