<?php

namespace App\Http\Controllers\Backend\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Service\VisaOption\VisaOptionRequest;
use App\Models\Country;
use App\Models\FeeType;
use App\Models\Visa;
use App\Models\VisaOption;
use App\Models\VisaType;

class VisaOptionController extends Controller
{
    public function index(Country $country, Visa $visa)
    {
        $visaOptions = VisaOption::where('visa_id', $visa->id)
            ->with('visaType')
            ->where('country_id', $country->id)
            ->orderBy('order_no')
            ->get();

        return view('backend.services.countries.visa_option.index', compact('country', 'visa', 'visaOptions'));
    }

    public function create(Country $country, Visa $visa)
    {
        $visaTypes = VisaType::orderBy('name')->get();
        $feeTypes = FeeType::orderBy('name')->get();
        return view('backend.services.countries.visa_option.create',
            compact('country', 'visa', 'visaTypes', 'feeTypes'));
    }

    public function store(VisaOptionRequest $request, Country $country, Visa $visa)
    {
        $visaOption = new VisaOption();
        $visaOption->visa_id = $visa->id;
        $visaOption->country_id = $country->id;
        $visaOption->visa_type_id = $request->visa_type_id;
        $visaOption->name = $request->name;
        $visaOption->order_no = $request->order_no;
        $visaOption->visa_fee = $request->visa_fee;
        $visaOption->price = $request->price;
        // new prices
        $visaOption->visa_department_fee = $request->visa_department_fee;
        $visaOption->administration_fee = $request->administration_fee;
        $visaOption->courier_fee = $request->courier_fee;
        // end of new prices
        $visaOption->visa_period = $request->visa_period;
        $visaOption->stay_duration = $request->stay_duration;
        $visaOption->additional_note = $request->additional_note;
        $visaOption->general_info = $request->general_info;
        $visaOption->save();

        $visaOption->fee_types()->sync($request->fee_types);

        $notification = [
            'message' => __('visa_option_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.countries.visa.options', [$country, $visa])->with($notification);
    }

    public function edit(Country $country, Visa $visa, VisaOption $visaOption)
    {
        $visaTypes = VisaType::orderBy('name')->get();
        $feeTypes = FeeType::orderBy('name')->get();
        return view('backend.services.countries.visa_option.edit',
            compact('country', 'visa', 'visaOption', 'visaTypes', 'feeTypes'));
    }

    public function update(VisaOptionRequest $request, Country $country, Visa $visa, VisaOption $visaOption)
    {
        $visaOption->visa_type_id = $request->visa_type_id;
        $visaOption->name = $request->name;
        $visaOption->order_no = $request->order_no;
        $visaOption->visa_fee = $request->visa_fee;
        $visaOption->price = $request->price;
         // new prices
         $visaOption->visa_department_fee = $request->visa_department_fee;
         $visaOption->administration_fee = $request->administration_fee;
         $visaOption->courier_fee = $request->courier_fee;
         // end of new prices
        $visaOption->visa_period = $request->visa_period;
        $visaOption->stay_duration = $request->stay_duration;
        $visaOption->additional_note = $request->additional_note;
        $visaOption->general_info = $request->general_info;
        $visaOption->save();

        $notification = [
            'message' => __('visa_option_update_success'),
            'alert-type' => 'success'
        ];

        $visaOption->fee_types()->sync($request->fee_types);

        return redirect()->route('admin.service.countries.visa.options', [$country, $visa])->with($notification);
    }

    public function destroy(Country $country, Visa $visa, VisaOption $visaOption)
    {
        $visaOption->fee_types()->detach();
        $visaOption->delete();

        $notification = [
            'message' => __('visa_option_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.countries.visa.options', [$country, $visa])->with($notification);
    }
}
