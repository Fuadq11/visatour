<?php

namespace App\Http\Requests\Backend\Home\Feature;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'icon' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'required|max:500',
        ];
    }

    public function attributes(): array
    {
        return [
            'icon' => __('icon'),
            'title' => __('title'),
            'description' => __('description'),
        ];
    }
}
