<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function changePassword()
    {
        return view('auth.change-password.edit');
    }
    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required_with:new_password', ' same:new_password', 'string', 'min:8'],
        ]);

        if (Hash::check($data['password'], Auth::user()->password)) {

            $user = User::where('id', Auth::user()->id)->first();
            $user->update([
                'password' => Hash::make($data['new_password'])
            ]);
        } else {
            $request->session()->flash('message', 'Wrong Password');
            $request->session()->flash('alert-class', 'alert alert-danger');
            return redirect()->route('change-password.edit');
        }
        $request->session()->flash('message', 'Password updated successfully');
        $request->session()->flash('alert-class', 'alert alert-success');
        return redirect()->route('change-password.edit');
    }
}
