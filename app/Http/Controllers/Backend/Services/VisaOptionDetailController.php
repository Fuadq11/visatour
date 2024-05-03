<?php

namespace App\Http\Controllers\Backend\Services;

use App\Http\Controllers\Controller;
use App\Models\VisaOption;
use App\Models\VisaOptionDetail;
use Illuminate\Http\Request;

class VisaOptionDetailController extends Controller
{
    public function edit(VisaOption $visaOption)
    {
        $visaOptionDetail = $visaOption->visaOptionDetail;

        return view('backend.services.countries.visa_option.detail', compact('visaOption', 'visaOptionDetail'));
    }

    public function update(Request $request, VisaOption $visaOption, VisaOptionDetail $visaOptionDetail = null)
    {
        if ($visaOptionDetail) {
            $visaOptionDetail->update(['details' => $request->details]);
        } else {
            $visaOption->visaOptionDetail()->create(['details' => $request->details]);
        }

        $notification = [
            'message' => __('visa_option_detail_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.options.detail.edit', $visaOption)->with($notification);
    }
}