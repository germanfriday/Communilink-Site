<?php
/* Stop the theme from killing WordPress if BuddyPress is not enabled. */
if ( !class_exists( 'BP_Core_User' ) )
	return false;

/* Register the widget columns */
//for welcome section
register_sidebars( 1, 
	array( 
		'name' => 'welcome-section',
		'before_widget' => '<div id="%1$s" class=" box widget %2$s">',
        'after_widget' => '<div class="clear"></div></div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
	) 
);
//for homepage first section
register_sidebars( 1, 
	array( 
		'name' => 'homepage-first-section',
		'id' => 'homepage-first-section',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '<div class="clear"></div></div></div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2><div class="widget-content">'
	) 
);
register_sidebars( 1, 
	array( 
		'name' => 'homepage-main-col1',
		'id' => 'homepage-main-col1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '<div class="clear"></div></div></div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2><div class="widget-content">'
	) 
);
register_sidebars( 1, 
	array( 
		'name' => 'homepage-main-col2',
		'id' => 'homepage-main-col2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '<div class="clear"></div></div></div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2><div class="widget-content">'
	) 
);
//for homepage/register/activation page
register_sidebars( 1,
	array( 
		'name' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '<div class="clear"></div></div></div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3><div class="widget-content">'
	) 
);
//for blog pages
register_sidebars( 1,
	array( 
		'name' => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '<div class="clear"></div></div></div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3><div class="widget-content">'
	) 
);

register_sidebars( 1,
	array( 
		'name' => 'profile-sidebar-top',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '<div class="clear"></div></div></div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3><div class="widget-content">'
	) 
);



/* Load the AJAX functions for the theme */
require_once( TEMPLATEPATH . '/_inc/ajax.php' );

/* Load the javascript for the theme */
if(!is_admin()){
if(apply_filters("cb_has_overlayed_login",true))
	wp_enqueue_script( 'jquerytools', get_template_directory_uri() . '/_inc/jquery.tools.min.js', array( 'jquery') );
wp_enqueue_script( 'dtheme-ajax-js', get_template_directory_uri() . '/_inc/global.js', array( 'jquery') );

}


if(is_admin())
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'theme-admin/admin.php');
//for logo, topbar logo and bottombar log
$cb_logo=get_option("cb_cb_header_logo");
$cb_topbar_logo=get_option("cb_cb_topbar_logo");
$cb_bottombar_logo=get_option("cb_cb_bottombar_logo");
if(empty($cb_logo))
	$cb_logo=get_stylesheet_directory_uri()."/_inc/images/logo-big.gif";
if(empty($cb_topbar_logo))
	$cb_topbar_logo=get_stylesheet_directory_uri()."/_inc/images/topbar_logo.gif";
if(empty($cb_bottombar_logo))
	$cb_bottombar_logo=get_stylesheet_directory_uri()."/_inc/images/bottombar_logo.gif";

	/*** This was removed by Bp 1.2
	*/
	function cb_get_the_body_class( $wp_classes, $custom_classes ) {
		global $bp;

				
		if ( bp_is_blog_page() || bp_is_register_page() || bp_is_activation_page() )
			$bp_classes[] = 'blog-page';
		
		if ( !bp_is_blog_page() && !bp_is_register_page() && !bp_is_activation_page() )
			$bp_classes[] = 'internal-page';
				
	
		
 
		/* Merge WP classes with BP classes */
		$classes = array_merge( (array) $bp_classes, (array) $wp_classes );
		
		/* Remove any duplicates */
		$classes = array_unique( $classes );
		
		return apply_filters( 'bp_get_the_body_class', $classes, $bp_classes, $wp_classes, $custom_classes );
	}
	add_filter( 'body_class', 'cb_get_the_body_class', 11, 2 );



//add_action("wp","add_extra_nav");

function add_extra_nav(){
global $bp;
$groups_link = $bp->loggedin_user->domain . $bp->groups->slug . '/';

$bp->bp_options_nav[$bp->groups->slug]["create"] = array(
		'name' => "Create",
		'link' => $groups_link . '/',
		'slug' => $slug,
		'css_id' => $item_css_id,
		'position' => 100,
		'user_has_access' => $user_has_access
	);
	//print_r($bp->options_nav);
	/* Add the subnav items to the groups nav item */
	//bp_core_new_subnav_item( array( 'name' => __( 'My Groups', 'buddypress' ), 'slug' => 'my-groups', 'parent_url' => $groups_link, 'parent_slug' => $bp->groups->slug, 'screen_function' => 'groups_screen_my_groups', 'position' => 10, 'item_css_id' => 'groups-my-groups' ) );
	//bp_core_new_subnav_item( array( 'name' => __( 'aaaaa', 'buddypress' ), 'slug' => 'aaaa', 'parent_url' => $groups_link, 'parent_slug' => $bp->groups->slug, 'screen_function' => 'groups_screen_group_invites', 'position' => 30, 'user_has_access' => bp_is_my_profile() ) );


}
function cb_get_thumb_size(){

   $thumb_size=array('full'=>array('width'=>350,'height'=>350),'thumb'=>array('width'=>150,'height'=>150));
   return apply_filters("cb_get_post_thumb_sizes", $thumb_size);
}
/* Post thumbnail support*/
add_theme_support( 'post-thumbnails' );
$thumb_size=cb_get_thumb_size();
set_post_thumbnail_size( $thumb_size['thumb']['width'],$thumb_size['thumb']['height'], true );
add_image_size( 'single-post-thumbnail', $thumb_size['full']['width'],$thumb_size['full']['height']); // Permalink thumbnail size


