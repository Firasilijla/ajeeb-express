<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
          'name'=>"required",
          'email'=>'required|email|unique:users',
          'password'=>'required',
          'cpassword'=>'required|same:password'
        ];
    }
    public function messages()
    {
      return  [
            'name.required' => "هذا الحقل مطلوب",
            'email.required' =>"هذا الحقل مطلوب",
            'email.email' =>"هذا الحقل يجب ان يكون ايميل صالح",
            'email.unique' =>"هذا الحقل موجود مسبقا",
            'password.required' =>"هذا الحقل مطلوب",
            'cpassword.required' =>"هذا الحقل مطلوب",
            'cpassword.same' =>"هذا الحقل غير متطابق مع كلمه المرور",

        ];
    }
}
