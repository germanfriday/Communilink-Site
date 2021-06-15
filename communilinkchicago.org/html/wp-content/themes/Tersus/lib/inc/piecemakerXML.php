<?php header("Content-type: text/xml; charset: UTF-8");
require_once( '../../../../../wp-load.php' );

if($_SESSION['piecemaker_ID']) $page_id = $_SESSION['piecemaker_ID'];

$data = maybe_unserialize(get_post_meta($page_id, 'pgopts', true )); // Call custom page attributes  

$NV_datasource = $data["datasource_selector"];
$NV_attachedmedia=$data["attachedmedia"];
$NV_flickrset=$data["flickrset"];
$NV_show_slider=$data["gallery"];
$NV_gallerycat=$data["gallerycat"];
$NV_slidesetid=$data["slideset"];

$NV_imageeffect=$data["imageeffect"];
$NV_gallerynumposts=$data["gallerynumposts"];
$NV_gallerysortby=$data["gallerysortby"];
$NV_galleryorderby=$data["galleryorderby"];


$NV_imgheight 		= ($data["imgheight"]			!="") ? $data["imgheight"]				: '350';
$NV_imgwidth 		= ($data["imgwidth"]			!="") ? $data["imgwidth"]				: '980';
$NV_3dsegments		= ($data["gallery3dsegments"]	!="") ? $data["gallery3dsegments"]		: "15";
$NV_3dincolor		= ($data["gallery3dincolor"]	!="") ? "0x".$data["gallery3dincolor"]	: "0x111111";
$NV_3dtxtbcolor		= ($data["gallery3dtextcolor"]	!="") ? "0x".$data["gallery3dtextcolor"]: "0x111111";
$NV_3dtween			= ($data["gallery3dtween"]		!="") ? $data["gallery3dtween"]			: "linear";
$NV_3dtweentime		= ($data["gallery3dtweentime"]	!="") ? $data["gallery3dtweentime"]		: "1.2";
$NV_3dtweendelay	= ($data["gallery3dtweendelay"] !="") ? $data["gallery3dtweendelay"]	: "0.1";
$NV_3dzdistance		= ($data["gallery3dzdistance"]	!="") ? $data["gallery3dzdistance"]		: "0";
$NV_3dexpand		= ($data["gallery3dexpand"]		!="") ? $data["gallery3dexpand"]		: "20";
$NV_3dtextdist		= ($data["gallery3dtextdist"]	!="") ? $data["gallery3dtextdist"]		: "25";
$NV_3dtimeout		= ($data["stagetimeout"]		!="") ? $data["stagetimeout"]			: "10";
$NV_shadow 			= "100"; 
$NV_gallery3dypos	= ($data["gallery3dypos"]		!="") ? $data["gallery3dypos"]			: '280';
$NV_gallery3dxpos	= ($data["gallery3dxpos"]		!="") ? $data["gallery3dxpos"]			: '470';

if(!$NV_imgheight && !$NV_imgwidth) {
	$NV_image_size = "w=". $NV_imgwidth ."&amp;";
} elseif($NV_imgwidth && !$NV_imgheight) {
	$NV_image_size = "w=". $NV_imgwidth ."&amp;";	
} elseif($NV_imgheight && !$NV_imgwidth) {
	$NV_image_size = "h=". $NV_imgheight ."&amp;";	
} elseif($NV_imgheight && $NV_imgwidth) {
	$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
}


echo '<?xml version="1.0" encoding="utf-8" ?>

<Piecemaker>
	<Contents>';

if($NV_imgheight) {
$NV_galleryheight=$NV_imgheight; // No Reflection
} else {
$NV_galleryheight="350"; // Set default Gallery Height
}


if($NV_imageeffect=="reflection" || $NV_imageeffect=="shadowreflection") {	 

	$NV_galleryheight=$NV_galleryheight+"55"; 

} else {
	$NV_galleryheight=$NV_galleryheight+"40"; 
} 

// Calculate height of Gallery based on Image Height 

ob_start();

/* ------------------------------------

:: LOAD DATA SOURCE

------------------------------------*/
 
if(!$NV_datasource) { // check datasource, if no datasource check Post Categories / Slide Set selected (backwards compatibility)
	if(!$NV_slidesetid) {
		$NV_datasource='data-2';
	} else {
		$NV_datasource='data-1';
	}
}

if($NV_datasource=="data-1") {
	include(NV_FILES .'/inc/classes/post-attachments-class.php');
} elseif($NV_datasource=="data-2") {
	include(NV_FILES .'/inc/classes/post-categories-class.php');
} elseif($NV_datasource=="data-3") {
	include(NV_FILES .'/inc/classes/flickr-class.php');
} elseif($NV_datasource=="data-4") {
	include(NV_FILES .'/inc/classes/slideset-class.php');
} elseif($NV_datasource=="data-5") {
	include(NV_FILES .'/inc/classes/post-categories-class.php');
} elseif($NV_datasource=="data-6") {
	include(NV_FILES .'/inc/classes/post-categories-class.php');
}

/* ------------------------------------

:: LOAD DATA SOURCE *END*

------------------------------------*/

$output_string="";
$output_string=ob_get_contents();
ob_end_clean();

echo $output_string;
$postcount = 0;


echo '</Contents>

<Settings ImageWidth="'.$NV_imgwidth.'" ImageHeight="'.$NV_imgheight.'" LoaderColor="0x333333" InnerSideColor="0x222222" SideShadowAlpha="0.8" DropShadowAlpha="0.7" DropShadowDistance="25" DropShadowScale="0.95" DropShadowBlurX="40" DropShadowBlurY="4" MenuDistanceX="20" MenuDistanceY="50" MenuColor1="0x222222" MenuColor2="0x333333" MenuColor3="0xFFFFFF" ControlSize="70" ControlDistance="20" ControlColor1="0x222222" ControlColor2="0xFFFFFF" ControlAlpha="0.8" ControlAlphaOver="0.95" ControlsX="'.$NV_gallery3dxpos.'" ControlsY="'.$NV_gallery3dypos.'&#xD;&#xA;" ControlsAlign="center" TooltipHeight="30" TooltipColor="0x222222" TooltipTextY="5" TooltipTextStyle="P-Italic" TooltipTextColor="0xFFFFFF" TooltipMarginLeft="5" TooltipMarginRight="7" TooltipTextSharpness="50" TooltipTextThickness="-100" InfoWidth="400" InfoBackground="'.$NV_3dtxtbcolor.'" InfoBackgroundAlpha="0.65" InfoMargin="15" InfoSharpness="0" InfoThickness="0" Autoplay="'.$NV_3dtimeout.'" FieldOfView="45"></Settings>
  <Transitions>';
if(is_array($NV_transitions)) {
foreach($NV_transitions as $transition) { 
echo $transition."\n";
}
} else {
echo $NV_transitions;	
}
echo '</Transitions>
</Piecemaker>';
?>