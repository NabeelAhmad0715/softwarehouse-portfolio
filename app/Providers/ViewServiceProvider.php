<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\GeneralSetting;
use App\Career;
use App\Service;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.*', 'admin.*', '*'], function ($view) {
            $settings = GeneralSetting::first();
            $careers = Career::latest()->get();
            $services = Service::latest()->get();
            $view->with(compact('settings', 'careers', 'services'));
        });
    }
}
