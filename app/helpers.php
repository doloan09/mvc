<?php

if (! function_exists('env')) {
    function env($key, $default = null) {
        return $_ENV[$key] ?? $default;
    }
}

if (! function_exists('config')) {
    function config($key, $default = null) {
        return \App\Core\Config::get($key, $default);
    }
}
