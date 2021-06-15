<?php

/* ------------------------------------
:: GRID GALLERY
------------------------------------*/

function postgallery_grid_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'filtering' => '',
	  'columns' => '',
	  'categories' => '',
	  'post_format'=> '',
	  'product_categories' => '',
	  'product_tags' => '',		  
	  'slidesetid' => '',
	  'attached_id' => '', 
	  'media_categories' => '', 
	  'flickr_set' => '',  	  	  
	  'imageeffect' => '',
	  'height' => '',
	  'width' => '',
	  'title' => '',
	  'imgheight' => '',
	  'align' => '',
	  'imgwidth' => '',	  
	  'id' => '',
	  'lightbox' => '',	  
	  'shadow' => '',
	  'class' => '',
	  'limit' => '',
	  'excerpt' => '',
	  'orderby' => '',	  
	  'sortby' => '',	  
      ), $atts ) );


	$NV_title = esc_attr($title);
	$NV_gallerysortby =  esc_attr($sortby);
	$NV_galleryorderby =  esc_attr($orderby);
	$NV_gallerynumposts= esc_attr($limit);
	$NV_groupgridcontent = esc_attr($content);
	$NV_gridfilter = esc_attr($filtering);
	$NV_galleryheight = esc_attr($height);
	$NV_gallerywidth = esc_attr($width);


	if( empty($columns) )
	{
		$NV_gridcolumns = "3"; // Set default 3 Columns
	}
	else
	{
		$NV_gridcolumns = $columns;
	}

	$NV_gridcolumns_text=numberToWords($NV_gridcolumns); // convert number to word
	$NV_shadowsize = esc_attr($shadow);
	$NV_imageeffect = esc_attr($imageeffect);
	$NV_imgheight = esc_attr($imgheight);
	$NV_imgwidth = esc_attr($imgwidth);
	$NV_lightbox = esc_attr($lightbox);

	if( empty($NV_gallerywidth) )
	{ 
		$NV_panelwidth = 100/$NV_gridcolumns;
		$NV_widthtype='%'; 
	}
	else
	{ 
		$NV_panelwidth = $NV_gallerywidth/$NV_gridcolumns; $NV_widthtype='px';
	}
	
	$NV_panelformat='style="width:'.$NV_panelwidth.$NV_widthtype.';height:'.$NV_galleryheight.'px"'; // calc panel width/height

	/* ------------------------------------
	:: DEFAULT IMAGE SIZES
	------------------------------------*/

	// Set timthumb width / height values
	if( empty($NV_imgheight) && empty($NV_imgwidth) )
	{
		$NV_imgheight = '120';
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
	}
	elseif( !empty($NV_imgwidth) && empty($NV_imgheight) )
	{
		$NV_image_size = "w=". $NV_imgwidth ."&amp;";	
	} 
	elseif( !empty($NV_imgheight) && empty($NV_imgwidth) )
	{
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
	}
	elseif( !empty($NV_imgheight) && !empty($NV_imgwidth) )
	{
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}

	if( !empty($NV_gallerywidth) ) $NV_gridgallery_width = 'style="max-width:'.$NV_gallerywidth.'px"'; else $NV_gridgallery_width ='';


	// Excerpt
	if( !empty($excerpt) )
	{
		$NV_galleryexcerpt = esc_attr($excerpt);
	}
	else
	{
		$NV_galleryexcerpt = "55";
	}

	ob_start(); 
	
	/* ------------------------------------
	:: SET VARIABLES
	------------------------------------*/
	
	$NV_shortcode_id="gd".esc_attr($id);
	$NV_show_slider = 'gridgallery';
	$NV_gallerycat = esc_attr($categories);
	$NV_gallerypostformat = esc_attr($post_format);
	$NV_mediacat = esc_attr($media_categories);
	$NV_slidesetid = esc_attr($slidesetid);
	$NV_attachedmedia = esc_attr($attached_id);
	$NV_flickrset = esc_attr($flickr_set);
	$NV_productcat = esc_attr($product_categories);
	$NV_producttag = esc_attr($product_tags);
	
	/* ------------------------------------
	:: SET VARIABLES *END*
	------------------------------------*/

	if($NV_title) echo '<div class="gallery-title"><h4>'.$NV_title.'</h4></div>'; // TITLE
	
	if( $NV_gridfilter == 'yes' ) $class = $class . ' filter';
	
	echo '<div id="grid-'. $NV_shortcode_id .'" data-grid-columns="'. $NV_gridcolumns .'" class="gallery-wrap grid-gallery nv-skin '. $align .' '. $class .'" '. $NV_gridgallery_width .'>';

	$postcount = 0;

	/* ------------------------------------
	
	:: LOAD DATA SOURCE
	
	------------------------------------*/

	if( !empty($NV_attachedmedia) )	$NV_datasource='data-1';
	if( !empty($NV_gallerycat) || !empty($NV_gallerypostformat) ) $NV_datasource='data-2';
	if( !empty($NV_flickrset) )  $NV_datasource='data-3';
	if( !empty($NV_slidesetid) ) $NV_datasource='data-4';
	if( !empty($NV_productcat) || !empty($NV_producttag) ) $NV_datasource='data-5';
	if( !empty($NV_mediacat) ) $NV_datasource='data-6';


	if( $NV_datasource == "data-1" ) 
	{
		include(NV_FILES .'/inc/classes/post-attachments-class.php');		
	}
	elseif( $NV_datasource == "data-2" ) 
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');		
	}
	elseif( $NV_datasource == "data-3" )
	{
		include(NV_FILES .'/inc/classes/flickr-class.php');			
	}
	elseif( $NV_datasource == "data-4" )
	{
		include(NV_FILES .'/inc/classes/slideset-class.php');		
	}
	elseif( $NV_datasource == "data-5" )
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');			
	}
	elseif( $NV_datasource == "data-6" )
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');
	}

	/* ------------------------------------
	
	:: LOAD DATA SOURCE *END*
	
	------------------------------------*/ 

	echo '<div class="clear"></div>';
	echo '</div><!-- /gallery-wrap -->';


	if( $NV_gridfilter=='yes' ) 
	{
		wp_deregister_script('jquery-isotope');
		wp_register_script('jquery-isotope',get_template_directory_uri().'/js/jquery.isotope.min.js',false,null,true);
		wp_enqueue_script('jquery-isotope');
	}

	$output_string=ob_get_contents();
	ob_end_clean();

	return $output_string;
}


/* ------------------------------------
:: GROUP SLIDER
------------------------------------*/

