<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[Admin::class,'index']);
Route::get('/index/createAccount',[Admin::class,'createAccount']);
Route::post('/index/createAccount/insert',[Admin::class,'insert']);
Route::get('/index/login',[Admin::class,'login']);
Route::post('/index/login/check',[Admin::class,'check']);
Route::get('/index/forgotpswd',[Admin::class,'forgotPswd']);
Route::post('/index/forgotpswd/updt',[Admin::class,'updt']);
Route::post('/index/forgotpswd/updt/set',[Admin::class,'setPwd']);

Route::post('/index/login/check/weather', [Admin::class, 'getWeather']);