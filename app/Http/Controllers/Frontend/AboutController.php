<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Advantage;
use App\Models\Partner;
use App\Models\WhyUs;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::firstOrFail();
        $advantages = Advantage::all();
        $whyUs = WhyUs::all();
        $partners = Partner::all();

        return view('frontend.about', compact('about', 'advantages', 'whyUs', 'partners'));
    }
}
