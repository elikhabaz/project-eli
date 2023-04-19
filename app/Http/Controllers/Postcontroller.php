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
        return view('posts', [
            'posts' => $posts = Post::latest()->filter(request(['search','cat']))->get(),
            'categoris' => Cat::all()
        ]);
    }



    public function show(Post $post)
    {
        return view('post', [
            'post' => $post
        ]);
    }
}