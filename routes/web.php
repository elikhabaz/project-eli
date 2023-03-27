<?php

use App\Models\Post;

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
    $files= File::files(resource_path("posts/"));
    
    $document = [];
        foreach ($files as $file) {

            $document[] =  YamlFrontMatter::parseFile($file);# code...
        }

        
    // return view('posts', [
    //     'posts'=>Post::all()
        
    // ]);
});


Route::get('/posts/{post}', function ($slug) { /////در این بخش از کد ما {post} راداریم که چون داخل کرلی براکت هست هربار یک فایل را میگیرد
///////اسلاگ همون بخش بعد از دامنه است

$post=Post::find($slug);

return view('post', [
    'post'=>$post
]);

})->where('post', '[A-z_/-]+'); ////در این بخش قراردادی تنظیم شده برای بخش اسلاگ که توی اسلاگ میتونی حروف بزرگ و کوچک و ـ و- قرار بدهی یکسری تابع عم هست whereAlpha() , whereNumber()


