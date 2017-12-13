<?php

namespace Loopy\Spartan;

use Illuminate\Support\ServiceProvider;
use Loopy\Spartan\Http\Client;

class CustomerServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function ($app) {
            return new Client(config('spartan.client.id'), config('spartan.client.secret'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Client::class];
    }
}