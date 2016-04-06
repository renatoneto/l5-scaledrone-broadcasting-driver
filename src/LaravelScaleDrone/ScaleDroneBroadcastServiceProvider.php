<?php

namespace RenatoNeto\LaravelScaleDrone;

use Illuminate\Support\ServiceProvider;
use ScaleDrone\Client;

class ScaleDroneBroadcastServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->app->make(\Illuminate\Broadcasting\BroadcastManager::class)
            ->extend('scaledrone', function ($app, $config) {

                return new ScaleDroneBroadcaster(new Client([
                    'channel_id' => $config['channel_id'],
                    'secret_key' => $config['secret_key'],
                ]));

            });
    }

    public function register()
    {
    }

}