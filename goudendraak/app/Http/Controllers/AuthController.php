<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credential = $request->validate([
            "employeeId" => ['required','numeric'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/kassa');
        }
        return back()->withErrors([
            'message' => 'De combinatie van personeelsnummer en wachtwoord is niet correct.',
        ]);
    }
}