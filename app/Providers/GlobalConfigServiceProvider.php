<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;


class GlobalConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         if (Schema::hasTable('settings')) {
            $setting = Setting::first();
            view()->share('global_setting', $setting);
        }
    }
}
