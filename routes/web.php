<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StudentController;
use App\Jobs\MigrateJob;
use App\Jobs\MigrateSeedJob;
use App\Jobs\ResetJob;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/migrate-seed', function () {
    MigrateSeedJob::dispatch();
    return redirect('/');
});
Route::get('/migrate', function () {
    MigrateJob::dispatch();
    return redirect('/');
});
Route::get('/reset', function () {
    ResetJob::dispatch();
    return redirect('/');
});


Route::get('/authorize', function () {
    return view('authorize');
})->name('authorize');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::post('/student-login', [StudentController::class, 'student_login'])->name('student_login');


//ADMIN
Route::get('/management/login', [PagesController::class, 'admin_login']);
Route::post('/admin/login', [AdminController::class, 'post_admin_login'])->name('post_admin_login');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

//ADMIN
Route::middleware(['auth:sanctum','user_access', 'authorize'])->group(function () {
    //------PAGES--------------------------------------
    Route::get('/dashboard', [PagesController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::get('/view_instruction', [PagesController::class, 'view_instruction'])->name('view_instruction');
    //EXAM
    Route::get('/ongoing/exams', [PagesController::class, 'ongoing_exams'])->name('ongoing_exams');
    Route::get('/concluded/exams', [PagesController::class, 'concluded_exams'])->name('concluded_exams');
    Route::get('/all/exams', [PagesController::class, 'scheduled_exams'])->name('scheduled_exams');
    Route::get('/add/exams', [PagesController::class, 'add_exams'])->name('add_exams');
    Route::get('/edit/exams/{id}', [PagesController::class, 'edit_exams'])->name('edit_exams');
    Route::get('/edit/question/{id}', [PagesController::class, 'edit_question'])->name('edit_question');
    Route::get('/result/exams/{id}', [PagesController::class, 'result'])->name('result');

    //USERS
    Route::get('/staffs', [PagesController::class, 'staffs'])->name('staffs');
    Route::get('/students', [PagesController::class, 'students'])->name('students');
    Route::get('/create/user', [PagesController::class, 'create_user'])->name('create_user');
    Route::get('/edit/user/{id}', [PagesController::class, 'edit_user'])->name('edit_user');
    Route::get('/locked', [PagesController::class, 'locked'])->name('locked');

    //CLASSROOMS
    Route::get('/classrooms', [PagesController::class, 'classrooms'])->name('classrooms');
    Route::get('/create/classrooms', [PagesController::class, 'create_classrooms'])->name('create_class');
    Route::get('/edit/classroom/{id}', [PagesController::class, 'edit_classrooms'])->name('edit_class');
 //--------------------------------------------------------------------------------------------------------------------------------

    //---- ----REQUESTS::
    // EDITOR
    Route::post('/upload-image',[AdminController::class, 'admin_upload'])->name('uploadimage');
    //EXAM
    Route::post('/modify_instruction', [AdminController::class, 'modify_instruction'])->name('modify_instruction');
    Route::post('/add/exam', [AdminController::class, 'add_exam'])->name('add_exam');
    Route::post('/update/exam', [AdminController::class, 'update_exam'])->name('update_exam');
    Route::get('/delete/exam/{id}', [AdminController::class, 'delete_exam'])->name('delete_exam');

    //QUESTIONS
    Route::post('/add/question', [AdminController::class, 'add_question'])->name('add_question');
    Route::post('/update/question/', [AdminController::class, 'update_question'])->name('update_question');
    Route::get('/delete/question/{id}', [AdminController::class, 'delete_question'])->name('delete_question');

    //STAFF
    Route::post('/add/user', [AdminController::class, 'add_user'])->name('add_user');
    Route::post('/update/user', [AdminController::class, 'update_user'])->name('update_user');
    Route::get('/delete/user/{id}', [AdminController::class, 'delete_user'])->name('delete_user');

    //UNLOCK ACCOUNT
    Route::get('/unlock/acct/{id}', [AdminController::class, 'unlock_student'])->name('unlock_student');


    //CLASSROOM
    Route::post('/add/classroom', [AdminController::class, 'add_classroom'])->name('add_classroom');
    Route::post('/update/classroom', [AdminController::class, 'update_classroom'])->name('update_classroom');
    Route::get('/delete/classroom/{id}', [AdminController::class, 'delete_classroom'])->name('delete_classroom');

});


//STUDENT
Route::middleware(['auth:sanctum', 'authorize'])->group(function () {
    Route::get('/instruction', [PagesController::class, 'instruction'])->name('instruction');
    Route::get('/exams', [PagesController::class, 'current_exam'])->name('current_exam');
    Route::get('/exam-locked', [PagesController::class, 'exam_locked'])->name('exam_locked');
    Route::get('/no-exam', [PagesController::class, 'no_exam'])->name('no_exam');
    Route::get('/finished', [PagesController::class, 'finished'])->name('finished');

    // REQUESTS
    Route::post('/start/{id}', [StudentController::class, 'start'])->name('start');
    Route::post('/exams', [StudentController::class, 'respond'])->name('respond');
    Route::post('/submit-exam/{id}', [StudentController::class, 'submit'])->name('submit');
    Route::get('/clear-choice/{id}', [StudentController::class, 'clear_choice'])->name('clear_choice');
    Route::get('/lock-exam/{id}', [StudentController::class, 'lock_exam'])->name('lock_exam');

});

