<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\CreateStudent;
use App\Models\CreateTeacher;
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

Route::post('register', [UserController::class,'register']);
Route::post('login', [UserController::class,'login']);
Route::post('study', [UserController::class,'study']);
Route::post('teach', [UserController::class,'teach']);
Route::get('listStudents', [UserController::class,'listStudents']);
Route::get('listTeachers', [UserController::class,'listTeachers']);
Route::delete('deleteStudent/{id}', [UserController::class,'deleteStudent']);
Route::delete('deleteTeacher/{id}', [UserController::class,'deleteTeacher']);
Route::get('getStudent/{id}', [UserController::class,'getStudent']);
Route::get('getTeacher/{id}', [UserController::class,'getTeacher']);
Route::put('updateStudent', [UserController::class,'updateStudent']);
Route::put('updateTeacher', [UserController::class,'updateTeacher']);

 //Route::get('email/verify/{id}', [\App\Http\Controllers\VerificationController::class, 'verify'])->name(name:'verification.verify');
