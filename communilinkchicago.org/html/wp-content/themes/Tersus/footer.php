<?php global $NV_hidecontent; 
if($NV_hidecontent!="yes") { ?>

<div class="clear"></div>
</div><!-- /skinset-main-->
<div class="clear"></div>
</div><!-- /content-wrapper -->

<?php

} // Hide Content *END* 

/* ------------------------------------

:: PAGE VARIABLES

------------------------------------*/

require NV_FILES ."/inc/page-constants.php"; // Group Slider Gallery


/* ------------------------------------

:: PAGE VARIABLES *END*

------------------------------------*/



/* ------------------------------------

:: TWITTER

------------------------------------*/

if($NV_twitter=="pagebot") { 

global $NV_frame_footer; ?>
<div class="row">
    <div class="twitter-wrap skinset-main nv-skin bottom <?php echo $NV_frame_footer; ?>">
        <?php require NV_FILES .'/inc/twitter.php'; // Call Twitter Template ?>
    </div>
</div>
<?php }


/* ------------------------------------

:: GROUP SLIDER

------------------------------------*/

	if($NV_show_slider=="groupslider" && $NV_groupsliderpos=="below") {
		require NV_FILES ."/inc/gallery-groupslider.php"; // Group Slider Gallery 
	} 


/* ------------------------------------

:: GRID

------------------------------------*/
	
	if($NV_show_slider=="gridgallery" && $NV_groupsliderpos=="below")
	{

		if( $NV_gridfilter == 'yes' ) $NV_galleryclass = $NV_galleryclass . ' filter';
		echo '<div id="grid-main" data-grid-columns="'. $NV_gridcolumns .'" class="gallery-wrap grid-gallery row bottom '. $NV_galleryclass .' nv-skin">';
			require NV_FILES ."/inc/gallery-grid.php"; // Group Slider Gallery
		echo '</div>';
	}


/* ------------------------------------

:: EXIT TEXT

------------------------------------*/

global $exittext,$exit_classes,$NV_frame_footer, $NV_disablefooter;

if($exittext) { 
if(!$exit_classes) $exit_classes='skinset-main'; ?>
	<div class="row">
		<div class="intro-text skinset-main <?php echo $exit_classes.' '.$NV_frame_footer; ?> nv-skin"><div><?php echo do_shortcode($exittext); ?></div></div>
    </div>
<?php 
}
 
/* ------------------------------------

:: EXIT TEXT *END*

------------------------------------*/ ?>


	<?php if($NV_disablefooter!='yes' && get_option('mainfooter')!='disable') { ?>
	<footer id="footer-wrap" class="row">
		<div id="footer" class="clearfix skinset-footer nv-skin <?php echo $NV_frame_footer; ?>">
				<?php
				$get_footer_num = (get_option('footer_columns_num')!="") ? get_option('footer_columns_num') : '4'; // If not set, default to 4 columns
				$NV_footercolumns_text=numberToWords($get_footer_num ); // convert number to word
				$i=1;
				while($i<=$get_footer_num) { 
					if ( is_active_sidebar('footer'.$i) ) { ?>
                    <div class="block columns <?php echo $NV_footercolumns_text."_column "; if($i == $get_footer_num) { echo "last"; } ?>">
                    
                        <ul>
                            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Column '.$i)) : endif; ?>
                        </ul>
                    
                    </div>
                    <?php } $i++;	
				} ?>

				<?php  global $NV_imgheight; ?>
				<?php if(get_option('lowerfooter')!="disable") {  // Check for enabled lower footer ?>
                <div class="clear"></div>
                <div class="lowerfooter-wrap clearfix">
                    <div class="lowerfooter">
                        <div class="lowfooterleft"><?php if(get_option('lowfooterleft')) { echo get_option('lowfooterleft'); } else { echo "&copy; ". date("Y") ." ".get_option("blogname"); } ?></div>
                        <!-- <div class="lowfooterright"><?php if(get_option('lowfooterright')) { echo get_option('lowfooterright'); } else { echo "designed by <a href=\"http://themeforest.net/user/NorthVantage/portfolio?ref=NorthVantage\" title=\"Buy Theme\" target=\"_blank\">NorthVantage</a>"; } ?></div> -->
                    </div><!-- / lowerfooter -->		
                </div><!-- / lowerfooter-wrap -->
			<?php } ?>
		</div><!-- / footer -->
	</footer><!-- / footer-wrap -->
    <?php } // disable footer ?>
    <div class="autototop"><a href="#"></a></div>
</div><!-- /wrapper -->

<!-- I would like to give a great thankyou to WordPress for their amazing platform -->
<!-- Theme Design by NorthVantage - http://www.northvantage.co.uk -->

<?php wp_footer(); ?>

</div>
</body>
</html>