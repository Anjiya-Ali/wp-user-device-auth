<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Login_Check {

    public static function verify_device_on_login( $user, $username, $password ) {
        if ( is_wp_error( $user ) ) {
            return $user;
        }

        // Check if the user is administrator
        if ( in_array('administrator', $user->roles ) ) {
            return $user;
        }

        $registered_device = get_user_meta( $user->ID, 'registered_device', true );
        $current_device = Device_Tracker::get_device_address();

        // Device check for non-admin users in non-admin areas
        if ( $registered_device !== $current_device ) {
            return new WP_Error( 'device_mismatch', __( 'Login failed: You are not logging in from the registered device.' ) );
        }

        return $user;
    }
}
