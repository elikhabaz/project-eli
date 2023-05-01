<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Controllers\Postcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index' , [
            'posts'=>Post::paginate(50)
        ]);
        
    }

    public function create(){
        return view('admin.posts.create');
    }



    public function store(){
        $attributes=request()->validate([
           'title' =>'required',
           'img' =>'required|image',
           'slug' =>['required' , Rule::unique('posts' , 'slug')],
           'excerpt' => 'required',
           'body' => 'required',
           'cat_id' => ['required' , Rule::exists('cats' , 'id')]
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['img'] = request()->file('img')->store('imgs');///برای تابع استور لازمه در فایل سیستم دیفالت را پابلیک تعریف کنیم و اینکه توی دات ای ان ور هم کلید را از لوکال به پابلیک تغییر بدهیم
        $attributes['date'] = Carbon::now();
        $r=Post::create($attributes);
       

        return redirect('/');
    }

    public function edit(Post $post){
        return view('admin.posts.edit',['post'=>$post]);
    }


    public function update(Post $post){

        $attributes=request()->validate([
            'title' =>'required',
            'img' =>'image',
            'slug' =>['required' , Rule::unique('posts' , 'slug')->ignore($post->id)],
            'excerpt' => 'required',
            'body' => 'required',
            'cat_id' => ['required' , Rule::exists('cats' , 'id')]
         ]);
         if(isset($attributes['img'])){
            $attributes['img'] = request()->file('img')->store('imgs');///برای تابع استور لازمه در فایل سیستم دیفالت را پابلیک تعریف کنیم و اینکه توی دات ای ان ور هم کلید را از لوکال به پابلیک تغییر بدهیم

         }
        $post->update($attributes);
        return back();
    }
    public function distroy(Post $post){
        $post->delete();
        return back();
    }

}
