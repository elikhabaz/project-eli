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

  
   
}