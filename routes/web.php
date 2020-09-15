<?php
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;


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

Route::get('/','HomeController@index');
Route::get('about','HomeController@about');
Route::get('contact','HomeController@contact');
Route::match(['get','post'],'customers','HomeController@customers');
Route::get('/email' ,function (){
	Mail::to('email@email.com')->send(new WelcomeNewUserMail());
	return (new App\Mail\WelcomeNewUserMail())->render();
});
