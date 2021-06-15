<?php
function mm_message_admin_menu() {
	if ( !is_site_admin() )
		return false;
	add_submenu_page( 'bp-general-settings', __( 'Mass Messaging', 'mm'), __( 'Mass Messaging', 'mm' ), 'administrator', 'bp-mass-messaging', 'mm_message_admin_screen' );
}
add_action( is_multisite() ? 'network_admin_menu' : 'admin_menu', 'mm_message_admin_menu' );
function mm_message_admin_screen() { ?>
		<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div>
		<h2><?php _e( 'Mass Messaging', 'mm' ) ?></h2>
		<?php if( function_exists ( 'messages_new_message' ) ) { ?>
		<p><?php _e( 'This allows you to send messages to all buddypress users individually.', 'mm' ) ?></p>
			 <form action="<?php echo get_bloginfo('url') ?>/wp-admin/admin.php?page=bp-mass-messaging" method="post" id="mass-message">
                 <p>Subject:<br /> <input name="mm_subject" type="text" value="" size="45" /></p>
                 <p>Message:<br /> <textarea name="mm_content" cols="40" rows="10"></textarea></p>
                 <br />
                 <?php wp_nonce_field( 'mm_nounce' ); ?>
   				 <input name="submit" type="submit" value="Send Messages!"/></form>
   		<?php } else { 
   				echo "<div id='message' class='updated fade below-h2'>Please <a href='" . get_bloginfo('url') . "/wp-admin/admin.php?page=bp-component-setup'>activate the BuddyPress private messaging component</a> in order to use this plugin</div>"; 
   				} ?>
	</div> <!-- .wrap -->
<?php
}

function mm_send_messages(){
	if( isset($_POST['mm_subject'])){
		check_admin_referer('mm_nounce');
		global $wpdb;
		global $bp;
		$sender_id = $bp->loggedin_user->id;
		$user_ids = $wpdb->get_col("SELECT ID FROM wp_users");
		$content = $_POST["mm_content"];
		$subject = $_POST["mm_subject"];
		$s = 0; // sent messages counter
			foreach ($user_ids as $user_id) {
				if($user_id == $sender_id) continue; // do not send message to yourself!
						if( messages_new_message( array('sender_id' => $sender_id, 'subject' => $subject, 'content' => $content, 'recipients' => $user_id) ) )
				$s++;
				if ( $s % 10 == 0 )
					sleep(1); // to help server load, delay 1 seconds for every 10 messages sent
			}
		if($s >= 1){
			echo "<script type='text/javascript'> alert('" . $s . " messages sent successfully')</script>";
		} else {
			echo "<script type='text/javascript'> alert('An error occurred, please try again.')</script>";
		}
	}
}
add_action('admin_init', 'mm_send_messages');?>