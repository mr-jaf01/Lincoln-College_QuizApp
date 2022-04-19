<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\dashController as Dashboard;
use App\Http\Controllers\subjectController as Subject;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/auth/login');
});

Route::get('/auth/login',[Auth::class, 'login'])->name('auth.login');
Route::get('/auth/register',[Auth::class,'register'])->name('auth.register');
Route::post('/auth/register',[Auth::class,'addstudent'])->name('auth.register');
Route::post('/auth/login',[Auth::class, 'userlogin'])->name('auth.login');
Route::get('/auth/logout', [Auth::class, 'logout'])->name('auth.logout');


//dashboard route after login
Route::get('/dashboard',[Dashboard::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard/profile', [Dashboard::class, 'profile'])->name('dashboard.profile');
Route::get('/dashboard/profile/settings',[Dashboard::class, 'profile_settings'])->name('dashboard.profile.settings');
Route::post('/dashboard/profile/settings/update',[Dashboard::class, 'update'])->name('dashboard.profile.settings.update');


//question paper route
foreach(getsubject() as $key=>$value){
    Route::get('/dashboard/q/'.$value['subjectname'], [Subject::class,'subject'])->name($value['subjectname']);
}

