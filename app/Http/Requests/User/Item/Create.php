<?php

namespace App\Http\Requests\User\Item;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image'         => 'required|image',
            'title'         => 'required|max:255|min:3',
            'description'   => 'required|min:10',
        ];
    }
}
