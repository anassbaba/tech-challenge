<?php

namespace App\Http\Controllers\Api\User\Item;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllController extends Controller
{
	public function index()
	{
		return view('static.user.item.all');
	}

	public function json(Request $request)
	{
		return $this->response($request, 'user/item/all', [
			'messages'  => [
				'errors'    => [],
				'success'   => []
			],
			'items' => Auth::user()->items()->orderBy('id', 'desc')->paginate(10)
		]);
	}
}
