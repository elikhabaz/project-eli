<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PharIo\Manifest\Email;

class RegisterContriller extends Controller
{

    public function create(){
        return view('register.create');
    }


    public function store(){
        //////validate user
        $attributes=request()->validate([
            'name'=>'required|min:5|max:255',
            'username'=>['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore('username')], /////cause I want I've uniqe username
            'email'=>'required|email|max:255',
            'password'=>'required|min:7|max:255',
        ]);
        $attributes['password']=bcrypt($attributes['password']); /////hash password
        User::create($attributes);   /////make user
        return redirect('/');
    }
   
}
