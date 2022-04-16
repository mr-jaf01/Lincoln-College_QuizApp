<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashController extends Controller
{
   // index dashboad view
   public function dashboard(){
       return view('dashboard.dashboard');
   }
}
