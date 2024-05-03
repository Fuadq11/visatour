<?php

namespace App\Http\Requests\Backend\Home\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => __('image'),
            'title' => __('title'),
            'sub_title' => __('sub_title'),
        ];
    }
}
