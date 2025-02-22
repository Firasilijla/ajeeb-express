<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhatWeDoRequest extends FormRequest
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
            'title_en' => 'required|string|max:255', // العنوان باللغة الإنجليزية
            'title_ar' => 'required|string|max:255', // العنوان باللغة العربية
            'description_en' => 'required|string', // الوصف باللغة الإنجليزية
            'description_ar' => 'required|string', // الوصف باللغة العربية
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // الصورة (اختياري)
        ];
    }
}
