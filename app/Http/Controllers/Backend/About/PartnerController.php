<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\About\Partner\PartnerStoreRequest;
use App\Http\Requests\Backend\About\Partner\PartnerUpdateRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('backend.about.partner.index', compact('partners'));
    }

    public function create()
    {
        return view('backend.about.partner.create');
    }

    public function store(PartnerStoreRequest $request)
    {
        $image = $request->file('image');
        $fileNameImage = hexdec(uniqid()).'.'.$image->extension();
        $image->move(public_path("uploads/partner/image"), $fileNameImage);
        $imageURL = "uploads/partner/image/".$fileNameImage;

        $partner = new Partner();
        $partner->image = $imageURL;
        $partner->save();

        $notification = [
            'message' => __('partner_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.partners.index')->with($notification);
    }

    public function edit(Partner $partner)
    {
        return view('backend.about.partner.edit', compact('partner'));
    }

    public function update(PartnerUpdateRequest $request, Partner $partner)
    {
        File::delete($partner->image);

        $image = $request->file('image');
        $fileNameImage = hexdec(uniqid()).'.'.$image->extension();
        $image->move(public_path("uploads/partner/image"), $fileNameImage);
        $imageURL = "uploads/partner/image/".$fileNameImage;
        $partner->image = $imageURL;

        $partner->save();

        $notification = [
            'message' => __('partner_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.partners.index')->with($notification);
    }

    public function destroy(Partner $partner)
    {
        File::delete($partner->image);
        $partner->delete();

        $notification = [
            'message' => __('partner_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.about.partners.index')->with($notification);
    }
}
