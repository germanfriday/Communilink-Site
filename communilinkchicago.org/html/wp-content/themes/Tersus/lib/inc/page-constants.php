<?php 

/* ------------------------------------

:: CUSTOM PAGE DATA

------------------------------------*/

if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <?php $data = maybe_unserialize(get_post_meta( $post->ID, 'pgopts', true )); // Call custom page attributes  
	
	global 
	$NV_skinopt,
	$NV_layout,
	$NV_textresize,
	$NV_pagetitle,
	$NV_pagesubtitle,
	$NV_headerlayout,
	$NV_hidebreadcrumbs,
	$NV_contentborder,
	$NV_disablefooter,
	$NV_postdate,
	$NV_authorname,
	$NV_hidecontent,	
	$NV_sidebar_one_borders,
	$NV_sidebar_two_borders,
	$NV_sidebar_one_select,
	$NV_sidebar_two_select,
	$NV_infobar_classes,	
	$NV_infobar,	
	$NV_twitter,
	$NV_socialicons,
	$NV_disableheart,
	$NV_socialdeli,
	$NV_socialdigg,
	$NV_socialreddit,
	$NV_sociallinkedin,
	$NV_socialstumble,
	$NV_socialyoutube,
	$NV_socialvimeo,
	$NV_socialpinterest,
	$NV_socialemail,	
	$NV_socialtwitter,
	$NV_socialgoogle,
	$NV_socialfb,
	$NV_socialrss,
	$NV_show_slider,
	$NV_datasource,
	$NV_attachedmedia,
	$NV_flickrset,
	$NV_gallerycat,
	$NV_gallerypostformat,
	$NV_productcat,
	$NV_producttag,
	$NV_mediacat,
	$NV_slidesetid,
	$NV_imgheight,
	$NV_imgwidth,
	$NV_galleryheight,
	$NV_gallerynumposts,
	$NV_gallerysortby,
	$NV_galleryexcerpt,
	$NV_galleryorderby,
	$NV_stagetimeout,
	$NV_stagetransition,
	$NV_stagetween,
	$NV_playnav,	
	$NV_gridcolumns,
	$NV_gridshowposts,
	$NV_gridfilter,
	$NV_groupsliderpos,
	$NV_groupgridcontent,
	$NV_accordiontitles,
	$NV_accordionautoplay,
	$NV_nivoeffect,
	$NV_imageeffect,
	$NV_lightbox,
	$NV_disablegallink,
	$NV_galexturl,
	$NV_skin,
	$NV_archivecat,
	$NV_verticalslide,
	$NV_imgalign,
	$NV_slidercolumns,
	$NV_galleryclass;



	if(isset($data["layout"])) {$NV_layout=$data['layout'];}
	if($NV_layout=='') $NV_layout=get_option('pagelayout');
	if(isset($data["textresize"])) {$NV_textresize=$data['textresize'];}
	if(isset($data["pagetitle"])) {$NV_pagetitle=$data['pagetitle'];}
	if(isset($data["pagesubtitle"])) {$NV_pagesubtitle=$data['pagesubtitle'];}
	if(isset($data["postdate"])) {$NV_postdate=$data['postdate'];}
	if(isset($data["authorname"])) {$NV_authorname=$data['authorname'];}
	
	if(!$NV_authorname && get_option('author_bio')=='enable') $NV_authorname='enable'; elseif(get_option('author_bio')=='posts') $NV_authorname = 'posts'; else $NV_authorname=''; 
		
	if(isset($data["hidebreadcrumbs"])) 	$NV_hidebreadcrumbs=$data['hidebreadcrumbs'];
	if(isset($data["contentborder"])) 		$NV_contentborder=$data['contentborder'];
	if(isset($data["disableheader"])) 		$NV_disableheader=$data['disableheader'];	
	if(isset($data["hidecontent"])) 		$NV_hidecontent=$data['hidecontent'];	
	if(isset($data["disablefooter"])) 		$NV_disablefooter=$data['disablefooter'];
	if(isset($data["border_config_one"])) 	$NV_sidebar_one_borders=$data['border_config_one'];
	if(isset($data["border_config_two"])) 	$NV_sidebar_two_borders=$data['border_config_two'];
	if(isset($data["sidebar_one"])) 		$NV_sidebar_one_select=$data['sidebar_one'];
	if(isset($data["sidebar_two"])) 		$NV_sidebar_two_select=$data['sidebar_two'];
	if(isset($data["infobar_classes"])) 	$NV_infobar_classes=$data['infobar_classes'];
	if(isset($data["infobartext"])) 		$NV_infobar=$data['infobartext'];
	if(isset($data["socialicons"])) 		$NV_socialicons=$data['socialicons'];
	if(isset($data["disableheart"])) 		$NV_disableheart=$data['disableheart'];
	if(isset($data["twitter"])) 			$NV_twitter=$data['twitter'];
	if(isset($data["socialdeli"])) 			$NV_socialdeli=$data['socialdeli'];
	if(isset($data["socialdigg"])) 			$NV_socialdigg=$data['socialdigg'];
	if(isset($data["socialtwitter"])) 		$NV_socialtwitter=$data['socialtwitter'];
	if(isset($data["socialgoogle"])) 		$NV_socialgoogle=$data['socialgoogle'];
	if(isset($data["socialfb"])) 			$NV_socialfb=$data['socialfb'];
	if(isset($data["socialrss"])) 			$NV_socialrss=$data['socialrss'];
	if(isset($data["socialreddit"])) 		$NV_socialreddit=$data['socialreddit'];
	if(isset($data["sociallinkedin"])) 		$NV_sociallinkedin=$data['sociallinkedin'];
	if(isset($data["socialstumble"])) 		$NV_socialstumble=$data['socialstumble'];
	if(isset($data["socialyoutube"])) 		$NV_socialyoutube=$data['socialyoutube'];
	if(isset($data["socialvimeo"])) 		$NV_socialvimeo=$data['socialvimeo'];
	if(isset($data["socialpinterest"])) 	$NV_socialpinterest=$data['socialpinterest'];
	if(isset($data["socialemail"])) 		$NV_socialemail=$data['socialemail'];		
	if(isset($data["gallery"])) 			$NV_show_slider=$data["gallery"];
	if(isset($data["datasource_selector"])) $NV_datasource=$data["datasource_selector"];
	if(isset($data["attachedmedia"])) 		$NV_attachedmedia=$data["attachedmedia"];
	if(isset($data["flickrset"])) 			$NV_flickrset=$data["flickrset"];
	if(isset($data["gallerycat"])) 			$NV_gallerycat=$data["gallerycat"];
	if(isset($data["gallerypostformat"])) 	$NV_gallerypostformat=$data["gallerypostformat"];
	if(isset($data["productcat"])) 			$NV_productcat=$data["productcat"];
	if(isset($data["producttag"])) 			$NV_producttag=$data["producttag"];	
	if(isset($data["gallerymediacat"])) 	$NV_mediacat=$data["gallerymediacat"];	
	if(isset($data["slideset"])) 			$NV_slidesetid=$data["slideset"];
	if(isset($data["archivecat"])) 			$NV_archivecat=$data["archivecat"];
	if(isset($data["imgheight"])) 			$NV_imgheight=$data["imgheight"];
	if(isset($data["imgwidth"])) 			$NV_imgwidth=$data["imgwidth"];
	if(isset($data["galleryheight"])) 		$NV_galleryheight=$data["galleryheight"];
	if(isset($data["gallerynumposts"])) 	$NV_gallerynumposts=$data["gallerynumposts"];
	if(!empty($data["gallerynpostexcerpt"]))$NV_galleryexcerpt	= $data["gallerynpostexcerpt"]; else  $NV_galleryexcerpt = "55";
	if(isset($data["gallerysortby"])) 		$NV_gallerysortby=$data["gallerysortby"];
	if(isset($data["galleryorderby"])) 		$NV_galleryorderby=$data["galleryorderby"];
	if(isset($data["stagetimeout"])) 		$NV_stagetimeout=$data["stagetimeout"];
	if(isset($data["stagetransition"])) 	$NV_stagetransition=$data["stagetransition"];
	if(isset($data["stagetween"])) 			$NV_stagetween=$data["stagetween"];
	if(isset($data["stageplaypause"])) 		$NV_stageplaypause=$data["stageplaypause"];
	if(isset($data["groupsliderpos"])) 		$NV_groupsliderpos=$data["groupsliderpos"];
	if(isset($data["gridcolumns"])) 		$NV_gridcolumns=$data["gridcolumns"];
	if(isset($data["gridshowposts"])) 		$NV_gridshowposts=$data["gridshowposts"];
	if(isset($data["gridfilter"])) 			$NV_gridfilter=$data["gridfilter"];
	if(isset($data["groupgridcontent"])) 	$NV_groupgridcontent=$data["groupgridcontent"]; 
	if(isset($data["accordiontitles"])) 	$NV_accordiontitles=$data["accordiontitles"];
	if(isset($data["accordionautoplay"])) 	$NV_accordionautoplay=$data["accordionautoplay"];
	if(isset($data["nivoeffect"])) 			$NV_nivoeffect=$data["nivoeffect"];
	if(isset($data["imageeffect"])) 		$NV_imageeffect=$data["imageeffect"];	
	if(isset($data["lightbox"])) 			$NV_lightbox=$data["lightbox"];
	if(isset($data["sliderlayout"])) 		$NV_verticalslide=$data["sliderlayout"];
	if(isset($data["sliderimagealign"])) 	$NV_imgalign=$data["sliderimagealign"];
	if(isset($data["gridcolumns"])) 		$NV_slidercolumns=$data["gridcolumns"];
	if(isset($data["gallerycssclass"]))		$NV_galleryclass=$data["gallerycssclass"];
	
	if(!empty($data["customskin"])) {
		$NV_skin=$data["customskin"];
		$_SESSION['NV_skin'] = $NV_skin;
	} elseif(get_option('default_skin')!='') {
		$NV_skin=get_option('default_skin');
		$_SESSION['NV_skin'] = get_option('default_skin');		
	} else {
		global $NV_defaultskin;
		$NV_skin=$NV_defaultskin;
		$_SESSION['NV_skin'] = $NV_defaultskin;
	}
	
	if(!empty($data["menu_alignment"])) {
		$NV_menu_alignment=$data['menu_alignment'];
	} else {
		if(get_option('menu_alignment')!='') $NV_menu_alignment = get_option('menu_alignment'); else $NV_menu_alignment='right';
	}
	
	if(!empty($data["branding_alignment"])) {
		$NV_branding_alignment=$data['branding_alignment'];
	} else {
		if(get_option('branding_alignment')!='') $NV_branding_alignment = get_option('branding_alignment'); else $NV_branding_alignment='left';
	}	
	
	if($NV_branding_alignment==$NV_menu_alignment) { 
		$NV_menu_alignment=$NV_menu_alignment.' match'; 
		$NV_branding_alignment=$NV_branding_alignment.' match';
	}
	
	if(!$NV_infobar) {
		$NV_infobar=get_option('header_infobar');
	}
		
 endwhile; endif; 
 
 
 /* ------------------------------------

:: BUDDYPRESS SETTINGS

------------------------------------*/

