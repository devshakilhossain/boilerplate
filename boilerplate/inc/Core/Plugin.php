<?php

namespace RS\Core;

use RS\Admin\Admin;
use RS\Frontend\Frontend;
use RS\API\Api;

class Plugin
{
    use Singleton;

    protected function __construct()
    {
        $this->init();
    }

    private function init()
    {
        if (is_admin()) {
            Admin::instance();
        }

        Frontend::instance();
        Api::instance();
    }
}
