<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController as Auth;
use App\Http\Controllers\dashController as Dashboard;
use App\Http\Controllers\subjectController as Subject;
use App\Http\Controllers\quizController as QuizContro;
use App\Http\Controllers\admin\AuthController as AdminAuth;
use App\Http\Controllers\admin\EssayController;
use App\Http\Controllers\admin\SubjectController as SubjectController;
use App\Http\Controllers\admin\QuestionController as QuestionController;
use App\Http\Controllers\admin\UserController as UserController;
use App\Http\Controllers\admin\StudentController as StudentController;
use App\Http\Controllers\admin\SpmController as SpmController;

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
Route::get('/dashboard/history/remove',[Dashboard::class, 'remove_history'])->name('dashboard.history.remove');
//api get panel page
Route::get('/dashboard/question',[Subject::class, 'qdetails'])->name('dashbaord.question');

//question paper route
foreach(getsubject() as $key=>$value){
    Route::get('/dashboard/quiz/'.$value['subjectname'], [Subject::class,'subject'])->name($value['subjectname']);
}

//dashboard start quiz route
Route::get('/dashboard/quiz/{subject}/{year}',[QuizContro::class, 'start'])->name('dashboard.quiz');
Route::get('/check_answer',[QuizContro::class, 'check_answer'])->name('check_answer');
Route::post('/save_answer',[QuizContro::class, 'save_answer'])->name('save_answer');
Route::get('/quizDone',[QuizContro::class,'quizDone'])->name('quizdone');

Route::get('/upload', function(){
    return view('upload');
});
Route::post('/upload',[QuizContro::class,'uploadimage']);




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


//Admin Users Route
Route::get('admin/dashboard/users',[UserController::class, 'Users'])->name('admin.dashboard.users');
Route::get('admin/dashboard/users/create',[UserController::class, 'CreateUser'])->name('admin.dashboard.users.create');
Route::post('admin/dashboard/users/save',[UserController::class, 'SaveUser'])->name('admin.dashboard.users.save');
Route::post('admin/dashboard/users/update',[UserController::class, 'update'])->name('admin.dashboard.users.update');
Route::get('admin/dashboard/users/delete/{id}',[UserController::class, 'deleteUser'])->name('admin.dashboard.users.delete');


//admin Student Route
Route::get('admin/dashboard/students',[StudentController::class, 'allStudent'])->name('admin.dashboard.students');

//admin SPM route
Route::get('admin/dashboard/spm/view',[SpmController::class, 'viewspm'])->name('admin.dashboard.spm.view');
Route::get('admin/dashboard/spm/create',[SpmController::class, 'spmcreate'])->name('admin.dashboard.spm.create');
Route::post('admin/dashboard/spm/save', [SpmController::class, 'savespm'])->name('admin.dashboard.spm.save');
Route::post('admin/dashboard/spm/update', [SpmController::class, 'update'])->name('admin.dashboard.spm.update');
Route::get('admin/dashboard/spm/delete/{id}', [SpmController::class, 'delete'])->name('admin.dashboard.spm.delete');

//admin Essay Answer Route
Route::get('admin/dashboard/answer/essay', [EssayController::class, 'getEssayAnswer'])->name('admin.dashboard.answer.essay');
Route::get('admin/dashboard/answer/essay/answer/{id}',[EssayController::class, 'getsingleAnswer']);
Route::post('admin/dashboard/remark/save', [EssayController::class, 'saveRemark'])->name('save.remark');
