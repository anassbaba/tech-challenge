<?php

namespace App\Http\Controllers\_Static\User\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdatePasswordController extends Controller
{
    public function index()
    {
    	return view('static.user.account.update-password');
    }
}
