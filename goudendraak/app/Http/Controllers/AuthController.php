<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle the incoming request to log in a user.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'employeeNr' => 'required|numeric',
            'password' => 'required|string'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('kassa.index');
        }
        return back()->withErrors(['employeeNr' => 'The provided credentials do not match our records.']);
    }

    /**
     * Handle the incoming request to log out a user.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('kassa.index');
    }
}
