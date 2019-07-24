<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        //done once and deployed like this
        //if(\App::environment('production')){
        //
        //    $url->forceScheme('https');
        //}

        //set this on your live sever configurations
        //if(env('FORCE_HTTP') === true)
        //{
        //    $url->forceScheme('https');
        //}

        //configured in the config file
        //if(config('app.force.https') === true)
        //{
        //    $url->forceScheme('https');
        //}
    }
}
