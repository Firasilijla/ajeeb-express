<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' =>  'required',
            'cpassword' =>  'required|same:password',

        ];
    }
    public function messages()
    {
        return [
        

        ];
    }
}
