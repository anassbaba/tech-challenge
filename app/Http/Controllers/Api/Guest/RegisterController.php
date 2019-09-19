<?php

namespace App\Http\Controllers\Api\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
    	return view('static.guest.register');
    }

    public function register(Request $request)
    {
    	$validatedData = $request->validate([
        	'email' 				=> 'required|email|max:255',
        	'password' 				=> 'required|min:6|max:255|confirmed',
    	]);


    }
}
