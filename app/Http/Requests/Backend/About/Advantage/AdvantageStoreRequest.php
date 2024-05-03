<?php

namespace App\Http\Requests\Backend\About\Advantage;

use Illuminate\Foundation\Http\FormRequest;

class AdvantageStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'icon' => 'required|string|max:255',
            'content' => 'required|string|max:255'
        ];
    }

    public function attributes(): array
    {
        return [
            'icon' => __('icon'),
            'content' => __('content'),
        ];
    }
}
