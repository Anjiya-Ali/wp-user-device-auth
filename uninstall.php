<?php
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Cleanup: remove all user meta related to device tracking
$users = get_users();

foreach ( $users as $user ) {
    delete_user_meta( $user->ID, 'registered_device' );
}
