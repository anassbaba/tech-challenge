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
            if (Auth::user()->email_verified_at == null) 
            {
                Auth::logout();
                
                return $this->response($request, 'login', [
                    'messages'  => [
                        'errors'    => ['You must verify your email adress.'],
                        'success'   => []
                    ]
                ]);

            } else {

                return $this->response($request, 'login', [
                    'messages'  => [
                        'errors'    => [],
                        'success'   => ['Your login successfully.']
                    ]
                ]);

            }
        } else {

            return $this->response($request, 'login', [
                'messages'  => [
                    'errors'    => ['Email or password is invalide.'],
                    'success'   => []
                ]
            ]);
            
        }

    }


    public function logout(Request $request)
    {
        Auth::logout();

        return $this->response($request, 'login', [
            'messages'  => [
                'errors'    => [],
                'success'   => []
            ]
        ]);
    }
}
