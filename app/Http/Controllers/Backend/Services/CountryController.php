<?php

namespace App\Http\Controllers\Backend\Services;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Visa;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return view('backend.services.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('backend.services.countries.create');
    }

    public function store(Request $request)
    {
        Country::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        $notification = [
            'message' => __('country_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.countries.index')->with($notification);
    }

    public function edit(Country $country)
    {
        return view('backend.services.countries.edit', compact('country'));
    }

    public function update(Request $request, Country $country)
    {
        $country->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        $notification = [
            'message' => __('country_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.countries.index')->with($notification);
    }

    public function destroy(Country $country)
    {
        $country->delete();

        $notification = [
            'message' => __('country_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.service.countries.index')->with($notification);
    }

    public function choose_visa(Country $country)
    {
        $visas = Visa::orderBy('name')->get();

        $country->load('visas');

        return view('backend.services.countries.choose_visa', compact('country', 'visas'));
    }

    public function store_visa(Request $request, Country $country)
    {
        $country->visas()->sync($request->visas);

        $notification = [
            'message' => __('visa_choose_success'),
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
