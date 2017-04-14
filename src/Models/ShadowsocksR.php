<?php

namespace Rocketsocket\Models;

class ShadowsocksR extends Model 
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    protected $table = 'user';

    protected $guarded = [];

    public function scopeOfServiceId($query, $serviceId) 
    {
        return $query->where('service_id', $serviceId);
    }
}
