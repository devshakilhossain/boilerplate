<?php

namespace RS\Core;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([self::class, 'load']);
    }

    private static function load($class)
    {
        if (strpos($class, 'RS\\') !== 0) {
            return;
        }

        $path = str_replace(
            ['RS\\', '\\'],
            ['', DIRECTORY_SEPARATOR],
            $class
        );

        $file = BOILERPLATE_PLUGIN_PATH . 'inc/' . $path . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
}
