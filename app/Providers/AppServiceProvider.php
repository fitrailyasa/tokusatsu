<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Era;
use App\Models\Franchise;
use App\Models\Category;
use App\Models\Data;
use App\Models\Tag;
use App\Observers\UserObserver;
use App\Observers\EraObserver;
use App\Observers\FranchiseObserver;
use App\Observers\CategoryObserver;
use App\Observers\DataObserver;
use App\Observers\TagObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Midtrans\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        // Observers
        User::observe(UserObserver::class);
        // Era::observe(EraObserver::class);
        // Franchise::observe(FranchiseObserver::class);
        // Category::observe(CategoryObserver::class);
        // Data::observe(DataObserver::class);
        // Tag::observe(TagObserver::class);

        // Socialite Providers
        Event::listen(function (\SocialiteProviders\Manager\SocialiteWasCalled $event) {
            $event->extendSocialite('discord', \SocialiteProviders\Discord\Provider::class);
            $event->extendSocialite('twitch', \SocialiteProviders\Twitch\Provider::class);
        });

        // Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }
}
