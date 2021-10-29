<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OauthController
{
    public function index()
    {

     // echo  base64_encode('ZB9CgsEGXmEYqTpfRd:LnTz8X8AwzWA4FpA8vyvuYtwJkYbRTn9');
        $url = 'https://bitbucket.org/site/oauth2/authorize?client_id=' . config('oauth.bitbucket.client_id') . '&response_type=code';
        dd($url);
//        $url = 'https://bitbucket.org/site/oauth2/authorize?client_id=' . config('oauth.bitbucket.client_id') . '&response_type=token';
//        dd($url);
    }

    public function callback(Request $request)
    {
        //dd($request->get('code'));
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization'=> 'basic '.base64_encode('ZB9CgsEGXmEYqTpfRd:LnTz8X8AwzWA4FpA8vyvuYtwJkYbRTn9')
        ])->post('https://bitbucket.org/site/oauth2/access_token', [
            'grant_type' => 'authorization_code',
            'code' => $request->get('code'),
        ]);








//        $response = Http::withHeaders([
//            'Accept' => 'application/json',
//        ])->post('https://bitbucket.org/site/oauth2/access_token', [
//            'client_id:secret' => config('oauth.bitbucket.client_id'),
//            'secret' => config('oauth.bitbucket.secret_key'),
//            'code' => $request->get('code'),
//            'redirect_uri' => config('oauth.bitbucket.callback_uri'),
//        ]);

//        $response = Http::post('https://bitbucket.org/site/oauth2/access_token', [
//            'client_id' => config('oauth.bitbucket.client_id'),
//            'secret' => config('oauth.bitbucket.secret_key'),
//            'grant_type' => 'authorization_code',
//            'code' => $request->get('code'),
//        ]);

        dd($response);
    }
}


