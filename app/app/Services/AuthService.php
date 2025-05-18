<?php

namespace App\Services;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthService
{
    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        Storage::disk('private')->makeDirectory('users/' . $user->id);

        Auth::login($user);

        return [
            'success' => true,
            'message' => 'Registration successful'
        ];
    }

    public function login(LoginUserRequest $request)
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return [
                'success' => false,
                'message' => 'Invalid credentials'
            ];
        }

        Auth::login($user);
        return [
            'success' => true,
            'message' => 'Login successful'
        ];
    }

    public function logout()
    {
        Auth::logout();
    }
}