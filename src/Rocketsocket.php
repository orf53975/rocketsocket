<?php

namespace Rocketsocket;

class Rocketsocket 
{
    public function __construct(array $parameters)
    {
        $driver = config('drivers.' . $parameters['configoption1']);
        $driver = $driver['driver'];
        $repo = $driver['repo'];

        return new $driver(new $repo);
    }
}
