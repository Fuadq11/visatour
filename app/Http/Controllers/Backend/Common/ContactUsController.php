<?php

namespace App\Http\Controllers\Backend\Common;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactUs = ContactUs::get();

        return view('backend.common.contact_us.index', compact('contactUs'));
    }

    public function show(ContactUs $contactUs)
    {
        return view('backend.common.contact_us.show', compact('contactUs'));
    }

    public function delete(ContactUs $contactUs)
    {
        $contactUs->delete();

        $notification = [
            'message' => __('contactUs_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.contactUs.index')->with($notification);
    }
}
