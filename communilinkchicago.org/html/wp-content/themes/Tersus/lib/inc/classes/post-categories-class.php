<?php

/* ------------------------------------

:: POST CATEGORY DATA

------------------------------------*/

	$postcount = 0;
	$data_id = 0;
	$cats='';

	if(!isset($NV_shortcode_id)) $NV_shortcode_id=''; // if is shortcode assign ID.


/* ------------------------------------
:: WPEC PRODUCT / TAGS
------------------------------------*/
	
	if($NV_productcat) {
		if(is_array($NV_productcat)) {
			foreach ($NV_productcat as $pcatlist) { // Get category ID Array
				$pcats = $pcats.",".$pcatlist;
			} 
		} else {
			$pcats = $NV_productcat;
		}
	}	

	if($NV_producttag) {
		if(is_array($NV_producttag)) {
			foreach ($NV_producttag as $taglist) { // Get category ID Array
				$tags = $tags.",".$taglist;
			}	
		} else {
			$tags = $NV_producttag;
		}
	}

	if(isset($pcats)) $pcats = lTrim($pcats,','); else $pcats='';
	if(isset($tags)) $tags = lTrim($tags,','); else $tags='';
	
/* ------------------------------------
:: GALLERY MEDIA CATEGORIES
------------------------------------*/

	if(is_array($NV_mediacat)) {
		$mediacats='';
		foreach ($NV_mediacat as $mediacatlist) { // Get category ID Array
			$mediacats = $mediacats.",".$mediacatlist;
		}
	} else {
		$mediacats = $NV_mediacat;
	}
	
	
	$mediacats = lTrim($mediacats,',');
	
/* ------------------------------------
:: POST CATEGORIES
------------------------------------*/

	if(is_array($NV_gallerycat)) {
		foreach ($NV_gallerycat as $catlist) { // Get category ID Array
			$cats = $cats.",".$catlist;
		}
	} else {
		$cats = $NV_gallerycat;
	}
	
	if($NV_gallerynumposts) { // Number of posts to display
		$numposts = $NV_gallerynumposts;
	} else {
		$numposts = -1;
	}
	
	if($NV_gallerysortby!='') { // Sort Posts by
		$sortby = $NV_gallerysortby;
	} else {
		$sortby = "menu_order";
	}
	
	if($NV_galleryorderby) {
		$orderby = $NV_galleryorderby;
	} else {
		$orderby = "ASC";
	}
	
	$cats = lTrim($cats,',');

	$cat_isnum = str_replace(",","", $cats); // join cats to check if numeric

	if (is_numeric ($cat_isnum)) { // backwards compatible with post id
		$cat_type= "cat";
	} else {
		$cat_type= "category_name"; // if not numeric, use category name
	}
	
	if(isset($paged)) $paged = $paged; else $paged='';

/* ------------------------------------

:: GRID ONLY

------------------------------------*/
	
	if(empty($NV_gridshowposts) && empty($NV_gridfilter) && empty($NV_gallerynumposts) && $NV_show_slider=='gridgallery') { // Show number of posts on a page
		$numposts="6";
	} elseif(!empty($NV_gallerynumposts) && empty($NV_gridfilter)) {
		$numposts=$NV_gallerynumposts;
	} elseif(!empty($NV_gridshowposts) && empty($NV_gridfilter)) {
		$numposts=$NV_gridshowposts;
	} elseif(!empty($NV_gridfilter)) {
		$numposts="-1";	
	} 
	

/* ------------------------------------

:: GRID ONLY *END*

------------------------------------*/

global $NV_gallery_postformat,$post;
$NV_gallery_postformat='';

