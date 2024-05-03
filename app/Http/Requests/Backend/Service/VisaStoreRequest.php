<?php

namespace App\Http\Requests\Backend\Service;

use Illuminate\Foundation\Http\FormRequest;

class VisaStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('name'),
            'icon' => __('icon'),
        ];
    }
}
