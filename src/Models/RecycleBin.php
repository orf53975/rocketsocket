<?php

namespace Rocketsocket\Models;

class RecycleBin extends Model 
{
    public $timestamps = false;

    protected $table = 'recycle_bin';

    protected $guarded = [];

    public function scopeOfPort($query, $port) 
    {
        return $query->where('port', $port);
    }
}
