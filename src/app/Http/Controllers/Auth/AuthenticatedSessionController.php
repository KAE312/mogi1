<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request)
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // 登録直後はプロフィール編集に行く
            if (session('just_registered')) {
                session()->forget('just_registered');
                return redirect('/users/edit');
            }

            return redirect()->intended('/dashboard');
        }

    }
}
