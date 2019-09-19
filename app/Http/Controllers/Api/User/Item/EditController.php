<?php

namespace App\Http\Controllers\Api\User\Item;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function index()
    {
    	return view('static.user.item.edit');
    }
}
