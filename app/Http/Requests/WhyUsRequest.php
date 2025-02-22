<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhyUsRequest extends FormRequest
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
            'orders_delivered' => 'required|integer|min:0', // عدد الطلبات المُسلّمة، يجب أن يكون رقمًا صحيحًا غير سالب
            'satisfied_clients' => 'required|integer|min:0', // عدد العملاء الراضين، يجب أن يكون رقمًا صحيحًا غير سالب
        ];
        
    }
    public function messages()
    {
        
        return [
            'title_en.required' =>  __('messages.required', ['attribute' => 'title']), // العنوان باللغة الإنجليزية
            'title_en.string' => '', // العنوان باللغة العربية
            'title_ar.required' =>  __('messages.required', ['attribute' => 'العنوان']), // العنوان باللغة الإنجليزية
        
        ];
        
    } 
}
