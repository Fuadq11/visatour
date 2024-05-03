<?php

namespace App\Http\Requests\Backend\About\WhyUs;

use Illuminate\Foundation\Http\FormRequest;

class WhyUsStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:2000',
        ];
    }

    public function attributes(): array
    {
        return [
            'icon' => __('icon'),
            'title' => __('title'),
            'content' => __('content'),
        ];
    }
}
