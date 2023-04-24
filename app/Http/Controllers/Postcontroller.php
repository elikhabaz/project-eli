<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Author;
use App\Models\Cat;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;



class Postcontroller extends Controller
{
    public function index()
    {
        /* I create this controller for arrangement search-box */
        return view('posts.index', [
            'posts' => $posts = Post::latest()->filter(request(['search','cat','author']))->paginate(6)            
        ]);
    }



    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
                ]);
    }
}