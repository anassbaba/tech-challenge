<?php

namespace App\Http\Controllers\Api\User\Item;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    		return response()->json(Auth::user()->items()->paginate(5));
    	else
    		return view('static.user.item.all');
    }
}
