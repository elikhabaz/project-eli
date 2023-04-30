<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter){
        request()->validate(['email'=>'required|email']);

	
	try{
		$newsletter= new Newsletter();
		$newsletter->subscrib(request('email'));

	}catch(\Exception $e){
		throw ValidationException::withMessages([
			'email' =>'we cannot add it'
		]);
	}
	
    return redirect("/")->with('Success','we love you!');
    }
    
}
