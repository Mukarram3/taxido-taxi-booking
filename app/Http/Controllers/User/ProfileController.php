<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::guard('user')->user();
        return view('user-app.profile', ['user' => $user]);
    }

    public function update_profile(Request $request)
    {

        $user = User::where('id', Auth::guard('user')->id())->first();
        if ($request->hasFile('profile') && $request->file('profile')->isValid()) {
            $path = $request->file('profile')->store('documents/profile', 'public');
            $user->profile = $path;
        }
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthDate = $request->birthDate;
        $user->address = $request->address;
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
