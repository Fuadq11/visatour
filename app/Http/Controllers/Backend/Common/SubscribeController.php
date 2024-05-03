<?php

namespace App\Http\Controllers\Backend\Common;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    public function __invoke()
    {
        $subscribes = Subscribe::all();

        return view('backend.common.subscribe.index', compact('subscribes'));
    }
}
