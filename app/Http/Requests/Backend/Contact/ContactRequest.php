<?php

namespace App\Http\Requests\Backend\Contact;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'main_email' => 'required|string|email|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone1' => 'required|string|max:255',
            'phone2' => 'nullable|string|max:255',
            'phone3' => 'nullable|string|max:255',
            'phone4' => 'nullable|string|max:255',
            'address' => 'required|string|max:1000',
            'map' => 'required|string|max:2000',
            'work_hours' => 'required|string|max:1000',
            'about' => 'required|string|max:1000',
            'meta_title' => 'required|string|max:500',
            'meta_description' => 'required|string|max:500',
        ];
    }

    public function attributes(): array
    {
        return [
            'main_email' => __('main email'),
            'email' => __('email'),
            'phone1' => __('phone') . '1',
            'phone2' => __('phone') . '2',
            'phone3' => __('phone') . '3',
            'phone4' => __('phone') . '4',
            'address' => __('address'),
            'map' => __('map'),
            'work_hours' => __('work hours'),
            'about' => __('about'),
            'meta_title' => __('meta title'),
            'meta_description' => __('meta description'),
        ];
    }
}
