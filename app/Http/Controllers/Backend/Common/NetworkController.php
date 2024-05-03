<?php

namespace App\Http\Controllers\Backend\Common;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Common\NetworkRequest;
use App\Models\Network;

class NetworkController extends Controller
{
    public function index()
    {
        $networks = Network::all();

        return view('backend.common.networks.index', compact('networks'));
    }

    public function create()
    {
        return view('backend.common.networks.create');
    }

    public function store(NetworkRequest $request)
    {
        Network::create($request->validated());

        $notification = array(
            'message' => __('network_create_success'),
            'alert-type' => 'success'
        );

        return redirect()->route('admin.networks.index')->with($notification);
    }

    public function edit(Network $network)
    {
        return view('backend.common.networks.edit', compact('network'));
    }

    public function update(NetworkRequest $request, Network $network)
    {
        $network->update($request->validated());

        $notification = array(
            'message' => __('network_update_success'),
            'alert-type' => 'success'
        );

        return redirect()->route('admin.networks.index')->with($notification);
    }

    public function destroy(Network $network)
    {
        $network->delete();

        $notification = array(
            'message' => __('network_delete_success'),
            'alert-type' => 'success'
        );

        return redirect()->route('admin.networks.index')->with($notification);
    }
}
