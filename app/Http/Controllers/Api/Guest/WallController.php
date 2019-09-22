<?php

namespace App\Http\Controllers\Api\Guest;

use Auth;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WallController extends Controller
{
	public function index()
	{
		return view('static.guest.wall');
	}

    public function json(Request $request)
    {
		return $this->response($request, 'wall', [
			'messages'  => [
				'errors'    => [],
				'success'   => []
			],
			'items' => Item::orderBy('id', 'desc')->paginate(5)
		]);
    }
}
