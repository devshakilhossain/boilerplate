<?php

namespace RS\Core;

abstract class Rest
{
    use Singleton;

    final protected function __construct()
    {
        add_action('rest_api_init', [$this, 'register']);
    }

    final public function register()
    {
        $this->routes();
    }

    abstract protected function routes();
}
