<?php

namespace App\Http\Requests\Backend\Service\VisaOption;

use Illuminate\Foundation\Http\FormRequest;

class VisaOptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'visa_type_id' => 'required|exists:visa_types,id',
            'name' => 'required|max:255',
            "order_no" => "required|numeric",
            'visa_fee' => 'nullable|max:255|required_with:price,visa_department_fee,administrative_fee,courier_fee,visa_period,stay_duration|required_without:general_info',
            'price' => 'nullable|max:255|required_with:visa_fee,visa_period,stay_duration|required_without:general_info',
            'visa_department_fee' => 'nullable|max:255|',
            'administration_fee' => 'nullable|max:255|',
            'courier_fee' => 'nullable|max:255|',
            'visa_period' => 'nullable|max:255|required_with:visa_fee,visa_department_fee,administrative_fee,courier_fee,price,stay_duration|required_without:general_info',
            'stay_duration' => 'nullable|max:255|required_with:visa_fee,visa_department_fee,administrative_fee,courier_fee,price,visa_period|required_without:general_info',
            'additional_note' => 'nullable|max:1000',
            'general_info' => 'nullable|max:1000|required_with:additional_note|required_without:visa_fee,price,visa_period,stay_duration',
            'fee_types' => 'nullable|exists:fee_types,id'
        ];
    }

    public function attributes(): array
    {
        return [
            'visa_type_id' => __('visa_type'),
            'name' => __('name'),
            "order_no" => __('order_no'),
            'price' => __('price'),
            'visa_department_fee' => __('visa_department_fee'),
            'administration_fee' => __('administration_fee'),
            'courier_fee' => __('courier_fee'),
            'visa_period' => __('visa_period'),
            'stay_duration' => __('stay_duration'),
            'additional_note' => __('additional_note'),
            'general_info' => __('general_info'),
            'fee_types' => __('feeTypes')
        ];
    }
}
