<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\dashController as Dashboard;
use App\Http\Controllers\subjectController as Subject;
use App\Http\Controllers\quizController as QuizContro;
use App\Http\Controllers\admin\AuthController as AdminAuth;
use App\Http\Controllers\admin\SubjectController as SubjectController;
use App\Http\Controllers\admin\QuestionController as QuestionController;

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
//api get panel page
Route::get('/dashboard/question',[Subject::class, 'qdetails'])->name('dashbaord.question');

//question paper route
foreach(getsubject() as $key=>$value){
    Route::get('/dashboard/quiz/'.$value['subjectname'], [Subject::class,'subject'])->name($value['subjectname']);
}

//dashboard start quiz route
Route::get('/dashboard/quiz/{subject}/{year}',[QuizContro::class, 'start'])->name('dashboard.quiz');
Route::get('/check_answer',[QuizContro::class, 'check_answer'])->name('check_answer');
Route::get('save_answer',[QuizContro::class, 'save_answer'])->name('save_answer');




// All Administration Routes
Route::get('admin/auth/login', function(){
    if(Session::get('adminID')){
        return redirect('/admin/dashboard');
    }
    return view('admin.auth.login');
})->name('admin.auth.login');
Route::post('/admin/auth/login',[AdminAuth::class, 'login'])->name('admin.auth.login');
Route::get('/admin/dashboard', function(){
    return view('admin.dashboard.dashboard');
})->name('admin.dashboard');
Route::get('/admin/dashboard/logout', [AdminAuth::class, 'logout'])->name('admin.dashboard.logout');

//Admin Subject Route
Route::get('admin/dashboard/subject/createSubject',[SubjectController::class,'subject'])->name('admin.dashboard.subject.createSubject');
Route::get('admin/dashboard/subject/viewSubject',[SubjectController::class, 'showSubject'])->name('admin.dashboard.subject.viewSubject');
Route::post('admin/dashboard/subject/save',[SubjectController::class, 'saveSubject'])->name('admin.dashboard.subject.save');
Route::post('admin/dashboard/subject/update',[SubjectController::class, 'updateSubject'])->name('admin.dashboard.subject.update');
Route::get('admin/dashboard/subject/delete/{id}',[SubjectController::class, 'deleteSubject'])->name('admin.dashboard.subject.delete');

// Admin Questions Route
Route::get('admin/dashboard/question/createQuestion',[QuestionController::class,'question'])->name('admin.dashboard.question.createQuestion');
Route::get('admin/dashboard/question/viewQuestion',[QuestionController::class, 'showQuestion'])->name('admin.dashboard.question.viewQuestion');
Route::post('admin/dashboard/question/save',[QuestionController::class, 'saveQuestion'])->name('admin.dashboard.question.createsave');
Route::get('admin/dashboard/question/questionmode',[QuestionController::class,'questionmode'])->name('admin.dashboard.question.questionmode');
Route::post('admin/dashboard/question/questionmodecheck',[QuestionController::class,'questionmodecheck'])->name('admin.dashboard.question.questionmodecheck');
Route::get('admin/dashboard/question/view/{id}', [QuestionController::class,'getquestionByID']);
Route::get('admin/dashboard/question/', [QuestionController::class,'getquestionByID']);
Route::post('admin/dashboard/question/update', [QuestionController::class,'Update'])->name('admin.dashboard.question.update');
Route::get('admin/dashboard/question/delete/{id}',[QuestionController::class, 'delete'])->name('admin.dashboard.question.delete');
