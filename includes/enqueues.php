<?php

add_action( 'admin_enqueue_scripts', 'chatzapp_admin_enqueue_scripts' );

function chatzapp_admin_enqueue_scripts( $hook ) {
    wp_enqueue_style( 'chatzapp', CHATZAPP_PATH . 'assets/css/styles.css', [], time(). 'all' );
    wp_enqueue_script( 'chatzapp', CHATZAPP_PATH . 'assets/js/scripts.js', ['jquery'], time(), true );
}