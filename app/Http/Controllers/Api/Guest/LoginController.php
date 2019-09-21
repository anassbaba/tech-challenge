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
            if(Auth::user()->email_verified_at == null) // email verification check
            {
                Auth::logout();
                
                if($request->ajax())
                    return response()->json(['error' => 'your must verifiy your email to login.']);
                else
        		  return redirect()->to('login')->with(['error' => 'your must verifiy your email to login.']);
            }
            else{

                if($request->ajax())
                    return response()->json(['auth' => true]);
                else
                    return redirect('user/item/all'); // email verification ready
            }
        }
        else{

                if($request->ajax())
                    return response()->json(['error' => 'email or password is invalide.']);
                else
        	       return redirect()->to('login')->with(['error' => 'email or password is invalide.']); // invalid logins
        }

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('login');
    }
}
