<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{

    /**
     * Show the application's registration form.
     */
    public function showRegisterForm(): View
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request to the application.
     */
    public function register(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => [
                'bail',
                'required',
                'min:3',
                'max:100'
            ],
            'email' => [
                'bail',
                'required',
                'email:rcf,dns,spoof',
                'unique:users,email',
                'max:100',
            ],
            'password' => [
                'bail',
                'required',
                'min:6',
                'max:100',
                'confirmed'
            ],
        ]);

        $user = User::create($validatedData);

        Auth::login($user);

        return redirect()->intended();
    }
}
