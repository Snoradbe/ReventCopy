<?php

namespace App\Providers;

use App\Server;
use App\Services\SelectedServer;
use Illuminate\Support\Facades\View;
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
        $this->app->singleton(SelectedServer::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') == 'production') {
            View::share('servers', Server::all());
            View::share('authServer', function() {
                return session()->get('server_id');
            });
        }
    }
}
