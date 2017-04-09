<?php

namespace Rocketsocket;

use Illuminate\Support\Arr;

class Config
{
    const DEFAULT_CONFIG_FILE = __DIR__ . '/../config.php';

    protected $items;

    public function __construct($file = null)
    {
        if (is_null($file)) {
            $this->items = require self::DEFAULT_CONFIG_FILE;
        } else {
            $this->items = require $file;
        }
    }

    /**
     * Get the specified configuration value.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return Arr::get($this->items, $key, $default);
    }

    /**
     * Set a given configuration value.
     *
     * @param  array|string  $key
     * @param  mixed   $value
     * @return void
     */
    public function set($key, $value = null)
    {
        $keys = is_array($key) ? $key : [$key => $value];
        foreach ($keys as $key => $value) {
            Arr::set($this->items, $key, $value);
        }
    }
}