function postgallery_slider_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'categories' => '',
	  'post_format'=> '',
	  'product_categories' => '',
	  'product_tags' => '',	  
	  'slidesetid' => '',
	  'attached_id' => '', 
	  'media_categories' => '', 
	  'flickr_set' => '',  	  
	  'imageeffect' => '',
	  'height' => '',
	  'width' => '',
	  'imgheight' => '',
	  'imgwidth' => '',
	  'title' => '',
	  'id' => '',
	  'lightbox' => '',	 
	  'shadow' => '', 
	  'limit' => '',
	  'excerpt' => '',
	  'orderby' => '',	  
	  'sortby' => '',
	  'timeout' => '', 
	  'vertical' => '',	
	  'align' => '',
	  'columns' => '',
	  'class' => '',
	  'image_align' => '',  
	  'animation' => '',
	  'tween' => '',	  
      ), $atts ) );
 
	$NV_gallerysortby =  esc_attr($sortby);
	$NV_galleryorderby =  esc_attr($orderby);
	$NV_gallerynumposts= esc_attr($limit);
	$NV_groupgridcontent = esc_attr($content);
	$NV_gallerywidth = esc_attr($width);
	$NV_shadowsize = esc_attr($shadow);
	$NV_imageeffect = esc_attr($imageeffect);
	$NV_imgheight = esc_attr($imgheight);
	$NV_imgwidth = esc_attr($imgwidth);
	$NV_galleryheight = esc_attr($height);
	$NV_lightbox = esc_attr($lightbox);
	$NV_title = esc_attr($title);

	$NV_verticalslide = esc_attr($vertical);
	$NV_slidercolumns = esc_attr($columns);
	if( empty($NV_slidercolumns) ) $NV_slidercolumns = '3';

	$NV_slidercolumns_text=numberToWords($NV_slidercolumns); // convert number to word

	$NV_imgalign = esc_attr($image_align);
	$NV_class = esc_attr($class);

	if( !empty($NV_imgalign) ) $NV_imgalign = 'imgalign-'.$NV_imgalign; else $NV_imgalign='';

	if( $NV_verticalslide=='yes' ) $NV_verticalslide='vertical'; else $NV_verticalslide='horizontal';


	if( $NV_verticalslide=='vertical' )
	{
		/* ------------------------------------
		:: VERTICAL SLIDER VARIABLES
		------------------------------------*/
		
		$NV_sliderformat =  'style="max-width:'.$NV_gallerywidth.'px;"';
		
		if( !empty($NV_galleryheight) )
		{
			$NV_vertheight = $NV_galleryheight;
			$NV_panelheight = $NV_vertheight/$NV_slidercolumns;
			$NV_panelformat='style="min-height:'.$NV_panelheight.$NV_widthtype.'px;"';
		}
		
	}
	else
	{
		/* ------------------------------------
		:: HORIZONTAL SLIDER VARIABLES
		------------------------------------*/

		$NV_verticalslide='horizontal';
		$NV_vertheight=$NV_galleryheight;
		$NV_sliderformat =  'style="max-width:'.$NV_gallerywidth.'px;"';
		
		if( empty($NV_gallerywidth) )
		{
			$NV_panelwidth = 100/$NV_slidercolumns; $NV_widthtype='%'; 
		} 
		else
		{
			$NV_gallerywidth = $NV_gallerywidth; 
			$NV_panelwidth = $NV_gallerywidth/$NV_slidercolumns; 
			$NV_widthtype='px';
		}
		
		if( !empty($NV_galleryheight) )
		{
			$NV_vertheight=$NV_panelformat='style="min-height:'.$NV_galleryheight.'px"';
		}
		
	}


	/* ------------------------------------
	:: DEFAULT IMAGE SIZES
	------------------------------------*/

	// Set timthumb width / height values
	if( empty($NV_imgheight) && empty($NV_imgwidth) )
	{
		$NV_imgheight = '100';
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
	}
	elseif( !empty($NV_imgwidth) && empty($NV_imgheight) )
	{
		$NV_image_size = "w=". $NV_imgwidth ."&amp;";	
	} 
	elseif( !empty($NV_imgheight) && empty($NV_imgwidth) )
	{
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
	}
	elseif( !empty($NV_imgheight) && !empty($NV_imgwidth) )
	{
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}
	

	if( empty($NV_galleryheight) ) $NV_galleryheight = $NV_imgheight+$NV_imgheight/100*12;


	// Set effect
	if($NV_verticalslide == 'vertical')
	{
		$NV_effect = 'scrollVert';
	}
	else
	{
		$NV_effect = 'scrollHorz';
	}
	 
	// Tween
	if(esc_attr($tween)) {
		$NV_tween=esc_attr($tween);
	} else {
		$NV_tween="easeInOutExpo";
	} 

	// Excerpt
	if( !empty($excerpt) )
	{
		$NV_galleryexcerpt = esc_attr($excerpt);
	}
	else
	{
		$NV_galleryexcerpt = "55";
	}


	ob_start();
	
	/* ------------------------------------
	:: SET SOURCE VARIABLES
	------------------------------------*/
	
	$NV_shortcode_id="gp".esc_attr($id);
	$NV_show_slider = 'groupslider';
	
	$NV_gallerycat = esc_attr($categories);
	$NV_gallerypostformat = esc_attr($post_format);
	$NV_mediacat = esc_attr($media_categories);
	$NV_slidesetid = esc_attr($slidesetid);
	$NV_attachedmedia = esc_attr($attached_id);
	$NV_flickrset = esc_attr($flickr_set);
	$NV_productcat = esc_attr($product_categories);
	$NV_producttag = esc_attr($product_tags);
	
	/* ------------------------------------
	:: SET SOURCE VARIABLES *END*
	------------------------------------*/

	if($NV_title) echo '<div class="gallery-title"><h4>'.$NV_title.'</h4></div>'; // TITLE

	echo '<div id="group-slider-'. $NV_shortcode_id .'" class="gallery-wrap group-slider row shortcode '. $NV_class .' '. $align .' nv-skin clearfix '. $NV_verticalslide. '" '. $NV_sliderformat .' data-groupslider-fx="'. $NV_effect .'">';
	echo '<div class="group-slider '. $NV_imgalign .'" '. $NV_vertheight .'>';
	echo '<img src="'. get_template_directory_uri() .'/images/blank.gif">';

	
	/* ------------------------------------
	
	:: LOAD DATA SOURCE
	
	------------------------------------*/

	if( !empty($NV_attachedmedia) )	$NV_datasource='data-1';
	if( !empty($NV_gallerycat) || !empty($NV_gallerypostformat) ) $NV_datasource='data-2';
	if( !empty($NV_flickrset) )  $NV_datasource='data-3';
	if( !empty($NV_slidesetid) ) $NV_datasource='data-4';
	if( !empty($NV_productcat) || !empty($NV_producttag) ) $NV_datasource='data-5';
	if( !empty($NV_mediacat) ) $NV_datasource='data-6';


	if( $NV_datasource == "data-1" ) 
	{
		include(NV_FILES .'/inc/classes/post-attachments-class.php');		
	}
	elseif( $NV_datasource == "data-2" ) 
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');		
	}
	elseif( $NV_datasource == "data-3" )
	{
		include(NV_FILES .'/inc/classes/flickr-class.php');			
	}
	elseif( $NV_datasource == "data-4" )
	{
		include(NV_FILES .'/inc/classes/slideset-class.php');		
	}
	elseif( $NV_datasource == "data-5" )
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');			
	}
	elseif( $NV_datasource == "data-6" )
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');
	}

	/* ------------------------------------
	
	:: LOAD DATA SOURCE *END*
	
	------------------------------------*/ 


	$postcount = 0;


    echo '</div><!-- / groupslider -->';
    echo '<div class="slidernav-left nvcolor-wrap">';
    
	if($post_count>$NV_slidercolumns)
	{
		echo '<span class="nvcolor"></span><div class="slidernav"><a href="#"></a></div>';
    }
	
    echo '</div>';
    echo '<div class="slidernav-right nvcolor-wrap">';
    
	if($post_count>$NV_slidercolumns)
	{
		echo '<span class="nvcolor"></span><div class="slidernav"><a href="#"></a></div>';
	}
    
	echo '</div>';
	echo '<input name="group-slider-'. $NV_shortcode_id .'_timeout" class="timeout" value="'. $timeout .'" type="hidden" />';
    echo '<div class="clear"></div>';
    echo '</div><!-- / gallery-wrap -->';

	wp_deregister_script('jquery-cycle');
	wp_register_script('jquery-cycle',get_template_directory_uri().'/js/jquery.cycle.plugin.min.js',false,array('jquery'));
	wp_enqueue_script('jquery-cycle'); 

	wp_deregister_script('touch-gestures');
	wp_register_script('touch-gestures',get_template_directory_uri().'/js/touch.gestures.min.js',false,null,true);
	wp_enqueue_script('touch-gestures');
	
	wp_deregister_script('group-slider');
	wp_register_script('group-slider',get_template_directory_uri().'/js/group.slider.min.js',false,null,true);
	wp_enqueue_script('group-slider');	
	

	$output_string=ob_get_contents();
	ob_end_clean();
	
	return $output_string;

}

/* ------------------------------------
:: STAGE GALLERY
------------------------------------*/