if (class_exists( 'BP_Core_User' ) ) {
	if(!bp_is_blog_page()) {
	
		if($NV_menu_alignment=='' && get_option('menu_alignment')=='') {
			 $NV_menu_alignment = 'right';
		} elseif(get_option('menu_alignment')!='') { 
			$NV_menu_alignment=get_option('menu_alignment');
		}
		
		if($NV_branding_alignment=='' && get_option('branding_alignment')=='') {
			 $NV_branding_alignment = 'left'; 
		} elseif(get_option('branding_alignment')!='') {
			$NV_branding_alignment=get_option('branding_alignment');
		}
		
		if($NV_branding_alignment==$NV_menu_alignment) { 
			$NV_menu_alignment=$NV_menu_alignment.' match'; 
			$NV_branding_alignment=$NV_branding_alignment.' match';
		}
		
		if(!$NV_infobar) $NV_infobar=get_option('header_infobar');
	}
}

 /* ------------------------------------

:: SEARCH SETTINGS

------------------------------------*/

if (is_search() || is_404()) {

	if($NV_menu_alignment=='' && get_option('menu_alignment')=='') {
		$NV_menu_alignment = 'right';
	} elseif(get_option('menu_alignment')!='') { 
		$NV_menu_alignment=get_option('menu_alignment');
	}
		
	if($NV_branding_alignment=='' && get_option('branding_alignment')=='') {
		$NV_branding_alignment = 'left'; 
	} elseif(get_option('branding_alignment')!='') {
		$NV_branding_alignment=get_option('branding_alignment');
	}
		
	if($NV_branding_alignment==$NV_menu_alignment) { 
		$NV_menu_alignment=$NV_menu_alignment.' match'; 
		$NV_branding_alignment=$NV_branding_alignment.' match';
	}
		
	if(empty($NV_infobar)) $NV_infobar=get_option('header_infobar');

	global $NV_defaultskin;
	if(get_option('default_skin')=='') $NV_skin=$NV_defaultskin; else  $NV_skin=get_option('default_skin');
	
} ?>