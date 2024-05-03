<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\About\AboutRequest;
use App\Models\About;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();

        if (is_null($about)) {
            $about = About::create([
                'image' => 'image',
                'banner_image' => 'banner image',
                'partner_title' => 'partner title',
                'partner_subtitle' => 'partner subtitle',
                'meta_title' => 'meta title',
                'meta_description' => 'meta description',
                'content' => 'content',
            ]);
        }

        return view('backend.about.edit', compact('about'));
    }

    public function update(AboutRequest $request, About $about)
    {
        if ($request->image) {
            File::delete($about->image);

            $image = $request->file('image');
            $fileNameImage = hexdec(uniqid()).'.'.$image->extension();
            $image->move(public_path("uploads/about/image"), $fileNameImage);
            $imageURL = "uploads/about/image/".$fileNameImage;
            $about->image = $imageURL;
        }

        if ($request->banner_image) {
            File::delete($about->banner_image);

            $banner_image = $request->file('banner_image');
            $fileNameBannerImage = hexdec(uniqid()).'.'.$banner_image->extension();
            $banner_image->move(public_path("uploads/about/banner_image"), $fileNameBannerImage);
            $banner_imageURL = "uploads/about/banner_image/".$fileNameBannerImage;
            $about->banner_image = $banner_imageURL;
        }

        $about->setTranslation('content', app()->getLocale(), $request->input('content'));
        $about->setTranslation('partner_title', app()->getLocale(), $request->input('partner_title'));
        $about->setTranslation('partner_subtitle', app()->getLocale(), $request->input('partner_subtitle'));
        $about->setTranslation('meta_title', app()->getLocale(), $request->input('meta_title'));
        $about->setTranslation('meta_description', app()->getLocale(), $request->input('meta_description'));
        $about->save();

        $notification = [
            'message' => __('about_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.edit')->with($notification);
    }
}
