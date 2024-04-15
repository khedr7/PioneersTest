<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function register($validatedData)
    {
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $accessToken = $user->createToken('auth');

        return true;
        // return [
        //     'user' => $user,
        //     'token' => $accessToken->plainTextToken
        // ];
    }

    public function login($validatedData)
    {
        $user = User::where('email', $validatedData['email'])->first();

        $attemptedData = [
            'email'    => $user->email,
            'password' => $validatedData['password']
        ];
        if (!Auth::attempt($attemptedData)) {
            return [
                'status'   => 0,
                'message'  => 'incorrect password'
            ];
        }
        $token = Auth::attempt($attemptedData);
        $user->save();

        $accessToken = $user->createToken('auth');

        return [
            'status'   => 1,
            'message'  => 'login successful'
        ];
    }

    public function logout()
    {
        Auth::logout();
    }
}
