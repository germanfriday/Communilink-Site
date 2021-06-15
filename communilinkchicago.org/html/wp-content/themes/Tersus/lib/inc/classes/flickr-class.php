<?php

/* ------------------------------------

:: FLICKR SET DATA

------------------------------------*/

$postcount = 0;
if(!$NV_shortcode_id) $NV_shortcode_id=''; // if is shortcode assign ID.

/* ------------------------------------
:: SET IMAGE SIZE
------------------------------------*/

if(	$NV_imgheight>='350') { 
	$img_size ="large";
} elseif($NV_imgheight>='150') {
	$img_size ="medium";
} else {
	$img_size ="small";
}

require_once(NV_FILES."/adm/inc/phpFlickr/phpFlickr.php");
$f = new phpFlickr(get_option('flickr_apikey')); // API
$user = get_option('flickr_userid');
$photos = $f->photosets_getPhotos($NV_flickrset);

$post_count = count($photos); // count query

	/* ------------------------------------
	
	:: GRID ONLY
	
	------------------------------------*/
	
	if($NV_show_slider=='gridgallery')
	{
		echo'<div class="nv-sortable">';
	}
	
	/* ------------------------------------
	
	:: GRID ONLY *END*
	
	------------------------------------*/	

    foreach ($photos['photoset']['photo'] as $photo): 
	
	$photodata = $f->photos_getInfo($photo['id']);
	
	
	if ( 'video' == $photodata['photo']['media'] ) {
		$sizes = $f->photos_getSizes($photo['id']);
		$NV_movieurl 		=	$sizes[6]["source"]; // Movie File URL
		$NV_videotype		=	'swf';
		$NV_previewimgurl	=	'';
	} else {
		$NV_previewimgurl	=	$f->buildPhotoURL($photo, $img_size); // Preview Image URL
	}

	$NV_posttitle		=	$photo['title'];
	$NV_description		=	$photo['description'];
	$NV_disablegallink	= 	'';
	$NV_galexturl		=	'http://www.flickr.com/photos/'.$user;
	$NV_disablereadmore	=	'yes';
	
	$slide_id='';
	$slide_id="slide-".$post->ID;
	
	if(!isset($NV_customlayer)) $NV_customlayer='';		
			
	if(!get_option('timthumb_disable') && $NV_customlayer=='') { // Check is Timthumb is Enabled or Disabled
		$NV_imagepath = get_template_directory_uri()."/lib/scripts/timthumb.php?".$NV_image_size."zc=". $NV_imgzoomcrop ."&amp;src="; 
	} else {
		$NV_imagepath="";
	}
	
	$postcount++;
	$post_count++; // REQUIRED FOR GROUP SLIDER
	
/* ------------------------------------

:: 3D ONLY

------------------------------------*/

if(!isset($NV_3dsegments)) 		$NV_3dsegments='';
if(!isset($NV_3dtween))  		$NV_3dtween='';
if(!isset($NV_3dtweentime)) 	$NV_3dtweentime='';
if(!isset($NV_3dtweendelay)) 	$NV_3dtweendelay='';
if(!isset($NV_3dzdistance)) 	$NV_3dzdistance='';
if(!isset($NV_3dexpand))		$NV_3dexpand='';

$NV_3dsegments_slide	= $NV_3dsegments;
$NV_3dtween_slide		= $NV_3dtween;
$NV_3dtweentime_slide	= $NV_3dtweentime;
$NV_3dtweendelay_slide	= $NV_3dtweendelay;
$NV_3dzdistance_slide	= $NV_3dzdistance;
$NV_3dexpand_slide		= $NV_3dexpand;

$NV_transitions = array($NV_transitions,'<Transition Pieces="'.$NV_3dsegments_slide.'" Time="'.$NV_3dtweentime_slide.'" Transition="'.$NV_3dtween_slide.'" Delay="'.$NV_3dtweendelay_slide.'"  DepthOffset="'.$NV_3dzdistance_slide.'" CubeDistance="'.$NV_3dexpand_slide.'"></Transition>');

/* ------------------------------------

:: 3D ONLY *END*

------------------------------------*/	
	
/* ------------------------------------

:: LOAD FRAMES

------------------------------------*/

if(	$NV_show_slider=='stageslider' || 
	$NV_show_slider=='islider' ||
	$NV_show_slider=='nivo') {
	require NV_FILES .'/inc/stage-gallery-frame.php'; // STAGE, iSLIDER, NIVO
} elseif($NV_show_slider=='gridgallery') {
	require NV_FILES .'/inc/grid-gallery-frame.php'; // GRID
} elseif($NV_show_slider=='groupslider') {
	require NV_FILES .'/inc/group-gallery-frame.php'; // GROUP SLIDER
} elseif($NV_show_slider=='galleryaccordion') {
	require NV_FILES .'/inc/accordion-gallery-frame.php'; // ACCORDION
} elseif($NV_show_slider=='gallery3d') {
	require NV_FILES .'/inc/piecemaker-frame.php'; // ACCORDION
}

/* ------------------------------------

:: LOAD FRAMES *END*

------------------------------------*/
			
if($NV_slidetimeout) {
	$NV_slidearray = $NV_slidearray . $NV_slidetimeout .","; 
} elseif($NV_stagetimeout) {
	$NV_slidearray = $NV_slidearray . $NV_stagetimeout .","; 
} else {
	$NV_slidearray = $NV_slidearray . "10,";
} 
			
if($NV_show_slider=='islider') {
	if($NV_previewimgurl) { $NV_navimg.=$NV_previewimgurl.','; } elseif($image) { $NV_navimg.=$image.','; }
}
	
endforeach; 
	
/* ------------------------------------

:: GROUP SLIDER ONLY 

------------------------------------*/

if($NV_show_slider=='groupslider') {
	if($postcount!="0") { $postcount="0"; // CHECK NEEDS END TAG ?>
		</div><!--  / row -->
	<?php } 
}

/* ------------------------------------

:: GROUP SLIDER ONLY *END*

------------------------------------*/

/* ------------------------------------

:: GRID ONLY 

------------------------------------*/

if($NV_show_slider=='gridgallery') { ?>
<div class="clear"></div>
</div>
<?php }

/* ------------------------------------

:: GRID ONLY *END*

------------------------------------*/	
?>