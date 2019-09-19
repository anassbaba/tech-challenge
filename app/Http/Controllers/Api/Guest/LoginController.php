<?php

namespace App\Http\Controllers\Api\Guest;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
    	return view('static.guest.login');
    }

    public function auth(Request $request)
    {
    	$credentials = $request->only('email', 'password');

    	if (Auth::attempt($credentials)) 
    	{
            if(Auth::user()->email_verified_at == null)
            {
        		return redirect()->to('login')->with(['error' => 'your must verifiy your email to login.']);
            }
            else
                return redirect('user/item/all');
        }
        else
        	return redirect()->to('login')->with(['error' => 'email or password is invalide.']);

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('login');
    }
}
