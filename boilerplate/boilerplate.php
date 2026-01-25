<?php

/**
 * Plugin Name: BOILERPLATEplate
 * Description: BOILERPLATEplate Plgin.
 * Version: 1.0.0
 * Author: Shakil Hossain
 * Author URI: https://devshakilhossain.github.io/portfolio/
 * License: GPL2
 */

// Exit if accessed directly.
if (! defined('ABSPATH')) exit;


// Define Plugin Constants
define('BOILERPLATE_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('BOILERPLATE_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once BOILERPLATE_PLUGIN_PATH . 'inc/Core/Autoloader.php';

use RS\Core\Autoloader;
use RS\Core\Plugin;

Autoloader::register();
Plugin::instance();
