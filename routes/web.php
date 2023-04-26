<?php

use App\Http\Controllers\SessionController;
use App\Models\User;
use App\Models\Cat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\RegisterContriller;



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
/// how can I Use cntrolleres? Like thissss

Route::get('/', [Postcontroller::class , 'index'])->name('posts');

Route::get('/posts/{post}', [Postcontroller::class , 'show']);

Route::get('register', [RegisterContriller::class , 'create'])->middleware('guest');

Route::Post('register', [RegisterContriller::class , 'store'])->middleware('guest');
////////middelware is a method for user reguest and this method have ti login protected 

Route::get('login', [SessionController::class , 'create'])->middleware('guest');
Route::Post('login', [SessionController::class , 'store'])->middleware('guest');

Route::Post('logout', [SessionController::class , 'distroy']);
