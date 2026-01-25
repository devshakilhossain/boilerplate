<?php

namespace RS\Admin;

use RS\Core\Singleton;

class Admin
{
    use Singleton;

    protected function __construct()
    {
        add_action('admin_init', [$this, 'init']);
    }

    public function init()
    {
        // admin logic
    }
}
