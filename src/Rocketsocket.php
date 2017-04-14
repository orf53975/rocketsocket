<?php

namespace Rocketsocket;

use Rocketsocket\Exceptions\RocketException;

class Rocketsocket 
{
    protected $driver;

    public function __construct(array $parameters)
    {
        $driver = config('drivers.' . $parameters['configoption1']);
        if (class_exists($driver['driver'])) {
            $this->driver = new $driver['driver']($parameters, new $driver['repo']);
        } else {
            throw new RocketException("Drvier {$driver['driver']} Not Found.");
        }
    }

    public function __call($method, $parameters) 
    {
        if (method_exists($this->driver, $method)) {
            $this->driver->{$method}(...$parameters);
        }
    }
}
