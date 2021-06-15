<?php

/* ------------------------------------

:: SLIDE SET DATA

------------------------------------*/

	$postcount=0;
	$data_id = 0;
	$cats='';
	if(!$NV_shortcode_id) $NV_shortcode_id=''; // if is shortcode assign ID.

$NV_slidesetids = explode(",", $NV_slidesetid);
					
if(is_array($NV_slidesetids)) {
	foreach ($NV_slidesetids as $NV_slidesetid) { 
		$get_slideset = get_option("slideset_data_".$NV_slidesetid);		
		$post_count = $post_count+$get_slideset['slideset_id_slide_count'];
		$get_slides_count=$get_slideset['slideset_id_slide_count'];
		
		$z = 0;
		$x = 0;
		$data_id = 0;
		
		while ($x < $get_slides_count):
			$filter_cats = explode(",", $get_slideset['slideset_id_catselect_'.$x]);
			
			foreach($filter_cats as $filter_cat) {
			$category_array[] = $filter_cat; // Enter Categories into an Array
			}
			$x++;
		endwhile;
		
	}
} else {
	$get_slideset_data 	= get_option("slideset_data_".$NV_slidesetids);
	$post_count = $get_slideset_data['slideset_id_slide_count'];

		$get_slides_count=$get_slideset['slideset_id_slide_count'];
		
		$z = 0;
		$x = 0;
		$data_id = 0;
		
		while ($x < $get_slides_count):
			$filter_cats = explode(",", $get_slideset_data['slideset_id_catselect_'.$x]);
			
			foreach($filter_cats as $filter_cat) {
			$category_array[] = $filter_cat; // Enter Categories into an Array
			}
			$x++;
		endwhile; 		
}

/* ------------------------------------

:: GRID ONLY

------------------------------------*/

if($NV_show_slider=='gridgallery') {
$category_array = array_unique($category_array);
asort($category_array);

if($category_array && $NV_gridfilter) { ?>
	<div class="splitter-wrap">
		<ul class="splitter <?php if($NV_shortcode_id) echo "id-".$NV_shortcode_id; ?>">
			<li><?php _e('Filter By: ', 'NorthVantage' ); ?>
				<ul>
					<li class="segment-1 selected-1 active"><a href="#" data-value="all"><?php _e('All', 'NorthVantage' ); ?></a></li>
					<?php 
					$catcount=2;
					
					foreach ($category_array as $catname) { // Get category ID Array ?>
                    <?php if($catname) { ?>
					<li class="segment-<?php echo $catcount; ?>"><a href="#" data-value="<?php echo str_replace(" ","_",$catname).$NV_shortcode_id; ?>"><?php echo $catname; ?></a></li>                    <?php }
					$catcount++; } ?>
				</ul>
			</li>
		</ul>
	</div>
<?php } 
	
	if($NV_show_slider=='gridgallery')
	{
		echo'<div class="nv-sortable">';
	}
}

/* ------------------------------------

:: GRID ONLY *END*

------------------------------------*/

foreach($NV_slidesetids as $NV_slidesetid) :
$z = 0;
$get_slideset_data 	= get_option("slideset_data_".$NV_slidesetid);
$get_slides_count = $get_slideset_data['slideset_id_slide_count'];

while ($z < $get_slides_count):

/* ------------------------------------

:: GET INDIVIDUAL SLIDE DATA

------------------------------------*/

$NV_disablegallink=$NV_movieurl=$NV_previewimgurl=$NV_imgzoomcrop=$NV_stagegallery=$NV_cssclasses=$NV_displaytitle=$NV_disablegallink=$NV_disablereadmore=$NV_galexturl=$NV_videotype=$NV_videoautoplay=$NV_posttitle=$NV_description=$NV_slidetimeout='';

$NV_movieurl = $get_slideset_data['slideset_id_videourl_'.$z]; // Movie File URL
$NV_previewimgurl = $get_slideset_data['slideset_id_url_'.$z]; // Preview Image URL
$NV_imgzoomcrop = strtolower($get_slideset_data['slideset_id_crop_'.$z]);
$NV_stagegallery = $get_slideset_data['slideset_id_stagecontent_'.$z]; // Stage Layout
$NV_cssclasses = $get_slideset_data['slideset_id_cssclasses_'.$z];
$NV_displaytitle = strtolower($get_slideset_data['slideset_id_overlay_'.$z]);

if(!$get_slideset_data['slideset_id_link_'.$z]) {
	$NV_disablegallink = "yes";
} 

$NV_disablereadmore = $get_slideset_data['slideset_id_disreadmore_'.$z];
$NV_galexturl = $get_slideset_data['slideset_id_link_'.$z];
$NV_videotype = strtolower($get_slideset_data['slideset_id_embed_'.$z]);
$NV_videoautoplay = $get_slideset_data['slideset_id_autoplay_'.$z];
$NV_posttitle = stripslashes($get_slideset_data['slideset_id_title_'.$z]);
$NV_description = stripslashes($get_slideset_data['slideset_id_desc_'.$z]);
$NV_slidetimeout = $get_slideset_data['slideset_id_timeout_'.$z];

/* ------------------------------------

:: STAGE ONLY

------------------------------------*/

