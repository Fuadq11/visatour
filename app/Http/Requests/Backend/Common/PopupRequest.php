<?php

namespace App\Http\Requests\Backend\Common;

use Illuminate\Foundation\Http\FormRequest;

class PopupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:1500',
            'description' => 'required|string|max:1000',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('title'),
            'description' => __('subtitle'),
            'button_text' => __('button_text'),
            'button_link' => __('button_link'),
            'image' => __('image')
        ];
    }
}
