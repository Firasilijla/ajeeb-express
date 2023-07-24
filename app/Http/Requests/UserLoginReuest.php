<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginReuest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            
                'email' => 'required|email|max:100',
                'password' => 'required|min:6|max:50',

        ];
    }
    public function messages()
    {
        return [
      
        ];
    }
}