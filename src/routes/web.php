<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

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


//打刻ページ
Route::middleware('auth')->group(function () {
  Route::get('/', [AuthController::class, 'index'])->name("index"); //打刻ページ表示

  //勤務開始・終了
  Route::post('/attendance/start', [AttendanceController::class, 'start'])->name('attendance.start');
  Route::post('/attendance/end', [AttendanceController::class, 'end'])->name('attendance.end');

  //休憩開始・終了
  Route::post('/attendance/startBreak', [AttendanceController::class, 'startBreak'])->name('attendance.startBreak');
  Route::post('/attendance/endBreak', [AttendanceController::class, 'endBreak'])->name('attendance.endBreak');
});

//日付別勤怠
Route::get('/attendance', [AttendanceController::class, 'show'])->name('show');
//Route::post('/attendance', [AttendanceController::class, ''])->name('');

