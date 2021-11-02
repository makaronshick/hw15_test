<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class OauthController
{
    public function callback(Request $request)
    {
        $url = 'https://bitbucket.org/site/oauth2/access_token';
        $params = [
            'grant_type' => 'authorization_code',
            'code' => $request->get('code'),
        ];

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode(config('oauth.bitbucket.client_id') . ':' . config('oauth.bitbucket.secret_key'))
        ])->asForm()->post($url,$params);

        $token = $response->json('access_token');

        $url = 'https://api.bitbucket.org/2.0/user';
        $info = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->get($url);

        $url = 'https://api.bitbucket.org/2.0/user/emails';
        $email = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->get($url);

        $user = User::updateOrCreate([
            'email' => $email->json('values.0.email')
        ], [
            'email' => $email->json('values.0.email'),
            'username' => $info->json('username'),
            'password' => Hash::make(Str::random(10))
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
}
