<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionController;
use App\Models\User;
use App\Models\Cat;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Postcontroller;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\RegisterContriller;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Contracts\Service\Attribute\Required;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/// how can I Use cntrolleres? Like thissss

Route::post('newsletter', function () {


	request()->validate(['email'=>'Required|email']);

	$mailchimp = new \MailchimpMarketing\ApiClient();


	$mailchimp->setConfig([
		'apiKey' => config('services.mailchimp.key'),
		'server' => 'us9'
	]);
	try{
		$response = $mailchimp->lists->addListMember('e95d9d94fd', [
			'email_address' =>request('email'),
			'status'=>'subscribed'
		]);
	}catch(\Exception $e){
		throw Illuminate\Validation\ValidationException::withMessages([
			'email' =>'we cant add it'
		]);
	}
	
    return redirect("/")->echo('we love you!');
});



Route::get('/', [Postcontroller::class, 'index'])->name('posts');

Route::get('/posts/{post}', [Postcontroller::class, 'show']);

Route::post('/posts/{post:slug}/comment', [CommentController::class, 'store']);

Route::get('register', [RegisterContriller::class, 'create'])->middleware('guest');

Route::post('register', [RegisterContriller::class, 'store'])->middleware('guest');
////////middelware is a method for user reguest and this method have ti login protected 

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionController::class, 'distroy']);