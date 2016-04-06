<?php

namespace RenatoNeto\LaravelScaleDrone;

use Illuminate\Support\ServiceProvider;
use ScaleDrone\Client;

class ScaleDroneBroadcastLumenServiceProvider extends ServiceProvider
{

    public function boot()
    {
        unset($this->app->availableBindings['Illuminate\Contracts\Broadcasting\Broadcaster']);

        $this->app->singleton('Illuminate\Contracts\Broadcasting\Broadcaster', function () {

            $this->app->register('Illuminate\Broadcasting\BroadcastServiceProvider');

            $this->app->make(\Illuminate\Broadcasting\BroadcastManager::class, [$this->app])
                ->extend('scaledrone', function ($app, $config) {

                    return new ScaleDroneBroadcaster(new Client([
                        'channel_id' => $config['channel_id'],
                        'secret_key' => $config['secret_key'],
                    ]));

                });

            $this->app->configure('broadcasting');

            return $this->app->make('Illuminate\Contracts\Broadcasting\Broadcaster');

        });

    }

    public function register()
    {
    }

}