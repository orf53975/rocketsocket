<?php

namespace Rocketsocket;

class ModuleSetting
{
    public static function config()
    {
        $options = [];
        $drivers = config('drivers');
        foreach ($drivers as $driver => $class) {
            $options[$driver] = $driver;
        }

        return [
            'Shadowsocks' => [
                'Type' => 'dropdown',
                'Options' => $options
            ]
        ];
    }

    public static function packages()
    {
        return [
            'Packages' => [
                'Type' => 'dropdown',
                'Options' => [
                    'option1' => 'Display Value 1',
                    'option2' => 'Second Option',
                    'option3' => 'Another Option',
                ]
            ]
        ];
    }
}
