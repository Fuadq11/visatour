<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Home\Feature\FeatureRequest;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function index()
    {
        $features = Feature::latest()->get();

        return view('backend.home.feature.index', compact('features'));
    }

    public function create()
    {
        return view('backend.home.feature.create');
    }

    public function store(FeatureRequest $request)
    {
        Feature::create($request->validated());

        $notification = [
            'message' => __('feature_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.home.features.index')->with($notification);
    }

    public function edit(Feature $feature)
    {
        return view('backend.home.feature.edit', compact('feature'));
    }

    public function update(FeatureRequest $request, Feature $feature)
    {
        $feature->update($request->validated());

        $notification = [
            'message' => __('feature_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.home.features.index')->with($notification);
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();

        $notification = [
            'message' => __('feature_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.home.features.index')->with($notification);
    }
}
