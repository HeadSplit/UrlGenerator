<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthRequest $request)
    {
        $data = $request->validated();

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]))
            return redirect()->intended('/dashboard');
        return back()->withErrors(['Неверный логин или пароль']);
    }
}
