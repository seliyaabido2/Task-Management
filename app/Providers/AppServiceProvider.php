<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }
    }
   
    public function boot()
    {
        if($this->app->environment() != 'local')
        {
            $this->app['request']->server->set('HTTPS', true);
            URL::forceScheme('https');
        }
        
        Schema::defaultStringLength(191);

        view()->composer('partials.language_switcher', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });
    }
}
