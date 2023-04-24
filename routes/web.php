<?php

use App\Models\User;
use App\Models\Cat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;
use Illuminate\Database\Eloquent\Collection;


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
Route::get('/posts/{post}', [Postcontroller::class , 'show']);



// Route::get('categoris/{cat:slug}', function (Cat $cat) {
//     return view('posts.index', [
//         'posts' => $cat->posts,
//     ]);
// });

Route::get('authors/{author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts
    ]);
});
// Route::get('/f', function () {
//     phpinfo();
// });