<?php
/**
 * The template for retrieving custom post data
 *
 * @package WordPress
*/
 
	$pdata = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true ));

	//global $is_widget; // Check if placed within a widget
	
    if(isset($pdata["movieurl"])) 		$NV_movieurl = $pdata["movieurl"]; 				// Video File URL
    if(isset($pdata["previewimgurl"])) 	$NV_previewimgurl=$pdata["previewimgurl"]; 		// Preview Image URL
	if(isset($pdata["videotype"])) 		$NV_videotype=$pdata["videotype"]; 				// Video Embed	
    if(isset($pdata["stagegallery"])) 	$NV_stagegallery=$pdata["stagegallery"]; 		// Stage Layout
    if(isset($pdata["disablegallink"])) $NV_disablegallink=$pdata["disablegallink"]; 	// Disable Link
    if(isset($pdata["galexturl"])) 		$NV_galexturl=$pdata["galexturl"];  			// Alternative URL
    if(isset($pdata["imgzoomcrop"])) 	$NV_imgzoomcrop=$pdata["imgzoomcrop"];  		// Timthumb Zoom/Crop
    if(isset($pdata["displaytitle"])) 	$NV_displaytitle=$pdata["displaytitle"];  		// Display Title
    if(isset($pdata["postsubtitle"])) 	$NV_postsubtitle=$pdata["postsubtitle"]; 		// Display Sub Title
    if(isset($pdata["posttitle"])) 		$NV_posttitle=$pdata["posttitle"];  			// Display Post Title
	if(isset($pdata["videoautoplay"])) 	$NV_videoautoplay=$pdata["videoautoplay"]; 		// Video Autoplay
	if(isset($pdata["postshowimage"])) 	$NV_displayblogimage=$pdata["postshowimage"]; 	// Override Display Blog Image 

	/* ------------------------------------
	:: Video Autoplay
	------------------------------------*/
	
	if(!empty($NV_videoautoplay)) :
		$NV_videoautoplay = '1';
	else :
		$NV_videoautoplay = '0';	
	endif;


	/* ------------------------------------
	:: Display Single / Archive Blog Image
	------------------------------------*/

	if(is_single() && ($NV_displayblogimage=='single' || $NV_displayblogimage=='singlearchive')) :
		$NV_displayblogimage='display';
	elseif(!is_single() && ($NV_displayblogimage=='archive' || $NV_displayblogimage=='singlearchive')) :
		$NV_displayblogimage='display';
	endif;
	

	/* ------------------------------------
	:: Display Author Bio
	------------------------------------*/
	
	if(isset($data["authorname"])) $NV_authorname=$data['authorname'];
	if(!isset($NV_authorname) && get_option('author_bio')=='enable') $NV_authorname='enable'; elseif(get_option('author_bio')=='posts') $NV_authorname = 'posts'; else $NV_authorname=''; 


	/* ------------------------------------
	:: Display Image
	------------------------------------*/

	if(empty($NV_previewimgurl)) { // check what image to use, custom, featured, image within post. 
		$post_image_id = get_post_thumbnail_id(get_the_ID());
			if ($post_image_id) {
				$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
				$NV_previewimgurl=$thumbnail[0];
				$NV_previewimgurl	=	parse_url($NV_previewimgurl, PHP_URL_PATH); // make relative Image URL
			} else {
			$NV_previewimgurl=catch_image(); // Check for images within post 
		}
	}	
	
	
	/* ------------------------------------
	:: Display Postmeta Data
	------------------------------------*/

	global $NV_postlayout;

	$NV_postmetaalign = ( $NV_postlayout == 'grid' ? 'post_title' : get_option("postmetaalign") ); // Display Postmeta Data	
	
	$NV_arhpostpostmeta=get_option('arhpostpostmeta'); // get postmeta data configuration
	
	if(is_single() && ($NV_arhpostpostmeta=='post_only' || $NV_arhpostpostmeta=='')) : 			
		$NV_arhpostpostmeta='display';
	elseif(!is_single() && ($NV_arhpostpostmeta=='' || $NV_arhpostpostmeta=='archive_only')) : 	
		$NV_arhpostpostmeta='display';
	endif;
	
	
	global $NV_gallery_postformat; // check is post type is displayed in gallery
	if($NV_gallery_postformat=='yes') $NV_arhpostpostmeta='hide';  // use page settings if a gallery	 
	 
	if(
	 $NV_arhpostpostmeta=='display' && $NV_postmetaalign=='') { 
		$columns='ten columns last clearfix';
		$offset_columns='offset-by-two';
	} else { 
		$columns=''; 
	} 
		
?>