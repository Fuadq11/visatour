<?php

namespace App\Http\Controllers\Backend\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Service\VisaOption\VisaDocumentRequest;
use App\Models\VisaDocument;
use App\Models\VisaOption;

class VisaOptionDocumentController extends Controller
{
    public function index(VisaOption $visaOption)
    {
        $visa_documents = $visaOption->load('documents');
        $documents = VisaDocument::all();

        return view('backend.services.countries.visa_option.passports',
            compact('visaOption', 'visa_documents', 'documents'));
    }

    public function store(VisaDocumentRequest $request, VisaOption $visaOption)
    {
        $visaOption->documents()->sync($request->documents);

        return redirect()->route('admin.service.option.documents.index', $visaOption);
    }
}
