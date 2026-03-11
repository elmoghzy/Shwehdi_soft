<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
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
            'client_name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'business_activity' => ['required', 'string', 'max:120'],
            'interested_in' => ['required', 'string', 'max:180'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'client_name.required' => 'يرجى كتابة الاسم.',
            'phone.required' => 'يرجى إدخال رقم الهاتف.',
            'business_activity.required' => 'يرجى تحديد النشاط التجاري.',
            'interested_in.required' => 'يرجى تحديد العرض أو المنتج المطلوب.',
        ];
    }
}
