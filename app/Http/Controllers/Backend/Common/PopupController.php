<?php

namespace App\Http\Controllers\Backend\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Common\PopupRequest;
use App\Http\Requests\Backend\Contact\ContactRequest;
use App\Models\Popup;
use Illuminate\Support\Facades\File;

class PopupController extends Controller
{
    public function edit()
    {
        $popup = Popup::first();

        if (is_null($popup)) {
            $popup = Popup::create([
                'title' => 'Popup Title',
                'description' => 'Popup Description',
                'button_text' => 'Popup Button Text',
                'button_link' => '#',
                'image' => 'https://via.placeholder.com/1920x1080?text=Popup+Image',
            ]);
        }

        return view('backend.common.popup.edit', compact('popup'));
    }

    public function update(Popup $popup, PopupRequest $request)
    {

        if ($request->image) {
            File::delete($popup->image);

            $image = $request->file('image');
            $fileNameBannerImage = hexdec(uniqid()).'.'.$image->extension();
            $image->move(public_path("uploads/popup/image"), $fileNameBannerImage);
            $imageURL = "uploads/popup/image/".$fileNameBannerImage;
            $popup->image = $imageURL;
        }

        $popup->title = $request->title;
        $popup->description = $request->description;
        $popup->button_text = $request->button_text;
        $popup->button_link = $request->button_link;
        $popup->save();

        $notification = [
            'message' => __('popup_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.popup.edit')->with($notification);
    }
}
