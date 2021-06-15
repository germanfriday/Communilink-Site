<?php

/* ------------------------------------

:: CONFIGURE SLIDE

------------------------------------*/
	
	if(!$NV_previewimgurl) {  // check what image to use, custom, featured, image within post. 
		$post_image_id = get_post_thumbnail_id($post->ID);
			if ($post_image_id) {
				$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
				$NV_previewimgurl=$thumbnail[0];
				$NV_previewimgurl	=	parse_url($NV_previewimgurl, PHP_URL_PATH); // make relative Image URL
			} elseif($image) {
			$NV_previewimgurl=$image;
		}
	}


	if( $NV_imageeffect=='shadow') { // calculate padding distance for video files with refleciton effect
		$NV_effectmargin=$NV_imgheight/100*12; 
		$NV_effectheight='height:'.$NV_effectheight.'px';
	} else {
		$NV_effectheight=''; 
	}
	
	
	if(($NV_stagegallery=="textimageleft" || $NV_stagegallery=="textimageright") && $NV_show_slider=="nivo") {	// enable Nivo caption
		if(esc_attr($id)) $nivoid = 'stage-slider-nivo-'.esc_attr($id); else $nivoid ='stage-slider-nivo';
		$NV_nivo_caption ='title="#'.$nivoid.'-caption-'. $postcount.'"'; 
		$NV_nivo_caption_id='id="'.$nivoid.'-caption-'. $postcount.'"';
	} else { $NV_nivo_caption='';$NV_nivo_caption_id=''; }

	
	if(!isset($NV_gallery_postformat)) $NV_gallery_postformat=''; // check if postformat enabled


/* ------------------------------------

:: CONFIGURE SLIDE *END*

------------------------------------*/

?>

<div class="panel <?php echo $NV_cssclasses; ?> <?php if($NV_imageeffect=="shadow" || $NV_imageeffect=="shadowblackwhite") { ?>shadow<?php } elseif($NV_imageeffect=="shadowreflection") { ?>reflectshadow<?php } ?>" <?php if(isset($display_none)) { ?>style="display:none"<?php } ?>>
	<div class="panel-inner">

