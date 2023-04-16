<?php

use App\Models\Post;
use App\Models\Cat;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\Foreach_;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/posts', function () {
    $posts = Post::all(); //////
    return view('posts', [
        'posts' => Post::with('cat', 'author')->get()
    ]);
});

Route::get('/posts/{post}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categoris/{cat:slug}', function (Cat $cat) {

    return view('posts', [
        'posts' => $cat->posts
    ]);
});

Route::get('authors/{author:username}', function (User $author) {

    return view('posts', [
        'posts' => $author->posts
    ]);
});
