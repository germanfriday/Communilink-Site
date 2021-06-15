<div class="forums">

<!--list forums-->
	<?php if ( gf_has_forums('child_of='.gf_get_root_forum_id()) ) : ?>
	<h2><?php _e('Manage Forums'); ?></h2>
	<ul id="forumlist">

	<?php while ( gf_forum() ) : ?>
	<?php global $gf_forums_loop,$gf_current_forum;//print_r($bb_forums_loop);echo "breakkkk<br/><br />";?>
		<?php if (bb_get_forum_is_category()) : ?>
		<li <?php gf_forum_class('bb-category'); ?>>
			<?php gf_forum_pad( '<div class="nest">' ); ?><a href="<?php forum_link(); ?>"><?php forum_name(); ?></a>
			<br /><?php forum_description( array( 'before' => '<small> &#8211; ', 'after' => '</small>' ) ); ?><?php bb_forum_pad( '</div>' ); ?>
		<div class="row-actions"><a href="<?php echo gf_get_forum_permalink($gf_current_forum->forum_id);?>"><?php _e("View","gf");?></a>|<a href="<?php echo gf_get_forum_edit_link($gf_current_forum->forum_id);?>"><?php _e("Edit","gf");?></a>|<a href="<?php echo gf_get_forum_delete_link($gf_current_forum->forum_id);?>"><?php _e("Delete","gf");?></a></div>	
		</li>
<?php continue; endif; ?>
	<li <?php gf_forum_class(); ?>>
		<?php gf_forum_pad( '<div class="nest">' ); ?><a href="<?php gf_forum_permalink(); ?>"><?php gf_forum_name(); ?></a>
		<br />
		<?php gf_forum_description( array( 'before' => '<small> &#8211; ', 'after' => '</small>' ) ); ?><?php bb_forum_pad( '</div>' ); ?>
	<div class="row-actions"><a href="<?php echo gf_get_forum_permalink($gf_current_forum->forum_id);?>"><?php _e("View","gf");?></a>|<a href="<?php echo gf_get_forum_edit_link($gf_current_forum->forum_id);?>"><?php _e("Edit","gf");?></a>|<a href="<?php echo gf_get_forum_delete_link($gf_current_forum->forum_id);?>"><?php _e("Delete","gf");?></a></div>	
	</li>
<?php endwhile; ?>
</ul>
<?php endif; //gf_forums() ?>
<!-- Load the Create forum form--> 
<?php locate_template(array("gf/admin/create-forum.php"),true);?>
</div>