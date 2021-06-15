<?php

if( !empty($NV_skin) ) { $skin=$NV_skin; } elseif(DEFAULT_SKIN) { $skin=DEFAULT_SKIN; } else { $skin='skinone'; } // get skin

$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));

// check elements settings
if(isset($get_skin_data['skin_id_main_inherit'])) $main_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_main_inherit'])); else $main_settings='';  
if(isset($get_skin_data['skin_id_header_inherit'])) $header_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_header_inherit'])); else $header_settings='';
if(isset($get_skin_data['skin_id_menu_inherit'])) $menu_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_menu_inherit'])); else $menu_settings='';
if(isset($get_skin_data['skin_id_footer_inherit'])) $footer_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_inherit'])); else $footer_settings='';

echo setcufon('background',$skin,'','');

if($main_settings=='custom') {
 	$inherited_elements=inherit_chk('main','header,menu,footer',$skin);
	echo setcufon('main',$skin,$inherited_elements,'');
}

if($header_settings=='custom') {
 	$inherited_elements=inherit_chk('header','main,menu,footer',$skin);
	echo setcufon('header',$skin,$inherited_elements,'');
}

if($menu_settings=='custom') {
 	$inherited_elements=inherit_chk('menu','header,main,footer',$skin);
	echo setcufon('menu',$skin,$inherited_elements,'');
}

if($footer_settings=='custom') {
 	$inherited_elements=inherit_chk('footer','header,main,menu',$skin);
	echo setcufon('footer',$skin,$inherited_elements,'');
}

$count = $get_skin_data['skin_id_custom_count']; 

for($z = 0; $z < $count; $z++) {
	echo setcufon('custom',$skin,'','_'.$z);
}


function init_cufon($classes,$font) {
	if(get_option("nv_font_type")!="disable") {
	global $cufon_list;
	if($cufon_list) {
		foreach($cufon_list as $cufon_name => $value) {
			if($cufon_name==$font) {
				$new_classes.=$value.','.$classes;
			} else {
				$new_classes.=','.$classes;	
			}
		}
		
		$cufon_list[$font] = $new_classes;	
	} else {
		$cufon_list=array();
		$cufon_list[$font]=$classes;	
	}
	
	
	} 
}


if( get_option("nv_font_type")!="disable" && get_option("nv_font_type")!="enable_google" && get_option("nv_font_type")!="" )
{
	
	global $cufon_list;
	if( !empty($cufon_list) )
	{ 
		if(is_array($cufon_list))
		{
			
			foreach($cufon_list as $cufon_font => $class)
			{
			
				if( $cufon_font == get_option('cufon_font') )
				{
					wp_deregister_script('cufon'.$cufon_font);	
					wp_register_script('cufon'.$cufon_font,$cufon_font,false,null);
					wp_enqueue_script('cufon'.$cufon_font);
	
				} 
				else 
				{
					wp_deregister_script('cufon'.$cufon_font);	
					wp_register_script('cufon'.$cufon_font,get_template_directory_uri().'/js/cufon/'.$cufon_font.'.cufonfonts.js',false,null);
					wp_enqueue_script('cufon'.$cufon_font);
					
				}
			}


			$cufon_replace= array (
				'html_tags' => 'h1,h2,h3,h4,h5,span.dropcap'
			);			

			wp_deregister_script('cufon');	
	    	wp_register_script('cufon',get_template_directory_uri().'/js/cufon.js',false,array('jquery'));
			wp_localize_script('nv-script', 'CUFON_REPLACE', $cufon_replace );
        	wp_enqueue_script('cufon');

		}	
	}
	
} 
elseif(get_option("nv_font_type")=='enable_google') 
{
	
	global $googlefont;
	global $cufon_list;
	
	$google_fonts='';

	if( !empty($cufon_list) ) { 
		if(is_array($cufon_list)) {
			foreach($cufon_list as $googlefonts => $class) {
				foreach($googlefont as $google_font => $value) {
					if($googlefonts==$google_font) { // check if general font is a google font
						$value = str_replace(" ", "+", $value); // replace spaces with +
						$value = str_replace('"', "", $value); // replace " with blank
						$google_fonts.=$value.'|'; // add to google fonts list
					}
				}
	
			}
		}
	}


	foreach($googlefont as $google_font => $value) {
		if(stripslashes($get_skin_data['skin_id_background_font'])==$google_font || stripslashes($get_skin_data['skin_id_header_font'])==$google_font) { // check if general font is a google font
			$value = str_replace(" ", "+", $value); // replace spaces with +
			$value = str_replace('"', "", $value); // replace " with blank
			$google_fonts.=$value.'|'; // add to google fonts list
		}
	}
	
	
	if( !empty($google_fonts) ) {
		$google_fonts=rtrim($google_fonts, '|'); // remove remaining pipe
		echo '<link href="http://fonts.googleapis.com/css?family='. $google_fonts .'" rel="stylesheet" type="text/css">';
	}

}