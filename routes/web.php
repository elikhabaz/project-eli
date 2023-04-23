<?php

use App\Http\Controllers\Postcontroller;
use App\Models\Post;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\Foreach_;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

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
Route::get('/posts', [Postcontroller::class , 'index'])->name('posts');
Route::get('/posts/{post:slug}', [Postcontroller::class , 'show']);


Route::get('authors/{author:username}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts,   
        'categoris'=> Cat::all()

    ]);
});
