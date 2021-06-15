<?php
/**
 * @package WordPress
 * @subpackage NorthVantage
*/

get_header();


if(!is_search()) {
require NV_FILES ."/inc/page-constants.php"; // Get constants
} ?>

<?php if($NV_hidecontent!="yes") { 

if($NV_layout!="layout_four" && $NV_layout!="layout_five") { get_sidebar(); } ?>

	<div id="content" class="columns <?php if($NV_layout=="layout_one") { ?>twelve<?php } 
		elseif($NV_layout=="layout_two") { ?>eight last<?php }
		elseif($NV_layout=="layout_three") { ?>six last<?php }
		elseif($NV_layout=="layout_four") { ?>eight<?php }
		elseif($NV_layout=="layout_five") { ?>six<?php }
		elseif($NV_layout=="layout_six") { ?>six<?php }
		else { ?>eight<?php } ?>">
					

<?php if (have_posts()) : while (have_posts()) : the_post(); 

		get_template_part( 'content','page' );
					
endwhile;endif; ?>

 		<div class="clear"></div>
	</div><!-- #content -->
<?php 

	get_sidebar(); 

} // Hide Content *END* 
 
get_footer(); ?>