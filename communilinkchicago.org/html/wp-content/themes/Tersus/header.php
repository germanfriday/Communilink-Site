<?php
/**
 * @package WordPress
 * @subpackage NorthVantage */ 
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width" />

<?php if(get_option('header_favicon')) { ?>
<link rel="shortcut icon" href="<?php echo get_option('header_favicon'); ?>" />
<?php } ?>
<title><?php if(is_front_page()) { bloginfo('name'); } else { wp_title( '', true, 'right' ); }?></title>
<?php if(get_option('rss_feed')) { ?>
<link rel="alternate" type="application/rss+xml" title="<?php echo get_option('rss_title'); ?>" href="<?php echo get_option('rss_feed'); ?>" />
<?php }

/* ------------------------------------

:: CUSTOM PAGE DATA

------------------------------------*/

if (have_posts()) : while (have_posts()) : the_post();
    $data = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true )); // Call custom page attributes  
endwhile; endif;

global $exittext,$exit_classes;

if(!empty($data['introtext'])) 		$introtext 		= $data['introtext'];
if(!empty($data['intro_classes'])) 	$intro_classes 	= $data['intro_classes'];
if(!empty($data['exittext']))		$exittext 		= $data['exittext'];
if(!empty($data['exit_classes']))	$exit_classes	= $data['exit_classes'];
if(!empty($data['gallery']))		$show_slider 	= $data["gallery"];
if(!empty($data['gallerycat']))		$gallerycat		= $data["gallerycat"];

require NV_FILES ."/inc/page-constants.php"; // Page Constants

/* ------------------------------------

:: CUSTOM PAGE DATA *END*

------------------------------------*/

/* ------------------------------------

:: SKIN DATA

------------------------------------*/

if(isset($_REQUEST['preview'])) 	$preview	= $_REQUEST['preview']; 	else $preview='';
if(isset($_REQUEST['skin_id_id'])) 	$skin_id_id	= $_REQUEST['skin_id_id']; 	else $skin_id_id='';


if($preview=='skin' && $skin_id_id!='') { // if preivewing skin
	foreach ($_POST as $key => $value) {
		if ( preg_match("/skin_id/", $key) ) {
			$options_skin_presets[$key] = $value;
		}
	}		
	
	delete_option( 'skin_data_nvtempskin', $options_skin_presets); // remove previous temp data 
	update_option( 'skin_data_nvtempskin', $options_skin_presets);
	
	$get_skin_data = maybe_unserialize(get_option('skin_data_nvtempskin'));
	$skin=$NV_skin='nvtempskin';
	$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));

	global $NV_frame_footer,$NV_branding_ver;
	
	$NV_frame_header=$get_skin_data['skin_id_frame_header'];
	$NV_frame_main=$get_skin_data['skin_id_frame_main'];
	$NV_frame_footer=$get_skin_data['skin_id_frame_footer'];
	$NV_branding_ver=$get_skin_data['skin_id_branding_ver'];
	
} else {
	
	if($NV_skin) { $skin=$NV_skin; } elseif(DEFAULT_SKIN) { $skin=DEFAULT_SKIN;} else { $skin=$NV_defaultskin; }
	$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));
	
	global $NV_frame_footer,$NV_branding_ver;
	
	$NV_frame_header=$get_skin_data['skin_id_frame_header'];
	$NV_frame_main=$get_skin_data['skin_id_frame_main'];
	$NV_frame_footer=$get_skin_data['skin_id_frame_footer'];
	$NV_branding_ver=$get_skin_data['skin_id_branding_ver'];
} ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<style type="text/css"><?php require NV_DIR.'/style.php'; ?></style>

<?php 

require NV_FILES ."/inc/cufon-replace.php"; // Cufon Font Replacement Script 

wp_head();


 
/* ------------------------------------

:: BROWSER SUPPORT

------------------------------------*/ ?>

<!--[if IE 7]>
<link href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lte IE 8]>	
<script src="<?php echo get_template_directory_uri(); ?>/js/ie7.js" type="text/javascript"></script>
<link href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 9]>
<link href="<?php echo get_template_directory_uri(); ?>/stylesheets/ie9.css" rel="stylesheet" type="text/css" />
<![endif]-->


<?php if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) { $i_device=true; } else { $i_device=''; } // detect iPhone / iPad ?>

</head>
<body <?php body_class('skinset-background nv-skin'); ?>>

