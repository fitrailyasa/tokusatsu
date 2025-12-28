<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $email = $socialUser->getEmail();
        $username = Str::slug($socialUser->getName(), '_');

        if (empty($username)) {
            $username = $provider . '_' . $socialUser->getId();
        }

        if (empty($email)) {
            $domain = parse_url(config('app.url'), PHP_URL_HOST);
            $email = $provider . '_' . $socialUser->getId() . '@' . $domain;
        }

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
                'email' => $email,
                'username' => $username,
                'provider' => [$provider],
                'provider_id' => [$socialUser->getId()],
                'provider_tokens' => [$provider => $socialUser->token],
                'email_verified_at' => now(),
            ]);

            $user->assignRole('user');
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
