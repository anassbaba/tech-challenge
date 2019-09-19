<?php

namespace App\Http\Controllers\_Static\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
    	return view('static.guest.login');
    }
}
