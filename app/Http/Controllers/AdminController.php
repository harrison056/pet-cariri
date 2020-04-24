<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function login()
    {
    	return view('admin.login');
    }

    public function postLogin(Request $request)
    {
    	$validate = $this->validate($request,[
    		'email' => 'required',
    		'password' => 'required'
    	]);

    	$credenciais = [
            'email' => $request->get('email'),
             'password' => $request->get('password')
         ];

    	if (auth()->guard('admin')->attempt($credenciais)) {
    		return redirect('/admin');
    	}else{
    		return redirect('/admin/login');
    	}

    	if ($validate->fails()) {
    		return redirect('/admin/login')->withErrors($validate)->withInput();
    	}
    }

    public function logout()
    {
    	auth()->guard('admin')->logout();
    	return redirect('/admin/login');
    }

}
