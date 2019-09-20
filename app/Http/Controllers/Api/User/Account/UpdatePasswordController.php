<?php

namespace App\Http\Controllers\Api\User\Account;

use Auth;
use Hash;
use Validator;
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

        if($request->ajax())
        {
            $validator = Validator::make($request->all(), [
                'old_password'              => 'required',
                'new_password'              => 'required|min:6|max:255|confirmed',
            ]);


            if (!$validator->passes()) {
                return response()->json(['error'=>$validator->errors()->all()]);
            }
        }
        else

    	   $validatedData = $request->validate([
               'old_password'               => 'required',
        	   'new_password' 				=> 'required|min:6|max:255|confirmed',
    	   ]);

		if (!Hash::check($request->get('old_password'), $user->password)) 
		{
            if($request->ajax())
                return response()->json(['error' => ['old password not valide.']]);
            else
    		  return redirect()->to('user/account/update-password')->with(['error' => 'old password not valide.']);
		}

		$user->update([
			'password' => Hash::make($request->get('new_password'))
		]);

    	if($request->ajax())
                return response()->json(['success' => 'password updated successfuly.']);
        else
    	   return redirect()->to('user/account/update-password')->with(['success' => 'password updated successfuly.']);

    }
}
