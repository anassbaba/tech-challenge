<?php

namespace App\Http\Controllers\Api\User\Item;

use Auth;
use Storage;
use Validator;
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
      if($request->ajax()){
        $validator = Validator::make($request->all(), [
            'image'    => 'required|image',
             'title'    => 'required|max:255|min:3',
            'description'  => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
      }
      else
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

        if($request->ajax())
            return response()->json(['success' => 'item created successfuly.']);
        else
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

               if($request->ajax())
                  return response()->json(['success' => 'item deleted successfuly.']);
               else
      		        return redirect()->to('user/item/all')->with(['success' => 'item deleted successfuly.']);
      	}


    }
}
