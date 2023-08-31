<?php

use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [LoginController::class,'index']);
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/daftar', [RegisterController::class,'index']);
Route::post('/daftar', [RegisterController::class,'create']);

Route::get('/student', [StudentController::class,'index']);
Route::post('/student', [StudentController::class,'create']);
Route::post('/student/update', [StudentController::class,'edit']);
Route::post('/student/delete', [StudentController::class,'hapus']);

Route::get('/user', [UserController::class,'index']);
Route::post('/user', [UserController::class,'create']);
Route::post('/user/update', [UserController::class,'edit']);
Route::post('/user/delete', [UserController::class,'hapus']);

Route::get('/subject', [SubjectController::class,'index']);
Route::post('/subject', [SubjectController::class,'create']);
Route::post('/subject/update', [SubjectController::class,'edit']);
Route::post('/subject/delete', [SubjectController::class,'hapus']);

Route::get('/enrollment', [EnrollmentController::class,'index']);
Route::post('/enrollment', [EnrollmentController::class,'create']);

Route::get('/report', [ReportController::class,'index']);
Route::get('/report/tes', [ReportController::class,'tes']);
Route::get('/report/export', [ReportController::class,'export']);

Route::get('/profile', [ProfileController::class,'index']);
Route::post('/profile/update', [ProfileController::class,'edit']);
