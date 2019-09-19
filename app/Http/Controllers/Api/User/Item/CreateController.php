<?php

namespace App\Http\Controllers\Api\User\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function index()
    {
    	return view('static.user.item.create');
    }
}
