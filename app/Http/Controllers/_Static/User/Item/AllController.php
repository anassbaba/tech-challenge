<?php

namespace App\Http\Controllers\_Static\User\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllController extends Controller
{
    public function index()
    {
    	return view('static.user.item.all');
    }
}
