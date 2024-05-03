<?php

namespace App\Http\Requests\Backend\About\Partner;

use Illuminate\Foundation\Http\FormRequest;

class PartnerUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => __('image'),
        ];
    }
}
