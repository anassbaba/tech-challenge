<?php

namespace App\Http\Controllers\Api\User\Account;

use Auth;
use Hash;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UpdatePassword;

class UpdatePasswordController extends Controller
{
    public function index()
    {
    	return view('static.user.account.update-password');
    }

    public function update(UpdatePassword $request)
    {
    	$user = Auth::user();

        if (! Hash::check($request->get('old_password'), $user->password)) 
        {
            return $this->response($request, 'user/account/update-password', [
                'messages'  => [
                    'errors'    => ['Old password not valide.'],
                    'success'   => []
                ]
            ]);
        }

        $user->update([
            'password' => Hash::make($request->get('new_password'))
        ]);

        return $this->response($request, 'user/account/update-password', [
            'messages'  => [
                'errors'    => [],
                'success'   => ['Password updated successfuly.']
            ]
        ]);

    }
}
