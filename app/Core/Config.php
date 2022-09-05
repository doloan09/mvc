<?php

namespace App\Core;

class Config
{
    public static function get($key = null, $default = null) {
        $configs = [
            'app_name' => env('APP_NAME'),
            'app_env' => env('APP_ENV'),
            'app_debug' => env('APP_DEBUG'),

            'db_host' => env('DB_HOST', ''),
            'db_port' => env('DB_PORT', 3306),
            'db_database' => env('DB_DATABASE', ''),
            'db_username' => env('DB_USERNAME', ''),
            'db_password' => env('DB_PASSWORD', ''),
        ];

        if (is_null($key)) return $configs;
        return $configs[$key] ?? $default;
    }
}