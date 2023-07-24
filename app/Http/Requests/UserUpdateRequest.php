<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        
            'type'=> 'required',
            'fname' => 'required',
            'lname' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' =>  'required',
     
        ];
    }
    public function messages()
    {
        return [
            'type.required' => '  هذا الحقل مطلوب',
            'fname.required' => '  هذا الحقل مطلوب',
            'lname.required' => '  هذا الحقل مطلوب',
            'username.required' => '  هذا الحقل مطلوب',
            'phone.required' => '  هذا الحقل مطلوب',
            'email.required' => '  هذا الحقل مطلوب',
            'password.required' => '  هذا الحقل مطلوب',
            
        ];
    }}