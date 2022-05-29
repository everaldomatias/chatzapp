<?php

add_action( 'wp_footer', 'chatzapp_print_icon' );

function chatzapp_print_icon() {

    $options = get_option( 'chatzapp_settings' );
    $message = isset( $options['message'] ) ? $options['message'] : '';
    $phones = isset( $options['phones'] ) ? array_filter( $options['phones'] ) : [];

    if ( is_array( $phones ) && count( $phones ) >= 1 ) {

        if ( chatzapp_what_browser( 'Firefox' ) ) {
            $link = 'https://web.whatsapp.com/send?phone=';
        } else {
            $link = 'https://wa.me/';
        }

        shuffle( $phones );
        $phone_rand = array_rand( $phones, 1 );

        $link .= $phones[$phone_rand];

        if ( ! empty( $message ) ) {

            $message = urlencode( $message );
            $message = str_replace( '+', '%20', $message );

            $link .= '?text=' . $message;
        }

        ?>
        <div class="chatzapp_button">
            <a target="_blank" href="<?php echo $link; ?>">
                <img src="<?php echo CHATZAPP_PATH; ?>assets/images/icon.svg" />
            </a>
        </div>
    <?php

    }

}