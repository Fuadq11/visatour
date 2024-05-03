<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:subscribes,email'
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => __('email')
        ];
    }
}
