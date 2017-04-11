<?php

namespace Rocketsocket\Models;

use Rocketsocket\Drivers\Rocketsocket;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    protected $connection = Rocketsocket::DATABSE_CONNECTION_NAME;
}
