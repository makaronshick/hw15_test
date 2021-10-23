<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::where('username', '=', $data['username'])->get()->first();

        if ($user) {
            if (!Hash::check($data['password'], $user->password)) {
                return back()->withErrors([
                    'password' => 'Wrong password.',
                ]);
            }
        } else {
            $user = User::create([
                'username' => $data['username'],
                'email' => $data['username'],
                'password' => Hash::make($data['password']),
            ]);
        }
        Auth::login($user);

        return back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

}
