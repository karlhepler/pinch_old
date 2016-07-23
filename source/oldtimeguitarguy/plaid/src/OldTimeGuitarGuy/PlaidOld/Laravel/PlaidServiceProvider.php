<?php

namespace OldTimeGuitarGuy\Plaid\Laravel;

use OldTimeGuitarGuy\Plaid\Plaid;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\ServiceProvider;
use OldTimeGuitarGuy\Plaid\Contracts\PlaidClient;

class PlaidServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config.php' => config_path('plaid.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PlaidClient::class, function($app) {
            return new Plaid(
                new GuzzleClient([
                    'base_uri' => $app['config']['plaid.host'],
                ]),
                $app['config']['plaid.clientId'],
                $app['config']['plaid.secret']
            );
        });
    }
}
