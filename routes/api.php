<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('delete')->middleware(['auth','isAdmin'])->group(function(){

});

Route::delete('deleteStudent/{id}', [StudentController::class,'deleteStudent']);
Route::delete('deleteTeacher/{id}', [TeacherController::class,'deleteTeacher']);

Route::post('registration', [UserController::class,'registration']);
Route::post('login', [UserController::class,'login']);

Route::post('createStudent', [StudentController::class,'createStudent']);
Route::get('listStudents', [StudentController::class,'listStudents']);
Route::get('getStudent/{id}', [StudentController::class,'getStudent']);
Route::put('updateStudent/{id}', [StudentController::class,'updateStudent']);

Route::post('createTeacher', [TeacherController::class,'createTeacher']);
Route::get('listTeachers', [TeacherController::class,'listTeachers']);
Route::get('getTeacher/{id}', [TeacherController::class,'getTeacher']);
Route::put('updateTeacher/{id}', [TeacherController::class,'updateTeacher']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 //Route::get('email/verify/{id}', [\App\Http\Controllers\VerificationController::class, 'verify'])->name(name:'verification.verify');
