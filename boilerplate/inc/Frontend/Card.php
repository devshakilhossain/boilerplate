<?php

namespace RS\Frontend;

use RS\Core\Singleton;

class Card
{
    use Singleton;

    protected function __construct()
    {
        add_shortcode('rs_card', [$this, 'render']);
    }

    public function render()
    {
        $context = wp_json_encode([
            'count'   => 0,
            'loading' => false,
        ]);

        wp_enqueue_style('rs-card-style');
        wp_enqueue_script_module('rs-interactive-script');
        wp_enqueue_script_module('rs-api-script');

        ob_start();
?>
        <div
            class="rs-card"
            data-wp-interactive="storeName"
            data-wp-context='<?php echo esc_attr($context); ?>'>
            <h1 data-wp-text="context.count"></h1>

            <button data-wp-on--click="actions.increment">+</button>
            <button data-wp-on--click="actions.decrement">−</button>
        </div>
<?php
        return ob_get_clean();
    }
}
