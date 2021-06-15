<?php
/**
 * @package WordPress
 * @subpackage NorthVantage
*/

get_header();

/******************************************************************/
/*	Page Variables							      				 */
/******************************************************************/
$NV_layout=get_option("arhlayout");
/******************************************************************/
/*	Page Variables *END*					      				 */
/******************************************************************/
?>

<?php if($NV_layout!="layout_four" && $NV_layout!="layout_five") { get_sidebar(); } ?>

	<div id="content" class="columns <?php if($NV_layout=="layout_one") { ?>twelve<?php } 
		elseif($NV_layout=="layout_two") { ?>eight last<?php }
		elseif($NV_layout=="layout_three") { ?>six last<?php }
		elseif($NV_layout=="layout_four") { ?>eight<?php }
		elseif($NV_layout=="layout_five") { ?>six<?php }
		elseif($NV_layout=="layout_six") { ?>six<?php }
		else { ?>eight<?php } ?>">
 
		<article class="post">
			<header>
				<h2 class="pagetitle"><?php _e("We're sorry but that page could not be found.", 'NorthVantage' ); ?></h2>
			</header>
            
            <div class="entry row">
                <div class="list arrow grey">
                    <ul>
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                </div>      
            </div>                                  
		</article>
	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>