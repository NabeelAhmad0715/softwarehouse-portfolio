<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use App\Mail\UserWelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'contact_person' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users'],
            'logo' => ['required', 'image'],
            'about' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
        ]);

        $logo = $request->file('logo');
        $filename = Str::random(15) . '.' . $logo->extension();
        Storage::putFileAs("public", $logo, $filename);
        $data['logo'] = $filename;

        $password = Str::random(8);
        $hashPassword =  bcrypt($password);
        $data['password'] = $hashPassword;
        User::Create($data);
        Mail::to($request->email)->send(new UserWelcomeMail($request, $password));

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')->with(compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name,' . $user->id],
            'contact_person' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'logo' => ['nullable', 'image'],
            'about' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
        ]);

        if ($request->logo) {
            $logo = $request->file('logo');
            $filename = Str::random(15) . '.' . $logo->extension();
            Storage::putFileAs("public", $logo, $filename);
            $data['logo'] = $filename;
        }

        $user->Update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function setStatus($id, $status)
    {
        $user = User::where('id', $id)->first();
        $user->status = $status;
        $user->save();
        return response()->json($user);
    }

    public function changePassword(User $user)
    {
        return view('admin.users.change-password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $data = $request->validate([
            'new_password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required_with:new_password', ' same:new_password', 'string', 'min:8'],
        ]);
        $user = User::where('id', $user->id)->first();
        $user->update([
            'password' => Hash::make($data['new_password'])
        ]);
        $request->session()->flash('message', 'Password updated successfully');
        $request->session()->flash('alert-class', 'alert alert-success');
        return redirect()->route('users.index');
    }
}