function postgallery_image_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'categories' => '',
	  'post_format'=> '',
	  'product_categories' => '',
	  'product_tags' => '',	  
	  'slidesetid' => '',
	  'attached_id' => '', 
	  'media_categories' => '', 
	  'flickr_set' => '',  	  
	  'imageeffect' => '',
	  'shadow' => '',
	  'timeout' => '',
	  'lightbox' => '',
	  'playnav' => '',
	  'navigation' => '',
	  'height' => '',
	  'width' => '',
	  'title' => '',	  
	  'align' => '',
	  'id' => '',
	  'limit' => '',
	  'orderby' => '',	  
	  'sortby' => '',
	  'animation' => '',
	  'tween' => '',
	  'speed' => '',
	  'excerpt' => '',
	  'customlayer' => '',	 	  
      ), $atts ) );


	/* ------------------------------------
	:: SET VARIABLES
	------------------------------------*/

	$NV_shortcode_id="sg".esc_attr($id);
	
	$NV_gallerycat = esc_attr($categories);
	$NV_gallerypostformat = esc_attr($post_format);
	$NV_mediacat = esc_attr($media_categories);
	$NV_slidesetid = esc_attr($slidesetid);
	$NV_attachedmedia = esc_attr($attached_id);
	$NV_flickrset = esc_attr($flickr_set);
	$NV_productcat = esc_attr($product_categories);
	$NV_producttag = esc_attr($product_tags);

	/* ------------------------------------
	:: SET VARIABLES *END*
	------------------------------------*/

	$NV_show_slider='';
	
	if( $code=='postgallery_image' )
	{
		$NV_show_slider='stageslider';
	}
	elseif( $code=='postgallery_islider' )
	{
		$NV_show_slider='islider';
	} 
	elseif( $code=='postgallery_nivo' )
	{
		$NV_show_slider='nivo';
	}
	
	$NV_gallery_format ='';
	$NV_speed =  esc_attr($speed);
	$NV_customlayer = esc_attr($customlayer);
	$NV_title = esc_attr($title);
	$NV_lightbox =  esc_attr($lightbox);
	$NV_slidesetid = esc_attr($slidesetid);
	$NV_stageplaypause= esc_attr($playnav);
	$NV_stageplaypause= esc_attr($navigation);
	
	if(esc_attr($excerpt)) {
		$NV_galleryexcerpt = esc_attr($excerpt);
	} else {
		$NV_galleryexcerpt = "55";
	}
	 
	if(esc_attr($animation)) {
		$NV_animation=esc_attr($animation);
	} else {
		if($NV_show_slider=='nivo') {
			$NV_animation="random";
		} else {
			$NV_animation="fade";
		}
	}
	 
	if(esc_attr($tween)) {
		$NV_tween=esc_attr($tween);
	} else {
		$NV_tween="linear";
	} 
	 
	$NV_imgwidth=esc_attr($width);
	$NV_imgheight=esc_attr($height);
	$NV_galleryheight=$NV_imgheight;
	$NV_imageeffect=esc_attr($imageeffect);
	$NV_gallery_width = $NV_imgwidth;
	
	$NV_gallerysortby =  esc_attr($sortby);
	$NV_galleryorderby =  esc_attr($orderby);
	$NV_gallerynumposts= esc_attr($limit);

	if($NV_imgwidth && !$NV_imgheight) {
		$NV_image_size = "w=". $NV_imgwidth ."&amp;";	
	} elseif($NV_imgheight && !$NV_imgwidth) {
		$NV_image_size = "h=". $NV_imgheight ."&amp;";	
	} elseif($NV_imgheight && $NV_imgwidth) {
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}


	if($NV_show_slider=='nivo' && !$NV_imgheight) {
		$NV_galleryheight=$NV_imgheight='350';
		
		$NV_image_size = "w=". $NV_imgwidth ."&amp;h=". $NV_imgheight ."&amp;";	
	}	
	

	if($NV_show_slider=='stageslider') { // Set the Gallery Type
	 $NV_gallery_type='stage-slider';	
	} elseif($NV_show_slider=='islider') {
	 $NV_gallery_type='stage-slider islider id'.$NV_shortcode_id;
	} elseif($NV_show_slider=='nivo') {
	 $NV_gallery_type='stage-slider-nivo id'.$NV_shortcode_id;
	}


	if($NV_show_slider=='islider')
	{
		// iSlider Vars
		$NV_navimg_width=$NV_imgwidth/100*25;
		$NV_gallery_width=$NV_imgwidth+$NV_navimg_width;
		$NV_gallery_format='style="float:left;"';
		$NV_gallery_effect=$NV_imageeffect.' islider';
		$NV_imageeffect='';
		$NV_gallerywrap_style ='max-width:'. $NV_imgwidth .'px;';
	}
	
	
	if($NV_show_slider=='nivo')
	{
		// Nivo Slider Vars
		$NV_gallery_format='style="max-width:'.$NV_imgwidth.'px"';
		$NV_gallerywrap_style='max-width:'.$NV_gallery_width.'px';
		$NV_gallery_effect=$NV_imageeffect.' nivo';
		$NV_imageeffect='';
		$NV_stagetransition = ( empty( $NV_nivoeffect ) ? $NV_nivoeffect : 'random' );
		$NV_stagetimeout = ( empty($NV_stagetimeout) ? $NV_stagetimeout=10000 : $NV_stagetimeout = $NV_stagetimeout*1000 );	
	} 
	

	if($NV_show_slider=='stageslider')
	{
		// Stage Slider Vars
		$NV_gallerywrap_style='max-width:'.$NV_gallery_width.'px';
		$NV_gallery_effect=' stage';
		$NV_gallery_extras='style="height:'.$NV_galleryheight.'px;"';
	} 	
	
	if(esc_attr($timeout)) {
		$NV_stagetimeout = esc_attr($timeout);
	}

	ob_start();

	if( !empty($NV_title) ) echo '<div class="gallery-title"><h4>'.$NV_title.'</h4></div>'; // TITLE

	echo '<div id="id-'. $NV_shortcode_id .'" class="post-gallery-wrap shortcode nv-skin id-'. $NV_shortcode_id .' '. $align .' gallery-wrap ';
	
	if( !empty($NV_gallery_effect) ) echo $NV_gallery_effect;
	
	echo '" style="'; 
	
	if( empty($NV_customlayer) ) echo $NV_gallerywrap_style;
	
	echo '" 
	data-stage-type="'. $NV_show_slider .'" 
	data-stage-nav="'. $NV_stageplaypause .'" 
	data-stage-effect="'. $NV_animation .'" 
	data-stage-easing="'. $NV_tween .'">';


	if( $NV_show_slider!='islider' )
	{
		if( $NV_stageplaypause=="enabled" || $NV_stageplaypause=="leftrightonly" )
		{
			echo '<div class="slidernav-left nvcolor-wrap">';
			echo '<span class="nvcolor"></span>';
			echo '<div class="slidernav">';
			echo '<a class="nivo-prevNav poststage-prev nav-prev"></a>';
			echo '</div>';
			echo '</div>';
			echo '<div class="slidernav-right nvcolor-wrap">';
			echo '<span class="nvcolor"></span>';
			echo '<div class="slidernav">';
			echo '<a class="nivo-nextNav poststage-next nav-next"></a>';
			echo '</div>';
			echo '</div>';	
		} 
		
		if( $NV_stageplaypause!="disabled" && $NV_stageplaypause!="leftrightonly" ) 
		{
			echo '<div class="control-wrap">';
			echo '<div class="control-panel">';
			echo '</div><!-- / control-panel -->';
			echo '</div><!-- / control-wrap -->';
		} 
	}
     
	echo '<div class="slider-inner-wrap" '. $NV_gallery_format .'>';
	echo '<div class="' .$NV_gallery_type .'" '. $NV_gallery_extras .'>';
	
	if( $NV_gallery_type=='stage-slider' ) 
	{
		echo '<img src="'. get_template_directory_uri() .'/images/blank.gif">';
	} 


	/* ------------------------------------
	
	:: LOAD DATA SOURCE
	
	------------------------------------*/

	if( !empty($NV_attachedmedia) )	$NV_datasource='data-1';
	if( !empty($NV_gallerycat) || !empty($NV_gallerypostformat) ) $NV_datasource='data-2';
	if( !empty($NV_flickrset) )  $NV_datasource='data-3';
	if( !empty($NV_slidesetid) ) $NV_datasource='data-4';
	if( !empty($NV_productcat) || !empty($NV_producttag) ) $NV_datasource='data-5';
	if( !empty($NV_mediacat) ) $NV_datasource='data-6';

	if( $NV_datasource=="data-1" ) 
	{
		include(NV_FILES .'/inc/classes/post-attachments-class.php');		
	}
	elseif( $NV_datasource=="data-2" ) 
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');		
	}
	elseif( $NV_datasource=="data-3" )
	{
		include(NV_FILES .'/inc/classes/flickr-class.php');			
	}
	elseif( $NV_datasource=="data-4" )
	{
		include(NV_FILES .'/inc/classes/slideset-class.php');		
	}
	elseif( $NV_datasource=="data-5" )
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');			
	}
	elseif( $NV_datasource=="data-6" )
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');
	}

/* ------------------------------------

:: LOAD DATA SOURCE *END*

------------------------------------*/

	$slidenum_chk=$postcount;
	if( !empty($post_count) ) $slidenum_chk=$post_count;

	echo '</div><!-- / slider-inner-wrap -->';
	echo '</div><!-- / stageslider -->';

	if($NV_show_slider=='islider') 
	{ 
		// iSlider Image Nav
		$NV_navimg_height=esc_attr($height)/3+1;
		$NV_navimg = rTrim($NV_navimg,',');
		$NV_navimg=explode(',',$NV_navimg);
 
 		echo '<div class="islider-nav-wrap">';
		echo '<div class="nvcolor-wrap">';
		echo '<span class="nvcolor"></span>';
		echo '<div class="nav-prev islider-nav"></div>';
		echo '</div>';
		echo '<ul class="islider-nav-ul" style="height:' .$NV_imgheight .'px">';
    	echo '<li class="copynav">';
		echo '<ul>';
		
			foreach ($NV_navimg as $NV_navimg)
			{
				echo '<li><a href="#"><img src="'. $NV_imagepath . dyn_getimagepath($NV_navimg) .'" /></a></li>';
			}
		
		echo '</ul>';
		echo '</li>';
		echo '</ul>';
		echo '</div>'; 

	}
	
	echo '<input name="'. $NV_shortcode_id .'_timeout_array" class="timeout_array" value="'. $NV_slidearray .'" type="hidden" />';
	echo '<input name="'. $NV_shortcode_id .'_timeout" class="timeout" value="'. $NV_stagetimeout .'" type="hidden" />';
	echo '<div class="clear"></div>';
	echo '</div><!-- / gallery-wrap -->';


	// enqueue scripts
	if( $NV_show_slider == 'nivo' )
	{
		wp_deregister_script('nivo-slider');
		wp_register_script('nivo-slider',get_template_directory_uri().'/js/nivo.slider.min.js',false,null,true);
		wp_enqueue_script('nivo-slider');			
	}
	else
	{
		wp_deregister_script('jquery-cycle');
		wp_register_script('jquery-cycle',get_template_directory_uri().'/js/jquery.cycle.plugin.min.js',false,null,true);
		wp_enqueue_script('jquery-cycle');	
	
		wp_deregister_script('touch-gestures');
		wp_register_script('touch-gestures',get_template_directory_uri().'/js/touch.gestures.min.js',false,null,true);
		wp_enqueue_script('touch-gestures');
	
		wp_deregister_script('stage-slider');
		wp_register_script('stage-slider',get_template_directory_uri().'/js/stage.slider.min.js',false,null,true);
		wp_enqueue_script('stage-slider');			
	}

	$output_string=ob_get_contents();	
	ob_end_clean();

	return $output_string;

}


