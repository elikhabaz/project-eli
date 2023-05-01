<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Filesystem;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;





class Postcontroller extends Controller
{
    public function index()
    {
        /* I create this controller for arrangement search-box */
        return view('posts.index', [
            'posts' => $posts = Post::latest()->filter(request(['search','cat','author']))->Paginate(6)       
        ]);
    }


    public function show(Post $post)
    {
        // foreach($post->comment as $com){
        //     dd($com->author);
        // }
        return view('posts.show', [
            'post' => $post
                ]);
    }

    public function create(){
       
        return view('posts.create');
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
}