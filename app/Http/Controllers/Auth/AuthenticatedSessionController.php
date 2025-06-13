<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $providers = [
            ['name' => 'google', 'color' => '#ea4335', 'icon' => 'fab fa-google'],
            ['name' => 'github', 'color' => '#24292e', 'icon' => 'fab fa-github'],
            ['name' => 'linkedin', 'color' => '#0077b5', 'icon' => 'fab fa-linkedin'],
            ['name' => 'discord', 'color' => '#7289da', 'icon' => 'fab fa-discord'],
            ['name' => 'twitter', 'color' => '#1da1f2', 'icon' => 'fab fa-twitter'],
            ['name' => 'twitch', 'color' => '#6441a5', 'icon' => 'fab fa-twitch'],
        ];

        return view('auth.login', compact('providers'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard', absolute: false))->with('message', 'Login Berhasil');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
