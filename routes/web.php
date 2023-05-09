<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use App\Models\Cat;
use App\Models\Comment;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\RegisterContriller;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Service\Attribute\Required;
use App\Services\Newsletter;




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

Route::post('newsletter', NewsletterController::class);





Route::get('/', [Postcontroller::class, 'index'])->name('posts');

Route::get('/posts/{post}', [Postcontroller::class, 'show']);

Route::post('/posts/{post:slug}/comment', [CommentController::class, 'store']);

Route::get('register', [RegisterContriller::class, 'create'])->middleware('guest');

Route::post('register', [RegisterContriller::class, 'store'])->middleware('guest');
////////middelware is a method for user reguest and this method have ti login protected 




///admin
Route::get('/admin/posts/create',[AdminPostController::class , 'create'])->middleware('admin');

Route::post('/admin/posts',[AdminPostController::class , 'store'])->middleware('admin');

Route::get('/admin/posts',[AdminPostController::class , 'index'])->middleware('admin');

Route::get('/admin/posts/{post}/edit',[AdminPostController::class , 'edit'])->middleware('admin');

Route::patch('/admin/posts/{post}',[AdminPostController::class , 'update'])->middleware('admin');

Route::delete('/admin/posts/{post}',[AdminPostController::class , 'distroy'])->middleware('admin');






Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'distroy']);