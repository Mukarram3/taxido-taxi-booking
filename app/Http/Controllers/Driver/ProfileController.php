<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(){
        $user = Auth::guard('driver')->user();
        return view('driver-app.profile', ['user' => $user]);
    }

    public function update_profile(Request $request)
    {
        $driver = Driver::where('id', Auth::guard('driver')->id())->first();
        if ($request->hasFile('profile')) {
            $path = $request->file('profile')->store('documents/profile', 'public');
            $driver->profile = $path;
        }
        $driver->firstName = $request->firstName;
        $driver->lastName = $request->lastName;
        $driver->email = $request->email;
        $driver->phone = $request->phone;
        $driver->birthDate = $request->birthDate;
        $driver->address = $request->address;
        $driver->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }
}