//include library
include_once(TEMPLATEPATH."/lib/global-search.php");	
	
//add the login box in the footer as hidden
if(apply_filters("cb_has_overlayed_login",true))
add_action("wp_footer","cb_include_login_box");

function cb_include_login_box(){
?>
<div class="welcomebar-wrap widget" id="login_box">
<?php if(apply_filters("cb_show_default_login_overlay",true)):?>
	<h3 class="widgettitle"><?php _e("Login Please","cb");?> </h3>
					
						<?php do_action( 'bp_before_sidebar_login_form' ) ?>

						<p id="login-text">
							<?php _e( 'To start connecting please log in first.', 'cb' ) ?>
							<?php if ( bp_get_signup_allowed() ) : ?>
								<?php printf( __( ' You can also <a href="%s" title="Create an account">create an account</a>.', 'cb' ), site_url( BP_REGISTER_SLUG . '/' ) ) ?>
							<?php endif; ?>
						</p>

						<form name="login-form"  class="standard-form" action="<?php echo site_url('wp-login.php', 'login' );?>" method="post">
							<label><?php _e( 'Username', 'cb' ) ?><br />
							<input type="text" name="log" id="sidebar-user-login" class="input" value="<?php echo attribute_escape(stripslashes($user_login)); ?>" /></label>
							<br class="clear"/>
							<label><?php _e( 'Password', 'cb' ) ?><br />
							<input type="password" name="pwd" id="sidebar-user-pass" class="input" value="" /></label>
							<br class="clear"/>	
							<p class="forgetmenot"><label><input name="rememberme" type="checkbox" id="sidebar-rememberme" value="forever" /> <?php _e( 'Remember Me', 'cb' ) ?></label></p>

							<?php do_action( 'bp_sidebar_login_form' ) ?>
							<br class="clear"/>
							<input type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php _e('Log In','cb'); ?>" tabindex="100" />
							<input type="hidden" name="testcookie" value="1" />
						<br class="clear"/>
						</form>

						<?php do_action( 'bp_after_sidebar_login_form' ) ?>
	
<?php endif;?>
<?php do_action("cb_login_overlay_content");?>
</div>
<?php
}

add_action("cb_after_profile_fields","cb_show_my_recent_visitor");//hook this to template
function cb_show_my_recent_visitor(){
    global $bp;
   if(!function_exists("visitors_is_active_visitor_recording"))
   return;

   if(!bp_is_home()||!visitors_is_active_visitor_recording($bp->displayed_user->id))//show only for logged in users and on their Home if they have set a prefence of showing it
        return;
    $recent_visitors=visitors_get_recent_visitors();
   
   if(empty($recent_visitors))
       return;//if no visists yest, do not show at all
	   ?>
<div class='box recent-visitors'>
				
<div id="profile-activity" class='box-content'>
	<div class="bp-widget">
	<h4><?php _e("Recent Visitors","cb");?></h4>

<?php				
    
    foreach($recent_visitors as $visitor){
       echo visitors_build_visitor_html($visitor);
    }
?>
	</div>
  </div>
 </div> 
<?php	
   
}

function cb_activity_filter_links( $args = false ) {
	echo cb_get_activity_filter_links( $args );//fix for bp activity filter issue with empty activities
}
	function cb_get_activity_filter_links( $args = false ) {
		global $activities_template, $bp;

		$defaults = array(
			'style' => 'list'
		);

		$r = wp_parse_args( $args, $defaults );
		extract( $r, EXTR_SKIP );

		/* Fetch the names of components that have activity recorded in the DB */
		$components = BP_Activity_Activity::get_recorded_components();

		if ( !$components )
			return false;

		foreach ( (array) $components as $component ) {
			/* Skip the activity comment filter */
			if ( 'activity' == $component )
				continue;

			if ( isset( $_GET['afilter'] ) && $component == $_GET['afilter'] )
				$selected = ' class="selected"';
			else
				unset($selected);

			$component = attribute_escape( $component );

			switch ( $style ) {
				case 'list':
					$tag = 'li';
					$before = '<li id="afilter-' . $component . '"' . $selected . '>';
					$after = '</li>';
				break;
				case 'paragraph':
					$tag = 'p';
					$before = '<p id="afilter-' . $component . '"' . $selected . '>';
					$after = '</p>';
				break;
				case 'span':
					$tag = 'span';
					$before = '<span id="afilter-' . $component . '"' . $selected . '>';
					$after = '</span>';
				break;
			}

			$link = add_query_arg( 'afilter', $component );
			$link = remove_query_arg( 'acpage' , $link );

			$link = apply_filters( 'bp_get_activity_filter_link_href', $link, $component );

			/* Make sure all core internal component names are translatable */
			$translatable_components = array( __( 'profile', 'buddypress'), __( 'friends', 'buddypress' ), __( 'groups', 'buddypress' ), __( 'status', 'buddypress' ), __( 'blogs', 'buddypress' ) );

			$component_links[] = $before . '<a href="' . attribute_escape( $link ) . '">' . ucwords( __( $component, 'buddypress' ) ) . '</a>' . $after;
		}

		$link = remove_query_arg( 'afilter' , $link );

		if ( isset( $_GET['afilter'] ) )
			$component_links[] = '<' . $tag . ' id="afilter-clear"><a href="' . attribute_escape( $link ) . '"">' . __( 'Clear Filter', 'buddypress' ) . '</a></' . $tag . '>';
		$links='';
		if(!empty($component_links))
			$links= implode( "\n", $component_links );
 		return apply_filters( 'bp_get_activity_filter_links',$links );
	}


?>