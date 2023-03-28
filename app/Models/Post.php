<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Static_;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post

{
public $title;
public $excerpt;
public $date;
public $body;

public $slug;

public function __construct($title,$excerpt,$date,$body,$slug){
  $this->title = $title;
  $this->excerpt = $excerpt;
  $this->date = $date;
  $this->body = $body;
  $this->slug = $slug;

}

    public static function all(){
      // return cache()->rememberForever('posts.all',function(){

        return collect(File::files(resource_path("posts")))
      
        ->map(function($file){
            return YamlFrontMatter::parseFile($file);
        })
        
        ->map(function ($ducoment){      
                # code...
                return new Post(
                    $ducoment->title,
                    $ducoment->excerpt,
                    $ducoment->date,
                    $ducoment->body(),
                    $ducoment->slug
                ); 
        });
          
      // });
      
    }
  public static function find($slug) {
  //   if(! file_exists($path=resource_path("posts/{$slug}.html"))){
  //       // return redirect('/posts');///////دستور ریدایرکت
  //       abort(404);    /////اگر خواستم صفحه ۴۰۴ یا ۵۰۰ یا ۴۰۳ و یا هر چیز دیگه از این دستورز استفاده کن
  //   }
  //   return cache()->remember("posts.{$slug}",5,function() use ($path){////وقتی کاربر توی یک صفحه باشه و مثلا ۱۰بار روی یک لینک بزنه درخواست های زیادی به سرور ارسال میشه که اصلا خوب نیست بهتره که کش کنیم
  //      //////////کافیه از اروو فانکشن ها استفاده کنیم اول آدرس میگیره بعد زمان که چه مدت باید کش بشه
  //       // var_dump('file_get_contents');
  //       return file_get_contents($path);
  //   });
  // }
    return static::all()->firstWhere('slug',$slug);
    //////firstwhere is a method in laravel and its get 'slug' after that go to the tabale and check data(check if 'slug' == $slug)
    //////////when it find the value== id('slug) return it 
    ///in this place firstwhere get id('slug) , go to the table and search when it find $slug return it!
  }
}








