<?php
/**
 * @package WordPress
 * @subpackage NorthVantage
*/

get_header(); 

$NV_layout = get_option('arhlayout');

// Grid Layout Options
$count = 1;
$NV_postlayout = ( get_option('arhpostdisplay') ? get_option('arhpostdisplay') : '' );
$NV_gridcols = ( get_option('arhpostcolumns') ? get_option('arhpostcolumns') : '2' );


if($NV_hidecontent!="yes") {
	
	if($NV_layout=="layout_two" || $NV_layout=="layout_three" || $NV_layout=="layout_six") { get_sidebar(); } ?>

	<div id="content" class="columns <?php if($NV_layout=="layout_one") { ?>twelve<?php } 
		elseif($NV_layout=="layout_two") { ?>eight last<?php }
		elseif($NV_layout=="layout_three") { ?>six last<?php }
		elseif($NV_layout=="layout_four") { ?>eight<?php }
		elseif($NV_layout=="layout_five") { ?>six<?php }
		elseif($NV_layout=="layout_six") { ?>six<?php }
		else { ?>eight<?php } ?>">

<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive*/ if (is_category()) { ?>
		<h2 class="archive-title"><?php _e('Archive for ', 'NorthVantage' ); ?> &#8216;<?php single_cat_title(); ?>&#8217;</h2>
 	  <?php /* If this is a tag archive*/ } elseif( is_tag() ) { ?>
		<h2 class="archive-title"><?php _e('Posts Tagged', 'NorthVantage' ); ?> &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive*/ } elseif (is_day()) { ?>
		<h2 class="archive-title"><?php _e('Archive for ', 'NorthVantage' ); ?> <?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive*/ } elseif (is_month()) { ?>
		<h2 class="archive-title"><?php _e('Archive for ', 'NorthVantage' ); ?> <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive*/ } elseif (is_year()) { ?>
		<h2 class="archive-title"><?php _e('Archive for ', 'NorthVantage' ); ?> <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive*/ } elseif (is_author()) { ?>
		<h2 class="archive-title"><?php _e('Author Archive ', 'NorthVantage' ); ?></h2>
 	  <?php /* If this is a paged archive*/ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="archive-title"><?php _e('Blog Archives', 'NorthVantage' ); ?></h2>
 	  <?php } ?>

<?php while (have_posts()) : the_post();

	// Setup Grid Layout
	if( $NV_postlayout == 'grid' )
	{
		if( $count == $NV_gridcols )
		{
			$class = 'last';
			$count = 1;
		}
		elseif( $count == 1 )
		{
			$class= 'clear';
			$count++;
		}
		else
		{
			$class = '';	
			$count++;
		}
	
		echo '<div class="columns '. numberToWords( $NV_gridcols ) .'_column grid_layout '. $class .'">';
	
			get_template_part( 'content', get_post_format());
		
		echo '</div>';
	}
	else
	{
		get_template_part( 'content', get_post_format());
	}
					
endwhile; ?>

	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>". __("Sorry, but there aren't any posts in the %s category yet.", 'NorthVantage' ) ."</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>". __( "Sorry, but there aren't any posts with this date.", 'NorthVantage' )  ."</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>". __("Sorry, but there aren't any posts by %s yet.", 'NorthVantage' ) ."</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>". __('No posts found.', 'NorthVantage' ) ."</h2>");
		}

	endif;

$postcount = 0; 

include(NV_FILES .'/inc/wp-pagenavi.php');

if(function_exists('wp_pagenavi')) { wp_pagenavi(); }

wp_reset_query(); ?>

		<div class="clear"></div>
	</div><!-- /content -->
                
<?php get_sidebar(); ?>

<?php } // Hide Content *END* ?>

<?php get_footer(); ?>