<?php

namespace App\Http\Controllers\Api\User\Item;

use Auth;
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function index()
    {
    	return view('static.user.item.create');
    }

    public function new(Request $request)
    {
    	$validatedData = $request->validate([
        	'image' 		=> 'required|image',
        	'title' 		=> 'required|max:255|min:3',
        	'description' 	=> 'required',
    	]);

    	$path = $request->file('image')->store('images');

    	Auth::user()->items()->create([
    		'image' 		=> $path,
    		'title' 		=> $request->get('title'),
    		'description' 	=> $request->get('description'),
    	]);

    	return redirect()->to('user/item/all')->with(['success' => 'item created successfuly.']);
    }

    public function remove(Request $request)
    {
      	$id =  $request->segment(4);
      	$item = Auth::user()->items()->findOrFail($id);

      	if($item)
      	{
      		Storage::delete($item->image);
      		$item->delete();
      		return redirect()->to('user/item/all')->with(['success' => 'item deleted successfuly.']);
      	}


    }
}
