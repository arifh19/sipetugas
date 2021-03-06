<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
	\URL::forceScheme('https');
	if($this->app->environment() === 'production'){
	$this->app['request']->server->set('HTTPS', true); }
        Schema::defaultStringLength(191);
        require base_path() . '/app/Helpers/frontend.php';
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
