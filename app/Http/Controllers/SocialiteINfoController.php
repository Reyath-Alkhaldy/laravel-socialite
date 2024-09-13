<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteINfoController extends Controller
{
    public function index()
    {
        // $user = Auth::user();
        $user = User::first();
        return $user->provider_token;
        $user_provider = Socialite::driver($user->provider)->userFromToken($user->provider_token);
          dd($user_provider);
    }
    // In your controller

public function showArticles()
{
    // Sample JSON data
    $json = '{
        "articles": [
            {
                "source": {
                    "id": null,
                    "name": "Yahoo Entertainment"
                },
                "author": "Lawrence Bonk",
                "title": "Apple Event 2024: All the iPhone 16, Apple Watch and AirPods news expected today",
                "description": "For Apple followers, the biggest tech day of the year is finally here: The Apple iPhone 16 launch event...",
                "url": "https://consent.yahoo.com/v2/collectConsent?sessionId=1_cc-session_73b84f7e-c15e-429e-bef2-f5acc2962bdd",
                "urlToImage": null,
                "publishedAt": "2024-09-09T14:10:25Z",
                "content": "If you click Accept all, we and our partners..."
            },
            // Add other articles here
        ]
    }';

    // Decode JSON into PHP array
    $data = json_decode($json);
dd($json);
    // Pass the data to the Blade view
    return view('articles', ['articles' => $data['articles']]);
}
}

