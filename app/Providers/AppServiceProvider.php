<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Throwable;

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
        $settings = [];

        try {
            if (Schema::hasTable('settings')) {
                $settings = Setting::query()->pluck('value', 'key')->all();
            }
        } catch (Throwable) {
            // Table can be unavailable during initial setup.
        }

        View::share('siteSettings', $settings);
    }
}
