<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'phone' => 'required',
            // 'email' => 'required|unique',
            'passcode' =>  'required|numeric|digits:4',
            'password' =>  'required',
            'cpassword' =>  'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            // 'type.required' => '  هذا الحقل مطلوب',
            // 'fname.required' => '  هذا الحقل مطلوب',
            // 'lname.required' => '  هذا الحقل مطلوب',
            // 'username.required' => '  هذا الحقل مطلوب',
            // 'phone.required' => '  هذا الحقل مطلوب',
            // 'email.required' => '  هذا الحقل مطلوب',
            // 'password.required' => '  هذا الحقل مطلوب',
            
        ];
    }}
