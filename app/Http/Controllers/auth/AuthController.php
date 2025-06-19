<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function login()
    {
        return view('user.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case '1':
                    return redirect()->route('admin.dashboard');
                case '2':
                    return redirect()->route('superAdmin.dashboard');
                default:
                    Auth::logout();

                    return redirect()->route('dashboard')->withErrors(['role' => 'Invalid role assigned to the user.']);
            }
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
