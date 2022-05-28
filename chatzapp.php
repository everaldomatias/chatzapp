<?php
/**
 * Plugin Name:       ChatZapp
 * Plugin URI:        https://everaldo.dev/plugins/chatzapp
 * Description:       Adds a random number button for that app's chat.
 * Version:           0.0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Everaldo Matias
 * Author URI:        https://everaldo.dev/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://everaldo.dev/plugins/chatzapp
 * Text Domain:       chatzapp
 * Domain Path:       /languages
 */

function chatzapp_plugin_activate() {
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'chatzapp_plugin_activate' );