if($NV_stagegallery=="Image Only") { 
	$NV_stagegallery="image"; 
} elseif($NV_stagegallery=="Image (Text Left Overlay)") { 
	$NV_stagegallery="textimageleft"; 
} elseif($NV_stagegallery=="Image (Text Right Overlay)") { 
	$NV_stagegallery="textimageright"; 
} elseif($NV_stagegallery=="Image (Title Overlay Hover)") { 
	$NV_stagegallery="titleoverlay"; 
} elseif($NV_stagegallery=="Image (Title/Text Overlay Hover)") { 
	$NV_stagegallery="titletextoverlay"; 
} elseif($NV_stagegallery=="Image (Text Overlay)") { 
	$NV_stagegallery="textoverlay"; 
} elseif($NV_stagegallery=="Text Only") { $NV_stagegallery="textonly"; }

/* ------------------------------------

:: STAGE ONLY *END*

------------------------------------*/

if($NV_imgzoomcrop=="zoom") {
	$NV_imgzoomcrop="1";
} elseif($NV_imgzoomcrop=="zoom crop") {
	$NV_imgzoomcrop="3";
} else {
	$NV_imgzoomcrop="0";
}

if($NV_videoautoplay) {
	$NV_videoautoplay = "1";
} else {
	$NV_videoautoplay ="0";	
}	

if($NV_videotype !="" && $postcount!="1") { // Stop IE autoplaying hidden video onload. 
	$display_none ="";
	$display_none = "yes";
}

$slide_id='';
$slide_id="slideset".$slideset_id."-".$z;

/* ------------------------------------

:: GRID ONLY

------------------------------------*/

$categories_arr = $get_slideset_data['slideset_id_catselect_'.$z]; // Enter Categories into an Array

if($categories_arr) {

	$categories_arr = explode(',',$categories_arr);
	$categories='';
	foreach($categories_arr as $category) {
		$categories .= $category.$NV_shortcode_id.',';
	}
	
	$replace_arr = array(' ',',');
	$replace_with= array('_',' '); 
	
	$categories = str_replace($replace_arr,$replace_with,$categories);

}

/* ------------------------------------

:: GRID ONLY *END*

------------------------------------*/

/* ------------------------------------

:: 3D ONLY

------------------------------------*/

$NV_3dsegments_slide	= ($get_slideset_data['slideset_id_segments_'.$z]		!="") ? $get_slideset_data['slideset_id_segments_'.$z]			: $NV_3dsegments;
$NV_3dtween_slide		= ($get_slideset_data['slideset_id_transition_'.$z]		!="") ? $get_slideset_data['slideset_id_transition_'.$z]		: $NV_3dtween;
$NV_3dtweentime_slide	= ($get_slideset_data['slideset_id_transtime_'.$z]		!="") ? $get_slideset_data['slideset_id_transtime_'.$z]			: $NV_3dtweentime;
$NV_3dtweendelay_slide	= ($get_slideset_data['slideset_id_transdelay_'.$z]		!="") ? $get_slideset_data['slideset_id_transdelay_'.$z]		: $NV_3dtweendelay;
$NV_3dzdistance_slide	= ($get_slideset_data['slideset_id_depthoffset_'.$z]	!="") ? $get_slideset_data['slideset_id_depthoffset_'.$z]		: $NV_3dzdistance;
$NV_3dexpand_slide		= ($get_slideset_data['slideset_id_cubdedistance_'.$z]	!="")  ? $get_slideset_data['slideset_id_cubdedistance_'.$z]	: $NV_3dexpand;

if($NV_transitions) {
array_push($NV_transitions,'<Transition Pieces="'.$NV_3dsegments_slide.'" Time="'.$NV_3dtweentime_slide.'" Transition="'.$NV_3dtween_slide.'" Delay="'.$NV_3dtweendelay_slide.'"  DepthOffset="'.$NV_3dzdistance_slide.'" CubeDistance="'.$NV_3dexpand_slide.'"></Transition>');
} else {
$NV_transitions = array($NV_transitions,'<Transition Pieces="'.$NV_3dsegments_slide.'" Time="'.$NV_3dtweentime_slide.'" Transition="'.$NV_3dtween_slide.'" Delay="'.$NV_3dtweendelay_slide.'"  DepthOffset="'.$NV_3dzdistance_slide.'" CubeDistance="'.$NV_3dexpand_slide.'"></Transition>');
}

/* ------------------------------------

:: 3D ONLY *END*

------------------------------------*/

/* ------------------------------------

:: GET INDIVIDUAL SLIDE DATA *END*

------------------------------------*/

$postcount++;
$data_id++;

if(!get_option('timthumb_disable') && !$NV_customlayer) { // Check is Timthumb is Enabled or Disabled
	$NV_imagepath = get_template_directory_uri()."/lib/scripts/timthumb.php?".$NV_image_size."zc=". $NV_imgzoomcrop ."&amp;src="; 
} else {
	$NV_imagepath="";
}

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

$z++;

if($NV_show_slider=='islider') {
	if($NV_previewimgurl) { $NV_navimg.=$NV_previewimgurl.','; } elseif($image) { $NV_navimg.=$image.','; }
}

endwhile;
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