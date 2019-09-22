<?php

namespace App\Http\Controllers\Api\Guest;

use Hash;
use Cache;
use App\User;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Guest\Register;

class RegisterController extends Controller
{

    public function index(Request $request)
    {
    	return view('static.guest.register');
    }

    public function new(Register $request)
    {
    	$user = User::create([
    		'email' 	=> $request->get('email'),
    		'password' 	=> Hash::make($request->get('password')),
    	]);

        return $this->response($request, 'login', [
            'messages'  => [
                'errors'    => [],
                'success'   => ['Your account created successfully we sent email verification.']
            ]
        ]);
    }

    public function verify(Request $request)
    {
    	$id        = $request->segment(3);
    	$hash      = $request->segment(4);

    	$user      = User::findOrFail($id);
    	
    	$checkHash = Cache::get('user::'.$id);

    	if ($hash == $checkHash && $user->email_verified_at == null)
    	{
    		$user->update([
    			'email_verified_at' => Carbon::now()
    		]);

            Cache::forget('user::'.$id);

            return $this->response($request, 'login', [
                'messages'  => [
                    'errors'  => [],
                    'success' => ['Verification complete you can now login.']
                ]
            ]);

        } else
            return abort(404);

    }
}