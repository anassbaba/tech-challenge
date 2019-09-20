<?php

namespace App\Http\Controllers\Api\Guest;

use Hash;
use Cache;
use App\User;
use Validator;
use Carbon\Carbon;
use App\Jobs\VerificationEmailJob;
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
        if($request->ajax())
        {
            $validator = Validator::make($request->all(), [
                'email'                 => 'required|email|unique:users,email|max:255',
                'password'              => 'required|min:6|max:255|confirmed',
                'password_confirmation' => 'required',
            ]);


            if (!$validator->passes()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
        }
        else

    	   $validatedData = $request->validate([
        	   'email' 				=> 'required|email|unique:users,email|max:255',
                'password'              => 'required|min:6|max:255|confirmed',
        	   'password_confirmation' => 'required',
    	   ]);

    	$user = User::create([
    		'email' 	=> $request->get('email'),
    		'password' 	=> Hash::make($request->get('password')),
    	]);
        
    	VerificationEmailJob::dispatchNow($user); // send verification email for dev only the email pass to log file

        if($request->ajax())
             return response()->json(['success'=> 'your account created successfuly verify your email to login.']);
        else
            return redirect()->to('login')->with(['success' => 'your account created successfuly verify your email to login.']);

    }

    public function verify(Request $request)
    {
    	$id        = $request->segment(3);
    	$hash      = $request->segment(4);

    	$user      = User::findOrFail($id);
    	
    	$checkHash = Cache::get('user::'.$id);

    	if($checkHash == null && $user->email_verified_at == null) // email verification expired resetn new one.
    	{
    		VerificationEmailJob::dispatchNow($user);
    		return redirect()->to('login')->with(['error' => 'email verification hash is expired we sent you an other.']);
    	}

    	if($hash == $checkHash && $user->email_verified_at == null) // verification done.
    	{
    		$user->update([
    			'email_verified_at' => Carbon::now()
    		]);

    		return redirect()->to('login')->with([
    			'error'   => false,
    			'success' => 'verification complete you can now login.'
    		]);
    	}
    	else if($hash == $checkHash) // already verified.
    		return redirect()->to('login')->with(['success' => 'already verified you can login.']);
        else
            return abort(404);

    }
}