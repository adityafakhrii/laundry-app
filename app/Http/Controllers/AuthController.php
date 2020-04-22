<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
    	return view('login');
    }

    public function do_login(Request $request){
    	if (Auth::attempt($request->only('username','password'))) {
    		return redirect('/dashboard');
    	}else{
    		return redirect('/login')->with('fail','gagal');
    	}
    }

    public function dashboard(){
    	return view('dashboard');
    }

    public function logout(){
    	Auth::logout();

    	return redirect('/');
    }
}
