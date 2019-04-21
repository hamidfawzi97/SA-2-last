<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Users;

class LoginController extends Controller
{
    public function index(){
    	return view('login');
    }

    public function checkLogin(Request $request){
    	$this->validate($request , [
    		'username' => 'required',
    		'password' => 'required'
    	]);

    	$username = $request->get('username');
    	$password = $request->get('password');

    	$users = Users::all()->toArray();

    	if($users){

	    	foreach ($users as $user) {
	    		if($user['UserName'] == $username){
	    			if($user['Password'] == $password){

	    				session(['username' => $username , 'role' => $user['Role_type']]);
	    				return redirect('/');

	    			}else{
	    				return redirect('login')->with('failed' , 'Wrong Password');
	    			}
	    		}
	    	}
	    	return redirect('login')->with('failed' , 'User not exists');
    	}else{
    		return redirect('login')->with('failed' , 'No Users');
    	}

    }

    public function logout(){
    	session()->flush();
    	return redirect('login');
    }
}
