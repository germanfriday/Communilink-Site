<?php
/*
Plugin Name: BuddyPress Mass Messaging
Plugin URI: http://jeremylitten.com/buddypress-mass-messaging-plugin/
Description: Allows sending of individual messages to all Buddypress users.
Author: Jeremy Litten
Tags: buddypress, messages, messaging
Version: 1.2
Requires at least: WPMU 2.8.4, BuddyPress 1.1
Author URI: http://comerecommended.com
*/
function mm_init() {
    require( dirname( __FILE__ ) . '/bp-mass-messaging.php' );
}
add_action( 'bp_init', 'mm_init' );

?>