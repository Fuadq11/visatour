<?php

namespace App\Http\Requests\Backend\Home\Offer;

use Illuminate\Foundation\Http\FormRequest;

class OfferStoreRequest extends FormRequest
{public function authorize(): bool
{
    return true;
}

    public function rules(): array
    {
        return [
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'url' => 'required|string',
            'place' => 'required|string|max:255',
            'direction' => 'required|numeric',
            'transport' => 'required|numeric',
            'nights' => 'required|numeric',
            'package' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'order_no' => 'required|numeric',
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => __('image'),
            'place' => __('place'),
            'direction' => __('direction'),
            'transport' => __('transport'),
            'nights' => __('nights'),
            'package' => __('package'),
            'price' => __('price'),
            'type' => __('type'),
            'order_no' => __('order_no'),
        ];
    }
}
