<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Str;

class SocialiteLoginController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $provider_user = Socialite::driver($provider)->user();
            dd($provider_user);
            $user = User::where([
                'provider' => $provider,
                'provider_id' => $provider_user->getId()
            ])->first();
            // return strlen( $provider_user->token);
            if (!$user) {
                $user = User::create([
                    'provider_id' => $provider_user->getId(),
                    'provider_token' => $provider_user->token,
                    'provider' => $provider,
                    'name' => $provider_user->getName(),
                    'email' => $provider_user->getEmail(),
                    'password' => Hash::make(Str::random(8)),
                ]);
            }
            Auth::login($user);
            return response()->json([
                'status' => 'success',
                'message'=> 'created user was success',
                'data' => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failer',
                'message'=> 'created user was failer',
                'data' => $th->getMessage(),
            ]);
        }
    }
}
