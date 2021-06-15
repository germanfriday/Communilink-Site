<?php 

	if( empty($NV_gridcolumns) ) 
	{ 
		// Set default columns number
		$NV_gridcolumns="3";
	}

	$NV_gridcolumns_text=numberToWords($NV_gridcolumns); // convert number to word

	// Set timthumb width / height values
	if( empty($NV_imgheight) && empty($NV_imgwidth) )
	{
		$NV_imgheight = '160';
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

	/* ------------------------------------
	
	:: LOAD DATA SOURCE
	
	------------------------------------*/

    // Check datasource, if no datasource check Post Categories / Slide Set selected (backwards compatibility) 
	if( empty( $NV_datasource ) ) 
		{ 
		if( empty( $NV_slidesetid ) )
		{
			$NV_datasource='data-2';
		} else 
		{
			$NV_datasource='data-1';
		}
	}
            
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


	$postcount = 0;

	$baseURL = get_permalink();

	echo '<div class="clear"></div>';


	if( $NV_datasource == "data-2" && empty($NV_slidesetid) ) {
		pagination($featured_query,$baseURL);
	}


	if( $NV_gridfilter=='yes' ) 
	{
		wp_deregister_script('jquery-isotope');
		wp_register_script('jquery-isotope',get_template_directory_uri().'/js/jquery.isotope.min.js',false,null,true);
		wp_enqueue_script('jquery-isotope');	
	}