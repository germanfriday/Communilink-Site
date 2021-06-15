<?php
/**
 * The template for retrieving Blog Variables
 *
 * @package WordPress
*/
 
global $NV_gallery_postformat; // check is post type is displayed in gallery
 
if($NV_gallery_postformat=='yes') { // use page settings if a gallery

	if(!$NV_imgheight) $NV_imgheight='130';

} else {
	

if(is_single()) { 
	if( get_option('postimgheight')) {
		$NV_imgheight=get_option('postimgheight'); // image height 
	} 	
	if( get_option('postimgwidth')) {
		$NV_imgwidth=get_option('postimgwidth'); // image width 
	} 	
	
	if( get_option('postimgalign') ) {
		$NV_imgalign=get_option('postimgalign'); // image align
	}
	
} else {
	if( get_option('arhimgwidth')) {
		$NV_imgwidth= get_option("arhimgwidth"); // Get Archive Image Width		
	}
	
	if( get_option('arhimgheight')) {
		$NV_imgheight = get_option("arhimgheight"); // Get Archive Image Height
	}					

	if( get_option('arhimgalign') ) {
		$NV_imgalign=get_option('arhimgalign'); // image align
	}	
}


if(empty($NV_imgheight) && empty($NV_imgwidth)) {
	$NV_imgheight='300';
	$NV_image_size = 'height="'. $NV_imgheight.'"';
} elseif(isset($NV_imgwidth) && empty($NV_imgheight)) {
	$NV_image_size = 'width="'. $NV_imgwidth .'"';	
} elseif(isset($NV_imgheight) && isset($NV_imgwidth)) {
	$NV_image_size = 'width="'. $NV_imgwidth .'" height="'. $NV_imgheight .'"';	
}


/* ------------------------------------
:: POST CONTENT
------------------------------------*/

$NV_nolink='';

$NV_blogcontent = get_option("arhpostcontent"); // Post Content

if(is_single() || $NV_blogcontent=='full_post') :

	ob_start();
	the_content();
	$content = ob_get_clean();
	
	$NV_description = do_shortcode($content);
	$NV_nolink='yes';
	

elseif (  $NV_blogcontent==='' || $NV_blogcontent==='excerpt_image' ) : 

	if ( empty($post->post_excerpt) ) {
		$NV_description = the_advanced_excerpt('',true);
		
	} else {
		
		$NV_description = get_the_excerpt(); 
	
	}
	

else : 

  	$NV_description = '';
	$NV_nolink='yes';

endif; 

global $NV_postlayout;

$NV_arhimgdisplay = get_option("arhimgdisplay"); // Lightbox on First / Custom Images
$NV_arhpostpostmeta = get_option("arhpostpostmeta"); // Display Postmeta Data
$NV_postmetaalign = ( $NV_postlayout == 'grid' ? 'post_title' : get_option("postmetaalign") ); // Display Postmeta Data



if(!isset($NV_arhimgwidth_param)) $NV_arhimgwidth_param='';
if(!isset($NV_imgzoomcrop)) $NV_imgzoomcrop='0';

$postcount = 0;


if(is_single()) 	$NV_imageeffect = get_option('postimgeffect'); else $NV_imageeffect = get_option('arhimgeffect'); // image effect
if(!is_single()) 	$NV_imageeffect = get_option('arhimgeffect');

if(!$NV_imageeffect) 	$NV_imageeffect = 'shadowreflection'; // set default image effect

if(is_single() && get_option('postimgdisplay')=='lightbox') $NV_showlightbox='lightbox="yes"'; elseif(!is_single() && get_option('arhimgdisplay')=='lightbox') $NV_showlightbox='lightbox="yes"'; else $NV_showlightbox='';

if($NV_showlightbox!='') $NV_permalink =''; else $NV_permalink = get_permalink(); // assign permalink if lightbox is disabled

if($NV_imageeffect=='' || $NV_imageeffect=='shadow' || $NV_imageeffect=='shadowreflection') {$NV_vidshadow="yes";} elseif($NV_imageeffect=='frame') {
	$NV_vidshadow="frame";
}

}

if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
	if(empty($NV_imgheight)) $NV_imgheight='';
	$NV_imagepath = get_template_directory_uri()."/lib/scripts/timthumb.php?h=". $NV_imgheight ."&amp;". $NV_arhimgwidth_param ."zc=". $NV_imgzoomcrop ."&amp;src="; 
} else {
	$NV_imagepath="";
}


?>