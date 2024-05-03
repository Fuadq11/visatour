<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SubscribeRequest;
use App\Mail\SubscribeMail;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function store(SubscribeRequest $request)
    {
        $subscribe = Subscribe::create($request->validated());

        $notification = [
            'message' => __('subscribe_success'),
            'alert-type' => 'success'
        ];

        Mail::to('info@visatour.az')
            ->cc(['naliyeva@visatour.az', 'pmammadova@visatour.az'])
            ->send(new SubscribeMail($subscribe));

        return back()->with($notification);
    }
}
