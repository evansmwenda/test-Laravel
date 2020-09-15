<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
	// use ValidatesRequests;

    //
    public function index(){
    	return view('landing');
    }
    public function about(){
    	return view('about');
    }
    public function contact(){
    	return view('contact');
    }
    public function customers(Request $request){
    	// dd($request->method());
    	if($request->method() == "POST"){
    		//user has submitted form values
    		$this->validate($request, [
		        'email' => 'required|email|unique:users',
    			'name' => 'required',
    			'password' => 'required|min:4'
		    ]);

		    $user = User::insert($request);
			$user = new User;
			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = bcrypt($request->password);
			$user->save();

			event(new NewCustomerRegistrationEvent());

			//send them email
			Mail::to('email@email.com ')->send(new WelcomeNewUserMail());

			// //register to newsletter
			dump("registered to newsletter");

			// //slack emssage to admin
			dump("slack message here");
    	}



    	$customers = User::all();
    	// dd($customer);
    	return view('customers')->with(compact('customers'));
    }
}
