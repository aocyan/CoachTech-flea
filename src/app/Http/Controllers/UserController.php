<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
	{
		return view('auth.login');
	}

    public function register()
	{
		return view('auth.register');
	}

    public function edit()
	{
		return view('edit');
	}

     public function address()
	{
		return view('address');
	}

    public function index()
	{
		return view('index');
	}

    public function profile()
    {
        return view('profile');
    }

    public function sell()
    {
        return view('sell');
    }

    public function exhibition()
    {
        return view('exhibition');
    }

    public function purchase()
    {
        return view('purchase');
    }
}
