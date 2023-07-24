<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
                'name' => 'required|max:50',
                'email' => 'required|email|unique:users|max:100',
                'password' => 'required|min:6|max:50',
                'cpassword' => 'required|min:6|same:password'
            
        ];
    }
    public function messages()
    {
        return [
            'cpassword.same' => 'Password did not matched!',
            'cpassword.required' => 'Confirm password is required!'
        ];
    }
}
