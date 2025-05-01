<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use app\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request, AuthService $authService)
    {
        $response = $authService->register($request);
        
        return redirect()->route("my-cloud.index");
    }

    public function login(LoginUserRequest $request, AuthService $authService)
    {
        if ($authService->login($request)) {
            return redirect()->route('my-cloud.index');
        }
    
        return redirect()->back()->withErrors([
            'email' => 'Неверный логин или пароль'
        ]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function showRegisterForm()
    {
        return view('auth.register');
    }
 
    public function logout(Request $request, AuthService $authService)
    {
        $authService->logout($request);
        return redirect()->route('auth.register');
    }
}