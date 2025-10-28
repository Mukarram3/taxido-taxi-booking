<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
            ->redirectUrl(config('app.url') . '/user/auth/google/callback')
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
                ->redirectUrl(config('app.url') . '/user/auth/google/callback')
                ->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {

                Auth::guard('user')->login($finduser, true);

                return redirect('/user/home');

            } else {

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('Mmukarram_786')
                ]);

                Auth::guard('user')->login($newUser, true);

                return redirect('/user/home');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }


    }

}


