<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class subjectController extends Controller
{
    public function subject(){
        $route = Route::current()->getName();
        if($route == "History"){
            return "History Question";
        }else if($route == "Mathematics"){
            return "Mathematics Question";
        }

    }
}
