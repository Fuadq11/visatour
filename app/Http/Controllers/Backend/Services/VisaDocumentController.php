<?php

namespace App\Http\Controllers\Backend\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Service\VisaDocumentRequest;
use App\Models\VisaDocument;
use Illuminate\Http\Request;

class VisaDocumentController extends Controller
{
    public function index()
    {
        $documents = VisaDocument::all();

        return view('backend.services.documents.index', compact('documents'));
    }

    public function create()
    {
        return view('backend.services.documents.create');
    }

    public function store(VisaDocumentRequest $request)
    {
        VisaDocument::create($request->validated());

        $notification = [
            'message' => __('document_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.documents.index')->with($notification);
    }

    public function edit(VisaDocument $document)
    {
        return view('backend.services.documents.edit', compact('document'));
    }

    public function update(VisaDocumentRequest $request, VisaDocument $document)
    {
        $document->update($request->validated());

        $notification = [
            'message' => __('document_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.documents.index')->with($notification);
    }

    public function destroy(VisaDocument $document)
    {
        $document->delete();

        $notification = [
            'message' => __('document_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.documents.index')->with($notification);
    }
}
