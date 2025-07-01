<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
public function store(LoginRequest $request): RedirectResponse
{
    $credentials = $request->only('email', 'password');

    // Cek apakah email ada
    $user = User::where('email', $credentials['email'])->first();
    if (!$user) {
        return back()->withErrors(['email' => 'Email tidak ditemukan di database.'])->withInput();
    }

    // Cek password
    if (!Hash::check($credentials['password'], $user->password)) {
        return back()->withErrors(['password' => 'Kata sandi salah.'])->withInput();
    }

    // Jika validasi berhasil, login
    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->intended(route('admin.dashboard', absolute: false));
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
