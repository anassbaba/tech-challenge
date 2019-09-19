<?php

namespace App\Http\Controllers\Api\User\Account;

use Auth;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdatePasswordController extends Controller
{
    public function index()
    {
    	return view('static.user.account.update-password');
    }

    public function update(Request $request)
    {
    	$user = Auth::user();

    	$validatedData = $request->validate([
        	'new_password' 				=> 'required|min:6|max:255|confirmed',
    	]);

		if (!Hash::check($request->get('old_password'), $user->password)) 
		{
    		return redirect()->to('user/account/update-password')->with(['error' => 'old password not valide.']);
		}

		$user->update([
			'password' => Hash::make($request->get('new_password'))
		]);
    	
    	return redirect()->to('user/account/update-password')->with(['success' => 'password updated successfuly.']);

    }
}
