<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->redirectUrl(config('app.url') . '/driver/auth/google/callback')
            ->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')
                ->redirectUrl(config('app.url') . '/driver/auth/google/callback')
                ->user();

            $finduser = Driver::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::guard('driver')->login($finduser, true);

                return redirect('/driver/home');

            } else {

                $newUser = Driver::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('Mmukarram_786')
                ]);

                Auth::guard('driver')->login($newUser, true);

                return redirect('/driver/home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }


    }

}


