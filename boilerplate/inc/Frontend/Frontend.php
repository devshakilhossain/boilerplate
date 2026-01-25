<?php

namespace RS\Frontend;

use RS\Core\Singleton;

class Frontend
{
    use Singleton;

    protected function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'assets']);
        Card::instance();
    }

    private function asset_url($path)
    {
        return trailingslashit(BOILERPLATE_PLUGIN_URL) . 'assets/' . ltrim($path, '/');
    }

    public function assets()
    {
        $css_base = $this->asset_url('styles/frontend/');

        wp_register_style(
            'rs-card-style',
            $css_base . 'card-min.css',
            [],
            '1.0.0'
        );

        // JS base path
        $js_base = $this->asset_url('js/');

        wp_register_script_module(
            'rs-interactive-script',
            $js_base . 'interactive/card.js',
            ['@wordpress/interactivity']
        );

        wp_register_script_module(
            'rs-api-script',
            $js_base . 'apis/ping.js',
            ['@wordpress/interactivity']
        );
    }
}
