<?php

namespace Rocketsocket\Models;

use Rocketsocket\Contracts\Database;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent implements Database
{

}
