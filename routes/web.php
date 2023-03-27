<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Catch_;

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
    return view('posts');
});


Route::get('/posts/{post}', function ($slug) { /////در این بخش از کد ما {post} راداریم که چون داخل کرلی براکت هست هربار یک فایل را میگیرد
///////اسلاگ همون بخش بعد از دامنه است
    $path = __DIR__ . "/../resources/posts/{$slug}.html";

if(! file_exists($path)){
    return redirect('/posts');///////دستور ریدایرکت
    // abort(404);    /////اگر خواستم صفحه ۴۰۴ یا ۵۰۰ یا ۴۰۳ و یا هر چیز دیگه از این دستورز استفاده کن
}
$post= cache()->remember("posts.{$slug}",5,function() use ($path){
 
    var_dump('file_get_contents');
    return file_get_contents($path);

});

// $post=file_get_contents($path);
    return view('post', [
        'post' => $post
    ]);
})->where('post', '[A-z_/-]+'); ////در این بخش قراردادی تنظیم شده برای بخش اسلاگ که توی اسلاگ میتونی حروف بزرگ و کوچک و ـ و- قرار بدهی یکسری تابع عم هست whereAlpha() , whereNumber()


