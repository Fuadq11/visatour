<?php

namespace App\Http\Requests\Backend\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'content' => 'required',
            'partner_title' => 'required|max:255',
            'partner_subtitle' => 'required|max:255',
            'meta_title' => 'required',
            'meta_description' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => __('image'),
            'banner_image' => __('banner_image'),
            'content' => __('content'),
            'partner_title' => __('partner_title'),
            'partner_subtitle' => __('partner_subtitle'),
            'meta_title' => __('title'),
            'meta_description' => __('description'),
        ];
    }
}