<div id="primary-wrapper" <?php echo 'class="nv-'.$get_skin_data['skin_id_icon_color'].'"'; ?>>

	<?php
	$layerset1=stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_type']));
	$layerset2=stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_type']));
	$layerset3=stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_type']));
	$layerset4=stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_type']));
	
	// Set Fixed Position for specific background layers
	
	if($layerset1 == 'layer1_imagefull' || $layerset1 == 'layer1_video' || $layerset1 == 'layer1_cycle') $layer1_fixed='fixed'; else $layer1_fixed='';
	if($layerset2 == 'layer2_imagefull' || $layerset2 == 'layer2_video' || $layerset2 == 'layer2_cycle') $layer2_fixed='fixed'; else $layer2_fixed='';
	if($layerset3 == 'layer3_imagefull' || $layerset3 == 'layer3_video' || $layerset3 == 'layer3_cycle') $layer3_fixed='fixed'; else $layer3_fixed='';
	if($layerset4 == 'layer4_imagefull' || $layerset4 == 'layer4_video' || $layerset4 == 'layer4_cycle') $layer4_fixed='fixed'; else $layer4_fixed='';
	
	?>
    
    <div id="custom-layer1" class="custom-layer <?php echo $layer1_fixed; ?>"><?php if($layerset1) {echo setlayer_html("layer1",$layerset1,$skin);} ?></div>
    <div id="custom-layer2" class="custom-layer <?php echo $layer2_fixed; ?>"><?php if($layerset2) {echo setlayer_html("layer2",$layerset2,$skin);} ?></div>
    <div id="custom-layer3" class="custom-layer <?php echo $layer3_fixed; ?>"><?php if($layerset3) {echo setlayer_html("layer3",$layerset3,$skin);} ?></div>
    <div id="custom-layer4" class="custom-layer <?php echo $layer4_fixed; ?>"><?php if($layerset4) {echo setlayer_html("layer4",$layerset4,$skin);} ?></div>
    <a id="top"></a>
	
<?php 

/* ------------------------------------

:: CONFIGURE HEADER

------------------------------------*/

if($NV_disableheader!='yes') {
	
	require NV_FILES ."/inc/config-header.php";

} else { ?>

	<div class="row"></div>

<?php }

/* ------------------------------------

:: STAGE GALLERY, iSLIDER, NIVO

------------------------------------*/


if(is_page()) { 
	if($NV_show_slider=="stageslider" || $NV_show_slider=="islider" || $NV_show_slider=="nivo") {
		require NV_FILES ."/inc/gallery-stage.php"; // Stage Gallery
	}
}

/* ------------------------------------

:: PIECEMAKER

------------------------------------*/

if($i_device && $NV_show_slider=="gallery3d") { // if iPad or iPhone
	if(is_page()) { 
		require NV_FILES ."/inc/gallery-stage.php"; // Stage Gallery
	}

} else {
	if(is_page()) { 
		if($NV_show_slider=="gallery3d") { ?>
			<?php require NV_FILES .'/inc/gallery-piecemaker.php'; //
		}
	}
} ?>


<div class="wrapper"> 


<?php 

/* ------------------------------------

:: ACCORDION

------------------------------------*/

if(is_page()) { 
	if($NV_show_slider=="galleryaccordion") { ?>
		<?php require NV_FILES .'/inc/gallery-accordion.php';
	}
}

/* ------------------------------------

:: GRID

------------------------------------*/
	
if(is_page())
{ 
	if( $NV_show_slider == "gridgallery" && $NV_groupsliderpos!="below" )
	{
		if( $NV_gridfilter == 'yes' ) $NV_galleryclass = $NV_galleryclass . ' filter';
		echo '<div id="grid-main" data-grid-columns="'. $NV_gridcolumns .'" class="gallery-wrap grid-gallery row '. $NV_galleryclass .' nv-skin">';
			require NV_FILES ."/inc/gallery-grid.php"; // Group Slider Gallery
		echo '</div>';
	} 
}

/* ------------------------------------

:: GROUP SLIDER

------------------------------------*/

if(is_page()) { 
	if($NV_show_slider=="groupslider" && $NV_groupsliderpos!="below") { 
		require NV_FILES ."/inc/gallery-groupslider.php"; // Group Slider Gallery
	}
} 

/* ------------------------------------

:: TWITTER

------------------------------------*/

if($NV_twitter=='pagetop') { ?>
<div class="row">
    <div class="twitter-wrap skinset-main nv-skin <?php echo $NV_frame_header; ?>">
    
        <?php require NV_FILES .'/inc/twitter.php'; // Call Twitter Template ?>
    
    </div>
</div>
<?php }


/* ------------------------------------

:: INTRO TEXT

------------------------------------*/

