<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Advantage;
use App\Models\Country;
use App\Models\Partner;
use App\Models\VisaOption;
use App\Models\WhyUs;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('frontend.services.index', compact('countries'));
    }

    public function show(Country $country)
    {
        $country->load([
            'visas.visaOptions' => function ($query) use ($country) {
                $query->whereHas('country', function ($query) use ($country) {
                    $query->where('country_id', $country->id);
                });
            },
            'visas.visaOptions.visaType',
            'visas.visaOptions.fee_types'
        ]);
        return view('frontend.services.show', compact('country'));
    }

    public function getVisaOptionDetails(Request $request)
    {
        $visaOption = VisaOption::find($request->option)->load('visaType', 'fee_types');
        $visaId = $visaOption->visa?->id;
        return response()->json([
            'data' => $visaOption,
            'visaId' => $visaId
        ]);
    }

    public function detail(VisaOption $visaOption)
    {
        $visaOption->load('visaType', 'fee_types', 'country', 'visa', 'documents');

        return view('frontend.services.detail', compact('visaOption'));
    }
}
