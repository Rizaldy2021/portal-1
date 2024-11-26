<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //
    public function login(Request $request) {
        $credentials = $request->validate([
            'username' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // if (Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']])) {
        //     return redirect()->intended('/admin');

        if (Auth::attempt(['email' => $credentials['username'], 'password' => $credentials['password']])) {
            $role = Auth::user()->roles;
            $roleNames = $role->pluck('name')->toArray();
            $role = $roleNames->first();
            return redirect()->route($role);
        }

        throw ValidationException::withMessages([
            'username' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
