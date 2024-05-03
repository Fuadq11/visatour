<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Home\Offer\OfferStoreRequest;
use App\Http\Requests\Backend\Home\Offer\OfferUpdateRequest;
use App\Models\Offer;
use Illuminate\Support\Facades\File;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::orderBy('order_no')->get();

        return view('backend.home.offer.index', compact('offers'));
    }

    public function create()
    {
        return view('backend.home.offer.create');
    }

    public function store(OfferStoreRequest $request)
    {
        $image = $request->file('image');
        $fileNameImage = hexdec(uniqid()).'.'.$image->extension();
        $image->move(public_path("uploads/offer/image"), $fileNameImage);
        $imageURL = "uploads/offer/image/".$fileNameImage;

        $offer = new Offer();
        $offer->image = $imageURL;
        $offer->url = $request->url;
        $offer->place = $request->place;
        $offer->direction = $request->direction;
        $offer->transport = $request->transport;
        $offer->nights = $request->nights;
        $offer->package = $request->package;
        $offer->price = $request->price;
        $offer->type = $request->type;
        $offer->order_no = $request->order_no;
        $offer->save();

        $notification = [
            'message' => __('offer_create_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.home.offers.index')->with($notification);
    }

    public function edit(Offer $offer)
    {
        return view('backend.home.offer.edit', compact('offer'));
    }

    public function update(OfferUpdateRequest $request, Offer $offer)
    {
        if ($request->image) {
            File::delete($offer->image);

            $image = $request->file('image');
            $fileNameImage = hexdec(uniqid()).'.'.$image->extension();
            $image->move(public_path("uploads/slider/image"), $fileNameImage);
            $imageURL = "uploads/slider/image/".$fileNameImage;
            $offer->image = $imageURL;
        }

        $offer->url = $request->url;
        $offer->place = $request->place;
        $offer->direction = $request->direction;
        $offer->transport = $request->transport;
        $offer->nights = $request->nights;
        $offer->package = $request->package;
        $offer->price = $request->price;
        $offer->type = $request->type;
        $offer->order_no = $request->order_no;
        $offer->save();

        $notification = [
            'message' => __('offer_update_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.home.offers.index')->with($notification);
    }

    public function destroy(Offer $offer)
    {
        File::delete($offer->image);

        $offer->delete();

        $notification = [
            'message' => __('offer_delete_success'),
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.home.offers.index')->with($notification);
    }
}
