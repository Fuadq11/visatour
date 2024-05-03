<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email|max:100',
            'subject' => 'required|max:30',
            'message' => 'required|max:1000'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('full_name'),
            'email' => __('email'),
            'subject' => __('phone'),
            'message' => __('message')
        ];
    }
}
