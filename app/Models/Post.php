<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post

{
    public static function all(){
        $files= File::files(resource_path("posts/"));

        return array_map(function($file){
            return $file->getcontents();
        }, $files);
    }
  public static function find($slug) {
    if(! file_exists($path=resource_path("posts/{$slug}.html"))){
        // return redirect('/posts');///////دستور ریدایرکت
        abort(404);    /////اگر خواستم صفحه ۴۰۴ یا ۵۰۰ یا ۴۰۳ و یا هر چیز دیگه از این دستورز استفاده کن
    }
    return cache()->remember("posts.{$slug}",5,function() use ($path){////وقتی کاربر توی یک صفحه باشه و مثلا ۱۰بار روی یک لینک بزنه درخواست های زیادی به سرور ارسال میشه که اصلا خوب نیست بهتره که کش کنیم
       //////////کافیه از اروو فانکشن ها استفاده کنیم اول آدرس میگیره بعد زمان که چه مدت باید کش بشه
        // var_dump('file_get_contents');
        return file_get_contents($path);
    });
  }
}








