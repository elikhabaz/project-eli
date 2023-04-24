<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Post;





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
        return view('posts.show', [
            'post' => $post
                ]);
    }
}