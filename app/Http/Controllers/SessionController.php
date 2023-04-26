<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function distroy(){
        auth()->logout();

        return redirect("/");
    }


    public function create(){
        return view('session.create');
        
    }

    public function store(){


       $attributes= request()->validate([
            'email'=>'required|email',
            'password'=>'required|min:7|max:255',
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect("/")->with('Success','wllcomeback');
        }

        throw ValidationException::withMessages([
                'email'=>'login failed please Try again :('
        ]);

    }


}
