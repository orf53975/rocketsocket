<?php

namespace Rocketsocket\Models;

class RecycleBin extends Model 
{
    protected $table = 'recycle_bin';

    protected $guarded = [];

    public function scopeOfPort($query, $port) 
    {
        return $query->where('port', $port);
    }
}