/* ------------------------------------
:: ACCORDION GALLERY
------------------------------------*/

function postgallery_accordion_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'content' => '',
	  'categories' => '',
	  'post_format'=> '',
	  'product_categories' => '',
	  'product_tags' => '',	  
	  'slidesetid' => '',
	  'attached_id' => '', 
	  'media_categories' => '', 
	  'flickr_set' => '',  	  
	  'imageeffect' => '',
	  'shadow' => '',
	  'timeout' => '',
	  'autoplay' => '',
	  'height' => '',
	  'width' => '',
	  'title' => '',
	  'lightbox' => '',	  
	  'minititles' => '',
	  'id' => '',
	  'align' => '',
	  'excerpt' =>'',
	  'limit' => '',
	  'orderby' => '',	  
	  'sortby' => '',	 	  
      ), $atts ) );

	 
	// slider height
	if( !empty($height) )
	{
		$NV_imgheight = $height; // No Reflection
	}
	else
	{
		$NV_imgheight = "350"; // Set default Gallery Height
	}
	
	$NV_image_size = "h=". $NV_imgheight ."&amp;";
	
	// slider width
	if( !empty($width) )
	{
		$NV_gallerywidth = $width;
	} 
	else
	{
		$NV_gallerywidth = "400";
	}
	
	// autorotate
	if( !empty($autoplay) )
	{
		$NV_accordionautoplay = "true";
	}
	else
	{
		$NV_accordionautoplay = "false";
	}
	
	// timeout
	if( !empty($timeout) )
	{
		$NV_stagetimeout=$timeout;
		$NV_poststagetimeout = esc_attr($timeout);
	} 
	else
	{
		$NV_stagetimeout = "10";
	}

	// minititles
	if( esc_attr($minititles ) == "disable")
	{
		$NV_accordiontitles=esc_attr($minititles);
	}

	$NV_imageeffect=$imageeffect;
	$NV_title = $title;
	$NV_lightbox = $lightbox; 	
	$NV_groupgridcontent = $content;
	$NV_slidesetid = $slidesetid;
	$NV_gallerysortby =  $sortby;
	$NV_galleryorderby =  $orderby;
	$NV_gallerynumposts = $limit;
	 
	ob_start();
	
	/* ------------------------------------
	:: SET VARIABLES
	------------------------------------*/
	
	$NV_shortcode_id = "an".esc_attr($id);
	$NV_show_slider = 'galleryaccordion';
	
	$NV_gallerycat = esc_attr($categories);
	$NV_gallerypostformat = esc_attr($post_format);
	$NV_mediacat = esc_attr($media_categories);
	$NV_slidesetid = esc_attr($slidesetid);
	$NV_attachedmedia = esc_attr($attached_id);
	$NV_flickrset = esc_attr($flickr_set);
	$NV_productcat = esc_attr($product_categories);
	$NV_producttag = esc_attr($product_tags);
	
	/* ------------------------------------
	:: SET VARIABLES *END*
	------------------------------------*/

	if( !empty($NV_title) ) echo '<div class="gallery-title"><h4>'.$NV_title.'</h4></div>'; // TITLE

	echo '<div id="nv-accordion-'. $NV_shortcode_id .'" class="accordion-gallery-wrap '. $NV_imageeffect .' '. $align .'" data-accordion-autorotate="'. $NV_accordionautoplay .'" style="width:'. $NV_gallerywidth .'px;">';
    echo '<ul class="accordion-gallery" style="height:'. $NV_imgheight .'px;">';
	

	/* ------------------------------------
	
	:: LOAD DATA SOURCE
	
	------------------------------------*/

	if( !empty($NV_attachedmedia) )	$NV_datasource='data-1';
	if( !empty($NV_gallerycat) || !empty($NV_gallerypostformat) ) $NV_datasource='data-2';
	if( !empty($NV_flickrset) )  $NV_datasource='data-3';
	if( !empty($NV_slidesetid) ) $NV_datasource='data-4';
	if( !empty($NV_productcat) || !empty($NV_producttag) ) $NV_datasource='data-5';
	if( !empty($NV_mediacat) ) $NV_datasource='data-6';

	if( $NV_datasource == "data-1" ) 
	{
		include(NV_FILES .'/inc/classes/post-attachments-class.php');		
	}
	elseif( $NV_datasource == "data-2" ) 
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');		
	}
	elseif( $NV_datasource == "data-3" )
	{
		include(NV_FILES .'/inc/classes/flickr-class.php');			
	}
	elseif( $NV_datasource == "data-4" )
	{
		include(NV_FILES .'/inc/classes/slideset-class.php');		
	}
	elseif( $NV_datasource == "data-5" )
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');			
	}
	elseif( $NV_datasource == "data-6" )
	{
		include(NV_FILES .'/inc/classes/post-categories-class.php');
	}

	/* ------------------------------------
	
	:: LOAD DATA SOURCE *END*

	------------------------------------*/

	echo '</ul>';
	echo '<input name="mainstage_timeout" class="timeout" value="'. $NV_stagetimeout .'" type="hidden" />';
	echo '</div><!-- / accordion-gallery -->';

	wp_deregister_script('kwicks-slider');
	wp_register_script('kwicks-slider',get_template_directory_uri().'/js/kwicks.slider.min.js',false,null,true);
	wp_enqueue_script('kwicks-slider');	  
	
	$output_string=ob_get_contents();
	ob_end_clean();

	return $output_string;
}


/* ------------------------------------
:: BUTTONS
------------------------------------*/

function button_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'url' => '',
      'target' => '',
	  'color' => '',
	  'width' => '',
	  'align' => '',	  
), $atts ) );
 
 if(esc_attr($target)) {
 $target = 'target="'.esc_attr($target).'"';
 }
 
 if($align) $buttonalign='align'.$align; else $buttonalign='';
 
   return '<div class="button-wrap '.esc_attr($width).' '.$buttonalign.'"><div class="'.esc_attr($color).' button ' . esc_attr($width). '"><a href="' . esc_attr($url) . '" ' . $target . '>' . $content . '</a></div></div>';
}

function droppanelbutton_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
	  'color' => '',
	  'width' => '',	
	  'align' => '',	  
), $atts ) );

	if($align) $buttonalign='align'.$align; else $buttonalign='';
    return '<div class="button-wrap ' . esc_attr($width). '  '.$buttonalign.'"><div class="'.esc_attr($color).' button '.esc_attr($width).' droppaneltrigger"><a href="#">' . $content . '</a></div></div>';
}


/* ------------------------------------
:: BLOCK QUOTE
------------------------------------*/

function blockquote_shortcode( $atts, $content = null ) {

	global $NV_inskin;

   extract( shortcode_atts( array(
      'type' => '',
	  'align' => '',
	  'width' => '',
      ), $atts ) );
	  
	$blockwidth='';
	
	if(esc_attr($width)!='') { $blockwidth='style="width:'.esc_attr($width).'px"'; }
 
 	if(esc_attr($type)!="blockquote_line") {
 
	$length = strlen($content);
	$position = intval($length - 17);
	
	$insert_string = '<span class="quote right"><span>&#8221;</span></span>';	

	$newstring=substr_replace($content, $insert_string, $position, 0);
	

   return '<span class="nv-skin ' . esc_attr($type) .' '. esc_attr($align) .'" '.$blockwidth.'><span class="quote left"><span>&#8220;</span></span>' . do_shortcode($newstring) . '</span>';

   
   } else {
       return '<span class="nv-skin ' . esc_attr($type) .' '. esc_attr($align) .'" '.$blockwidth.'>' . do_shortcode($content) . '</span>';  
   }
   
}

/* ------------------------------------
:: HORIZONTAL BREAKS
------------------------------------*/

function hozbreak_shortcode( $atts, $content = null,$code ) {

	if($code=='divider_blank') {
		return '<div class="hozbreak blank row clearfix">&nbsp;</div>';
	} else {
		return '<div class="hozbreak row clearfix">&nbsp;</div>';
	}
}

function hozbreaktop_shortcode( $atts, $content = null ) {

   return '<div class="hozbreak-top row clearfix"><a href="#top" class="clearfix">'.__('Back to Top', 'NorthVantage' ).'</a></div>';
}

function divider_shadow_shortcode( $atts, $content = null,$code ) {
	extract( shortcode_atts( array(
	  'opacity' => '',
), $atts ) );

	if($code=='divider_shadow_top') $imgtype='break-c'; else $imgtype='break-b'; // select correct shadow image

	if($opacity=='100') $opacity_dec='1'; elseif($opacity=='.') $opacity_dec='0'; elseif($opacity<'10')  $opacity_dec='.0'.$opacity; else $opacity_dec='.'.$opacity;

   return '<div class="hozbreak shadow '.$imgtype.' clearfix"><div class="divider-wrap"><img style="opacity:'.$opacity_dec.';" src="'.get_template_directory_uri().'/images/'.$imgtype.'.png" alt="horizontal break" /></div></div>';
}


