<?php

namespace App\Http\Requests\Guest;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class Register extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ! Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'                 => 'required|email|unique:users,email|max:255',
            'password'              => 'required|min:6|max:255|confirmed',
            'password_confirmation' => 'required',
        ];
    }

}
