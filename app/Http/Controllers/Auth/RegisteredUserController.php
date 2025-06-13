<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
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

        return view('auth.register', compact('providers'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
