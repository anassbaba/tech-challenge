<?php

namespace App\Http\Controllers\Api\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller
{
    public function index()
    {
    	return view('static.guest.reset-password');
    }
}
