<?php

add_action( 'admin_menu', 'chatzapp_add_admin_menu' );
add_action( 'admin_init', 'chatzapp_settings_menu' );

function chatzapp_add_admin_menu() {
    add_options_page(
        __( 'ChatZapp', 'chatzapp' ),
        __( 'ChatZapp', 'chatzapp' ),
        'manage_options',
        'chatzapp',
        'chatzapp_settings_page_render'
    );
}

function chatzapp_settings_menu() {
    register_setting( 'chatzapp', 'chatzapp_settings' );

    add_settings_section(
        'chatzapp_section',
        __( 'ChatZapp', 'chatzapp' ),
        'chatzapp_settings_section_callback',
        'chatzapp'
    );

    add_settings_field(
        'message',
        __( 'Message', 'chatzapp' ),
        'chatzapp_settings_message_render',
        'chatzapp',
        'chatzapp_section'
    );

    add_settings_field(
        'phones',
        __( 'Phone(s)', 'chatzapp' ),
        'chatzapp_settings_phones_render',
        'chatzapp',
        'chatzapp_section'
    );
}

function chatzapp_settings_section_callback() {
    echo '';
}

function chatzapp_settings_message_render() {
    $options = get_option( 'chatzapp_settings' );
    $message = isset( $options['message'] ) ? $options['message'] : '';

    ?>
        <input type='text' name='chatzapp_settings[message]' value='<?php echo $message; ?>'>
    <?php
}

function chatzapp_settings_phones_render() {
    $options = get_option( 'chatzapp_settings' );
    $phones = isset( $options['phones'] ) ? $options['phones'] : [];
    $phones = array_filter( $phones );

    if ( is_array( $phones ) && count( $phones ) >= 1 ) : ?>

        <?php foreach( $phones as $phone ) : ?>
            <div class="repeatable-row">
                <div><input type="text" placeholder="<?php _e( 'Phone', 'chatzapp' ); ?>" name="chatzapp_settings[phones][]" value="<?php if ( $phone != '' ) echo esc_attr( $phone ); ?>" /></div>
                <div><a class="button remove-row" href="#1"><?php _e( 'Remove', 'chatzapp' ); ?></a></div>
            </div>
        <?php endforeach; ?>

    <?php else : ?>

        <div class="repeatable-row">
            <div><input type="text" placeholder="<?php _e( 'Phone', 'chatzapp' ); ?>" name="chatzapp_settings[phones][]" /></div>
            <div><a class="button remove-row" href="#"><?php _e( 'Remove', 'chatzapp' ); ?></a></div>
        </div>

    <?php endif; ?>

    <div class="repeatable-row empty-row">
        <div><input type="text" placeholder="<?php _e( 'Phone', 'chatzapp' ); ?>" name="chatzapp_settings[phones][]" /></div>
        <div><a class="button remove-row" href="#1"><?php _e( 'Remove', 'chatzapp' ); ?></a></div>
    </div>

    <p><a id="add-row" class="button" href="#"><?php _e( 'Add other phone', 'chatzapp' ); ?></a></p>

    <?php

}

/**
 * Render the settings page
 */
function chatzapp_settings_page_render() {
    ?>
    <form action='options.php' method='post'>
        <?php
        settings_fields( 'chatzapp' );
        do_settings_sections( 'chatzapp' );
        submit_button();
        ?>
    </form>
    <?php
}

