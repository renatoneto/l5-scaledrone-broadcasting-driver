<?php

namespace RenatoNeto\LaravelScaleDrone;

use Illuminate\Contracts\Broadcasting\Broadcaster;
use ScaleDrone\Client;

class ScaleDroneBroadcaster implements Broadcaster
{

    /**
     * @var Client
     */
    protected $scaledroneClient;

    public function __construct(Client $scaledroneClient)
    {
        $this->scaledroneClient = $scaledroneClient;
    }

    public function broadcast(array $channels, $event, array $payload = array())
    {
        $this->scaledroneClient->publish($event, $payload);
    }

}