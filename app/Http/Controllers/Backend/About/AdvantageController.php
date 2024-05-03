<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\About\Advantage\AdvantageStoreRequest;
use App\Http\Requests\Backend\About\Advantage\AdvantageUpdateRequest;
use App\Models\Advantage;

class AdvantageController extends Controller
{
    public function index()
    {
        $advantages = Advantage::all();

        return view('backend.about.advantage.index', compact('advantages'));
    }

    public function create()
    {
        return view('backend.about.advantage.create');
    }

    public function store(AdvantageStoreRequest $request)
    {
        $advantage = new Advantage();
        $advantage->icon = $request->input('icon');
        $advantage->setTranslation('content', app()->getLocale(), $request->input('content'));
        $advantage->save();

        $notification = [
            'message' => __('advantage_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.advantages.index')->with($notification);
    }

    public function edit(Advantage $advantage)
    {
        return view('backend.about.advantage.edit', compact('advantage'));
    }

    public function update(AdvantageUpdateRequest $request, Advantage $advantage)
    {
        $advantage->icon = $request->input('icon');
        $advantage->setTranslation('content', app()->getLocale(), $request->input('content'));
        $advantage->save();

        $notification = [
            'message' => __('advantage_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.advantages.index')->with($notification);
    }

    public function destroy(Advantage $advantage)
    {
        $advantage->delete();

        $notification = [
            'message' => __('advantage_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.advantages.index')->with($notification);
    }
}
