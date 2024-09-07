<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $user = User::where('email', $socialUser->getEmail())->first();

        if ($user) {
            $existingProviders = $this->ensureArray($user->provider);
            $existingProviderIds = $this->ensureArray($user->provider_id);
            $existingTokens = $this->ensureArray($user->provider_tokens);

            $existingProviders[] = $provider;
            $existingProviderIds[] = $socialUser->getId();

            $existingTokens[$provider] = $socialUser->token;

            $user->update([
                'provider' => array_values(array_unique($existingProviders)),
                'provider_id' => array_values(array_unique($existingProviderIds)),
                'provider_tokens' => $existingTokens,
            ]);
        } else {
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => [$provider],
                'provider_id' => [$socialUser->getId()],
                'provider_tokens' => [$provider => $socialUser->token],
                'status' => 'aktif',
                'role' => 'user',
            ]);
        }

        auth()->login($user);

        return redirect('/dashboard');
    }

    protected function ensureArray($value)
    {
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return is_array($decoded) ? $decoded : [];
        }

        return is_array($value) ? $value : [];
    }
}
