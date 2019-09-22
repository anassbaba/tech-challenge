<?php

namespace App\Http\Controllers\Api\User\Item;

use Auth;
use Storage;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Item\Create;

class CreateController extends Controller
{
    public function index()
    {
    	return view('static.user.item.create');
    }

    public function new(Create $request)
    {
    	Auth::user()->items()->create([
    		'image' 		=> $request->file('image')->store('images'),
    		'title' 		=> $request->get('title'),
    		'description' 	=> $request->get('description'),
    	]);

        return $this->response($request, 'user/item/all', [
            'messages'  => [
                'errors'    => [],
                'success'   => ['item created successfuly.']
            ]
        ]);
    }

    public function remove(Request $request)
    {
       $id  =  $request->segment(4);

       $item = Auth::user()->items()->findOrFail($id);

       if ($item) {
            Storage::delete($item->image);

            $item->delete();

            return $this->response($request, 'user/item/all', [
                'messages'  => [
                    'errors'    => [],
                    'success'   => ['item deleted successfuly.']
                ]
            ]);
        }
    }
}
