<?php get_header(); ?>
<div id="container">
<div id="contents">
<?php do_action( 'bp_before_blog_home' ) ?>
	<div id="content">
	<div class="widget">
	<div class="widgettitle"><?php _e( 'Blog', 'buddypress' ) ?></div>
		<div class="widget-content">
			<?php if ( !is_user_logged_in() ) : ?>
				<h3><?php _e( 'Site Activity', 'buddypress' ) ?></h3>
			<?php endif; ?>

			<?php do_action( 'bp_before_directory_activity_content' ) ?>

			<?php if ( is_user_logged_in() ) : ?>
				<?php locate_template( array( 'activity/post-form.php'), true ) ?>
			<?php endif; ?>
	<?php do_action( 'template_notices' ) ?>
				

			
			<br class="clear" />
		</div>
	

	</div>
	
	</div>
	<?php get_sidebar("home");?>
	<br class="clear" />
</div>
</div><!--end of container-->
	
<?php get_footer(); ?>
