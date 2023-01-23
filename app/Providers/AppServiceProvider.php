<?php

namespace App\Providers;


use App\Models\Setting;
use App\Helpers\Helpers;
use App\Models\ThemeOption;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (Helpers::installation()) {

            if (Schema::hasTable('settings')) {

                $settings = Setting::first()->get();
                View::share('settings', $settings);
            }

            if (Schema::hasTable('theme_options')) {

                $theme = ThemeOption::first();
                View::share('theme', $theme);
            }
        }
    }
}
