<?php
/*
Plugin Name: User Device Auth
Description: Track user's device during registration and restrict logins to the same device.
Version: 1.0
Author: WooNinjas
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define constants
define( 'UDA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include necessary files
require_once UDA_PLUGIN_DIR . 'includes/class-device-tracker.php';
require_once UDA_PLUGIN_DIR . 'includes/class-login-check.php';

// Initialize plugin
class User_Device_Auth {

    public function __construct() {
        add_action( 'user_register', [ 'Device_Tracker', 'track_device_on_registration' ] );
        add_filter( 'authenticate', [ 'Login_Check', 'verify_device_on_login' ], 30, 3 );
    }

}

// Initialize the plugin
new User_Device_Auth();