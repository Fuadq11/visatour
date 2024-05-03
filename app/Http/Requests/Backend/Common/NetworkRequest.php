<?php

namespace App\Http\Requests\Backend\Common;

use Illuminate\Foundation\Http\FormRequest;

class NetworkRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:155',
            'url' => 'required|max:1000',
            'icon' => 'required|max:155',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('name'),
            'url' => __('url'),
            'icon' => __('icon'),
        ];
    }
}
