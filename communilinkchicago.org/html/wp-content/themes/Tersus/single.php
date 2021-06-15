<?php
/**
 * @package WordPress
 * @subpackage NorthVantage
*/

get_header();

/******************************************************************/
/*	Page Variables							      				 */
/******************************************************************/

if(!$NV_layout) {
$NV_layout=get_option("arhlayout"); 
}

/******************************************************************/
/*	Page Variables *END*					      				 */
/******************************************************************/

if($NV_hidecontent!="yes") { ?>

<?php if (have_posts()) : 

if($NV_layout!="layout_four" && $NV_layout!="layout_five") { get_sidebar(); } ?>

	<div id="content" class="columns <?php if($NV_layout=="layout_one") { ?>twelve<?php } 
		elseif($NV_layout=="layout_two") { ?>eight last<?php }
		elseif($NV_layout=="layout_three") { ?>six last<?php }
		elseif($NV_layout=="layout_four") { ?>eight<?php }
		elseif($NV_layout=="layout_five") { ?>six<?php }
		elseif($NV_layout=="layout_six") { ?>six<?php }
		else { ?>eight<?php } ?>">

<?php while (have_posts()) : the_post();

	get_template_part( 'content', get_post_format() );
                        
endwhile; endif; ?>                   
	
    </div><!-- /content -->                                  
                                       
<?php get_sidebar();

} // Hide Content *END*  

get_footer(); ?>
