<?php

namespace App\Http\Controllers\Backend\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Service\VisaStoreRequest;
use App\Models\Visa;
use Illuminate\Http\Request;

class VisaController extends Controller
{
    public function index()
    {
        $visas = Visa::all();

        return view('backend.services.visas.index', compact('visas'));
    }

    public function create()
    {
        return view('backend.services.visas.create');
    }

    public function store(VisaStoreRequest $request)
    {
        Visa::create($request->validated());

        $notification = [
            'message' => __('visa_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.visas.index')->with($notification);
    }

    public function edit(Visa $visa)
    {
        return view('backend.services.visas.edit', compact('visa'));
    }

    public function update(VisaStoreRequest $request, Visa $visa)
    {
        $visa->update($request->validated());

        $notification = [
            'message' => __('visa_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.visas.index')->with($notification);
    }

    public function destroy(Visa $visa)
    {
        $visa->delete();

        $notification = [
            'message' => __('visa_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.visas.index')->with($notification);
    }
}
