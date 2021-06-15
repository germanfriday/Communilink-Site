<?php
/* ------------------------------------

:: CONFIGURE SLIDE

------------------------------------*/

if(!$NV_previewimgurl) { // check what image to use, custom, featured, image within post. 
	$post_image_id = get_post_thumbnail_id($post->ID);
		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
			$NV_previewimgurl=$thumbnail[0];
			$NV_previewimgurl	=	parse_url($NV_previewimgurl, PHP_URL_PATH); // make relative Image URL
		} elseif($image) {
		$NV_previewimgurl=$image;
	}
}

$NV_imgwidth=$NV_gallerywidth / $post_count;
$NV_imgwidth=$NV_gallerywidth - $NV_imgwidth;

$NV_imgwidth_attr = 'width="'.$NV_imgwidth.'"';

if(!isset($NV_gallery_postformat)) $NV_gallery_postformat=''; // check if postformat enabled

/* ------------------------------------

:: CONFIGURE SLIDE *END*

------------------------------------*/ ?>

<li class="<?php echo $NV_cssclasses; ?> <?php if($NV_imageeffect=='shadowblackwhite' || $NV_imageeffect=='blackwhite') echo 'blackwhite' ?>">
<?php if(!$NV_accordiontitles) { ?><div class="title"><div class="title-content"><h5><?php echo $NV_posttitle; ?></h5></div></div><?php } ?>
<div class="shadow"></div>

<?php if($NV_gallery_postformat=='yes') {
	
	global $is_widget; $is_widget=true; // stop comments displaying within gallery
	get_template_part( 'content', get_post_format() );	
	
} else { ?>

<?php if($NV_groupgridcontent!="text") { ?> 

    <?php if($NV_videotype) { // Check "Preview Image" field is completed ?>    
                                			
		<?php include(NV_FILES .'/inc/classes/video-class.php'); ?>

    <?php } elseif($NV_previewimgurl) { // Check "Preview Image" field is completed ?>    
            
		<?php if(class_exists('WPSC_Query') || class_exists('Woocommerce')   && $NV_datasource=='data-5') { // Product Price  ?>
			<?php if( !empty( $NV_productprice ) ) : ?>	<span class="productprice"><?php echo $NV_productprice; ?></span> <?php endif; ?>	  
		<?php } ?>
                     	
		<?php if($NV_lightbox=="yes") { ?>
        	<a href="<?php if($NV_movieurl) { echo $NV_movieurl; } else { echo $NV_previewimgurl; } ?>" title="<?php echo $NV_posttitle; ?>" data-fancybox-group="accordion-gallery<?php echo $NV_shortcode_id; ?>" <?php if($NV_movieurl) { ?> class="fancybox galleryvid" <?php } else { ?> class="fancybox galleryimg" <?php } ?>><?php } elseif($NV_disablegallink!='yes') { ?><a href="<?php echo $NV_galexturl; ?>" title="<?php echo $NV_posttitle; ?>"><?php } ?>
                
				<img src="<?php echo $NV_imagepath . dyn_getimagepath($NV_previewimgurl); ?>" alt="<?php echo $NV_posttitle; ?>" <?php echo $NV_imgwidth_attr; ?> class="accordion-img" />
		
		<?php if($NV_disablegallink!='yes' || $NV_lightbox=="yes") { ?>
			</a>
		<?php } ?>	
	<?php } 
	
	} ?>        
        

<?php if($NV_groupgridcontent!="image") { ?>  

		<div class="excerpt">
        	<div class="excerpt-content"><h2><?php if($NV_disablegallink!='yes') { ?><a href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>" title="<?php echo $NV_posttitle; ?>"><?php } ?><?php echo $NV_posttitle; ?><?php if($NV_disablegallink!='yes') { ?></a><?php } ?></h2>
			
			<?php if($NV_groupgridcontent!="titleimage")  { ?>
            
			<?php echo do_shortcode($NV_description);
			
			if($NV_disablegallink!='yes' && $NV_disablereadmore!='yes') { ?>
			<br /><br /><a class="read-more" href="<?php if($NV_galexturl) { echo $NV_galexturl; } ?>"><?php _e( 'Read more  &rarr;', 'NorthVantage' );  ?></a>
			<?php }			
			
			} ?>
       		</div>
		</div><!-- /excerpt --> 
     
<?php } 
} // end post format ?>
</li>
