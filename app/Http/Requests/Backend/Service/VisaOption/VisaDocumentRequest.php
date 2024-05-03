<?php

namespace App\Http\Requests\Backend\Service\VisaOption;

use Illuminate\Foundation\Http\FormRequest;

class VisaDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'documents' => 'required|array|exists:visa_documents,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'documents' => __('documents'),
        ];
    }
}
