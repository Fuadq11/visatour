<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\LoginRequest;
use App\Http\Requests\Backend\Auth\UserSettingsUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginFrm()
    {
        return view('backend.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Auth::attempt($request->validated())) {
                $notification = [
                    'message' => __('welcome').' '.auth()->user()->name,
                    'alert-type' => 'success',
                ];

                return redirect()->route('admin.index')->with($notification);
            }

            return redirect()->route('admin.loginFrm')->with('error', 'Email və ya Şifrə yanlışdır');
        }

        return redirect()->route('admin.loginFrm')->with('error', 'Email və ya Şifrə yanlışdır');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.loginFrm');
    }

    public function settings()
    {
        return view('backend.auth.setting');
    }

    public function change_settings(UserSettingsUpdateRequest $request, User $user)
    {
        $user->name = $request->firstname;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $notification = [
            'message' => __('settings_edit_success'),
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.index')->with($notification);
    }
}
