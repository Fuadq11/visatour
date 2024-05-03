<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Contact\ContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = Contact::first();

        if (is_null($contact)) {
            $contact = Contact::create([
                'main_email' => 'info@visatour.az',
                'phone1' => '+994 70 3497932',
                'phone2' => '+994 70 3597932',
                'phone3' => '+994 55 3497932',
                'address' => 'Bakı şəh, Səməd Vurğun küç 110, Vurgun residence , 2-ci mərtəbə, AZ 1022',
                'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3039.108718438484!2d49.838504!3d40.384283!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d9f915bf741%3A0x7e38e72dd9a2ba4c!2sVurgun%20Residence!5e0!3m2!1sen!2saz!4v1707672157218!5m2!1sen!2saz',
                'work_hours' => 'Bazar ertəsi - Cümə: 10:00 - 18:00',
                'about' => 'VİSATOUR - Dünyanın istənilən ölkəsinə viza dəstəyi göstərən Professional Viza Mərkəzidir. Viza mərkəzi səyahət və biznes vizaları üzrə Standard və Vip xidmətlər göstərir.',
                'banner_image' => 'https://via.placeholder.com/1920x1080?text=Banner+Image',
                'meta_title' => 'VİSATOUR - Dünyanın istənilən ölkəsinə viza dəstəyi göstərən Professional Viza Mərkəzi',
                'meta_description' => 'Viza mərkəzi səyahət və biznes vizaları üzrə Standard və Vip xidmətlər göstərir.',
            ]);
        }

        return view('backend.contact.edit', compact('contact'));
    }

    public function update(Contact $contact, ContactRequest $request)
    {

        if ($request->banner_image) {
            File::delete($contact->banner_image);

            $banner_image = $request->file('banner_image');
            $fileNameBannerImage = hexdec(uniqid()).'.'.$banner_image->extension();
            $banner_image->move(public_path("uploads/contact/banner_image"), $fileNameBannerImage);
            $banner_imageURL = "uploads/contact/banner_image/".$fileNameBannerImage;
            $contact->banner_image = $banner_imageURL;
        }

        $contact->main_email = $request->main_email;
        $contact->email = $request->email;
        $contact->phone1 = $request->phone1;
        $contact->phone2 = $request->phone2;
        $contact->phone3 = $request->phone3;
        $contact->phone4 = $request->phone4;
        $contact->address = $request->address;
        $contact->map = $request->map;
        $contact->work_hours = $request->work_hours;
        $contact->about = $request->about;
        $contact->meta_title = $request->meta_title;
        $contact->meta_description = $request->meta_description;
        $contact->save();

        $notification = [
            'message' => __('contact_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.contact.edit')->with($notification);
    }
}
