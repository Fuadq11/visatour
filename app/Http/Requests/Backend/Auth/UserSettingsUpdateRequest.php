<?php

namespace App\Http\Requests\Backend\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingsUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstname' => 'required|min:5|max:25',
            'email' => 'required|email',
            'password' => 'nullable|min:6|max:25',
            'password_confirm' => 'nullable|same:password',
        ];
    }

    public function attributes(): array
    {
        return [
            'firstname' => __('fullname'),
            'email' => __('email'),
            'password' => __('password'),
            'password_confirm' => __('password_confirm'),
        ];
    }
}