/* ------------------------------------
:: STYLED BOXES
------------------------------------*/

function styledbox_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
	  'width' => '',
	  'height' => '',
	  'align' => '',
      ), $atts ) );
 
 if(esc_attr($width)) {
 	$style='max-width:'. esc_attr($width) .'px;';
 }

 if(esc_attr($height)) {
 	$style.='max-height:'. esc_attr($height) .'px;';
 } 
 
 if(isset($style)) $style='style="'.$style.'"';
 
 if(esc_attr($type)=="shadow") {
 
 	return '<div class="styledbox shadow top '. esc_attr($align) .' row" '. $style .'><div class="boxcontent shadow">'. do_shortcode($content) .'<div class="clear"></div></div></div>';
 
 } elseif(esc_attr($type)=="shadowbottom") {
 	return '<div class="styledbox shadow '. esc_attr($align) .' row" '. $style .'><div class="boxcontent shadow">'.do_shortcode($content).'<div class="clear"></div></div></div>';
 
 } else {
   if(!isset($style)) $style='';
   return '<div class="styledbox ' . esc_attr($type) .' '. esc_attr($align) .' row" '. $style .'><div class="boxcontent">'. do_shortcode($content) .'<div class="clear"></div></div></div>';

 }
}

/******************************************************************/
/*	Highlight													 */
/******************************************************************/

function highlight_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
      ), $atts ) );
  
   return '<span class="nv-skin highlight ' . esc_attr($type) .'">' . $content . '</span>';
}

/******************************************************************/
/*	Image Shortcode							      				 */
/******************************************************************/

function imageeffect_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '',
      'url' => '',	 
      'width' => '',	
	  'class' => '',	 
      'height' => '',
	  'videourl' => '',
	  'lightbox' => '',
	  'target' => '',
	  'link' => '',
      'alt' => '',	 
      'align' => '',
      'shadow' => '',
	  'titleoverlay' => '',	  	 	  	  	 	  	   
      ), $atts ) );



	
	if(esc_attr($videourl)) {
	$lightboxurl = esc_attr($videourl);
	} else {
	$lightboxurl = esc_attr($url);
	}
	
	$NV_imgheight = esc_attr($height);
	$NV_imgwidth = esc_attr($width);
	$NV_imgzoomcrop = "0";
	$NV_previewimgurl = esc_attr($url);

	$NV_imgheight = esc_attr($height);
	$NV_imgwidth = esc_attr($width);
	$NV_imgzoomcrop = "0";
	$NV_previewimgurl = esc_attr($url);
	
	if(!get_option('timthumb_disable')) { // Check is Timthumb is Enabled or Disabled
		$NV_imagepath = get_template_directory_uri()."/lib/scripts/timthumb.php?h=". $NV_imgheight ."&amp;w=". $NV_imgwidth ."&amp;zc=". $NV_imgzoomcrop ."&amp;src="; 
	} else {
		$NV_imagepath="";
	}
		

	if($NV_imgheight) {
		$NV_height_attr='height="'.$NV_imgheight.'"';	
	} else {
		$NV_height_attr='';
	}
	
	if($NV_imgwidth) {
		$NV_width_attr='style="width:'.$NV_imgwidth.'px"';	
	} else {
		$NV_width_attr='';
	}	

	
	ob_start();
	
    if(esc_attr($type)=="reflect" || esc_attr($type)=="reflectlightbox") { 
	$NV_imageeffect = 'reflection'; 
	} elseif(esc_attr($type)=="shadowreflectlightbox" || esc_attr($type)=="shadowreflection" || esc_attr($type)=="shadowreflect") {
	$NV_imageeffect = 'shadowreflection'; 
	} elseif(esc_attr($type)=="frame" || esc_attr($type)=="framelightbox" || esc_attr($type)=="frameblackwhite") {
	$NV_imgframe = 'frame'; 
	} 
	
	if(
	esc_attr($type)=="blackwhite" || 
	esc_attr($type)=="shadowblackwhite" || 
	esc_attr($type)=="frameblackwhite") {
		$NV_imgblackwhite ='blackwhite';
	} 
	
	if(
	esc_attr($type)=="shadowlightbox" || 
	esc_attr($type)=="shadowreflectlightbox" || 
	esc_attr($type)=="reflectlightbox" || 
	esc_attr($type)=="framelightbox" || 
	esc_attr($type)=="lightbox" ||
	esc_attr($lightbox)=="yes") {
		$NV_lightbox="yes";	
	}
	
	
	if(
	esc_attr($shadow) || 
	esc_attr($type)=="shadow" ||
	esc_attr($type)=="shadowblackwhite" ||
	esc_attr($type)=="shadowlightbox") { 
		$NV_imageeffect ='shadow'; 
	} 

	$NV_target = esc_attr($target);
	
	if(!empty($NV_target)) $NV_target='target="'.$NV_target.'"'; else $NV_target='';	
	
	if(esc_attr($link)!='') {
		$NV_link_start='<a href="'.esc_attr($link).'" title="'.esc_attr($alt).'" '.$NV_target.' >';
		$NV_link_end='</a>';
	} else {
		$NV_link_start='';
		$NV_link_end='';
	} 
	
	$fancybox_id = str_replace("'", "", $alt );	?>
	
    
	<div class="nv-skin mediawrap <?php echo esc_attr($align).' '.esc_attr($class); if($NV_imgframe) echo ' '.$NV_imgframe; ?> <?php echo $NV_imageeffect; ?> row" style="max-width:<?php echo $NV_imgwidth; ?>px">
        <div class="container <?php if($NV_imgeffect) { echo $NV_imgeffect; } ?>">
            <div class="gridimg-wrap <?php if(esc_attr($type)=='none') echo 'none'; ?>">
				<div class="title-wrap">	

				<?php if(isset($NV_lightbox) && !$NV_link_start) { ?>
                    <a href="<?php echo $lightboxurl; ?>" title="<?php echo esc_attr($alt); ?>" data-fancybox-group="image-<?php echo $fancybox_id; ?>" class="fancybox <?php if(esc_attr($videourl)) { ?>galleryvid<?php } else { ?> galleryimg<?php } ?>" style="height:<?php echo esc_attr($height); ?>px;">
                <?php } 
				
				echo $NV_link_start; ?>
                
                <img <?php if(esc_attr($type)=="reflect" || esc_attr($type)=="reflectlightbox" || esc_attr($type)=="shadowreflectlightbox" || esc_attr($type)=="shadowreflect"  || esc_attr($type)=="shadowreflection") { ?>class="reflect"<?php } ?> src="<?php echo $NV_imagepath . dyn_getimagepath($NV_previewimgurl); ?>" alt="<?php echo esc_attr($alt); ?>"  />

                <?php if(isset($NV_lightbox) && !$NV_link_start) { ?>
                </a>
                <?php } 
				
				echo $NV_link_end;
				
				if(esc_attr($titleoverlay)=="yes") { ?>
					<div class="title">
						<h3><?php echo esc_attr($alt);  ?></h3>
					</div>	              
                <?php } ?>                           
				</div><!-- / title-wrap -->           
            </div>
        </div>
	</div>
	<?php
	
	$output_string=ob_get_contents();
	ob_end_clean();

	return $output_string;

}


/******************************************************************/
/*	Media Shortcode							      				 */
/******************************************************************/

