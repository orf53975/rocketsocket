<?php

namespace Rocketsocket;

class Rocketsocket 
{
    protected $driver;

    public function __construct(array $parameters)
    {
        $driver = config('drivers.' . $parameters['configoption1']);

        $this->driver = new $driver['driver']($parameters, new $driver['repo']);
    }

    public function __call($method, $parameters) 
    {
        if (method_exists($this->driver, $method)) {
            $this->driver->{$method}(...$parameters);
        }
    }
}
