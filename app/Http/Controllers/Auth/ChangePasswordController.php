<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.change_password');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        Auth::user()->password = Hash::make($request->get('new_password'));
        Auth::user()->save();

        return back()->with('success', 'Password successfully changed');
    }
}
