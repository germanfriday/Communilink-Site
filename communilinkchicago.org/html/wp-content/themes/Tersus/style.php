<?php 
if($NV_skin) { $skin=$NV_skin; } elseif(DEFAULT_SKIN) {	$skin=DEFAULT_SKIN; } else { $skin='skinone'; } // get skin
$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));


$layerset1=stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_type'])); // check layer settings
$layerset2=stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_type']));
$layerset3=stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_type']));
$layerset4=stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_type']));

if($layerset1!='') {echo setlayer('layer1',$layerset1,$skin);} // do function to get settings if required
if($layerset2!='') {echo setlayer('layer2',$layerset2,$skin);}
if($layerset3!='') {echo setlayer('layer3',$layerset3,$skin);}
if($layerset4!='') {echo setlayer('layer4',$layerset4,$skin);}

if(isset($get_skin_data['skin_id_main_inherit'])) $main_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_main_inherit'])); else $main_settings=''; // check elements settings
if(isset($get_skin_data['skin_id_header_inherit'])) $header_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_header_inherit'])); else $header_settings='';
if(isset($get_skin_data['skin_id_menu_inherit'])) $menu_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_menu_inherit'])); else $menu_settings='';
if(isset($get_skin_data['skin_id_footer_inherit'])) $footer_settings=stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_inherit'])); else  $footer_settings='';
if(!isset($tabs)) $tabs='';
if(!isset($header_logo)) $header_logo='';

echo setelement('background',$skin,'','');

function inherit_chk($element,$settings_array,$skin) {
	$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));
	$settings_array= explode(",", $settings_array);
	
	$is_inherited='';
	
	foreach($settings_array as $chk) {
		if(isset($get_skin_data['skin_id_'.$chk.'_inherit'])) $chk_element=stripslashes(htmlspecialchars($get_skin_data['skin_id_'.$chk.'_inherit'])); else $chk_element=''; 
		
		if($chk_element==$element) {
			$is_inherited.=$chk.',';
		}
	}	
	return rTrim($is_inherited,',');
}


if($main_settings=='custom') {
 	$inherited_elements=inherit_chk('main','header,menu,footer',$skin);
	echo setelement('main',$skin,$inherited_elements,'');
} 

if($header_settings=='custom') {
 	$inherited_elements=inherit_chk('header','main,menu,footer',$skin);
	echo setelement('header',$skin,$inherited_elements,'');
} 

if($menu_settings=='custom') {
 	$inherited_elements=inherit_chk('menu','header,main,footer',$skin);
	echo setelement('menu',$skin,$inherited_elements,'');
}

if($footer_settings=='custom') {
 	$inherited_elements=inherit_chk('footer','header,main,menu',$skin);
	echo setelement('footer',$skin,$inherited_elements,'');
} 

$count = $get_skin_data['skin_id_custom_count']; 

for($z = 0; $z < $count; $z++) {
	echo setelement('custom',$skin,'','_'.$z);
}

if(get_option('header_height')) { ?>
#header { height:<?php echo get_option('header_height'); ?>px; }
<?php }

if(get_option('menu_margin')) {
$tabs.='margin-top:'.get_option('menu_margin').'px;';
} 

if(get_option('branding_margin')) {
$header_logo.='margin-top:'.get_option('branding_margin').'px;';
} 

if($tabs) { ?>
#primary-wrapper #nv-tabs {<?php echo $tabs; ?>}
<?php }

if($header_logo) { ?>
#primary-wrapper #header-logo #logo {<?php echo $header_logo; ?>}
<?php }

if(get_option('header_css')) {
 echo get_option('header_css');
}?>