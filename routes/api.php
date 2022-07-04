<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Str;
use App\Report;
use App\GeneralSetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ReportMail;
use App\Mail\PasswordMail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::group(["middleware" => "auth:api"], function () {

    Route::get('/logout', function (Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out', 'is_successfully' => true
        ]);
    });

    Route::post('profile/update', function (Request $request) {
        $user = User::where('id', Auth::user()->id)->first();
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name,' . $user->id],
            'contact_person' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'about' => ['nullable', 'string'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user->update($data);
        return response()->json([
            'user' => $user, 'is_successfully' => true
        ]);
    });

    Route::post('change-password', function (Request $request) {

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
            return response()->json([
                'message' => 'Wrong Password', 'is_successfully' => false
            ]);
        }
        return response()->json([
            'message' => 'Password Updated successfully', 'is_successfully' => true
        ]);
    });
});

Route::post('forgot-password', function (Request $request) {

    $data = $request->validate([
        'email' => ['required', 'email']
    ]);

    $user = User::where('email', $data['email'])->first();
    if ($user) {
        $newPassword = Str::random(8);
        $user->update([
            'password' => Hash::make($newPassword)
        ]);

        Mail::to($user->email)->send(new PasswordMail($user, $newPassword));

        return response()->json([
            'message' => 'Password is send to your email', 'is_successfully' => true
        ]);
    }
    return response()->json([
        'message' => 'This user is not found', 'is_successfully' => false
    ]);
});

Route::post('/login', function (Request $request) {
    $data = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    if (!Auth::attempt($data)) {
        return response()->json(['error' => 'The provided credentials are incorrect.', 'is_successfully' => false], 401);
    }
    $accessToken = auth()->user()->createToken('authToken')->accessToken;

    return response(['user' => auth()->user(), 'access_token' => $accessToken, 'is_successfully' => true]);
});

Route::post('/signup', function (Request $request) {
    $data = $request->validate([
        'name' => ['required', 'string', 'max:255', 'unique:users'],
        'contact_person' => ['nullable', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users'],
        'about' => ['nullable', 'string'],
        'phone' => ['required', 'string', 'max:255'],
        'address' => ['nullable', 'string'],
        'password' => ['required', 'string', 'min:8'],
    ]);

    $data['password'] = Hash::make($request->password);
    $user = User::create($data);
    Auth::attempt(['email' => $data['email'], 'password' => $request->password]);
    $accessToken = auth()->user()->createToken('authToken')->accessToken;
    return response()->json(['user' => $user, 'access_token' => $accessToken, 'is_successfully' => true]);
});
