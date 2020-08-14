<?php

namespace App\Providers;
// use App\View\Components\BursarNotifications;

use Illuminate\Support\Facades\Blade;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
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
         Blade::component('package-alert', AlertComponent::class);
         Blade::component('package-alert', RmodalComponent::class);
    }
}
