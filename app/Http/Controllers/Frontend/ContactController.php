<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactUsRequest;
use App\Mail\ContactUsMail;
use App\Models\Contact;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::firstOrFail();
        return view('frontend.contact', compact('contact'));
    }

    public function store(ContactUsRequest $request)
    {
        $contactUs = ContactUs::create($request->validated());

        $notification = [
            'message' => __('sent_success'),
            'alert-type' => 'success'
        ];

        Mail::to('info@visatour.az')
            ->cc(['naliyeva@visatour.az', 'pmammadova@visatour.az'])
            ->send(new ContactUsMail($contactUs));

        return back()->with($notification);
    }
}
