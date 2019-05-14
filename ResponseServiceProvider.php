<?php

namespace SddBrandCare\Cookie;

use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sddResponse', function ($app) {
            return new ResponseFactory($app['Illuminate\Contracts\View\Factory'], $app['redirect']);
        });
    }
}
