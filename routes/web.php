<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::post("upload/file",[\App\Http\Controllers\FileController::Class,'UploadFile']);

Route::controller(App\Http\Controllers\UserController::class)->prefix('user/')->group(function()
{
    route::view('/login','user.login')->middleware(App\Http\Middleware\UserMiddleware::class);
    route::post('/doLogin','login');
    route::get('/logout','logout');
    
});
route::get('/')->middleware(App\Http\Middleware\GuestMiddleware::class);
Route::fallback(function(){
    return "ups note found";
});