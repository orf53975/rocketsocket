<?php

namespace Rocketsocket\Models;

class ShadowsocksR extends Model 
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    protected $table = 'user';

    protected $guarded = [];

    protected $appends = [
        'status'
    ];

    protected $statusMapping = [
        self::STATUS_ENABLE => '正常',
        self::STATUS_DISABLE => '被停用'
    ];

    public function getStatusAttribute() 
    {
        return $this->statusMapping[$this->attributes['enable']];
    }

    public function getTransferEnableAttribute() 
    {
        return bandwidth_convert($this->attributes['transfer_enable']);
    }

    public function scopeOfServiceId($query, $serviceId) 
    {
        return $query->where('service_id', $serviceId);
    }
}