if(isset($introtext) || $NV_pagetitle != "BLANK" && is_page()) {

if(empty($intro_classes)) { $intro_classes='skinset-main'; } ?>
	<div class="row">
		<div class="intro-text <?php if(isset( $intro_classes)) echo $intro_classes.' '.$NV_frame_main; ?> nv-skin">
        	<div>
				<?php 
				
				if($NV_authorname=='posts') $NV_pageauthorname=""; else $NV_pageauthorname = $NV_authorname; // Check dispplay author status 
				
				if($NV_postdate!="" && $NV_pageauthorname!="" && $NV_pagesubtitle!="" && $NV_pagetitle!="" || $NV_pagetitle !="BLANK") { ?>
                    <div class="post-titles"><!-- post-titles -->
                           <?php if($NV_pagetitle) { ?>
                                    <?php if($NV_pagetitle != "BLANK") { ?>
                                    <h1><?php $NV_pagetitle = htmlspecialchars($NV_pagetitle); echo do_shortcode($NV_pagetitle); ?></h1>
                                    <?php } ?>
                            <?php } else { ?>
                                    <?php if($NV_pagetitle != "BLANK") { ?>
                                    <h1><?php the_title(); ?></h1>
                                    <?php } ?>
                            <?php } ?>		
                            <?php if($NV_pagesubtitle) { ?>
                                    <h2><?php $NV_pagesubtitle = htmlspecialchars($NV_pagesubtitle); echo do_shortcode($NV_pagesubtitle);  ?></h2>
                                    <?php } ?>
                            <?php if($NV_postdate || $NV_pageauthorname) { ?>
                                <div class="post-date">
                                        <?php if($NV_postdate) { ?>
                                        <small><?php the_time('F jS  Y'); ?></small><span class="break">&nbsp;</span>
                                        <?php } ?>
                                        <?php if($NV_pageauthorname) { ?>
                                        <small>By <span class="author"><?php echo the_author_meta('first_name'); ?>&nbsp;<?php echo the_author_meta('last_name'); ?></span></small>
                                        <?php } ?>
                                </div>
                            <?php } ?>           
                    </div><!-- /post-titles -->
                <?php } ?>  
				<?php if(isset($introtext)) { echo do_shortcode($introtext); } ?>
        	</div>
            <div class="clear"></div>
        </div>
	</div>
<?php }



if($NV_hidecontent!="yes") { 

global $wp_query;

if($NV_contentborder!='yes' || is_search()) {
	$NV_contentborder="no";
}

if($NV_contentborder=="yes") {
	$NV_frame_main='disabled';	
} ?>

<div class="content-wrap row">
	<div class="<?php echo $NV_frame_main; ?> skinset-main nv-skin">
	
<?php } 


/* ------------------------------------

:: BREADCRUMBS

------------------------------------*/


if (class_exists( 'BP_Core_User' ) ) {
	if(!bp_is_blog_page()) {
		$NV_hidebreadcrumbs="yes";
	}
} 


if(class_exists('WPSC_Query')) {
	if(get_post_type() == 'wpsc-product' || is_products_page()) {
		if(!wpsc_has_breadcrumbs()) {
			$NV_hidebreadcrumbs="yes";
		}
	}
}

if(is_front_page()) $NV_hidebreadcrumbs='yes'; 
if(get_option('breadcrumb')=='disable') $NV_hidebreadcrumbs='yes'; ?>

<?php if($NV_hidebreadcrumbs=='yes' && empty($NV_socialicons) && empty($NV_textresize)) $NV_disable_subtabs='yes'; 

if($NV_disable_subtabs!='yes') { ?>

<div class="sub-header row"> 

	<?php 
	
	if($NV_socialicons=="yes" || $NV_textresize=="yes")
	{
        echo '<div class="resize-social-wrap">';
			require_once NV_FILES .'/inc/social-icons.php';                   
		echo '</div><!-- / resize-social-wrap -->';
	}
	
	if($NV_hidebreadcrumbs!='yes') { ?>
    
        <div id="sub-tabs">
            <?php if(class_exists('bbPress') && is_bbpress()) {
                bbp_breadcrumb();?> 
            <?php } else { ?>
                    <ul>
						<?php 
						                       
                        if( function_exists('wpsc_has_breadcrumbs') || function_exists( 'woocommerce_breadcrumb' ) ) {
                            
							if ( function_exists( 'woocommerce_breadcrumb' ) ) { // Woocommerce Breadcrumb
                            	woocommerce_breadcrumb('delimiter= / &wrap_before=<div class="breadcrumb">');
                        	}
							
							
                            if( function_exists('wpsc_has_breadcrumbs') ) {  // WP e-Commerce Breadcrumb
                                if(wpsc_has_breadcrumbs()) { ?>
                                        <div class='breadcrumb'>
                                            <li class="home"><a href='<?php echo get_option('product_list_url'); ?>'><?php echo get_option('blogname'); ?></a> </li><span class="subbreak">/</span>
                                            <?php while (wpsc_have_breadcrumbs()) : wpsc_the_breadcrumb(); ?>
                                                <?php if(wpsc_breadcrumb_url()) { ?> 	   
                                                    <li><a href='<?php echo wpsc_breadcrumb_url(); ?>'><?php echo wpsc_breadcrumb_name(); ?></a></li> <span class="subbreak">/</span>
                                                <?php } else { ?> 
                                                    <li><?php echo wpsc_breadcrumb_name(); ?></li> <span class="subbreak">/</span>
                                                <?php } ?> 
                                            <?php endwhile; ?>
                                            <?php if ($wp_query->is_single === true && get_post_type() == 'wpsc-product') { ?>
                                                    <li class="current_page_item"><?php echo wpsc_the_product_title(); ?></li> <span class="subbreak">/</span>
                                            <?php } ?>
                                        </div>
                                    <?php }
                            }
                        } else {
                            if (function_exists('DYN_breadcrumbs')) DYN_breadcrumbs(); 
                        } ?>
                    </ul>
            <?php } ?>
        </div>
        
    <?php } ?>
    
</div>

<?php } ?>