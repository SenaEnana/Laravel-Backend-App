<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Student;
use App\Models\Customer;
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


Route::post('show', [UserController::class,'show']);
Route::post('addition', [UserController::class,'addition']);
Route::post('login', [UserController::class,'login']);
Route::post('study', [UserController::class,'study']);
Route::post('teach', [UserController::class,'teach']);

 //Route::get('email/verify/{id}', [\App\Http\Controllers\VerificationController::class, 'verify'])->name(name:'verification.verify');
