<?php

function chatzapp_what_browser( $browser ) {
    if ( isset( $_SERVER['HTTP_USER_AGENT'] ) ) {
        $agent = $_SERVER['HTTP_USER_AGENT'];
    }

    if ( strlen( strstr( $agent, $browser ) ) > 0 ) {
        return true;
    }
}