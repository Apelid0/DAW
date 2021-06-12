<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Logout
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'store']);

//Register Users
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');

Route::get('/show', [TestController::class, 'show']);

Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher');
Route::post('/teacher', [TeacherController::class, 'store']);
Route::get('/delete/{id}', [TeacherController::class, 'deletePost']);
Route::post('/editPost/{id}', [TeacherController::class, 'editPost']);

Route::get('/subjects', [SubjectsController::class, 'index'])->name('subjects');

Route::get('/course', [CourseController::class, 'index'])->name('course');

//Home Page
Route::get('/', function () {
    return view('dashboard.index');
})->name('home');

Route::get('/', function () {
    return view('dashboard.index');
});