if($NV_datasource=='data-5') {

if($sortby == 'meta_value') $sortby = '';


if( class_exists('Woocommerce') ) {
	
   $args=array(
	'post_type' => 'product',
	'product_cat' => $pcats,
	'product_tag' => $tags,
	'post_status' => 'publish',
	'paged' => $paged,
	'order' => $orderby,
	'orderby' => $sortby,
	'posts_per_page' => $numposts,
	'ignore_sticky_posts'=> 1
	);	
	
} elseif ( class_exists('WPSC_Query') ) {

   $args=array(
	'post_type' => 'wpsc-product',
	'wpsc_product_category' => $pcats,
	'product_tag' => $tags,
	'post_status' => 'publish',
	'paged' => $paged,
	'order' => $orderby,
	'orderby' => $sortby,
	'posts_per_page' => $numposts,
	'ignore_sticky_posts'=> 1
	);

}
	
	$featured_query = new wp_query($args);
	
} elseif($NV_datasource=='data-2') {
	
	if($NV_gallerypostformat!='') { // set post format
	
		$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		$cat_type => $cats,
		'paged' => $paged,
		'orderby' => $sortby,
		'order' => $orderby,
		'posts_per_page' => $numposts,
		'ignore_sticky_posts'=> 1,
		'tax_query' => array(
					array( 'taxonomy' => 'post_format',
						  'field' => 'slug',
						  'terms' => 'post-format-'.$NV_gallerypostformat
						  )
					)
		);	
	
		$NV_gallery_postformat='yes';
					
	} else {

		$args=array(
		'post_type' => 'post',
		'post_status' => 'publish',
		$cat_type => $cats,
		'paged' => $paged,
		'orderby' => $sortby,
		'order' => $orderby,
		'posts_per_page' => $numposts,
		'ignore_sticky_posts'=> 1
		);	
		
	}

	$featured_query = new wp_query($args);  

} elseif($NV_datasource=='data-6') {


   $args=array(
	'post_type' => 'portfolio',
	'post_status' => 'publish',
	'media-category' => $mediacats,
	'paged' => $paged,
	'orderby' => $sortby,
	'order' => $orderby,
	'posts_per_page' => $numposts,
	'ignore_sticky_posts'=> 1
	);

	$featured_query = new wp_query($args);  

} else { // If no options select display all categories

$args=array(
      'post_type' => 'post',
      'post_status' => 'publish',
	  'paged' => $paged,
	  'orderby' => $sortby,
	  'order' => $orderby,
	  'posts_per_page' => $numposts,
      'ignore_sticky_posts'=> 1
      );

	$featured_query = new wp_query($args);
} 

/* ------------------------------------

:: GRID ONLY

------------------------------------*/

