<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the application's login form.
     */
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'email' => [
                'bail',
                'required',
                'exists:users,email',
            ],
            'password' => [
                'bail',
                'required',
            ],
        ]);

        if (!Auth::attempt($validatedData, $request->remember)) {
            return back()->withErrors([
                'email' => 'Wrong credentials.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        if (Auth::user()->is_admin) {
            return to_route('admins.dashboard');
        }

        return redirect()->intended();
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended();
    }
}