function mediaembed_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'type' => '',
      'url' => '',
	  'imageurl' => '',	 
      'width' => '',	 
      'height' => '',
      'align' => '',
      'shadow' => '',
	  'ratio' => '',
	  'id' => '',
	  'autoplay' => '',	
	  'loop' => '',
	  'customlayer' => '',	  	 	  	  	 	  	   
      ), $atts ) );
	
	if($code=='videoembed') {
	 $NV_mediatype='video';
	} elseif($code=='audioembed') {
	  $NV_mediatype='audio';
	} 
	
	$NV_previewimgurl='';
	
	$NV_customlayer = esc_attr($customlayer);
	$NV_imgheight = esc_attr($height);
	$NV_imgwidth = esc_attr($width);
	$NV_movieurl = esc_attr($url);
	$NV_videotype = esc_attr($type);
	$NV_videoautoplay = esc_attr($autoplay);
	$NV_previewimgurl = esc_attr($imageurl);
	$NV_loop = esc_attr($loop);
	
	
	if(!$NV_loop) $NV_loop="0";
	if($NV_loop=="yes") $NV_loop="1";
	
	$slide_id = esc_attr($id);
	
	if($NV_videotype=="jwplayer") {
		$NV_videotype="jwp";
	}
	
	if($NV_videotype=="flash") {
		$NV_videotype="swf";
	}
	
	
	if(esc_attr($shadow)=="yes") {
		$NV_videoshadow = "shadow";
	} elseif(esc_attr($shadow)=="frame") {
		$NV_videoframe = "frame"; 
	} else {
		$NV_videoshadow ='';
		$NV_videoframe='';
	}
	
	if($NV_videoautoplay) {
		$NV_videoautoplay = "1";
	} else {
		$NV_videoautoplay ="0";	
	}	
	
	if($NV_mediatype=='audio') {
		$NV_videotype='jwp';
		if($NV_previewimgurl =='' && get_option('jwplayer_height')=='') $NV_imgheight='24';
		
	}
	
	ob_start(); 

	$styling=''; // add inline CSS
	if(esc_attr($height)) 	{ $styling='height:'.esc_attr($height).'px;';}
	if($styling) { $styling='style="'.$styling.'"'; } else { $styling=''; }	

	if($NV_imgwidth) {
		$NV_width_attr='max-width:'.$NV_imgwidth.'px';
	} else {
		$NV_width_attr='';
	}
	
	?>

	<div class="nv-skin mediawrap <?php echo esc_attr($align).' '.$NV_mediatype.' '.$NV_videoframe; ?> row"  style="max-width:<?php echo $NV_imgwidth; ?>px">
    
		<div class="container videotype <?php echo $NV_videoshadow ?>">   
			<div class="gridimg-wrap" style="<?php echo $NV_width_attr; ?>">
         		<?php include(NV_FILES .'/inc/classes/video-class.php'); ?>
			</div><!-- / gridimg-wrap -->
		</div><!-- / container -->	
    </div><!-- / mediawrap -->
<?php 

	$output_string=ob_get_contents();
	ob_end_clean();

	return $output_string;

}

/******************************************************************/
/*	Media Shortcode	*END*					      				 */
/******************************************************************/

/******************************************************************/
/*	Columns									      				 */
/******************************************************************/

function columns_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'border' => '',
	  'height' => '',
	  'class' => '',
), $atts ) );
	if($code=="two_columns") {
	$classes = $class." two_column";	
	} elseif($code=="two_columns_last") {
	$classes = $class." two_column last clearfix";	
	} elseif($code=="three_columns") {
	$classes = $class." three_column";	
	} elseif($code=="three_columns_last") {
	$classes = $class." three_column last clearfix";	
	} elseif($code=="four_columns") {
	$classes = $class." four_column";	
	} elseif($code=="four_columns_last") {
	$classes = $class." four_column last clearfix";	
	} elseif($code=="five_columns") {
	$classes = $class." five_column";	
	} elseif($code=="five_columns_last") {
	$classes = $class." five_column last clearfix";	
	} elseif($code=="six_columns") {
	$classes = $class." six_column";	
	} elseif($code=="six_columns_last") {
	$classes = $class." six_column last clearfix";	
	} elseif($code=="onethird_columns") {
	$classes = $class." three_column";	
	} elseif($code=="twothirds_columns") {
	$classes = $class." two_thirds_column";	
	} elseif($code=="onethird_columns_last") {
	$classes = $class." three_column last clearfix";	
	} elseif($code=="twothirds_columns_last") {
	$classes = $class." two_thirds_column last clearfix";	
	} elseif($code=="onefourth_columns") {
	$classes = $class." four_column";	
	} elseif($code=="threefourths_columns") {
	$classes = $class." three_fourths_column";	
	} elseif($code=="onefourth_columns_last") {
	$classes = $class." four_column last clearfix";	
	} elseif($code=="threefourths_columns_last") {
	$classes = $class." three_fourths_column last clearfix";	
	}
	
	if(esc_attr($height)!='') {
	$height = 'style="height:'. esc_attr($height) .'px"';
	}
	
	$clear = strpos($code,"_last");

	if($clear === false) {
		return '<div class="columns block '. $classes .' '. esc_attr($border) .'">
		<div class="columns-inner" '. $height.'>
		'. do_shortcode($content) .'</div></div>';
	} else {
		return '<div class="columns block '. $classes .' '. esc_attr($border) .'">
		<div class="columns-inner" '. $height.'>
		'. do_shortcode($content) .'</div></div>';
	}

   
}

/******************************************************************/
/*	Tabs									      				 */
/******************************************************************/

function tabs_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'id' => '',
	  'class' => '',
), $atts ) );

	wp_enqueue_script('jquery-ui-tabs',false,array('jquery'));
	
	if($code=="tabswrap") {
		return '<div class="nv-tabs clearfix row '.esc_attr($class).'">'. do_shortcode($content) .'</div>';
	} elseif($code=="tabhead") { // tab title check if first
	if( esc_attr($id)=="1") {
		return '<ul><li class="'.esc_attr($class).'"><h4 class="tabhead"><a href="#tabs-'. esc_attr($id).'">'. $content .'</a></h4></li>';
	} else {
		return '<li class="'.esc_attr($class).'"><h4 class="tabhead"><a href="#tabs-'. esc_attr($id).'">'. $content .'</a></h4></li>';
	}
	} elseif($code=="tabhead_last") {
		return '<li class="'.esc_attr($class).'"><h4 class="tabhead"><a href="#tabs-'. esc_attr($id).'">'. $content .'</a></h4></li></ul>';
	} elseif($code=="tab") {	
		return '<div class="tab-content '.esc_attr($class).'" id="tabs-'. esc_attr($id).'">'. do_shortcode($content) .'</div>';
	}
}


function accordion_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'title' => '',
	  'color' => '',
	  'class' => '',
	  'collapse' => '',
), $atts ) );

	wp_enqueue_script("jquery-ui-accordion",false,array('jquery'));

	ob_start();
	
	if($code=="accordion") { ?>
		<div class="accordion row <?php if(esc_attr($collapse=='yes')) {  ?>collapse<?php } else { ?>open<?php } ?>"><?php echo do_shortcode($content); ?></div>

		<script type="text/javascript">
		
		<?php if(get_option('priority_loading')=='enable') { ?>
		head.ready(function() {
		<?php } ?>
        jQuery(document).ready(function($){
        var getacc_id='';
		var getacc_id = parseInt(window.location.hash.slice(1)); // retrieve # number
    
        if(!getacc_id) {
            getacc_id = 0;
        }
        // Accordion
		<?php if(!$collapse) { ?>
        $(".accordion").accordion({ header: "h4.accordionhead",autoHeight: false,collapsible: true,navigation:true,active:getacc_id});
		<?php } else { ?>
        $(".accordion.collapse").accordion({ header: "h4.accordionhead",autoHeight: false,collapsible: true,navigation:true,active:false });			
		<?php } ?>
      
        });
		<?php if(get_option('priority_loading')=='enable') { ?>
		});
		<?php } ?>
        </script>
        
	<?php } elseif($code=="panel") { ?>
		<div class="section <?php echo esc_attr($color) .' '. esc_attr($class); ?>"><h4 class="accordionhead"><a href="#"><?php echo esc_attr($title); ?></a></h4><div class="sectioncontent"><?php echo do_shortcode($content); ?></div></div>
	<?php }
 
 $output_string=ob_get_contents();
 ob_end_clean();
 return $output_string;

}

function list_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
      'style' => '',
	  'color' => '',
), $atts ) );

	return '<div class="list '. esc_attr($style) .' '. esc_attr($color) .'">'. remove_wpautop( $content ) .'</div>';

}

function reveal_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'width' => '',
	  'align' => '',
	  'title' => '',
	  'color' => '',
      ), $atts ) );
 
 if(esc_attr($width)) {
 	$width='style="width:'. esc_attr($width) .'px"';
 }
 
   return '<div class="revealbox '. esc_attr($align) .' '. esc_attr($color) .' row clearfix" '. $width .'><h4 class="reveal"><span class="ui-icon"></span>'. esc_attr($title) .'</h4><div class="reveal-content">' . do_shortcode($content) . '</div></div>';

}

function dropcaps_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'style' => '',
	  'text' => '',
	  'color' => '',
      ), $atts ) );
 
   return '<span class="dropcap '. esc_attr($style) .' '. esc_attr($color) .'">' . esc_attr($text)  . '</span>';

}


