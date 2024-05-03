<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\About\WhyUs\WhyUsStoreRequest;
use App\Http\Requests\Backend\About\WhyUs\WhyUsUpdateRequest;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class WhyUsController extends Controller
{
    public function index()
    {
        $why_uss = WhyUs::all();
        return view('backend.about.why_us.index', compact('why_uss'));
    }

    public function create()
    {
        return view('backend.about.why_us.create');
    }

    public function store(WhyUsStoreRequest $request)
    {
        WhyUs::create($request->validated());

        $notification = [
            'message' => __('why_us_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.whyus.index')->with($notification);
    }

    public function edit(WhyUs $whyu)
    {
        return view('backend.about.why_us.edit', compact('whyu'));
    }

    public function update(WhyUsUpdateRequest $request, WhyUs $whyu)
    {
        $whyu->update($request->validated());

        $notification = [
            'message' => __('why_us_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.whyus.index')->with($notification);
    }

    public function destroy(WhyUs $whyu)
    {
        $whyu->delete();

        $notification = [
            'message' => __('why_us_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.whyus.index')->with($notification);
    }
}
