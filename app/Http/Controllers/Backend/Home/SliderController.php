<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Home\Slider\SliderStoreRequest;
use App\Http\Requests\Backend\Home\Slider\SliderUpdateRequest;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.home.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('backend.home.slider.create');
    }

    public function store(SliderStoreRequest $request)
    {
        $image = $request->file('image');
        $fileNameImage = hexdec(uniqid()).'.'.$image->extension();
        $image->move(public_path("uploads/slider/image"), $fileNameImage);
        $imageURL = "uploads/slider/image/".$fileNameImage;

        $slider = new Slider();
        $slider->image = $imageURL;
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->save();

        $notification = [
            'message' => __('slider_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.home.sliders.index')->with($notification);
    }

    public function edit(Slider $slider)
    {
        return view('backend.home.slider.edit', compact('slider'));
    }

    public function update(SliderUpdateRequest $request, Slider $slider)
    {
        if ($request->image) {
            File::delete($slider->image);

            $image = $request->file('image');
            $fileNameImage = hexdec(uniqid()).'.'.$image->extension();
            $image->move(public_path("uploads/slider/image"), $fileNameImage);
            $imageURL = "uploads/slider/image/".$fileNameImage;
            $slider->image = $imageURL;
        }

        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->save();

        $slider->save();

        $notification = [
            'message' => __('slider_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.home.sliders.index')->with($notification);
    }

    public function destroy(Slider $slider)
    {
        File::delete($slider->image);
        $slider->delete();

        $notification = [
            'message' => __('slider_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.home.sliders.index')->with($notification);
    }
}