function socialicons_shortcode( $atts, $content = null,$code ) {
   extract( shortcode_atts( array(
	  'share_icon' => '',
	  'name' => '',
	  'url' => '',
	  'align' => '',
      ), $atts ) );
 
if($code=='socialwrap') {
	if(esc_attr($align)) {
		$align=	esc_attr($align);
	} else {
		$align='';	
	}
	
	if(esc_attr($share_icon)=='yes') {
		return '
	<div id="togglesocial" class="'.$align.'">
		<ul>                     
			<li class="socialinit nvcolor-wrap"><div class="socialinithide"></div><span class="nvcolor"></span></li>
			<li  style="display: none;" class="socialhide nvcolor-wrap"><div class="socialinithide"></div><span class="nvcolor"></span></li>
		</ul>
	</div><!-- /togglesocial -->                            
	<div class="socialicons '.$align.' toggle"><ul>'.do_shortcode($content).'</ul></div><div class="clear"></div>';
	} else {
	return '<div class="socialicons display '.$align.'"><ul>'.do_shortcode($content).'</ul></div><div class="clear"></div>';
	}
}

	
if($code=="socialicon") {
	require NV_FILES .'/adm/inc/social-media-urls.php'; // get social media button links
	
	if(esc_attr($name)=='digg') {
		if(esc_attr($url)!='') {
		$sociallink_digg=esc_attr($url);
		} else {
		$sociallink_digg=getsociallink($sociallink_digg);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_digg .'" title="Digg" target="_blank"><span class="nvcolor"></span><div class="social-icon social-digg"></div></a></li>';
	}

	if(esc_attr($name)=='fb') {
		if(esc_attr($url)!='') {
		$sociallink_fb=esc_attr($url);
		} else {
		$sociallink_fb=getsociallink($sociallink_fb);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_fb .'" title="Facebook" target="_blank"><span class="nvcolor"></span><div class="social-icon social-facebook"></div></a></li>';
	}

	if(esc_attr($name)=='linkedin') {
		if(esc_attr($url)!='') {
		$sociallink_linkedin=esc_attr($url);
		} else {
		$sociallink_linkedin=getsociallink($sociallink_linkedin);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_linkedin .'" title="Linkedin" target="_blank"><span class="nvcolor"></span><div class="social-icon social-linkedin"></div></a></li>';
	}
	
	if(esc_attr($name)=='deli') {
		if(esc_attr($url)!='') {
		$sociallink_deli=esc_attr($url);
		} else {
		$sociallink_deli=getsociallink($sociallink_deli);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_deli .'" title="Del.icio.us" target="_blank"><span class="nvcolor"></span><div class="social-icon social-delicious"></div></a></li>';
	}		

	if(esc_attr($name)=='reddit') {
		if(esc_attr($url)!='') {
		$sociallink_reddit=esc_attr($url);
		} else {
		$sociallink_reddit=getsociallink($sociallink_reddit);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_reddit .'" title="Reddit" target="_blank"><span class="nvcolor"></span><div class="social-icon social-reddit"></div></a></li>';
	}
	
	if(esc_attr($name)=='stumble') {
		if(esc_attr($url)!='') {
		$sociallink_stumble=esc_attr($url);
		} else {
		$sociallink_stumble=getsociallink($sociallink_stumble);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_stumble .'" title="Stumble Upon" target="_blank"><span class="nvcolor"></span><div class="social-icon social-icon social-stumble"></div></a></li>';
	}
	

	if(esc_attr($name)=='twitter') {
		if(esc_attr($url)!='') {
		$sociallink_twitter=esc_attr($url);
		} else {
		$sociallink_twitter=getsociallink($sociallink_twitter);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_twitter .'" title="Twitter" target="_blank"><span class="nvcolor"></span><div class="social-icon social-twitter"></div></a></li>';
	}				

	if(esc_attr($name)=='google') {
		if(esc_attr($url)!='') {
		$sociallink_google=esc_attr($url);
		} else {
		$sociallink_google=getsociallink($sociallink_google);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_google .'" title="Google Plus" target="_blank"><span class="nvcolor"></span><div class="social-icon social-google"></div></a></li>';
	}					

	if(esc_attr($name)=='rss') {
		if(esc_attr($url)!='') {
		$sociallink_rss=esc_attr($url);
		} else {
		$sociallink_rss=getsociallink($sociallink_rss);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_rss .'" title="RSS" target="_blank"><span class="nvcolor"></span><div class="social-icon social-rss"></div></a></li>';
	}

	if(esc_attr($name)=='youtube') {
		if(esc_attr($url)!='') {
		$sociallink_youtube=esc_attr($url);
		} else {
		$sociallink_youtube=getsociallink($sociallink_youtube);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_youtube .'" title="YouTube" target="_blank"><span class="nvcolor"></span><div class="social-icon social-youtube"></div></a></li>';
	}

	if(esc_attr($name)=='vimeo') {
		if(esc_attr($url)!='') {
		$sociallink_vimeo=esc_attr($url);
		} else {
		$sociallink_vimeo=getsociallink($sociallink_vimeo);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_vimeo .'" title="Vimeo" target="_blank"><span class="nvcolor"></span><div class="social-icon social-vimeo"></div></a></li>';
	}

	if(esc_attr($name)=='pinterest') {
		if(esc_attr($url)!='') {
		$sociallink_pinterest=esc_attr($url);
		} else {
		$sociallink_pinterest=getsociallink($sociallink_pinterest);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_pinterest .'" title="pinterest" target="_blank"><span class="nvcolor"></span><div class="social-icon social-pinterest"></div></a></li>';
	}

	if(esc_attr($name)=='email') {
		if(esc_attr($url)!='') {
		$sociallink_email=esc_attr($url);
		} else {
		$sociallink_email=getsociallink($sociallink_email);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_email .'" title="email" target="_blank"><span class="nvcolor"></span><div class="social-icon social-email"></div></a></li>';
	}	

	if(esc_attr($name)=='instagram') {
		if(esc_attr($url)!='') {
		$sociallink_instagram=esc_attr($url);
		} else {
		$sociallink_instagram=getsociallink($sociallink_instagram);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_instagram .'" title="instagram" target="_blank"><span class="nvcolor"></span><div class="social-icon social-instagram"></div></a></li>';
	}		

	if(esc_attr($name)=='soundcloud') {
		if(esc_attr($url)!='') {
		$sociallink_soundcloud=esc_attr($url);
		} else {
		$sociallink_soundcloud=getsociallink($sociallink_soundcloud);
		}
	return '<li class="nvcolor-wrap"><a href="'. $sociallink_soundcloud .'" title="soundcloud" target="_blank"><span class="nvcolor"></span><div class="social-icon social-soundcloud"></div></a></li>';
	}	
}

}


function enquiry_form_shortcode( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'emailto' => '',
	  'thankyou' => '',
	  'id' => '',
      ), $atts ) );

	wp_deregister_script('contact-form');	
	wp_register_script('contact-form',get_template_directory_uri().'/js/contact.form.js',false,null,true);
	wp_enqueue_script('contact-form');	  
 
	ob_start(); 
   
	contact_form(esc_attr($id),'','',esc_attr($emailto),esc_attr($thankyou));
	$output_string=ob_get_contents();
	ob_end_clean();
   
   return $output_string;
   
}


function pricing_table_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
	  'title' => '',
	  'featured' => '',
	  'button_text' => '',
	  'button_link' => '',
	  'price' => '',
	  'target' => '',
	  'per' => '',
	  'color' => '',
	  'columns'=>'',
), $atts ) );

	if($code=='pricing_table') {
		if(!esc_attr($columns) || esc_attr($columns)>6) $pcolumns='6'; else $pcolumns=esc_attr($columns);
		$pricing_columns=numberToWords($pcolumns); // convert number to word
		return '<div class="nv-pricing-table row '.$pricing_columns.'-column">'.remove_wpautop($content).'</div>';
		
	} elseif($code=='plan') {
		
		if(esc_attr($target!='')) $target='target="'.esc_attr($target).'"';
		
		if(esc_attr($featured=='true')) $featured='featured';
		if(!esc_attr($color)) $color='grey-lite'; else $color=esc_attr($color);
		
		if(esc_attr($button_link)=='droppaneltrigger') {
			$button_type='[droppanelbutton align="center" color="'.$color.'" ]'.esc_attr($button_text).'[/droppanelbutton]';
		} else {
			$button_type='[button url="'.esc_attr($button_link).'"  align="center" color="'.$color.'" '.$target.' ]'.esc_attr($button_text).'[/button]';
		}
		
		return '
		<div class="nv-pricing-plan column '.$featured.'">
		<div class="nv-pricing-title '.$color.'"><h4>'.esc_attr($title).'</h4></div>
		<div class="nv-pricing-container '.$color.'">
		<div class="nv-pricing-cost"><span class="price-value">'.esc_attr($price).'</span> <span class="price-per">'.esc_attr($per).'</span></div>
		<div class="nv-pricing-content">
		'.remove_wpautop($content).'
		</div>
		<div class="nv-pricing-signup">'. do_shortcode($button_type) .'</div></div>
		</div>';
	}
}


function tooltip_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
	  'tip' => '',
	  'color' => '',
	  'position' => '',
	  'icon' => '',
), $atts ) );

	wp_deregister_script('jquery-tooltips');	
	wp_register_script('jquery-tooltips',get_template_directory_uri().'/js/jquery.tooltips.js',false,array('jquery'),true);
	wp_enqueue_script('jquery-tooltips');
		
	if($icon!='') $icon='<span class="tooltip-icon">&nbsp;</span>'; else $icon='';
	
	ob_start(); ?>
	<div class="tooltip-info <?php echo $position; ?> <?php if($icon) echo 'icon'; ?> <?php if($content==' ') echo 'info'; ?>" data-tooltip-position="<?php echo $position; ?>"><?php echo do_shortcode($content).$icon; ?></div><div class="tooltip <?php echo esc_attr($color);  ?>"><?php echo do_shortcode($tip); ?></div>


<?php 
 
 $output_string=ob_get_contents();
 ob_end_clean();
 return $output_string;

}

/* ------------------------------------

:: CONTENT ANIMATOR

------------------------------------*/

function content_animator_shortcode( $atts, $content = null, $code ) {
   extract( shortcode_atts( array(
	  'delay' => '',
	  'effect' => '',
	  'direction' => '',	  
	  'align' => '',
	  'class' => '',
	  'easing' => '',
	  'margin_top' => '',
	  'margin_left' => '',
	  'margin_right' => '',
	  'float' => '',
	  'id' => '',
	  'speed' => '',
), $atts ) );


	wp_enqueue_script("jquery-effects-fade",false,array('jquery-effects-core'));
	wp_enqueue_script("jquery-effects-slide",false,array('jquery-effect-core'));

	wp_deregister_script('content-animator');	
	wp_register_script('content-animator',get_template_directory_uri().'/js/content.animator.min.js',null,true);
	wp_enqueue_script('content-animator');
	
	ob_start(); 

	if( !empty( $margin_top ) )  	$styling  = 'margin-top:'.$margin_top.'px;'; 
	if( !empty( $margin_left ) ) 	$styling .= 'margin-left:'.$margin_left.'px;'; 
	if( !empty( $margin_right ) ) 	$styling .= 'margin-right:'.$margin_right.'px;'; 
		
	if( !empty( $styling ) ) $styling = 'style="'. $styling .'"';
		
	if( $float=='yes' ) $floatclass = 'float'; else $floatclass = '';
	
 	$output  = '<div id="anim-' . $id . '" class="animator-wrap ' . $width_class . ' ' . $floatclass . ' ' . $class . ' ' . $align . ' ' . 'direction-'.$direction .'" ' . $styling . ' data-animator-easing="' . $easing . '" data-animator-speed="' . $speed . '" data-animator-effect="' . $effect . '" data-animator-direction="' . $direction . '" data-animator-delay="' . $delay . '">';
	$output .= remove_wpautop( $content );
    $output .= '</div>';
	
	echo $output;
 
 	$output_string=ob_get_contents();
 	ob_end_clean();
 	return $output_string;

}

/* ------------------------------------

:: RECENT POSTS

------------------------------------*/

function nv_recent_posts_shortcode($atts){
	extract(shortcode_atts(array(
		'limit' => '',
		'categories' => '',
		'metadata' => '',
		'show_date' => '',
		'order' => 'date',
		'orderby' => '',
		'offset' =>'',
		'image_width' =>'',
		'image_height' =>'',
		'image_align' =>'',
		'image_effect' =>'',
		'content' =>'textimage',
		'excerpt' =>'',
		), $atts));

	ob_start();  	
	
	$q = new WP_Query('offset='.$offset.'&orderby='.$order.'&order='.$orderby.'&category_name='.$categories.'&posts_per_page=' . $limit);
 
	if(esc_attr($excerpt)) {
		$recent_excerpt = esc_attr($excerpt);
	} else {
		$recent_excerpt = "15";
	} ?>
    
    <ul class="nv-recent-posts">
    
    <?php
 
	while($q->have_posts()) : $q->the_post();
	$pdata = maybe_unserialize(get_post_meta( get_the_ID(), 'pgopts', true ));
	
	$NV_previewimgurl=$pdata["previewimgurl"]; // Preview Image URL

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
	
	$image=$NV_previewimgurl;
	
	if($image && ($content=='textimage' || $content=='titleimage' || $content=='image')) {
	
	$image='<a href="'. get_permalink() .'" title="'.get_the_title().'">[imageeffect type="'.$image_effect.'" align="'.$image_align.'" width="'.$image_width.'" height="'.$image_height.'"  alt="'. get_the_title().'" url="'.$image.'"  ]</a>';
	} else {
	$image='';	
	} ?>
    
        <li>
		<?php echo do_shortcode($image); ?>
  		<?php if($content!='image') { ?>
        <div>
        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
        <?php if( $show_date=='yes' ) { ?>
        <small><?php echo get_the_date(); ?></small>
        <?php } ?>
		<?php if($content!='titleimage') { ?>
		<?php the_advanced_excerpt('length='.$recent_excerpt); ?>
        <p><a class="read-more" href="<?php the_permalink(); ?>"><?php _e( 'Read more &rarr;', 'NorthVantage' ); ?></a></p>
        <?php } ?>
        </div>
        <?php } ?>
		<?php if($metadata=='yes') { ?>
        <div class="recent-metadata">
        <?php echo __('by', 'NorthVantage' ); ?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta('first_name') ." ". get_the_author_meta('last_name'); ?></a> <span class="subbreak">/</span> 
		<?php echo __('in', 'NorthVantage' ).' '; the_category(', ') ?> <span class="subbreak">/</span> 
        <?php comments_popup_link( __('No Comments', 'NorthVantage' ) .' ', '1 '. __('Comment', 'NorthVantage' ) . ' ', '% '. __('Comments', 'NorthVantage' )); ?>
        <div class="hozbreak clearfix">&nbsp;</div>
        </div>
        <?php } ?>                
        <div class="clear"></div>
        </li>
    <?php endwhile;	wp_reset_query();  ?>
	</ul>
	
	
<?php 
   $output_string=ob_get_contents();
   ob_end_clean();
   
   return $output_string;	
}

function clear_shortcode( $atts, $content = null ) {
   
   return '<div class="clear"></div>';

}



add_filter('widget_text', 'do_shortcode');

add_shortcode('postgallery_grid', 'postgallery_grid_shortcode');
add_shortcode('postgallery_slider', 'postgallery_slider_shortcode');
add_shortcode('postgallery_image', 'postgallery_image_shortcode');
add_shortcode('postgallery_islider', 'postgallery_image_shortcode');
add_shortcode('postgallery_nivo', 'postgallery_image_shortcode');
add_shortcode('postgallery_accordion', 'postgallery_accordion_shortcode');
add_shortcode('button', 'button_shortcode');
add_shortcode('droppanelbutton', 'droppanelbutton_shortcode');
add_shortcode('blockquote', 'blockquote_shortcode');
add_shortcode('hozbreak', 'hozbreak_shortcode');
add_shortcode('divider_line', 'hozbreak_shortcode');
add_shortcode('divider_blank', 'hozbreak_shortcode');
add_shortcode('divider_shadow', 'divider_shadow_shortcode');
add_shortcode('divider_shadow_top', 'divider_shadow_shortcode');
add_shortcode('hozbreaktop', 'hozbreaktop_shortcode');
add_shortcode('divider_linetop', 'hozbreaktop_shortcode');
add_shortcode('styledbox', 'styledbox_shortcode');
add_shortcode('highlight', 'highlight_shortcode');
add_shortcode('imageeffect', 'imageeffect_shortcode');
add_shortcode('videoembed', 'mediaembed_shortcode');
add_shortcode('audioembed', 'mediaembed_shortcode');
add_shortcode('tabswrap', 'tabs_shortcode');
add_shortcode('tabhead', 'tabs_shortcode');
add_shortcode('tabhead_last', 'tabs_shortcode');
add_shortcode('tab', 'tabs_shortcode');
add_shortcode('accordion', 'accordion_shortcode');
add_shortcode('list', 'list_shortcode');
add_shortcode('reveal', 'reveal_shortcode');
add_shortcode('dropcap', 'dropcaps_shortcode');
add_shortcode('panel', 'accordion_shortcode');
add_shortcode('two_columns', 'columns_shortcode');
add_shortcode('two_columns_last', 'columns_shortcode');
add_shortcode('three_columns', 'columns_shortcode');
add_shortcode('three_columns_last', 'columns_shortcode');
add_shortcode('onethird_columns', 'columns_shortcode');
add_shortcode('twothirds_columns', 'columns_shortcode');
add_shortcode('onethird_columns_last', 'columns_shortcode');
add_shortcode('twothirds_columns_last', 'columns_shortcode');
add_shortcode('four_columns', 'columns_shortcode');
add_shortcode('four_columns_last', 'columns_shortcode');
add_shortcode('five_columns', 'columns_shortcode');
add_shortcode('five_columns_last', 'columns_shortcode');
add_shortcode('six_columns', 'columns_shortcode');
add_shortcode('six_columns_last', 'columns_shortcode');
add_shortcode('onefourth_columns', 'columns_shortcode');
add_shortcode('threefourths_columns', 'columns_shortcode');
add_shortcode('onefourth_columns_last', 'columns_shortcode');
add_shortcode('threefourths_columns_last', 'columns_shortcode');
add_shortcode('socialwrap', 'socialicons_shortcode');
add_shortcode('socialicon', 'socialicons_shortcode');
add_shortcode('enquiry_form', 'enquiry_form_shortcode');
add_shortcode('pricing_table', 'pricing_table_shortcode');
add_shortcode('plan', 'pricing_table_shortcode');
add_shortcode('tooltip', 'tooltip_shortcode');
add_shortcode('content_animator', 'content_animator_shortcode');
add_shortcode('recent_posts', 'nv_recent_posts_shortcode');
add_shortcode('clear', 'clear_shortcode');

?>
