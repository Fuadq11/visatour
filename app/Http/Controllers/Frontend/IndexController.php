<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Feature;
use App\Models\Offer;
use App\Models\Popup;
use App\Models\Slider;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $offers = Offer::orderBy('order_no')->get();
        $features = Feature::latest()->get();
        $mainPhone = Contact::first()?->phone1;
        $countries = Country::all();
        $popUp = Popup::first();

        if (!is_null($mainPhone)) {
            $mainPhone = str_replace(' ', '', $mainPhone);
        }

        return view('frontend.index', compact('sliders', 'offers', 'features', 'mainPhone', 'countries', 'popUp'));
    }
}
