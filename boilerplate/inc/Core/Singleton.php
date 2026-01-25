<?php

namespace RS\Core;

trait Singleton
{
    private static $instance = null;

    final public static function instance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    final private function __clone() {}
    final public function __wakeup() {}

    protected function __construct() {}
}
