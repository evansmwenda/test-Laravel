<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;


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
		        'email' => 'required|email',
    			'name' => 'required',
    			'password' => 'required|min:4'
		    ]);
			$user = new User;
			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = bcrypt($request->password);
			$user->save();
    	}



    	$customers = User::all();
    	// dd($customer);
    	return view('customers')->with(compact('customers'));
    }
}
