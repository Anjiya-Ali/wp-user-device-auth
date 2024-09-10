<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Device_Tracker {

    public static function track_device_on_registration( $user_id ) {
        // Fetch device information (IP, user agent, etc.)
        $device_address = self::get_device_address();

        // Store the device address in user meta
        update_user_meta( $user_id, 'registered_device', $device_address );
    }

    public static function get_device_address() {
        // You can capture more info like browser, OS for more robust device tracking
        return md5($_SERVER['HTTP_USER_AGENT']);
    }

}

