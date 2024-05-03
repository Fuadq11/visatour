<?php

namespace App\Http\Requests\Backend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => __('email'),
            'password' => __('password'),
        ];
    }
}