if($NV_show_slider=='gridgallery') {
	if($NV_gallerycat || $NV_productcat || $NV_producttag || $NV_mediacat) {
		if($NV_gridfilter) { ?>
			<div class="splitter-wrap">
				<ul class="splitter <?php if($NV_shortcode_id) echo "id-".$NV_shortcode_id; ?>">
					<li><?php _e('Filter By: ', 'NorthVantage' ); ?>
						<ul>
							<li class="segment-1 selected-1 active"><a href="#" data-value="all"><?php _e('All', 'NorthVantage' ); ?></a></li>
							<?php 
							$catcount=2;
							if(!empty($NV_gallerycat)) :
							
							if(!is_array($NV_gallerycat)) $NV_gallerycat = explode(",",$NV_gallerycat); // make array if not already
							
							foreach ($NV_gallerycat as $catlist) { // Get category ID Array 
						
								if (is_numeric ($catlist)) { // backwards compatible with post id
									$catname = get_cat_name($catlist);
								} else {
									$catname = $catlist; // if not numeric, use category name
								}					
							
								$strip_html = preg_replace("/&#?[a-z0-9]+;/i","",$catname);	?>
								
								<li class="segment-<?php echo $catcount; ?>"><a href="#" data-value="<?php echo str_replace(" ","_",$strip_html); echo $NV_shortcode_id; ?>"><?php echo $catname; ?></a></li>                    
							<?php 
							$catcount++; 
							} 

							elseif(!empty($NV_mediacat)) :
							$catcount=2;
							
							if(!is_array($NV_mediacat)) $NV_mediacat = explode(",",$NV_mediacat); // make array if not already
							
							foreach ($NV_mediacat as $catlist) { // Get category ID Array 
						
								if (is_numeric ($catlist)) { // backwards compatible with post id
									$catname = get_cat_name($catlist);
								} else {
									$catname = $catlist; // if not numeric, use category name
								}					
							
								$strip_html = preg_replace("/&#?[a-z0-9]+;/i","",$catname);	?>
								
								<li class="segment-<?php echo $catcount; ?>"><a href="#" data-value="<?php echo str_replace(" ","_",$strip_html); echo $NV_shortcode_id; ?>"><?php echo $catname; ?></a></li>                    
							<?php 
							$catcount++; 
							} 							
							
							elseif($NV_productcat || $NV_producttag) :
							$catcount=2;
							
							if($pcats && $tags) {
								$NV_productcattag = 	$pcats .','. $tags;
							} elseif($pcats) {
								$NV_productcattag = 	$pcats;
							} elseif($tags) {
								$NV_productcattag = 	$tags;
							}
							
							$NV_productcattag = explode(",", $NV_productcattag);
							
							foreach ($NV_productcattag as $catlist) { // Get category ID Array 
						
		
								$catname = $catlist; // if not numeric, use category name
		
			
								$strip_html = preg_replace("/&#?[a-z0-9]+;/i","",$catname);	?>
								
								<li class="segment-<?php echo $catcount; ?>"><a href="#" data-value="<?php echo str_replace(" ","_",$strip_html); echo $NV_shortcode_id; ?>"><?php echo $catname; ?></a></li>                    
							<?php 
							$catcount++; 
							} 
					
							endif; ?>
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
}

/* ------------------------------------

:: GRID ONLY *END*

------------------------------------*/

$post_count = $featured_query->post_count; // Check how many posts in query.

while ($featured_query->have_posts()) : $featured_query->the_post(); 

/* ------------------------------------

:: CUSTOM FIELD DATA

------------------------------------*/

$categories='';

if($NV_gallerycat) :

foreach((get_the_category($post->ID)) as $category) {
		$categories .= str_replace(" ","_",$category->cat_name).$NV_shortcode_id. ' ';
		$categories = preg_replace("/&#?[a-z0-9]+;/i","",$categories);
} 

elseif($NV_mediacat) :
$terms = get_the_terms($post->ID,'media-category');
foreach($terms as $category) {
		$categories .= str_replace(" ","_",$category->name).$NV_shortcode_id. ' ';
		$categories = preg_replace("/&#?[a-z0-9]+;/i","",$categories);
} 

elseif($NV_productcat || $NV_producttag) :

if( class_exists('Woocommerce') ) :

	$product_categories = get_the_terms($post->ID,'product_cat');
	if(!empty($product_categories)) {
		foreach ($product_categories as $product_category) {
			$categories .= str_replace(" ","_", $product_category->name).$NV_shortcode_id. ' ';
		}
	}

	$product_tags = get_the_terms($post->ID,'product_tag');
	if($product_tags) {
		foreach ($product_tags as $product_tag) {
			$categories .= str_replace(" ","_", $product_tag->name).$NV_shortcode_id. ' ';
		}
	}	
	$categories = preg_replace("/&#?[a-z0-9]+;/i","",$categories);
	
endif;

if( class_exists('WPSC_Query') ) :	

	$wpsc_product_categories = get_the_product_category( wpsc_the_product_id() );
	if($wpsc_product_categories) {
		foreach ($wpsc_product_categories as $wpsc_product_category) {
			$categories .= str_replace(" ","_", $wpsc_product_category->name).$NV_shortcode_id. ' ';
		}
	}

	$wpsc_product_tags = wp_get_product_tags( wpsc_the_product_id() );
	if($wpsc_product_tags) {
		foreach ($wpsc_product_tags as $wpsc_product_tag) {
			$categories .= str_replace(" ","_", $wpsc_product_tag->name).$NV_shortcode_id. ' ';
		}
	}	
	$categories = preg_replace("/&#?[a-z0-9]+;/i","",$categories);


endif;



endif;

/* ------------------------------------

:: GET INDIVIDUAL SLIDE DATA

------------------------------------*/

$pdata = maybe_unserialize(get_post_meta( get_the_ID(), 'pgopts', true ));



if($NV_datasource=='data-5') :

if( class_exists('Woocommerce') ) :

	global $product,$woocommerce;
	
	$thumbnail_id = get_post_thumbnail_id($post->ID);

	$size="large";
	$image_src=wp_get_attachment_image_src($thumbnail_id, $size,false); // Get attached image URL
	
	$NV_previewimgurl=$image_src[0];
	
	if( empty($NV_previewimgurl) ) $NV_previewimgurl = $woocommerce->plugin_url().'/assets/images/placeholder.png';
	
	$NV_productprice	= $product->get_price_html(); // Product Price

endif;

if ( class_exists('WPSC_Query') ) : 

	$NV_previewimgurl	= wpsc_the_product_image(); // Product Image
	$NV_productprice	= wpsc_the_product_price(); // Product Price

endif;

$NV_previewimgurl	=	parse_url($NV_previewimgurl, PHP_URL_PATH); // make relative Image URL

else :

$NV_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL

endif;

if(isset($pdata["movieurl"])) 			$NV_movieurl = $pdata["movieurl"]; 				else $NV_movieurl=''; // Movie File URL
if(isset($pdata["stagegallery"]))		$NV_stagegallery=$pdata["stagegallery"]; 		else $NV_stagegallery=''; // Stage Layout
if(isset($pdata["disablegallink"]))		$NV_disablegallink=$pdata["disablegallink"];	else $NV_disablegallink='';
if(isset($pdata["disablereadmore"]))	$NV_disablereadmore=$pdata["disablereadmore"];	else $NV_disablereadmore='';
if(isset($pdata["imgzoomcrop"]))		$NV_imgzoomcrop=$pdata["imgzoomcrop"];			else $NV_imgzoomcrop='';
if(isset($pdata["displaytitle"])) 		$NV_displaytitle=$pdata["displaytitle"]; 		else $NV_displaytitle='';
if(isset($pdata["postsubtitle"]))		$NV_postsubtitle=$pdata["postsubtitle"];		else $NV_postsubtitle='';
if(isset($pdata["videotype"])) 			$NV_videotype=$pdata["videotype"];				else $NV_videotype='';
if(isset($pdata["videoratio"])) 		$ratio=$pdata["videoratio"];					else $ratio='';
if(isset($pdata["videoautoplay"]))		$NV_videoautoplay=$pdata["videoautoplay"];		else $NV_videoautoplay='';
if(isset($pdata["slidetimeout"]))		$NV_slidetimeout=$pdata["slidetimeout"];		else $NV_slidetimeout='';
if(isset($pdata["cssclasses"])) 		$NV_cssclasses = $pdata["cssclasses"];			else $NV_cssclasses='';


if( !empty($pdata["galexturl"]) ) { // Set the Permalink
	$NV_galexturl=$pdata["galexturl"];
} else {
	$NV_galexturl=get_permalink();
}

if( !empty($pdata["posttitle"]) ) { // Set the title
	$NV_posttitle=$pdata["posttitle"];
} else {
	$NV_posttitle = the_title('', '', false);
	
}

global $more; $more = FALSE; 

if ( empty($post->post_excerpt) ) {
	if($NV_stagegallery=="textoverlay") {
		$NV_description = get_the_content();
	} else {
		$NV_description = the_advanced_excerpt('length='.$NV_galleryexcerpt.'&ellipsis=',true);
	}
} else {
	$NV_description = get_the_excerpt(); 
}

/* ------------------------------------

:: 3D ONLY

------------------------------------*/

if(!isset($NV_3dsegments)) 		$NV_3dsegments='';
if(!isset($NV_3dtween))  		$NV_3dtween='';
if(!isset($NV_3dtweentime)) 	$NV_3dtweentime='';
if(!isset($NV_3dtweendelay)) 	$NV_3dtweendelay='';
if(!isset($NV_3dzdistance)) 	$NV_3dzdistance='';
if(!isset($NV_3dexpand))		$NV_3dexpand='';


$NV_3dsegments_slide	= ( !empty( $pdata["gallery3dsegments"] ) ) 	? $pdata["gallery3dsegments"]	: $NV_3dsegments;
$NV_3dtween_slide		= ( !empty( $pdata["gallery3dtween"] ) ) 		? $pdata["gallery3dtween"]		: $NV_3dtween;
$NV_3dtweentime_slide	= ( !empty( $pdata["gallery3dtweentime"] ) ) 	? $pdata["gallery3dtweentime"]	: $NV_3dtweentime;
$NV_3dtweendelay_slide	= ( !empty( $pdata["gallery3dtweendelay"] ) ) 	? $pdata["gallery3dtweendelay"]	: $NV_3dtweendelay;
$NV_3dzdistance_slide	= ( !empty( $pdata["gallery3dzdistance"] ) ) 	? $pdata["gallery3dzdistance"]	: $NV_3dzdistance;
$NV_3dexpand_slide		= ( !empty( $pdata["gallery3dexpand"] ) ) 		? $pdata["gallery3dexpand"]		: $NV_3dexpand;

if(isset($NV_transitions)) {
array_push($NV_transitions,'<Transition Pieces="'.$NV_3dsegments_slide.'" Time="'.$NV_3dtweentime_slide.'" Transition="'.$NV_3dtween_slide.'" Delay="'.$NV_3dtweendelay_slide.'"  DepthOffset="'.$NV_3dzdistance_slide.'" CubeDistance="'.$NV_3dexpand_slide.'"></Transition>');
} else {
$NV_transitions='';
$NV_transitions = array($NV_transitions,'<Transition Pieces="'.$NV_3dsegments_slide.'" Time="'.$NV_3dtweentime_slide.'" Transition="'.$NV_3dtween_slide.'" Delay="'.$NV_3dtweendelay_slide.'"  DepthOffset="'.$NV_3dzdistance_slide.'" CubeDistance="'.$NV_3dexpand_slide.'"></Transition>');
}

/* ------------------------------------

:: 3D ONLY *END*

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

/* ------------------------------------

:: CUSTOM FIELD DATA *END*

------------------------------------*/   

$do_not_duplicate[] = get_the_ID();

$postcount++;
$data_id++;
$image = catch_image(); // Check for images within post

if($NV_videotype !="" && $postcount!="1") { // Stop IE autoplaying hidden video onload. 
	$display_none ="";
	$display_none = "yes";
}

$slide_id='';
$slide_id="slide-".get_the_ID();

if($NV_shortcode_id) $slide_id.'-'.$NV_shortcode_id;

if(!isset($NV_customlayer)) $NV_customlayer='';

if(!get_option('timthumb_disable') && $NV_customlayer==='') { // Check is Timthumb is Enabled or Disabled
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

if(!isset($NV_slidearray)) $NV_slidearray='';
if(!isset($NV_stagetimeout)) $NV_stagetimeout='';
if(!isset($NV_slidetimeout)) $NV_slidetimeout='';

if($NV_slidetimeout!='') {
	$NV_slidearray = $NV_slidearray . $NV_slidetimeout .","; 
} elseif($NV_stagetimeout!='') {
	$NV_slidearray = $NV_slidearray . $NV_stagetimeout .","; 
} else {
	$NV_slidearray = $NV_slidearray . "10,";
} 

if($NV_show_slider=='islider') {
	if($NV_previewimgurl) { $NV_navimg.=$NV_previewimgurl.','; } elseif($image) { $NV_navimg.=$image.','; }
}
endwhile; ?>

<?php

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

wp_reset_query(); ?>