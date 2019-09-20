<?php

namespace App\Http\Controllers\Api\Guest;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WallController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    		return response()->json(DB::table('items')->paginate(5));
    	else
    		return view('static.guest.wall');
    }
}