<?php if($NV_gallery_postformat=='yes') {
	
	global $is_widget; $is_widget=true; // stop comments displaying within gallery
	get_template_part( 'content', get_post_format() );	
	
} else {
	
	if($NV_stagegallery!="textonly") { ?> 
		<?php if($NV_videotype) { // Check "Video URL" field is completed 
		
		if(!$NV_imgwidth)  $NV_vidwidth = 'width:980px;'; else $NV_vidwidth = 'width:'.$NV_imgwidth.'px'; // 16:9 Ratio for Video
		
		?>

            <div class="container videotype <?php echo $NV_imageeffect; ?>" style=" <?php echo $NV_vidwidth; ?>">
                <div class="gridimg-wrap">
                
                    <?php if($NV_displaytitle!="disabled" && $NV_displaytitle!="" && $NV_show_slider!='nivo') { ?>
                    	<div class="gallerytitle <?php echo $NV_displaytitle; ?>">
                        <?php if($NV_posttitle != "BLANK") { ?>
                            <h2><?php if($NV_disablegallink!='yes') { ?><a href="<?php echo $NV_galexturl;?>"><?php } ?><?php echo $NV_posttitle; ?><?php if($NV_disablegallink!='yes') { ?></a><?php } ?></h2>
                   		<?php } ?>
                    	<?php if($NV_postsubtitle) { ?>
                        	<h3><?php echo $NV_postsubtitle; ?></h3>
                    	<?php } ?>
                        </div>
					<?php } ?>
                                                  	
					<?php include(NV_FILES .'/inc/classes/video-class.php'); ?>

					<?php if(($NV_stagegallery=="titleoverlay" || $NV_stagegallery=="titletextoverlay")) { ?>	
                    <div class="title"><h2><?php if($NV_disablegallink!='yes') { ?><a href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>" title="<?php echo $NV_posttitle; ?>" target="_blank"><?php } ?><?php echo $NV_posttitle; ?><?php if($NV_disablegallink!='yes') { ?></a><?php } ?></h2>
                        <?php if($NV_stagegallery=="titletextoverlay") { ?>
                        <div class="overlaytext">
                        <?php echo do_shortcode($NV_description); ?>
                        </div> 
                        <?php } ?>
                    </div>	             
                    <?php } ?>
    			
                </div><!-- / gridimg-wrap -->
            </div><!-- / container -->		    
               
        <?php } else { ?>    
        <?php if($NV_previewimgurl) { // Check "Preview Image" field is completed ?>     
       
            <div class="container <?php echo $NV_imageeffect; ?>">
            
            
                <div class="gridimg-wrap">

					<?php if($NV_stagegallery=="textoverlay") { ?>
                        <div class="textoverlay">
                        <?php echo do_shortcode($NV_description); ?>
                        </div>
                    <?php } ?>

					<?php if(class_exists('WPSC_Query') || class_exists('Woocommerce')   && $NV_datasource=='data-5') { // Product Price  ?>
                        <?php if( !empty( $NV_productprice ) ) : ?>	<span class="productprice"><?php echo $NV_productprice; ?></span> <?php endif; ?>	  
                    <?php } ?>
                
                    <?php if($NV_displaytitle!="disabled" && $NV_displaytitle!="" && $NV_show_slider!='nivo') { ?>
                    <div class="gallerytitle <?php echo $NV_displaytitle; ?>">
						<?php if($NV_posttitle != "BLANK") { ?>
                            <h2><?php if($NV_disablegallink!='yes') { ?><a href="<?php echo $NV_galexturl; ?>"><?php } ?><?php echo $NV_posttitle; ?><?php if($NV_disablegallink!='yes') { ?></a><?php } ?></h2>
                        <?php } ?>                    
                    	<?php if($NV_postsubtitle) { ?>
                        <h3><?php echo $NV_postsubtitle; ?></h3>
                    	<?php } ?>
                    </div>
					<?php }
					
					if( $NV_lightbox=="yes" )
					{ 
						echo '<a href="';
						if( !empty($NV_movieurl) )
						{ 
							echo $NV_movieurl; 
						} else
						{ 
							echo $NV_previewimgurl; 
						}
						
						echo '" title="'. $NV_posttitle.'" data-fancybox-group="stage-gallery'. $NV_shortcode_id .'" style="width:'. $NV_imgwidth . 'px"';
						
						if( !empty($NV_movieurl) )
						{
							echo 'class="fancybox galleryvid"';
						} else
						{ 
							echo 'class="fancybox galleryimg "';
						} 
						echo '>';
					}
					elseif($NV_disablegallink!='yes')
					{ 
						echo '<a href="'. $NV_galexturl .'"  title="'. $NV_posttitle .'" style="width:'. $NV_imgwidth . 'px">';
					} ?>
						
                    	<img <?php echo $NV_nivo_caption; ?> <?php if($NV_imageeffect=="reflection" || $NV_imageeffect=="shadowreflection") { ?>class="reflect"<?php } ?> src="<?php echo $NV_imagepath . dyn_getimagepath($NV_previewimgurl); ?>" alt="<?php echo $NV_posttitle; ?>" />
                    <?php 
					if($NV_disablegallink!='yes' || $NV_lightbox=="yes") {
                        echo '</a>';
                    }
					
					if(($NV_stagegallery=="titleoverlay" || $NV_stagegallery=="titletextoverlay" || $NV_groupgridcontent=="titleoverlay" || $NV_groupgridcontent=="titletextoverlay")) { ?>	
                    
                    <?php if($NV_stagegallery!="textoverlay") { // if not textoverlay option display title ?>
                    
                    <div class="title"><h2><?php if($NV_disablegallink!='yes') { ?><a href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>" title="<?php echo $NV_posttitle; ?>" target="_blank"><?php } ?><?php echo $NV_posttitle; ?><?php if($NV_disablegallink!='yes') { ?></a><?php } ?></h2>
                        <?php if($NV_stagegallery=="titletextoverlay") { ?>
                        <div class="overlaytext">
                        <?php echo do_shortcode($NV_description); ?>
                        </div> 
                        <?php } ?>
                    </div>	  

					<?php } 
					} ?>
                    
				 <?php if(($NV_stagegallery=="textimageleft" || $NV_stagegallery=="textimageright")) {
					 
					if(	 $NV_stagegallery=="textimageleft") $NV_textpos ='left'; else $NV_textpos ='right'; ?>
            
                 		<div class="stagetextwrap <?php echo $NV_textpos; ?> nivo-html-caption"  <?php echo $NV_nivo_caption_id; ?>  style="<?php echo $NV_stagetextformat; ?>">
                            <div class="stagetextinner">
                                <div class="stagetextbottom">
                                    <div class="stagetext">
                                        <h2><?php if($NV_disablegallink!='yes') { ?><a href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>" title="<?php echo $NV_posttitle; ?>"><?php } ?><?php echo $NV_posttitle; ?><?php if($NV_disablegallink!='yes') { ?></a><?php } ?></h2>
                                            
                                            <?php
                                    
                                            echo do_shortcode($NV_description);
                                            
                                            if($NV_disablegallink!='yes' && $NV_disablereadmore!='yes') { ?>
                                            <p><a class="read-more" href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>"><?php _e( 'Read more  &rarr;', 'NorthVantage' );  ?></a></p>
                                            <?php } ?>
                                      
                                    </div>
                                </div>
                            </div>
                   		</div>        
                    
                    
                    <?php } ?>
                    <div class="clear"></div>
                </div><!-- / gridimg-wrap -->
            </div><!-- / container -->				
                    
        <?php }         
	 } // End of Image ?>
	 
       
<?php } elseif($NV_stagegallery=="textonly") { ?>
		<div class="gridimg-wrap" style="width:<?php echo $NV_imgwidth; ?>px;">
                <?php echo do_shortcode($NV_description); ?>
        </div>
<?php }
} // end of post format ?>

     </div><!--  / panel-inner -->
</div><!--  / panel -->     