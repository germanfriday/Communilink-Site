<?php
/**
 * @package WordPress
 * @subpackage NorthVantage
*/

/*
Template Name: Blog
*/ 

get_header(); ?>

<?php if($NV_hidecontent!="yes") { ?>

<?php if($NV_layout!="layout_four" && $NV_layout!="layout_five") { get_sidebar(); } ?>

	<div id="content" class="columns <?php if($NV_layout=="layout_one") { ?>twelve<?php } 
		elseif($NV_layout=="layout_two") { ?>eight last<?php }
		elseif($NV_layout=="layout_three") { ?>six last<?php }
		elseif($NV_layout=="layout_four") { ?>eight<?php }
		elseif($NV_layout=="layout_five") { ?>six<?php }
		elseif($NV_layout=="layout_six") { ?>six<?php }
		else { ?>eight<?php } ?>">
							
        <?php $content = get_the_content(); 
							
		if($content!='') { ?>
                            
		<div class="entry">
			<?php if($content) { echo do_shortcode($content); } // Check if there is content ?>
		</div><!-- /entry -->         
                      
		<?php } ?>
        
	<?php if($NV_archivecat) { // Selected Blog Categories
	foreach ($NV_archivecat as $catlist) { // Get category ID Array
		$cats = $cats.",".$catlist;
	}
	}

if(!isset($cats)) $cats='';

$cats = lTrim($cats,',');
$cat_isnum = str_replace(",","", $cats); // join cats to check if numeric

if (is_numeric ($cat_isnum)) { // backwards compatible with post id
		$cat_type= "cat";
} else {
		$cat_type= "category_name"; // if not numeric, use category name
}

if(is_home() || is_front_page()) {
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
} else {
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
}

query_posts( array ($cat_type => $cats , 'paged' => $paged));

$count = 1;
$NV_gridcols = ( get_option('arhpostcolumns') ? get_option('arhpostcolumns') : '2' );

if (have_posts()) : while (have_posts()) : the_post(); 

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
