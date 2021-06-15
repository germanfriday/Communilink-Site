<script type="text/javascript">

jQuery(document).ready(function(){jQuery('.skin_select').change(function(){jQuery(this).closest('#skin-dataselect').submit()});jQuery('.alertbox-wrap.green').fadeIn().delay(4000).slideUp(400);jQuery(".skin-save").click(function(){jQuery("#skin-data").attr("action","").attr("target","_self");if(jQuery("#skin_id_id").val()!=""&&jQuery("#skin_id_id").val()!="Enter New Skin ID"){return true}jQuery('.alertbox-wrap.error').fadeIn().delay(4000).slideUp(400);return false});});jQuery(document).ready(function(){var a=jQuery("#skin_id_layer1_type option:selected").val();toggle_shrtcode(a,'skin_id_layer1_type');var b=jQuery("#skin_id_layer2_type option:selected").val();toggle_shrtcode(b,'skin_id_layer2_type');var c=jQuery("#skin_id_layer3_type option:selected").val();toggle_shrtcode(c,'skin_id_layer3_type');var d=jQuery("#skin_id_layer4_type option:selected").val();toggle_shrtcode(d,'skin_id_layer4_type');var e=jQuery("#skin_id_layer1_datasource option:selected").val();toggle_shrtcode(e,'skin_id_layer1_datasource');var f=jQuery("#skin_id_layer2_datasource option:selected").val();toggle_shrtcode(f,'skin_id_layer2_datasource');var g=jQuery("#skin_id_layer3_datasource option:selected").val();toggle_shrtcode(g,'skin_id_layer3_datasource');var h=jQuery("#skin_id_layer4_datasource option:selected").val();toggle_shrtcode(h,'skin_id_layer4_datasource')});jQuery(document).ready(function(){jQuery("#preview-skin").click(function(){var a=jQuery('#page-preview  option:selected').val();var b='<?php if ( get_option('permalink_structure') != '') { echo'yes'; } else { echo 'no'; } ?>';if(!a){a='<?php echo home_url(); ?>';var c='?'}else{if(b=='yes'){var c='?'}else{var c='&'}}jQuery("#skin-data").attr("action",a+c+"preview=skin").attr("target","_blank").submit()});jQuery("#duplicate-skin").click(function(){jQuery("#skin_id_dbid").val('');jQuery("#skin_id_id").val('Enter New Skin ID').css({'border':'2px solid #00a2ff','font-style':'italic','color':'#bbb'});jQuery("#skin_id_id").focus(function(){jQuery(this).css({'border':'1px solid #DFDFDF','font-style':'normal','color':'#333'}).val('')})});opac_slider()});

jQuery(document).ready(function() {
	
    

jQuery("#preview-skin").click(function() {
	var previewurl = jQuery('#page-preview  option:selected').val();
	var permalink = '<?php if ( get_option('permalink_structure') != '') { echo'yes'; } else { echo 'no'; } ?>';
	if(!previewurl) {
		previewurl = '<?php echo home_url(); ?>';
		var permalink_tag = '?';
	
	} else {
		if(permalink=='yes') {var permalink_tag = '?';} else {var permalink_tag = '&';}
	}
	
	jQuery("#skin-data").attr("action", previewurl+permalink_tag+"preview=skin").attr("target","_blank").submit();
});

jQuery("#duplicate-skin").click(function() {
  jQuery("#skin_id_dbid").val('');
  jQuery("#skin_id_id").val('Enter New Skin ID').css({'border':'2px solid #00a2ff','font-style':'italic','color':'#bbb'});
  jQuery("#skin_id_id").focus(function () {
	 jQuery(this).css({'border':'1px solid #DFDFDF','font-style':'normal','color':'#333'}).val(''); 
  });
});

opac_slider();
});
</script>

<?php 
global $nv_font;

if(get_option("nv_font_type")!="disable" && get_option("nv_font_type")!="enable") {
	global $googlefont;
	$cufonfont=$googlefont;
} elseif(get_option("nv_font_type")=="enable") {
	global $cufonfont;
} else {
	$cufonfont = $nv_font;	
}


$font_styles='
<div class="tooltip" style="opacity:1;max-width:620px">
<span class="font-a">Cambria, "Hoefler Text", Utopia, "Liberation Serif", "Nimbus Roman No9 L Regular", Times, "Times New Roman", serif</span><br />
<span class="font-b">Constantia, "Lucida Bright", Lucidabright, "Lucida Serif", Lucida, "DejaVu Serif", "Bitstream Vera Serif", "Liberation Serif", Georgia, serif</span><br />
<span class="font-c">"Palatino Linotype", Palatino, Palladio, "URW Palladio L", "Book Antiqua", Baskerville, "Bookman Old Style", "Bitstream Charter", "Nimbus Roman No9 L", Garamond, "Apple Garamond", "ITC Garamond Narrow", "New Century Schoolbook", "Century Schoolbook", "Century Schoolbook L", Georgia, serif</span><br />
<span class="font-d">Frutiger, "Frutiger Linotype", Univers, Calibri, "Gill Sans", "Gill Sans MT", "Myriad Pro", Myriad, "DejaVu Sans Condensed", "Liberation Sans", "Nimbus Sans L", Tahoma, Geneva, "Helvetica Neue", Helvetica, Arial, sans-serif</span><br />
<span class="font-e">Corbel, "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", "Bitstream Vera Sans", "Liberation Sans", Verdana, "Verdana Ref", sans-serif</span><br />
<span class="font-f">"Segoe UI", Candara, "Bitstream Vera Sans", "DejaVu Sans", "Bitstream Vera Sans", "Trebuchet MS", Verdana, "Verdana Ref", sans-serif</span><br />
<span class="font-g">Impact, Haettenschweiler, "Franklin Gothic Bold", Charcoal, "Helvetica Inserat", "Bitstream Vera Sans Bold", "Arial Black", sans-serif</span><br />
<span class="font-h">Consolas, "Andale Mono WT", "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", "DejaVu Sans Mono", "Bitstream Vera Sans Mono", "Liberation Mono", "Nimbus Mono L", Monaco, "Courier New", Courier, monospace</span><br />
</div>';

if(get_option("nv_font_type")=="enable") {																
$cufonfont_styles='<div class="tooltip" style="opacity:1;max-width:590px"><img src="'. get_template_directory_uri() .'/lib/adm/imgs/font-list.jpg" /></div>';
} elseif(get_option("nv_font_type")=="enable_google" || get_option("nv_font_type")=="") {
$cufonfont_styles='<div class="tooltip" style="opacity:1;max-width:590px"><img src="'. get_template_directory_uri() .'/lib/adm/imgs/font-list-google.jpg" /></div>';
}
	
$skin_patterns = array("pattern-a","pattern-b","pattern-c","pattern-d","pattern-e","pattern-f","pattern-g","pattern-h","pattern-i","pattern-j","pattern-k","pattern-l","pattern-m","pattern-n","pattern-o","pattern-p","pattern-q","pattern-r","pattern-s","pattern-t","pattern-u");
$corners = array("rounded","straight");

if (!isset($get_skin_num)) {
	 $get_skin_num = 1;
}


$skin_data_ids  = substr(maybe_unserialize(get_option('skin_data_ids')), 0, -1);  // trim last comma
$skin_data_ids = explode(",", $skin_data_ids);

if(isset($_POST['skin_select'])) $skin_select = $_POST['skin_select']; else $skin_select='';

if(isset($skin_select)) $get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin_select)); else $get_skin_data='';
?>
<div class="wrap skinmanager form-table ">
<div id="icon-options-general" class="icon32"></div><h2 style="padding-bottom:15px">Skin Manager</h2>
<input name="media-list-url" id="media-list-url" type="hidden" value="<?php echo get_template_directory_uri(); ?>" />
		<p>
        <div class="alertbox-wrap error">
            <div class="alertbox">
            <p>You must enter a unique name for the Skin Preset ID.</p>
            </div>
		</div> 
        </p>
		<?php		
		if ( isset($_POST['delete']) && isset($_POST['skin_id_dbid'])  ) { ?>
		<p>       
		<div class="alertbox-wrap green">
    		<div class="alertbox green">
            <p>Skin Preset was successfully deleted.</p>
    		</div>
		</div>		
		</p>
		<?php } elseif(isset($_POST['save'])) { ?>
		<p>
		<div class="alertbox-wrap green">
    		<div class="alertbox green">
            <p>Skin Preset was successfully saved.</p>
    		</div>
		</div>		
		</p>		
		<?php } ?>

		<table class="widefat header">
            <thead>
                <tr style="cursor: move;">
                    <th class="nowrap" style="padding-top:10px">
                    <form method="post" id="skin-dataselect" action="">
					   <select class="skin_select" id="skin_select" name="skin_select">
					   <option value="">Edit Skin Preset</option>
                       <?php
					   
					   	if( !empty($skin_data_ids) )
						{	
							if(is_array($skin_data_ids))
							{
								foreach ($skin_data_ids as $skin_data_id) 
								{
									echo "<option value='". $skin_data_id ."'>". $skin_data_id ."</option>";
								}
							} 
							else
							{
								echo"<option value='". $skin_data_id ."'>". $skin_data_id ."</option>";
               				}	
               			}	

               			?>
                       </select> <input type="submit" style="margin-left:20px" class="button-primary add_gal" value="Create New Skin" />	
                       </form>
					</th>                
                    <th class="nowrap">
                    	<form method="post" action="options.php">
    					<?php settings_fields( 'skin-settings-group' ); ?>
                       <label for="default_skin">Set Default Skin</label>
					   <select style="margin-left:10px;" id="default_skin" name="default_skin">
					   <option value="">Select Skin</option>
                       <?php
					   
					   	if( !empty($skin_data_ids) )
						{
						
							if(is_array($skin_data_ids)) {
									foreach ($skin_data_ids as $skin_data_id) {
										if (get_option('default_skin') == $skin_data_id)
										{
											$selected = 'selected="selected"';	
										}
										else
										{
											$selected = '';
										}                        		
									echo '<option '. $selected .' value="'. $skin_data_id .'">'. $skin_data_id .'</option>';
										
									}
							} else {
									if (get_option('default_skin') == $skin_data_ids)
									{
										$selected = 'selected="selected"';	
									} 
									else
									{
										$selected = '';
									}							
									echo '<option '. $selected .' value="'. $skin_data_ids .'">'. $skin_data_ids .'</option>';
							}	
               			}	

               			?>
						</select> <input type="submit" class="button-primary" value="Save" />
						<input type="hidden" name="action" value="update" />
						<input type="hidden" name="page_options" value="default_skin" />
						</form>
					</th>
                </tr>
            </thead>
		</table>		
		<hr />
        <form method="post" id="skin-data" action="">
		
        <input name="slideset_number" class="slideset_number count_hide_rm" type="hidden" value="<?php if(isset($get_skin_num)) echo $get_skin_num; ?>" />
		
        <div class="table_wrap">
        
		<?php if(isset($get_skin_data['skin_id_id'])) $slide_set = $get_skin_data['skin_id_id']; else  $slide_set='';?>
        
        <input id="skin_id_dbid" name="skin_id_dbid" type="hidden" value="<?php echo $slide_set; ?>" />		
        <div id="table-<?php echo $i ?>" class="multitables selected_custom correct_gallery_num">

        <input name="skin_id_custom_count" id="skin_id_custom_count" class="slide_counter count_hide_rm correct_num" type="hidden" value="<?php if($get_skin_data['skin_id_custom_count']) echo $get_skin_data['skin_id_custom_count']; else echo "1";  ?>" />                                                                  

       <table class="widefat header" style="margin-bottom:20px;">
            <thead>
                <tr style="cursor: move;">
                    <th>
                    	<div style="position:relative">
                        	<input type="submit" class="button-secondary apply del_gal heading-elem" style="right:0" id="delete" name="delete" value="Delete Skin Preset" />
                            <select name="page-preview" id="page-preview" class="heading-elem" style="left:260px;width:140px;top:0">
                            	<option value="">Preview Page</option> 
                                 <?php 
                                  $pages = get_pages(); 
                                  foreach ( $pages as $page ) {
                                    $option = '<option value="' . get_page_link( $page->ID ) . '">';
                                    $option .= $page->post_title;
                                    $option .= '</option>';
                                    echo $option;
                                  }
                                 ?>
							</select>
                            <input type="button" class="button-primary heading-elem" style="left:410px" id="preview-skin" name="preview-skin" value="Preview Skin">
                    		<?php if($slide_set) { ?>
                            <input type="button" class="button-secondary heading-elem" style="left:510px" id="duplicate-skin" name="duplicate-skin" value="Duplicate Skin">
                            <?php } ?>
                            <div class="label-wrap" style="width:60px"><label>Skin ID:</label></div>
                            <input class="heading-elem" style="left:65px" id="skin_id_id" name="skin_id_id" type="text" value="<?php echo $slide_set; ?>" /> 
                            
                            <input type="hidden" id="skin_id_header_inherit" name="skin_id_header_inherit" value="custom" />
                            <input type="hidden" id="skin_id_main_inherit" name="skin_id_main_inherit" value="custom" />
                            <input type="hidden" id="skin_id_footer_inherit" name="skin_id_footer_inherit" value="custom" />
                            <input type="hidden" id="skin_id_menu_inherit" name="skin_id_menu_inherit" value="custom" />
                            
						</div><br class="clear" />
					</th>
				</tr>
			</thead>
		</table>      
        
		<table class="widefat b-margin overflow" tabindex="">
			<thead>
				<tr>
					<th><div class="skin-header"><span class="skin-elem background"></span>General Styling Settings</div></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th></th>
				</tr>
			</tfoot>                    
			<tbody>
            	<tr>
                	<td>    
                    	<table class="borderless">
							<tr>
								<td style="width:200px;" class="tr-top">
									<div class="reveal skinset"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Frame Settings</h4></div></div>
									<div class="reveal-content">
										<table class="borderless">
											<tr>
                                                <td style="width:140px;" class="tr-top">
                                                    <label for="skin_id_icon_color">Frame Color:</label>
                                                </td>
                                                <td class="tr-top" colspan="3">
                                                        <select id="skin_id_icon_color" name="skin_id_icon_color" class="tooltip-next">
                                                            <?php $icon_colors = array('light','dark');
                                                            foreach ($icon_colors as $icon_color) {
                                                            if (stripslashes($get_skin_data['skin_id_icon_color']) == $icon_color){
                                                            $selected = "selected='selected'";	
                                                            }else{
                                                            $selected = "";
                                                            }
                                                            echo"<option $selected value='". $icon_color ."'>". $icon_color."</option>";
                                                            }
                                                            ?>                                                
                                                        </select>
                                                        <div class="tooltip-info" style="margin-left:10px;margin-top:3px;"></div>
                                                        <div class="tooltip">Changes color of framework, choose between light and dark.</div>
                                                </td>
											</tr>
											
                                            <?php 
											
											$frame_headers = array('enabled','disabled','color','border');
											
											$sections = array(
												'header',
												'main',
												'footer'
											);
											
											
											foreach ( $sections as $section )
											{
												echo '<tr>';
												echo '<td style="width:140px;" class="tr-top">';
												echo '<label for="skin_id_frame_'. $section .'">Background '. $section .':</label>';
												echo '</td>';
												echo '<td class="tr-top" colspan="3">';
												echo '<select id="skin_id_frame_'. $section .'" name="skin_id_frame_'. $section .'" class="tooltip-next">';
													
												foreach ( $frame_headers as $frame_header )
												{
													if (stripslashes($get_skin_data['skin_id_frame_'.$section]) == $frame_header)
													{
														$selected = 'selected="selected"';		
													}
													else
													{
														$selected = '';	
													}
														
													echo '<option '. $selected .' value="'. $frame_header .'">'. $frame_header .'</option>';
												}												
												
												echo '</select>';
												echo '<div class="tooltip-info" style="margin-left:10px;margin-top:3px;"></div>';
												echo '<div class="tooltip">Enable or disable the <strong>'. $section .'</strong> background frame.</div>';
												echo '</td>';
												echo '</tr>';
												echo '<tr>';
												echo '<td style="width:140px;" class="tr-top">&nbsp;</td>';
												echo '<td style="width:300px;" class="tr-top">';
												echo '<div class="label-wrap">';
												echo '<label for="skin_id_'. $section .'_pri_color">Primary Color:</label>';
												echo '</div>';
												echo '<span class="colorfield">#</span>';
												echo '<input class="medium skin_manager_color" id="skin_id_'. $section .'_pri_color" name="skin_id_'. $section .'_pri_color" type="text" value="'. stripslashes(htmlspecialchars($get_skin_data['skin_id_'. $section .'_pri_color'])) .'" />';
												echo '<span class="color_icon">&nbsp;</span>';
												echo '</td>';
												echo '<td class="tr-top">';
												echo '<div style="width:110px" class="label-wrap">';
												echo '<label for="skin_id_'. $section .'_pri_opac">Primary Opacity:</label>';
												echo '</div>';
												echo '<div class="slider-wrap">';
												echo '<div id="skin_id_'. $section .'_pri_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">';
												echo '<a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>';
												echo '</div>';
												echo '</div>';
												echo '<input type="text" id="skin_id_'. $section .'_pri_opac" name="skin_id_'. $section .'_pri_opac" class="opacvalue" value="';
												
												if($get_skin_data['skin_id_'. $section .'_pri_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_'. $section .'_pri_opac'])); else echo '100';
												
												echo '" />';
												echo '</td>';
												echo '</tr>';
												
												echo '<tr>';
												echo '<td style="width:140px;" class="tr-top">&nbsp;</td>';
												echo '<td style="width:300px;" class="tr-top">';
												echo '<div class="label-wrap">';
												echo '<label for="skin_id_'. $section .'_sec_color">Secondary Color:</label>';
												echo '</div>';
												echo '<span class="colorfield">#</span>';
												echo '<input class="medium skin_manager_color" id="skin_id_'. $section .'_sec_color" name="skin_id_'. $section .'_sec_color" type="text" value="'. stripslashes(htmlspecialchars($get_skin_data['skin_id_'. $section .'_sec_color'])) .'" />';
												echo '<span class="color_icon">&nbsp;</span>';
												echo '</td>';
												echo '<td class="tr-top">';
												echo '<div style="width:110px" class="label-wrap">';
												echo '<label for="skin_id_'. $section .'_sec_opac">Secondary Opacity:</label>';
												echo '</div>';
												echo '<div class="slider-wrap">';
												echo '<div id="skin_id_'. $section .'_sec_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">';
												echo '<a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>';
												echo '</div>';
												echo '</div>';
												echo '<input type="text" id="skin_id_'. $section .'_sec_opac" name="skin_id_'. $section .'_sec_opac" class="opacvalue" value="';
												
												if($get_skin_data['skin_id_'. $section .'_sec_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_'. $section .'_sec_opac'])); else echo '100';
												
												echo '" />';
												echo '</td>';
												echo '</tr>';												
												
											}
											
											?>                        
											<tr>
                                                <td style="width:140px;" class="tr-top">
                                                    <label for="skin_id_branding_ver">Branding Version:</label>
                                                </td>
                                                <td class="tr-top" colspan="3">
                                                        <select id="skin_id_branding_ver" name="skin_id_branding_ver" class="tooltip-next">
                                                            <?php $branding_vers = array('primary','secondary');
                                                            foreach ($branding_vers as $branding_ver) {
                                                            if (stripslashes($get_skin_data['skin_id_branding_ver']) == $branding_ver){
                                                            $selected = "selected='selected'";	
                                                            }else{
                                                            $selected = "";
                                                            }
                                                            echo"<option $selected value='". $branding_ver ."'>". $branding_ver."</option>";
                                                            }
                                                            ?>                                                
                                                        </select>
                                                        <div class="tooltip-info" style="margin-left:10px;margin-top:3px;"></div>
                                                        <div class="tooltip">Set the Primary and Secondary branding URL's within Header Settings.</div>
                                                </td>
											</tr>                                                                                                                                                                             
										</table>
									</div>                                                                                                                                                        
								</td>
							</tr>                                            
							<tr>
								<td width="140px" class="tr-top">
									<div class="reveal skinset"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Font Settings</h4></div></div>
                                        <div class="reveal-content">
                                            <table class="borderless">
                                                    <tr>
                                                        <td class="tr-top">                           
                                                            <div class="label-wrap" style="width:140px"><label for="skin_id_background_font_size">Font Size:</label></div> <input class="xsmall" id="skin_id_background_font_size" name="skin_id_background_font_size" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_font_size'])); ?>" /><small class="description">px (default is 12)</small>
                                                        </td>
                                                    </tr>
													<tr>
                                                        <td width="140px" class="tr-top">
                                                            <div class="label-wrap" style="width:140px"><label for="skin_id_background_font">Font Family</label></div>
                                                            <div style="position:relative" class="tooltip-next">
                                                                <select id="skin_id_background_font" name="skin_id_background_font">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($nv_font as $background_font => $value) {
																		if (stripslashes($get_skin_data['skin_id_background_font']) == $value && $z+1 != $count){
																		$selected = "selected='selected'";	
																		}else{
																		$selected = "";
																		}
																		echo"<option $selected value='". $value ."'>". $background_font."</option>";
																	}
																	
																	if(get_option("nv_font_type")=="enable_google") { ?>
                                                                    	<option value="">---- Google Fonts ----</option>
																		<?php global $googlefont;
																		foreach ($googlefont as $background_font => $value) {
																			if (stripslashes($get_skin_data['skin_id_background_font']) == $background_font && $z+1 != $count){
																			$selected = "selected='selected'";	
																			}else{
																			$selected = "";
																			}
																			echo"<option $selected value='". $background_font ."'>". $background_font."</option>";
																		}
																	}
																								
                                                                    ?>                                                
                                                                </select>
                                                            </div> <div class="tooltip-info" style="margin-left:10px;margin-top:5px;"></div><?php echo $font_styles; ?>
														</td>
													</tr>
													<tr>
                                                        <td style="width:300px" class="tr-top">
                                                            <div class="label-wrap" style="width:140px"><label for="skin_id_background_heading_font">Headings Font</label></div>
                                                            <div style="position:relative" class="tooltip-next">
                                                                <select id="skin_id_background_heading_font" name="skin_id_background_heading_font">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($nv_font as $background_heading_font => $value) {
                                                                    if (stripslashes($get_skin_data['skin_id_background_heading_font']) == $value && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $value ."'>". $background_heading_font."</option>";
                                                                    }

																	if(get_option("nv_font_type")=="enable_google") { ?>
                                                                    	<option value="">---- Google Fonts ----</option>
																		<?php global $googlefont;
																		foreach ($googlefont as $background_heading_font => $value) {
																			if (stripslashes($get_skin_data['skin_id_background_heading_font']) == $background_heading_font && $z+1 != $count){
																			$selected = "selected='selected'";	
																			}else{
																			$selected = "";
																			}
																			echo"<option $selected value='". $background_heading_font ."'>". $background_heading_font."</option>";
																		}
																	}

																	if(get_option("nv_font_type")=="enable") { ?>
                                                                    	<option value="">---- Cufon Fonts ----</option>
																		<?php global $cufonfont;
																		foreach ($cufonfont as $background_font => $value) {
																			if (stripslashes($get_skin_data['skin_id_background_font']) == $background_font && $z+1 != $count){
																			$selected = "selected='selected'";	
																			}else{
																			$selected = "";
																			}
																			echo"<option $selected value='". $value ."'>". $background_font."</option>";
																		}
																	}
																	
                                                                    ?>                                                
                                                                </select>
                                                            </div><?php if(get_option("nv_font_type")!="disable") { ?>
<div class="tooltip-info" style="margin-left:10px;margin-top:5px;"></div><?php echo $cufonfont_styles; ?> 
<?php } ?>          
														</td>
													</tr>
                                                    <tr>                                                    
                                                        <td style="width:300px" class="tr-top">
                                                            <div class="label-wrap" style="width:140px"><label for="skin_id_background_heading_size">Increase Heading Size By:</label></div>
                                                            <div style="position:relative" class="tooltip-next">
                                                                <input class="xsmall" id="skin_id_background_heading_size" name="skin_id_background_heading_size" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_heading_size'])); ?>" /><small class="description">px</small>
                                                            </div><div class="tooltip-info" style="margin-left:10px;margin-top:5px;"></div><div class="tooltip">Increases the default h1,h2,h3,h4,h5,h6 tag sizes by the amount of pixels you enter. e.g. default h1 is 24px - enter <em><strong>10</strong></em> to change new h1 size to 34px.</div> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="140px" class="tr-top">                           
                                                            <div class="label-wrap" style="width:140px"><label for="skin_id_header_font_size">Menu Font Size:</label></div> <input class="xsmall" id="skin_id_header_font_size" name="skin_id_header_font_size" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_font_size'])); ?>" /><small class="description">px (default is 12)</small>
                                                        </td>
                                                    </tr>                                                        
                                                    <tr>
                                                        <td width="140px" class="tr-top">
                                                            <div class="label-wrap" style="width:140px"><label for="skin_id_header_font">Menu Font Family</label></div>
                                                            <div style="position:relative" class="tooltip-next">
                                                                <select id="skin_id_header_font" name="skin_id_header_font">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    foreach ($nv_font as $header_font => $value) {
                                                                    if (stripslashes($get_skin_data['skin_id_header_font']) == $value && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $value ."'>". $header_font."</option>";
                                                                    }

																	if(get_option("nv_font_type")=="enable_google") { ?>
                                                                    	<option value="">---- Google Fonts ----</option>
																		<?php global $googlefont;
																		foreach ($googlefont as $header_font => $value) {
																			if (stripslashes($get_skin_data['skin_id_header_font']) == $header_font && $z+1 != $count){
																			$selected = "selected='selected'";	
																			}else{
																			$selected = "";
																			}
																			echo"<option $selected value='". $header_font ."'>". $header_font."</option>";
																		}
																	}
																	
                                                                    ?>                                                
                                                                </select>
                                                            </div> <div class="tooltip-info" style="margin-left:10px;margin-top:5px;"></div><?php echo $font_styles; ?> 
                                                        </td>
                                                    </tr>           
											</table>                                 
										</div>                                                
                                	</td>
                            	</tr>                              
                                <tr>
                                    <td style="width:200px;" class="tr-top">
                                        <div class="reveal skinset"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Font Colors</h4></div></div>
                                            <div class="reveal-content">
                                                <table class="borderless">
                                                        <tr>
                                                        	<td><h4>General</h4></td>
														</tr>                                                
                                                        <tr>
                                                            <td width="140px" class="tr-top">                           
                                                                <div class="label-wrap" style="width:60px;"><label for="skin_id_background_font_color">Font Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_background_font_color" name="skin_id_background_font_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_font_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                            </td>
                                                            <td style="width:200px;" class="tr-top" >
                                                                <div class="label-wrap" style="width:60px;"><label for="skin_id_background_link_color">Link Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_background_link_color" name="skin_id_background_link_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_link_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                            </td>
                                                            <td class="tr-top">
                                                                <div class="label-wrap"><label for="skin_id_background_linkhover_color">Link Hover Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_background_linkhover_color" name="skin_id_background_linkhover_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_linkhover_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                            </td>                                                          
                                                        </tr>
                                                        <tr>
                                                            <td style="width:200px;" class="tr-top">
                                                                <div class="label-wrap" style="width:60px;"><label for="skin_id_background_h1_color">H1 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_background_h1_color" name="skin_id_background_h1_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_h1_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                            </td>
                                                            <td style="width:200px;" class="tr-top" >
                                                                <div class="label-wrap" style="width:60px;"><label for="skin_id_background_h2_color">H2 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_background_h2_color" name="skin_id_background_h2_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_h2_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                            </td>
                                                            <td class="tr-top">
                                                                <div class="label-wrap"><label for="skin_id_background_h3_color">H3 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_background_h3_color" name="skin_id_background_h3_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_h3_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:200px;" class="tr-top">
                                                                <div class="label-wrap" style="width:60px;"><label for="skin_id_background_h4_color">H4 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_background_h4_color" name="skin_id_background_h4_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_h4_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                            </td>
                                                            <td style="width:200px;" class="tr-top" >
                                                                <div class="label-wrap" style="width:60px;"><label for="skin_id_background_h5_color">H5 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_background_h5_color" name="skin_id_background_h5_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_h5_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                            </td>
                                                            <td class="tr-top">
                                                                <div class="label-wrap"><label for="skin_id_background_h6_color">H6 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_background_h6_color" name="skin_id_background_h6_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_background_h6_color'])); ?>" /><span class="color_icon">&nbsp;</span>                                                          
															</td>                                                          
														</tr>     
                                                        <tr>
                                                        	<td><h4>Header</h4></td>
														</tr>
                                                                <tr>
                                                                    <td width="140px" class="tr-top">                           
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_header_font_color">Font Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_header_font_color" name="skin_id_header_font_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_font_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td style="width:200px;" class="tr-top" >
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_header_link_color">Link Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_header_link_color" name="skin_id_header_link_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_link_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td class="tr-top">
                                                                        <div class="label-wrap"><label for="skin_id_header_linkhover_color">Link Hover Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_header_linkhover_color" name="skin_id_header_linkhover_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_linkhover_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>                                                          
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:200px;" class="tr-top">
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_header_h1_color">H1 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_header_h1_color" name="skin_id_header_h1_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_h1_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td style="width:200px;" class="tr-top" >
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_header_h2_color">H2 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_header_h2_color" name="skin_id_header_h2_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_h2_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td class="tr-top">
                                                                        <div class="label-wrap"><label for="skin_id_header_h3_color">H3 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_header_h3_color" name="skin_id_header_h3_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_h3_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:200px;" class="tr-top">
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_header_h4_color">H4 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_header_h4_color" name="skin_id_header_h4_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_h4_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td style="width:200px;" class="tr-top" >
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_header_h5_color">H5 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_header_h5_color" name="skin_id_header_h5_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_h5_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td class="tr-top">
                                                                        <div class="label-wrap"><label for="skin_id_header_h6_color">H6 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_header_h6_color" name="skin_id_header_h6_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_header_h6_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><h4>Sub Menu</h4></td>
                                                                </tr>                                                                
                                                                <tr>
                                                                    <td width="140px" class="tr-top">                           
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_menu_font_color">Font Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_menu_font_color" name="skin_id_menu_font_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_menu_font_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td style="width:200px;" class="tr-top" >
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_menu_link_color">Link Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_menu_link_color" name="skin_id_menu_link_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_menu_link_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td class="tr-top">
                                                                        <div class="label-wrap"><label for="skin_id_menu_linkhover_color">Link Hover Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_menu_linkhover_color" name="skin_id_menu_linkhover_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_menu_linkhover_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>                                                          
                                                                </tr>                                                                
																<tr>
                                                                	<td><h4>Footer</h4></td>
                                                                </tr>                      
                                                                <tr>
                                                                    <td width="140px" class="tr-top">                           
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_footer_font_color">Font Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_footer_font_color" name="skin_id_footer_font_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_font_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td style="width:200px;" class="tr-top" >
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_footer_link_color">Link Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_footer_link_color" name="skin_id_footer_link_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_link_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td class="tr-top">
                                                                        <div class="label-wrap"><label for="skin_id_footer_linkhover_color">Link Hover Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_footer_linkhover_color" name="skin_id_footer_linkhover_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_linkhover_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>                                                          
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:200px;" class="tr-top">
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_footer_h1_color">H1 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_footer_h1_color" name="skin_id_footer_h1_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_h1_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td style="width:200px;" class="tr-top" >
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_footer_h2_color">H2 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_footer_h2_color" name="skin_id_footer_h2_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_h2_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td class="tr-top">
                                                                        <div class="label-wrap"><label for="skin_id_footer_h3_color">H3 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_footer_h3_color" name="skin_id_footer_h3_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_h3_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="width:200px;" class="tr-top">
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_footer_h4_color">H4 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_footer_h4_color" name="skin_id_footer_h4_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_h4_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td style="width:200px;" class="tr-top" >
                                                                        <div class="label-wrap" style="width:60px;"><label for="skin_id_footer_h5_color">H5 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_footer_h5_color" name="skin_id_footer_h5_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_h5_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                    <td class="tr-top">
                                                                        <div class="label-wrap"><label for="skin_id_footer_h6_color">H6 Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_footer_h6_color" name="skin_id_footer_h6_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_footer_h6_color'])); ?>" /><span class="color_icon">&nbsp;</span>
                                                                    </td>
                                                                </tr>                                                                                                           
															</td>                                                                                                        
                                                        </tr> 
													</table>
												</div>
											</td>
										</tr>
                                        


                                                                                                
								<tr><?php //******** layer_1 START ?>
                                    <td class="media-list-wrap tr-top"> 
                                        <div id="none"></div>
                                        <div class="reveal skinset"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Background Layer 1</h4></div></div>
                                        <div class="reveal-content">
                                            <select style="margin:10px 0;" id="skin_id_layer1_type" name="skin_id_layer1_type" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'skin_id_layer1_type')" class="tooltip-next">
                                                <option value="none">Select Background Type</option>
                                                <option value="layer1_color" <?php if($get_skin_data['skin_id_layer1_type']=='layer1_color') echo 'selected="selected"';?> >Color</option>
                                                <option value="layer1_imagefull" <?php if($get_skin_data['skin_id_layer1_type']=='layer1_imagefull') echo 'selected="selected"';?> >Image (Fullscreen)</option>
                                                <option value="layer1_image" <?php if($get_skin_data['skin_id_layer1_type']=='layer1_image') echo 'selected="selected"';?> >Image (Positioned)</option>
                                                <option value="layer1_pattern" <?php if($get_skin_data['skin_id_layer1_type']=='layer1_pattern') echo 'selected="selected"';?>>Pattern</option>
                                                <option value="layer1_video" <?php if($get_skin_data['skin_id_layer1_type']=='layer1_video') echo 'selected="selected"';?>>Video / Flash</option>
                                                <option value="layer1_cycle" <?php if($get_skin_data['skin_id_layer1_type']=='layer1_cycle') echo 'selected="selected"';?>>Image / Video Cycle</option>
                                            </select>
											<div class="tooltip-info" style="margin-left:10px;margin-top:12px;"></div><div class="tooltip large">
                                            <p>1. Color<br />
                                            - Select a background color, optionally add a secondary color to create a gradient effect and control the opacity of Primary and Secondary colors.</p>
                                            <p>2. Fullscreen<br />
                                            - Display an image fullscreen in the background.<br />
                                            - Recommended image width is between 1200-2000px.
                                            </p>
                                            <p>
                                            3. Image positioned<br />
                                            - Position an image in the background.<br />
                                             </p>
                                            <p>
                                            4. Pattern<br />
                                            - Set a pattern to the background.
                                            </p>
                                            <p>
                                            5. Video / Flash<br />
                                            - Add YouTube, Vimeo, JW Player or Flash to background of the page.
                                            </p>
                                            <p>
                                            6. Image / Video Cycle<br />
                                            - Animation of Images from Post Categories or Gallery Slide Sets
                                            </p>
                                            </div>                    
                                            <table id="layer1_color" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer1_pri_color">Primary Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer1_pri_color" name="skin_id_layer1_pri_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_pri_color'])); ?>" /><span class="color_icon">&nbsp;</span></td>
                                                    <td width="140px" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer1_pri_opac">Primary Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer1_pri_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer1_pri_opac" name="skin_id_layer1_pri_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer1_pri_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_pri_opac'])); else echo '100'; ?>" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer1_sec_color">Secondary Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer1_sec_color" name="skin_id_layer1_sec_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_sec_color'])); ?>" /><span class="color_icon">&nbsp;</span></td>
                                                    <td width="140px" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer1_sec_opac">Secondary Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer1_sec_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer1_sec_opac" name="skin_id_layer1_sec_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer1_sec_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_sec_opac'])); else echo '100'; ?>" /><small class="description">Secondary is Optional, completing both Primary and Secondary fields will display a gradient effect.</small>
                                                    </td>
                                                </tr>                                
                                            </table>
                                            <table id="layer1_imagefull" class="borderless">
                                                <tr>
                                                    <td width="140px" colspan="2" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer1_imagefull_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer1_imagefull_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer1_imagefull_opac" name="skin_id_layer1_imagefull_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer1_imagefull_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_imagefull_opac'])); else echo '100'; ?>" />
                                                    </td>                                 
                                                </tr>                           
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;">
                                                        <div class="label-wrap"><label for="skin_id_layer1_imagefull">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_id_layer1_imagefull" name="skin_id_layer1_imagefull" type="text" value="<?php echo $get_skin_data['skin_id_layer1_imagefull'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer1_imagefull" class="thickbox custom_media_uploader" title="Add an Image"><img src="/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a> <br />
                                                            </div>                                    
                                                    </td> 
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer1_imagefull_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer1_imagefull_color" name="skin_id_layer1_imagefull_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_imagefull_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the image.</small>
                                                    </td>                                                                   
                                                </tr>   
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;" colspan="2">
                                                        <div class="label-wrap"><label for="skin_id_layer1_imagefeatured">Featured Image</label></div>
                                                            <div style="position:relative">
                                                                <input name="skin_id_layer1_imagefeatured" id="skin_id_layer1_imagefeatured" type="checkbox" class="tooltip-next"  value="enable" <?php if ($get_skin_data['skin_id_layer1_imagefeatured'] == "enable"){ echo "checked"; } ?> /><div class="tooltip-info" style="margin-left:10px;margin-top:12px;"></div><div class="tooltip large">Enable this option to use the Page / Post Featured Image. This will override the Image URL set above.</div>
                                                            </div>                                    
                                                    </td>                                                                    
                                                </tr>                                                                                                 
                                            </table>
                                            <table id="layer1_image" class="borderless">
                                                <tr>
                                                    <td width="140px" colspan="2" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer1_image_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer1_image_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer1_image_opac" name="skin_id_layer1_image_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer1_image_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_image_opac'])); else echo '100'; ?>" />
                                                    </td>                                 
                                                </tr>                           
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;">
                                                        <div class="label-wrap"><label for="skin_id_layer1_image">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_id_layer1_image" name="skin_id_layer1_image" type="text" value="<?php echo $get_skin_data['skin_id_layer1_image'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer1_image" class="thickbox custom_media_uploader" title="Add an Image"><img src="http://devserver-1.creativeworkz.co.uk/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a> <br />
                                                            </div>                                    
                                                    </td> 
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer1_image_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer1_image_color" name="skin_id_layer1_image_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_image_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the image.</small>
                                                    </td>                                                                   
                                                </tr> 
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer1_image_valign">Image Vertical Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer1_image_valign" name="skin_id_layer1_image_valign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_valign = array("top","bottom","center");
                                                                    foreach ($skin_image_valign as $skin_image_valign) {
                                                                    if ($get_skin_data['skin_id_layer1_image_valign'] == $skin_image_valign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_valign ."'>". $skin_image_valign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer1_image_halign">Image Horizontal Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer1_image_halign" name="skin_id_layer1_image_halign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_halign = array("left","right","center");
                                                                    foreach ($skin_image_halign as $skin_image_halign) {
                                                                    if ($get_skin_data['skin_id_layer1_image_halign'] == $skin_image_halign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_halign ."'>". $skin_image_halign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                    						                                                    
                                                </tr>    
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer1_image_repeat">Image Repeat</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer1_image_repeat" name="skin_id_layer1_image_repeat">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_repeat = array("repeat","repeat-x","repeat-y","no-repeat");
                                                                    foreach ($skin_image_repeat as $skin_image_repeat) {
                                                                    if ($get_skin_data['skin_id_layer1_image_repeat'] == $skin_image_repeat && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_repeat ."'>". $skin_image_repeat."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">                                 
                                                    </td>	                                    						                                                    
                                                </tr>                        
                                            </table> 
                                            <table id="layer1_pattern" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer1_pattern_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer1_pattern_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer1_pattern_opac" name="skin_id_layer1_pattern_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer1_pattern_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_pattern_opac'])); else echo '100'; ?>" />
                                                    </td>                               
                                                </tr>
                                                <tr>
                                                    <td style="width:100px;" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer1_pattern">Image Pattern</label></div>
                                                            <div style="position:relative" class="tooltip-next">
                                                                <select id="skin_id_layer1_pattern" name="skin_id_layer1_pattern">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    
                                                                    foreach ($skin_patterns as $skin_pattern) {
                                                                    if ($get_skin_data['skin_id_layer1_pattern'] == $skin_pattern && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_pattern ."'>". $skin_pattern."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>
															<div class="tooltip-info" style="margin-left:10px;margin-top:4px;"></div><div class="tooltip xlarge">
                                                            <?php foreach ($skin_patterns as $skin_pattern) { ?>
                                                            <span class="pattern-swatch" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/<?php echo $skin_pattern; ?>.png);">
															<span class="pattern-text"><?php echo $skin_pattern; ?></span></span> 
                                                            <?php } ?>
                                                            </div>           
                                                    </td>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer1_pattern_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer1_pattern_color" name="skin_id_layer1_pattern_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_pattern_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the pattern.</small>
                                                    </td>                                                       
                                                </tr>
                                            </table>                               
                                        <table id="layer1_video" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer1_video_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer1_video_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer1_video_opac" name="skin_id_layer1_video_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer1_video_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_video_opac'])); else echo '100'; ?>" />
                                                    </td>							
                                                </tr>
                                                <tr>
                                                    <td style="width:340px" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer1_video">Video URL:</label></div>
                                                            <div style="position:relative">
                                                                <input id="skin_id_layer1_video" name="skin_id_layer1_video" type="text" value="<?php echo $get_skin_data['skin_id_layer1_video'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer1_video" class="thickbox custom_media_uploader" title="Add a Video"><img src="/wp-admin/images/media-button-video.gif" alt="Add Video" onclick="return false;"></a><br />
                                                            </div>                                    
                                                    </td> 
                                                    <td class="tr-top">
                                                        <div class="label-wrap">Video Type</div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer1_video_type" name="skin_id_layer1_video_type">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_video_type = array("youtube","vimeo","flash","jwplayer");
                                                                    foreach ($skin_video_type as $skin_video_type) {
                                                                    if ($get_skin_data['skin_id_layer1_video_type'] == $skin_video_type && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_video_type ."'>". $skin_video_type."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>                  
                                                </tr>
                                                <tr>
                                                    <td style="width:100px;" colspan="2" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer1_video_loop">Video Loop</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer1_video_loop" name="skin_id_layer1_video_loop">
                                                                    <?php
                                                                    $skin_video_loop = array("1","0");
                                                                    foreach ($skin_video_loop as $skin_video_loop) {
                                                                    if ($get_skin_data['skin_id_layer1_video_loop'] == $skin_video_loop && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_video_loop ."'>". $skin_video_loop."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select><small class="description">(Excludes Flash Video)</small>
                                                            </div>                                    
                                                    </td>                                                            
                                                </tr>
                                            </table>  
                                            <table id="layer1_cycle" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer1_cycle_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer1_cycle_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer1_cycle_opac" name="skin_id_layer1_cycle_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer1_cycle_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_cycle_opac'])); else echo '100'; ?>" />
                                                    </td>							
                                                </tr>                                           
                                                <tr>                                                   
                                                    <td width="200px" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer1_cycle_timeout">Slide Timeout</label></div>
                                                            <div style="position:relative">
                                                                <input id="skin_id_layer1_cycle_timeout" name="skin_id_layer1_cycle_timeout" style="width:40px" type="text" value="<?php echo $get_skin_data['skin_id_layer1_cycle_timeout'] ?>" /><small class="description">seconds</small><br />
                                                            </div>   
                                                    </td>
                                                    <td class="tr-top"><div class="label-wrap"><label for="skin_id_layer1_cycle_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer1_cycle_color" name="skin_id_layer1_cycle_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer1_cycle_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - the color black (000000) is recommended.</small>
                                                    </td>                                                      					
                                                </tr>   
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2">
                                                        <select style="margin:10px 0;" id="skin_id_layer1_datasource" name="skin_id_layer1_datasource" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'skin_id_layer1_datasource')">
                                                            <option value="nodatasource-1">Select Data Source</option>
                                                            <option <?php if($get_skin_data['skin_id_layer1_datasource']=='layer1-data-1') echo 'selected'; ?> value="layer1-data-1">Attached Media</option>
                                                            <option <?php if($get_skin_data['skin_id_layer1_datasource']=='layer1-data-6') echo 'selected'; ?> value="layer1-data-6">Gallery Media</option>
                                                            <option <?php if($get_skin_data['skin_id_layer1_datasource']=='layer1-data-2') echo 'selected'; ?> value="layer1-data-2">Post Categories</option>
                                                            
															<?php if(class_exists('WPSC_Query') || class_exists('Woocommerce')) { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer1_datasource']=='layer1-data-5') echo 'selected'; ?> value="layer1-data-5">Product Categories / Tags</option>
                                                            <?php } ?>                     
                                                            
															<?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer1_datasource']=='layer1-data-3') echo 'selected'; ?> value="layer1-data-3">Flickr Set</option>
                                                            <?php } ?>
                                                            
															<?php if(get_option('slideset_enable')=='enable') { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer1_datasource']=='layer1-data-4') echo 'selected'; ?> value="layer1-data-4">Slide Set</option>
                                                            <?php } ?>  
                                                        </select><br />
                                                        
                                                        
                                                       <div id="nodatasource-1"></div>
                                                    	<div id="layer1-data-1">
                                                         <div class="label-wrap tooltip-next"><label for="skin_id_layer1_cycle_attached"><strong>Attached Media</strong></label></div><div class="tooltip-info"></div><div class="tooltip">This option uses Media attached to the Page or Post (<em>See documentation for more information</em>). The Page / Post ID can be located within the browser URL when edting a post or page. e.g. http://domain.com/wp-admin/post.php?post=301 <br /><br />
Enter ID of <strong>301</strong></div><br class="clear" />
                                                        <input type="text" style="width:50px;" name="skin_id_layer1_cycle_attached" id="skin_id_layer1_cycle_attached"  value="<?php echo $get_skin_data['skin_id_layer1_cycle_attached'] ?>" /> 
                                                        <small class="description">Comma separate for multiple ID's</small>
                                                        </div>
                                                        <div id="layer1-data-2">
                                                        <div class="label-wrap"><label for="skin_id_layer1_cycle_cat"><strong>Post Categories</strong></label></div><div class="clear"></div>
                                                        <?php
                                                        $categories=  get_categories(); 
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer1_cycle_cat[]" name="skin_id_layer1_cycle_cat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer1_cycle_cat'])) {
                                                            foreach ($get_skin_data['skin_id_layer1_cycle_cat'] as $cats) {					
                                                            if($cats==$cat->term_id) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->cat_name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->cat_name.'" />';
                                        
                                                            $option .= ' '.$cat->cat_name;
                                                            $option .= ' ('.$cat->category_count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }
                                                    
                                                        ?>     
                                                        </div>
                                                        <?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                                                        <div id="layer1-data-3">
                                                        <div class="label-wrap"><label for="skin_id_layer1_cycle_flickr"><strong>Flickr Sets</strong></label></div><br class="clear" />
                                                        <select id="skin_id_layer1_cycle_flickr" name="skin_id_layer1_cycle_flickr">
                                                        <?php 
														require_once(NV_FILES."/adm/inc/phpFlickr/phpFlickr.php");
														$f = new phpFlickr(get_option('flickr_apikey')); // API
														$user = get_option('flickr_userid');
														$ph_sets = $f->photosets_getList($user);
												
														foreach ($ph_sets['photoset'] as $ph_set):
															if(!$ph_set) { ?>
																	<option value="">No Sets Found</option>            	
															<?php } else {?>
																	<option value="">Select Flickr Set</option>
																	<option value="<?php echo $ph_set['id']; ?>" <?php if($get_skin_data['skin_id_layer1_cycle_flickr']==$ph_set['id']) { ?> selected="selected" <?php } ?>><?php echo  $ph_set['title']; ?></option>     
																	<?php }
														endforeach; ?>
                                                        </select>
                                                        </div>  
                                                        <?php } ?>                     
                                                        <?php if(get_option('slideset_enable')=='enable') { ?>
														<div id="layer1-data-4">
                                                        <div class="label-wrap"><label for="skin_id_layer1_cycle_slideset"><strong>Gallery Slide Sets</strong></label></div><div class="clear"></div>
                                                        <?php 		
                                                            $slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
                                                            $slideset_data_ids = explode(",", $slideset_data_ids);
                                    
                                                            if($slideset_data_ids) {			
                                                                    foreach ($slideset_data_ids as $slideset_data_ids) {
                                                                        $option='<input type="checkbox" id="skin_id_layer1_cycle_slideset[]" name="skin_id_layer1_cycle_slideset[]"';		
                                                                        if (is_array($get_skin_data['skin_id_layer1_cycle_slideset'])) {
                                                                        foreach ($get_skin_data['skin_id_layer1_cycle_slideset'] as $slidesets) {					
                                                                            if($slidesets==$slideset_data_ids) {
                                                                                $option=$option.' checked="checked"'; 
                                                                            }
                                                                        }
                                                                        } else {
                                                                            if($get_skin_data['skin_id_layer1_cycle_slideset']==$slideset_data_ids) {
                                                                                $option=$option.' checked="checked"'; 
                                                                            } 										
                                                                        }
                                                                        $option .= ' value="'.$slideset_data_ids.'" />';
                                                    
                                                                        $option .= ' '.$slideset_data_ids;
                                                                        $option .= '<br />';
                                                                        echo $option;
                                                                    }
                                                            }						
                                                                            
                                                        ?>
                                                        </div>
                                                        <?php } ?>
                                                        <?php if(class_exists('WPSC_Query')) { ?>                                                        
                                                        <div id="layer1-data-5">
                                                        <div class="label-wrap"><label for="skin_id_layer1_cycle_prodcat"><strong>Product Categories</strong></label></div><div class="clear"></div>
														<?php
														
														if( class_exists('Woocommerce') ) : 
															
															$categories=  get_terms('product_cat', 'orderby=name&hide_empty=0');
														  
														else : 
														  
														  $categories=  get_terms('wpsc_product_category', 'orderby=name&hide_empty=0');
														  
														endif;

					
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer1_cycle_prodcat[]" name="skin_id_layer1_cycle_prodcat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer1_cycle_prodcat'])) {
                                                            foreach ($get_skin_data['skin_id_layer1_cycle_prodcat'] as $cats) {					
                                                            if($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->name.'" />';
                                        
                                                            $option .= ' '.$cat->name;
                                                            $option .= ' ('.$cat->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }	?><br />
                                                        <div class="label-wrap"><label for="skin_id_layer1_cycle_prodtag"><strong>Product Tags</strong></label></div><div class="clear"></div>
                                                        <?php
														$tags=  get_terms('product_tag', 'orderby=name&hide_empty=1');
														
                                                        foreach ($tags as $tag) {
                                                            $option='<input type="checkbox" id="skin_id_layer1_cycle_prodtag[]" name="skin_id_layer1_cycle_prodtag[]"';
                                                            if (is_array($get_skin_data['skin_id_layer1_cycle_prodtag'])) {
                                                            foreach ($get_skin_data['skin_id_layer1_cycle_prodtag'] as $tags) {					
                                                            if($tags==$tag->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($tags==$tag->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$tag->name.'" />';
                                        
                                                            $option .= ' '.$tag->name;
                                                            $option .= ' ('.$tag->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          } ?>
                                                        
                                                        </div>
                                                        <?php } ?>    
                                                        <div id="layer1-data-6">
                                                        <div class="label-wrap"><label for="skin_id_layer1_cycle_mediacats"><strong>Gallery Media Categories</strong></label></div><div class="clear"></div>
														<?php
														
														$categories=  get_terms('media-category', 'orderby=name&hide_empty=0');
					
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer1_cycle_mediacat[]" name="skin_id_layer1_cycle_mediacat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer1_cycle_mediacat'])) {
                                                            foreach ($get_skin_data['skin_id_layer1_cycle_mediacat'] as $cats) {					
                                                            if($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->name.'" />';
                                        
                                                            $option .= ' '.$cat->name;
                                                            $option .= ' ('.$cat->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }	?><br />
                                                          </div>                                                                                                            
                                                    </td>							
                                                </tr>                                                                            
										</table>                         
                                    </td>
								</tr><?php //******** layer1 END ?>
							<tr><?php //******** layer_1 START ?>
                                    <td class="media-list-wrap tr-top"> 
                                        <div id="none"></div>
                                        <div class="reveal skinset"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Background Layer 2</h4></div></div>
                                        <div class="reveal-content">
                                            <select style="margin:10px 0;" id="skin_id_layer2_type" name="skin_id_layer2_type" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'skin_id_layer2_type')" class="tooltip-next">
                                                <option value="none">Select Background Type</option>
                                                <option value="layer2_color" <?php if($get_skin_data['skin_id_layer2_type']=='layer2_color') echo 'selected="selected"';?> >Color</option>
                                                <option value="layer2_imagefull" <?php if($get_skin_data['skin_id_layer2_type']=='layer2_imagefull') echo 'selected="selected"';?> >Image (Fullscreen)</option>
                                                <option value="layer2_image" <?php if($get_skin_data['skin_id_layer2_type']=='layer2_image') echo 'selected="selected"';?> >Image (Positioned)</option>
                                                <option value="layer2_pattern" <?php if($get_skin_data['skin_id_layer2_type']=='layer2_pattern') echo 'selected="selected"';?>>Pattern</option>
                                                <option value="layer2_video" <?php if($get_skin_data['skin_id_layer2_type']=='layer2_video') echo 'selected="selected"';?>>Video / Flash</option>
                                                <option value="layer2_cycle" <?php if($get_skin_data['skin_id_layer2_type']=='layer2_cycle') echo 'selected="selected"';?>>Image / Video Cycle</option>
                                            </select>
											<div class="tooltip-info" style="margin-left:10px;margin-top:12px;"></div><div class="tooltip large">
                                            <p>1. Color<br />
                                            - Select a background color, optionally add a secondary color to create a gradient effect and control the opacity of Primary and Secondary colors.</p>
                                            <p>2. Fullscreen<br />
                                            - Display an image fullscreen in the background.<br />
                                            - Recommended image width is between 1200-2000px.
                                            </p>
                                            <p>
                                            3. Image positioned<br />
                                            - Position an image in the background.<br />
                                             </p>
                                            <p>
                                            4. Pattern<br />
                                            - Set a pattern to the background.
                                            </p>
                                            <p>
                                            5. Video / Flash<br />
                                            - Add YouTube, Vimeo, JW Player or Flash to background of the page.
                                            </p>
                                            <p>
                                            6. Image / Video Cycle<br />
                                            - Animation of Images from Post Categories or Gallery Slide Sets
                                            </p>
                                            </div>                    
                                            <table id="layer2_color" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer2_pri_color">Primary Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer2_pri_color" name="skin_id_layer2_pri_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_pri_color'])); ?>" /><span class="color_icon">&nbsp;</span></td>
                                                    <td width="140px" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer2_pri_opac">Primary Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer2_pri_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer2_pri_opac" name="skin_id_layer2_pri_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer2_pri_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_pri_opac'])); else echo '100'; ?>" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer2_sec_color">Secondary Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer2_sec_color" name="skin_id_layer2_sec_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_sec_color'])); ?>" /><span class="color_icon">&nbsp;</span></td>
                                                    <td width="140px" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer2_sec_opac">Secondary Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer2_sec_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer2_sec_opac" name="skin_id_layer2_sec_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer2_sec_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_sec_opac'])); else echo '100'; ?>" /><small class="description">Secondary is Optional, completing both Primary and Secondary fields will display a gradient effect.</small>
                                                    </td>
                                                </tr>                                
                                            </table>
                                            <table id="layer2_imagefull" class="borderless">
                                                <tr>
                                                    <td width="140px" colspan="2" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer2_imagefull_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer2_imagefull_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer2_imagefull_opac" name="skin_id_layer2_imagefull_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer2_imagefull_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_imagefull_opac'])); else echo '100'; ?>" />
                                                    </td>                                 
                                                </tr>                           
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;">
                                                        <div class="label-wrap"><label for="skin_id_layer2_imagefull">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_id_layer2_imagefull" name="skin_id_layer2_imagefull" type="text" value="<?php echo $get_skin_data['skin_id_layer2_imagefull'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer2_imagefull" class="thickbox custom_media_uploader" title="Add an Image"><img src="http://devserver-1.creativeworkz.co.uk/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a> <br />
                                                            </div>                                    
                                                    </td> 
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer2_imagefull_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer2_imagefull_color" name="skin_id_layer2_imagefull_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_imagefull_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the image.</small>
                                                    </td>                                                                   
                                                </tr>     
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;" colspan="2">
                                                        <div class="label-wrap"><label for="skin_id_layer2_imagefeatured">Featured Image</label></div>
                                                            <div style="position:relative">
                                                                <input name="skin_id_layer2_imagefeatured" id="skin_id_layer2_imagefeatured" type="checkbox" class="tooltip-next"  value="enable" <?php if ($get_skin_data['skin_id_layer2_imagefeatured'] == "enable"){ echo "checked"; } ?> /><div class="tooltip-info" style="margin-left:10px;margin-top:12px;"></div><div class="tooltip large">Enable this option to use the Page / Post Featured Image. This will override the Image URL set above.</div>
                                                            </div>                                    
                                                    </td>                                                                    
                                                </tr>                                                                                                
                                            </table>
                                            <table id="layer2_image" class="borderless">
                                                <tr>
                                                    <td width="140px" colspan="2" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer2_image_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer2_image_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer2_image_opac" name="skin_id_layer2_image_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer2_image_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_image_opac'])); else echo '100'; ?>" />
                                                    </td>                                 
                                                </tr>                           
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;">
                                                        <div class="label-wrap"><label for="skin_id_layer2_image">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_id_layer2_image" name="skin_id_layer2_image" type="text" value="<?php echo $get_skin_data['skin_id_layer2_image'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer2_image" class="thickbox custom_media_uploader" title="Add an Image"><img src="http://devserver-1.creativeworkz.co.uk/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a> <br />
                                                            </div>                                    
                                                    </td> 
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer2_image_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer2_image_color" name="skin_id_layer2_image_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_image_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the image.</small>
                                                    </td>                                                                   
                                                </tr> 
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer2_image_valign">Image Vertical Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer2_image_valign" name="skin_id_layer2_image_valign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_valign = array("top","bottom","center");
                                                                    foreach ($skin_image_valign as $skin_image_valign) {
                                                                    if ($get_skin_data['skin_id_layer2_image_valign'] == $skin_image_valign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_valign ."'>". $skin_image_valign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer2_image_halign">Image Horizontal Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer2_image_halign" name="skin_id_layer2_image_halign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_halign = array("left","right","center");
                                                                    foreach ($skin_image_halign as $skin_image_halign) {
                                                                    if ($get_skin_data['skin_id_layer2_image_halign'] == $skin_image_halign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_halign ."'>". $skin_image_halign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                    						                                                    
                                                </tr>    
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer2_image_repeat">Image Repeat</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer2_image_repeat" name="skin_id_layer2_image_repeat">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_repeat = array("repeat","repeat-x","repeat-y","no-repeat");
                                                                    foreach ($skin_image_repeat as $skin_image_repeat) {
                                                                    if ($get_skin_data['skin_id_layer2_image_repeat'] == $skin_image_repeat && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_repeat ."'>". $skin_image_repeat."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">                                 
                                                    </td>	                                    						                                                    
                                                </tr>                        
                                            </table> 
                                            <table id="layer2_pattern" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer2_pattern_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer2_pattern_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer2_pattern_opac" name="skin_id_layer2_pattern_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer2_pattern_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_pattern_opac'])); else echo '100'; ?>" />
                                                    </td>                               
                                                </tr>
                                                <tr>
                                                    <td style="width:100px;" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer2_pattern">Image Pattern</label></div>
                                                            <div style="position:relative" class="tooltip-next">
                                                                <select id="skin_id_layer2_pattern" name="skin_id_layer2_pattern">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    
                                                                    foreach ($skin_patterns as $skin_pattern) {
                                                                    if ($get_skin_data['skin_id_layer2_pattern'] == $skin_pattern && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_pattern ."'>". $skin_pattern."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>
															<div class="tooltip-info" style="margin-left:10px;margin-top:4px;"></div><div class="tooltip xlarge">
                                                            <?php foreach ($skin_patterns as $skin_pattern) { ?>
                                                            <span class="pattern-swatch" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/<?php echo $skin_pattern; ?>.png);">
															<span class="pattern-text"><?php echo $skin_pattern; ?></span></span> 
                                                            <?php } ?>
                                                            </div>           
                                                    </td>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer2_pattern_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer2_pattern_color" name="skin_id_layer2_pattern_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_pattern_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the pattern.</small>
                                                    </td>                                                       
                                                </tr>
                                            </table>                               
                                        <table id="layer2_video" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer2_video_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer2_video_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer2_video_opac" name="skin_id_layer2_video_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer2_video_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_video_opac'])); else echo '100'; ?>" />
                                                    </td>							
                                                </tr>
                                                <tr>
                                                    <td style="width:340px" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer2_video">Video URL:</label></div>
                                                            <div style="position:relative">
                                                                <input id="skin_id_layer2_video" name="skin_id_layer2_video" type="text" value="<?php echo $get_skin_data['skin_id_layer2_video'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer2_video" class="thickbox custom_media_uploader" title="Add a Video"><img src="/wp-admin/images/media-button-video.gif" alt="Add Video" onclick="return false;"></a><br />
                                                            </div>                                    
                                                    </td> 
                                                    <td class="tr-top">
                                                        <div class="label-wrap">Video Type</div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer2_video_type" name="skin_id_layer2_video_type">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_video_type = array("youtube","vimeo","flash","jwplayer");
                                                                    foreach ($skin_video_type as $skin_video_type) {
                                                                    if ($get_skin_data['skin_id_layer2_video_type'] == $skin_video_type && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_video_type ."'>". $skin_video_type."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>                  
                                                </tr>
                                                <tr>
                                                    <td style="width:100px;" colspan="2" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer2_video_loop">Video Loop</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer2_video_loop" name="skin_id_layer2_video_loop">
                                                                    <?php
                                                                    $skin_video_loop = array("1","0");
                                                                    foreach ($skin_video_loop as $skin_video_loop) {
                                                                    if ($get_skin_data['skin_id_layer2_video_loop'] == $skin_video_loop && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_video_loop ."'>". $skin_video_loop."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select><small class="description">(Excludes Flash Video)</small>
                                                            </div>                                    
                                                    </td>                                                            
                                                </tr>
                                            </table>  
                                            <table id="layer2_cycle" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer2_cycle_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer2_cycle_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer2_cycle_opac" name="skin_id_layer2_cycle_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer2_cycle_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_cycle_opac'])); else echo '100'; ?>" />
                                                    </td>							
                                                </tr>                                           
                                                <tr>                                                   
                                                    <td width="200px" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer2_cycle_timeout">Slide Timeout</label></div>
                                                            <div style="position:relative">
                                                                <input id="skin_id_layer2_cycle_timeout" name="skin_id_layer2_cycle_timeout" style="width:40px" type="text" value="<?php echo $get_skin_data['skin_id_layer2_cycle_timeout'] ?>" /><small class="description">seconds</small><br />
                                                            </div>   
                                                    </td>
                                                    <td class="tr-top"><div class="label-wrap"><label for="skin_id_layer2_cycle_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer2_cycle_color" name="skin_id_layer2_cycle_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer2_cycle_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - the color black (000000) is recommended.</small>
                                                    </td>                                                      					
                                                </tr>   
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2">
                                                        <select style="margin:10px 0;" id="skin_id_layer2_datasource" name="skin_id_layer2_datasource" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'skin_id_layer2_datasource')">
                                                            <option value="nodatasource-2">Select Data Source</option>
                                                            <option <?php if($get_skin_data['skin_id_layer2_datasource']=='layer2-data-1') echo 'selected'; ?> value="layer2-data-1">Attached Media</option>
                                                            <option <?php if($get_skin_data['skin_id_layer2_datasource']=='layer2-data-6') echo 'selected'; ?> value="layer2-data-6">Gallery Media</option>
                                                            <option <?php if($get_skin_data['skin_id_layer2_datasource']=='layer2-data-2') echo 'selected'; ?> value="layer2-data-2">Post Categories</option>
                                                            
															<?php if(class_exists('WPSC_Query')) { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer2_datasource']=='layer2-data-5') echo 'selected'; ?> value="layer2-data-5">Product Categories / Tags</option>
                                                            <?php } ?>                     
                                                            
															<?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer2_datasource']=='layer2-data-3') echo 'selected'; ?> value="layer2-data-3">Flickr Set</option>
                                                            <?php } ?>
                                                            
															<?php if(get_option('slideset_enable')=='enable') { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer2_datasource']=='layer2-data-4') echo 'selected'; ?> value="layer2-data-4">Slide Set</option>
                                                            <?php } ?>  
                                                        </select><br />
                                                        
                                                        
                                                       <div id="nodatasource-2"></div>
                                                    	<div id="layer2-data-1">
                                                         <div class="label-wrap tooltip-next"><label for="skin_id_layer2_cycle_attached"><strong>Attached Media</strong></label></div><div class="tooltip-info"></div><div class="tooltip">This option uses Media attached to the Page or Post (<em>See documentation for more information</em>). The Page / Post ID can be located within the browser URL when edting a post or page. e.g. http://domain.com/wp-admin/post.php?post=301 <br /><br />
Enter ID of <strong>301</strong></div><br class="clear" />
                                                        <input type="text" style="width:50px;" name="skin_id_layer2_cycle_attached" id="skin_id_layer2_cycle_attached"  value="<?php echo $get_skin_data['skin_id_layer2_cycle_attached'] ?>" /> 
                                                        <small class="description">Comma separate for multiple ID's</small>
                                                        </div>
                                                        <div id="layer2-data-2">
                                                        <div class="label-wrap"><label for="skin_id_layer2_cycle_cat"><strong>Post Categories</strong></label></div><div class="clear"></div>
                                                        <?php
                                                        $categories=  get_categories(); 
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer2_cycle_cat[]" name="skin_id_layer2_cycle_cat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer2_cycle_cat'])) {
                                                            foreach ($get_skin_data['skin_id_layer2_cycle_cat'] as $cats) {					
                                                            if($cats==$cat->term_id) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->cat_name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->cat_name.'" />';
                                        
                                                            $option .= ' '.$cat->cat_name;
                                                            $option .= ' ('.$cat->category_count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }
                                                    
                                                        ?>     
                                                        </div>
                                                        <?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                                                        <div id="layer2-data-3">
                                                        <div class="label-wrap"><label for="skin_id_layer2_cycle_flickr"><strong>Flickr Sets</strong></label></div><br class="clear" />
                                                        <select id="skin_id_layer2_cycle_flickr" name="skin_id_layer2_cycle_flickr">
                                                        <?php 
														require_once(NV_FILES."/adm/inc/phpFlickr/phpFlickr.php");
														$f = new phpFlickr(get_option('flickr_apikey')); // API
														$user = get_option('flickr_userid');
														$ph_sets = $f->photosets_getList($user);
												
														foreach ($ph_sets['photoset'] as $ph_set):
															if(!$ph_set) { ?>
																	<option value="">No Sets Found</option>            	
															<?php } else {?>
																	<option value="">Select Flickr Set</option>
																	<option value="<?php echo $ph_set['id']; ?>" <?php if($get_skin_data['skin_id_layer2_cycle_flickr']==$ph_set['id']) { ?> selected="selected" <?php } ?>><?php echo  $ph_set['title']; ?></option>     
																	<?php }
														endforeach; ?>
                                                        </select>
                                                        </div>  
                                                        <?php } ?>       
                                                        <?php if(get_option('slideset_enable')=='enable') { ?>              
														<div id="layer2-data-4">
                                                        <div class="label-wrap"><label for="skin_id_layer2_cycle_slideset"><strong>Gallery Slide Sets</strong></label></div><div class="clear"></div>
                                                        <?php 		
                                                            $slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
                                                            $slideset_data_ids = explode(",", $slideset_data_ids);
                                    
                                                            if($slideset_data_ids) {			
                                                                    foreach ($slideset_data_ids as $slideset_data_ids) {
                                                                        $option='<input type="checkbox" id="skin_id_layer2_cycle_slideset[]" name="skin_id_layer2_cycle_slideset[]"';		
                                                                        if (is_array($get_skin_data['skin_id_layer2_cycle_slideset'])) {
                                                                        foreach ($get_skin_data['skin_id_layer2_cycle_slideset'] as $slidesets) {					
                                                                            if($slidesets==$slideset_data_ids) {
                                                                                $option=$option.' checked="checked"'; 
                                                                            }
                                                                        }
                                                                        } else {
                                                                            if($get_skin_data['skin_id_layer2_cycle_slideset']==$slideset_data_ids) {
                                                                                $option=$option.' checked="checked"'; 
                                                                            } 										
                                                                        }
                                                                        $option .= ' value="'.$slideset_data_ids.'" />';
                                                    
                                                                        $option .= ' '.$slideset_data_ids;
                                                                        $option .= '<br />';
                                                                        echo $option;
                                                                    }
                                                            }						
                                                                            
                                                        ?>
                                                        </div>
                                                        <?php } ?>
                                                        <?php if(class_exists('WPSC_Query')) { ?>                                                        
                                                        <div id="layer2-data-5">
                                                        <div class="label-wrap"><label for="skin_id_layer2_cycle_prodcat"><strong>Product Categories</strong></label></div><div class="clear"></div>
														<?php
														
														if( class_exists('Woocommerce') ) : 
															
														  $categories=  get_terms('product_cat', 'orderby=name&hide_empty=0');
														  
														else : 
														  
														  $categories=  get_terms('wpsc_product_category', 'orderby=name&hide_empty=0');
														  
														endif;

					
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer2_cycle_prodcat[]" name="skin_id_layer2_cycle_prodcat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer2_cycle_prodcat'])) {
                                                            foreach ($get_skin_data['skin_id_layer2_cycle_prodcat'] as $cats) {					
                                                            if($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->name.'" />';
                                        
                                                            $option .= ' '.$cat->name;
                                                            $option .= ' ('.$cat->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }	?><br />
                                                        <div class="label-wrap"><label for="skin_id_layer2_cycle_prodtag"><strong>Product Tags</strong></label></div><div class="clear"></div>
                                                        <?php
														$tags=  get_terms('product_tag', 'orderby=name&hide_empty=1');
														
                                                        foreach ($tags as $tag) {
                                                            $option='<input type="checkbox" id="skin_id_layer2_cycle_prodtag[]" name="skin_id_layer2_cycle_prodtag[]"';
                                                            if (is_array($get_skin_data['skin_id_layer2_cycle_prodtag'])) {
                                                            foreach ($get_skin_data['skin_id_layer2_cycle_prodtag'] as $tags) {					
                                                            if($tags==$tag->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($tags==$tag->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$tag->name.'" />';
                                        
                                                            $option .= ' '.$tag->name;
                                                            $option .= ' ('.$tag->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          } ?>
                                                        
                                                        </div>
                                                        <?php } ?>
 														<div id="layer2-data-6">
                                                        <div class="label-wrap"><label for="skin_id_layer2_cycle_mediacats"><strong>Gallery Media Categories</strong></label></div><div class="clear"></div>
														<?php
														
														$categories=  get_terms('media-category', 'orderby=name&hide_empty=0');
					
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer2_cycle_mediacat[]" name="skin_id_layer2_cycle_mediacat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer2_cycle_mediacat'])) {
                                                            foreach ($get_skin_data['skin_id_layer2_cycle_mediacat'] as $cats) {					
                                                            if($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->name.'" />';
                                        
                                                            $option .= ' '.$cat->name;
                                                            $option .= ' ('.$cat->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }	?><br />
                                                          </div>                                                                                                             
                                                    </td>							
                                                </tr>                                                                            
										</table>                         
                                    </td>
								</tr><?php //******** layer2 END ?>
							<tr><?php //******** layer_1 START ?>
                                    <td class="media-list-wrap tr-top"> 
                                        <div id="none"></div>
                                        <div class="reveal skinset"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Background Layer 3</h4></div></div>
                                        <div class="reveal-content">
                                            <select style="margin:10px 0;" id="skin_id_layer3_type" name="skin_id_layer3_type" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'skin_id_layer3_type')" class="tooltip-next">
                                                <option value="none">Select Background Type</option>
                                                <option value="layer3_color" <?php if($get_skin_data['skin_id_layer3_type']=='layer3_color') echo 'selected="selected"';?> >Color</option>
                                                <option value="layer3_imagefull" <?php if($get_skin_data['skin_id_layer3_type']=='layer3_imagefull') echo 'selected="selected"';?> >Image (Fullscreen)</option>
                                                <option value="layer3_image" <?php if($get_skin_data['skin_id_layer3_type']=='layer3_image') echo 'selected="selected"';?> >Image (Positioned)</option>
                                                <option value="layer3_pattern" <?php if($get_skin_data['skin_id_layer3_type']=='layer3_pattern') echo 'selected="selected"';?>>Pattern</option>
                                                <option value="layer3_video" <?php if($get_skin_data['skin_id_layer3_type']=='layer3_video') echo 'selected="selected"';?>>Video / Flash</option>
                                                <option value="layer3_cycle" <?php if($get_skin_data['skin_id_layer3_type']=='layer3_cycle') echo 'selected="selected"';?>>Image / Video Cycle</option>
                                            </select>
											<div class="tooltip-info" style="margin-left:10px;margin-top:12px;"></div><div class="tooltip large">
                                            <p>1. Color<br />
                                            - Select a background color, optionally add a secondary color to create a gradient effect and control the opacity of Primary and Secondary colors.</p>
                                            <p>2. Fullscreen<br />
                                            - Display an image fullscreen in the background.<br />
                                            - Recommended image width is between 1200-2000px.
                                            </p>
                                            <p>
                                            3. Image positioned<br />
                                            - Position an image in the background.<br />
                                             </p>
                                            <p>
                                            4. Pattern<br />
                                            - Set a pattern to the background.
                                            </p>
                                            <p>
                                            5. Video / Flash<br />
                                            - Add YouTube, Vimeo, JW Player or Flash to background of the page.
                                            </p>
                                            <p>
                                            6. Image / Video Cycle<br />
                                            - Animation of Images from Post Categories or Gallery Slide Sets
                                            </p>
                                            </div>                    
                                            <table id="layer3_color" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer3_pri_color">Primary Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer3_pri_color" name="skin_id_layer3_pri_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_pri_color'])); ?>" /><span class="color_icon">&nbsp;</span></td>
                                                    <td width="140px" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer3_pri_opac">Primary Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer3_pri_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer3_pri_opac" name="skin_id_layer3_pri_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer3_pri_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_pri_opac'])); else echo '100'; ?>" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer3_sec_color">Secondary Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer3_sec_color" name="skin_id_layer3_sec_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_sec_color'])); ?>" /><span class="color_icon">&nbsp;</span></td>
                                                    <td width="140px" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer3_sec_opac">Secondary Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer3_sec_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer3_sec_opac" name="skin_id_layer3_sec_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer3_sec_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_sec_opac'])); else echo '100'; ?>" /><small class="description">Secondary is Optional, completing both Primary and Secondary fields will display a gradient effect.</small>
                                                    </td>
                                                </tr>                                
                                            </table>
                                            <table id="layer3_imagefull" class="borderless">
                                                <tr>
                                                    <td width="140px" colspan="2" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer3_imagefull_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer3_imagefull_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer3_imagefull_opac" name="skin_id_layer3_imagefull_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer3_imagefull_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_imagefull_opac'])); else echo '100'; ?>" />
                                                    </td>                                 
                                                </tr>                           
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;">
                                                        <div class="label-wrap"><label for="skin_id_layer3_imagefull">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_id_layer3_imagefull" name="skin_id_layer3_imagefull" type="text" value="<?php echo $get_skin_data['skin_id_layer3_imagefull'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer3_imagefull" class="thickbox custom_media_uploader" title="Add an Image"><img src="http://devserver-1.creativeworkz.co.uk/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a> <br />
                                                            </div>                                    
                                                    </td> 
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer3_imagefull_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer3_imagefull_color" name="skin_id_layer3_imagefull_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_imagefull_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the image.</small>
                                                    </td>                                                                   
                                                </tr>     
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;" colspan="2">
                                                        <div class="label-wrap"><label for="skin_id_layer3_imagefeatured">Featured Image</label></div>
                                                            <div style="position:relative">
                                                                <input name="skin_id_layer3_imagefeatured" id="skin_id_layer3_imagefeatured" type="checkbox" class="tooltip-next"  value="enable" <?php if ($get_skin_data['skin_id_layer3_imagefeatured'] == "enable"){ echo "checked"; } ?> /><div class="tooltip-info" style="margin-left:10px;margin-top:12px;"></div><div class="tooltip large">Enable this option to use the Page / Post Featured Image. This will override the Image URL set above.</div>
                                                            </div>                                    
                                                    </td>                                                                    
                                                </tr>                                                                                                
                                            </table>
                                            <table id="layer3_image" class="borderless">
                                                <tr>
                                                    <td width="140px" colspan="2" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer3_image_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer3_image_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer3_image_opac" name="skin_id_layer3_image_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer3_image_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_image_opac'])); else echo '100'; ?>" />
                                                    </td>                                 
                                                </tr>                           
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;">
                                                        <div class="label-wrap"><label for="skin_id_layer3_image">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_id_layer3_image" name="skin_id_layer3_image" type="text" value="<?php echo $get_skin_data['skin_id_layer3_image'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer3_image" class="thickbox custom_media_uploader" title="Add an Image"><img src="http://devserver-1.creativeworkz.co.uk/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a> <br />
                                                            </div>                                    
                                                    </td> 
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer3_image_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer3_image_color" name="skin_id_layer3_image_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_image_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the image.</small>
                                                    </td>                                                                   
                                                </tr> 
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer3_image_valign">Image Vertical Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer3_image_valign" name="skin_id_layer3_image_valign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_valign = array("top","bottom","center");
                                                                    foreach ($skin_image_valign as $skin_image_valign) {
                                                                    if ($get_skin_data['skin_id_layer3_image_valign'] == $skin_image_valign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_valign ."'>". $skin_image_valign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer3_image_halign">Image Horizontal Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer3_image_halign" name="skin_id_layer3_image_halign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_halign = array("left","right","center");
                                                                    foreach ($skin_image_halign as $skin_image_halign) {
                                                                    if ($get_skin_data['skin_id_layer3_image_halign'] == $skin_image_halign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_halign ."'>". $skin_image_halign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                    						                                                    
                                                </tr>    
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer3_image_repeat">Image Repeat</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer3_image_repeat" name="skin_id_layer3_image_repeat">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_repeat = array("repeat","repeat-x","repeat-y","no-repeat");
                                                                    foreach ($skin_image_repeat as $skin_image_repeat) {
                                                                    if ($get_skin_data['skin_id_layer3_image_repeat'] == $skin_image_repeat && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_repeat ."'>". $skin_image_repeat."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">                                 
                                                    </td>	                                    						                                                    
                                                </tr>                        
                                            </table> 
                                            <table id="layer3_pattern" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer3_pattern_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer3_pattern_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer3_pattern_opac" name="skin_id_layer3_pattern_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer3_pattern_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_pattern_opac'])); else echo '100'; ?>" />
                                                    </td>                               
                                                </tr>
                                                <tr>
                                                    <td style="width:100px;" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer3_pattern">Image Pattern</label></div>
                                                            <div style="position:relative" class="tooltip-next">
                                                                <select id="skin_id_layer3_pattern" name="skin_id_layer3_pattern">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    
                                                                    foreach ($skin_patterns as $skin_pattern) {
                                                                    if ($get_skin_data['skin_id_layer3_pattern'] == $skin_pattern && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_pattern ."'>". $skin_pattern."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>
															<div class="tooltip-info" style="margin-left:10px;margin-top:4px;"></div><div class="tooltip xlarge">
                                                            <?php foreach ($skin_patterns as $skin_pattern) { ?>
                                                            <span class="pattern-swatch" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/<?php echo $skin_pattern; ?>.png);">
															<span class="pattern-text"><?php echo $skin_pattern; ?></span></span> 
                                                            <?php } ?>
                                                            </div>           
                                                    </td>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer3_pattern_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer3_pattern_color" name="skin_id_layer3_pattern_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_pattern_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the pattern.</small>
                                                    </td>                                                       
                                                </tr>
                                            </table>                               
                                        <table id="layer3_video" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer3_video_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer3_video_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer3_video_opac" name="skin_id_layer3_video_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer3_video_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_video_opac'])); else echo '100'; ?>" />
                                                    </td>							
                                                </tr>
                                                <tr>
                                                    <td style="width:340px" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer3_video">Video URL:</label></div>
                                                            <div style="position:relative">
                                                                <input id="skin_id_layer3_video" name="skin_id_layer3_video" type="text" value="<?php echo $get_skin_data['skin_id_layer3_video'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer3_video" class="thickbox custom_media_uploader" title="Add a Video"><img src="/wp-admin/images/media-button-video.gif" alt="Add Video" onclick="return false;"></a><br />
                                                            </div>                                    
                                                    </td> 
                                                    <td class="tr-top">
                                                        <div class="label-wrap">Video Type</div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer3_video_type" name="skin_id_layer3_video_type">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_video_type = array("youtube","vimeo","flash","jwplayer");
                                                                    foreach ($skin_video_type as $skin_video_type) {
                                                                    if ($get_skin_data['skin_id_layer3_video_type'] == $skin_video_type && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_video_type ."'>". $skin_video_type."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>                  
                                                </tr>
                                                <tr>
                                                    <td style="width:100px;" colspan="2" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer3_video_loop">Video Loop</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer3_video_loop" name="skin_id_layer3_video_loop">
                                                                    <?php
                                                                    $skin_video_loop = array("1","0");
                                                                    foreach ($skin_video_loop as $skin_video_loop) {
                                                                    if ($get_skin_data['skin_id_layer3_video_loop'] == $skin_video_loop && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_video_loop ."'>". $skin_video_loop."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select><small class="description">(Excludes Flash Video)</small>
                                                            </div>                                    
                                                    </td>                                                            
                                                </tr>
                                            </table>  
                                            <table id="layer3_cycle" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer3_cycle_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer3_cycle_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer3_cycle_opac" name="skin_id_layer3_cycle_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer3_cycle_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_cycle_opac'])); else echo '100'; ?>" />
                                                    </td>							
                                                </tr>                                           
                                                <tr>                                                   
                                                    <td width="200px" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer3_cycle_timeout">Slide Timeout</label></div>
                                                            <div style="position:relative">
                                                                <input id="skin_id_layer3_cycle_timeout" name="skin_id_layer3_cycle_timeout" style="width:40px" type="text" value="<?php echo $get_skin_data['skin_id_layer3_cycle_timeout'] ?>" /><small class="description">seconds</small><br />
                                                            </div>   
                                                    </td>
                                                    <td class="tr-top"><div class="label-wrap"><label for="skin_id_layer3_cycle_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer3_cycle_color" name="skin_id_layer3_cycle_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer3_cycle_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - the color black (000000) is recommended.</small>
                                                    </td>                                                      					
                                                </tr>   
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2">
                                                        <select style="margin:10px 0;" id="skin_id_layer3_datasource" name="skin_id_layer3_datasource" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'skin_id_layer3_datasource')">
                                                            <option value="nodatasource-3">Select Data Source</option>
                                                            <option <?php if($get_skin_data['skin_id_layer3_datasource']=='layer3-data-1') echo 'selected'; ?> value="layer3-data-1">Attached Media</option>
                                                            <option <?php if($get_skin_data['skin_id_layer3_datasource']=='layer3-data-6') echo 'selected'; ?> value="layer3-data-6">Gallery Media</option>
                                                            <option <?php if($get_skin_data['skin_id_layer3_datasource']=='layer3-data-2') echo 'selected'; ?> value="layer3-data-2">Post Categories</option>
                                                            
															<?php if(class_exists('WPSC_Query')) { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer3_datasource']=='layer3-data-5') echo 'selected'; ?> value="layer3-data-5">Product Categories / Tags</option>
                                                            <?php } ?>                     
                                                            
															<?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer3_datasource']=='layer3-data-3') echo 'selected'; ?> value="layer3-data-3">Flickr Set</option>
                                                            <?php } ?>
                                                            
															<?php if(get_option('slideset_enable')=='enable') { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer3_datasource']=='layer3-data-4') echo 'selected'; ?> value="layer3-data-4">Slide Set</option>
                                                            <?php } ?>  
                                                        </select><br />
                                                        
                                                        
                                                       <div id="nodatasource-3"></div>
                                                    	<div id="layer3-data-1">
                                                         <div class="label-wrap tooltip-next"><label for="skin_id_layer3_cycle_attached"><strong>Attached Media</strong></label></div><div class="tooltip-info"></div><div class="tooltip">This option uses Media attached to the Page or Post (<em>See documentation for more information</em>). The Page / Post ID can be located within the browser URL when edting a post or page. e.g. http://domain.com/wp-admin/post.php?post=301 <br /><br />
Enter ID of <strong>301</strong></div><br class="clear" />
                                                        <input type="text" style="width:50px;" name="skin_id_layer3_cycle_attached" id="skin_id_layer3_cycle_attached"  value="<?php echo $get_skin_data['skin_id_layer3_cycle_attached'] ?>" /> 
                                                        <small class="description">Comma separate for multiple ID's</small>
                                                        </div>
                                                        <div id="layer3-data-2">
                                                        <div class="label-wrap"><label for="skin_id_layer3_cycle_cat"><strong>Post Categories</strong></label></div><div class="clear"></div>
                                                        <?php
                                                        $categories=  get_categories(); 
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer3_cycle_cat[]" name="skin_id_layer3_cycle_cat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer3_cycle_cat'])) {
                                                            foreach ($get_skin_data['skin_id_layer3_cycle_cat'] as $cats) {					
                                                            if($cats==$cat->term_id) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->cat_name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->cat_name.'" />';
                                        
                                                            $option .= ' '.$cat->cat_name;
                                                            $option .= ' ('.$cat->category_count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }
                                                    
                                                        ?>     
                                                        </div>
                                                        <?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                                                        <div id="layer3-data-3">
                                                        <div class="label-wrap"><label for="skin_id_layer3_cycle_flickr"><strong>Flickr Sets</strong></label></div><br class="clear" />
                                                        <select id="skin_id_layer3_cycle_flickr" name="skin_id_layer3_cycle_flickr">
                                                        <?php 
														require_once(NV_FILES."/adm/inc/phpFlickr/phpFlickr.php");
														$f = new phpFlickr(get_option('flickr_apikey')); // API
														$user = get_option('flickr_userid');
														$ph_sets = $f->photosets_getList($user);
												
														foreach ($ph_sets['photoset'] as $ph_set):
															if(!$ph_set) { ?>
																	<option value="">No Sets Found</option>            	
															<?php } else {?>
																	<option value="">Select Flickr Set</option>
																	<option value="<?php echo $ph_set['id']; ?>" <?php if($get_skin_data['skin_id_layer3_cycle_flickr']==$ph_set['id']) { ?> selected="selected" <?php } ?>><?php echo  $ph_set['title']; ?></option>     
																	<?php }
														endforeach; ?>
                                                        </select>
                                                        </div>  
                                                        <?php } ?>                  
                                                        <?php if(get_option('slideset_enable')=='enable') { ?>
														<div id="layer3-data-4">
                                                        <div class="label-wrap"><label for="skin_id_layer3_cycle_slideset"><strong>Gallery Slide Sets</strong></label></div><div class="clear"></div>
                                                        <?php 		
                                                            $slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
                                                            $slideset_data_ids = explode(",", $slideset_data_ids);
                                    
                                                            if($slideset_data_ids) {			
                                                                    foreach ($slideset_data_ids as $slideset_data_ids) {
                                                                        $option='<input type="checkbox" id="skin_id_layer3_cycle_slideset[]" name="skin_id_layer3_cycle_slideset[]"';		
                                                                        if (is_array($get_skin_data['skin_id_layer3_cycle_slideset'])) {
                                                                        foreach ($get_skin_data['skin_id_layer3_cycle_slideset'] as $slidesets) {					
                                                                            if($slidesets==$slideset_data_ids) {
                                                                                $option=$option.' checked="checked"'; 
                                                                            }
                                                                        }
                                                                        } else {
                                                                            if($get_skin_data['skin_id_layer3_cycle_slideset']==$slideset_data_ids) {
                                                                                $option=$option.' checked="checked"'; 
                                                                            } 										
                                                                        }
                                                                        $option .= ' value="'.$slideset_data_ids.'" />';
                                                    
                                                                        $option .= ' '.$slideset_data_ids;
                                                                        $option .= '<br />';
                                                                        echo $option;
                                                                    }
                                                            }						
                                                                            
                                                        ?>
                                                        </div>
                                                        <?php } ?>
                                                        <?php if(class_exists('WPSC_Query')) { ?>                                                        
                                                        <div id="layer3-data-5">
                                                        <div class="label-wrap"><label for="skin_id_layer3_cycle_prodcat"><strong>Product Categories</strong></label></div><div class="clear"></div>
														<?php
														
														if( class_exists('Woocommerce') ) : 
															
														  $categories=  get_terms('product_cat', 'orderby=name&hide_empty=0');
														  
														else : 
														  
														  $categories=  get_terms('wpsc_product_category', 'orderby=name&hide_empty=0');
														  
														endif;

					
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer3_cycle_prodcat[]" name="skin_id_layer3_cycle_prodcat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer3_cycle_prodcat'])) {
                                                            foreach ($get_skin_data['skin_id_layer3_cycle_prodcat'] as $cats) {					
                                                            if($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->name.'" />';
                                        
                                                            $option .= ' '.$cat->name;
                                                            $option .= ' ('.$cat->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }	?><br />
                                                        <div class="label-wrap"><label for="skin_id_layer3_cycle_prodtag"><strong>Product Tags</strong></label></div><div class="clear"></div>
                                                        <?php
														$tags=  get_terms('product_tag', 'orderby=name&hide_empty=1');
														
                                                        foreach ($tags as $tag) {
                                                            $option='<input type="checkbox" id="skin_id_layer3_cycle_prodtag[]" name="skin_id_layer3_cycle_prodtag[]"';
                                                            if (is_array($get_skin_data['skin_id_layer3_cycle_prodtag'])) {
                                                            foreach ($get_skin_data['skin_id_layer3_cycle_prodtag'] as $tags) {					
                                                            if($tags==$tag->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($tags==$tag->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$tag->name.'" />';
                                        
                                                            $option .= ' '.$tag->name;
                                                            $option .= ' ('.$tag->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          } ?>
                                                        
                                                        </div>
                                                        <?php } ?>
														<div id="layer3-data-6">
                                                        <div class="label-wrap"><label for="skin_id_layer3_cycle_mediacats"><strong>Gallery Media Categories</strong></label></div><div class="clear"></div>
														<?php
														
														$categories=  get_terms('media-category', 'orderby=name&hide_empty=0');
					
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer3_cycle_mediacat[]" name="skin_id_layer3_cycle_mediacat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer3_cycle_mediacat'])) {
                                                            foreach ($get_skin_data['skin_id_layer3_cycle_mediacat'] as $cats) {					
                                                            if($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->name.'" />';
                                        
                                                            $option .= ' '.$cat->name;
                                                            $option .= ' ('.$cat->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }	?><br />
                                                          </div>                                                                                                          
                                                    </td>							
                                                </tr>                                                                            
										</table>                         
                                    </td>
								</tr><?php //******** layer3 END ?>
							<tr><?php //******** layer_1 START ?>
                                    <td class="media-list-wrap tr-top"> 
                                        <div id="none"></div>
                                        <div class="reveal skinset"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/lib/adm/imgs/blank.gif" alt="slide set control" width="17" height="17" /> </a><div class="revealtext" style="cursor:pointer"><h4 style="margin:0;padding:0">Background Layer 4</h4></div></div>
                                        <div class="reveal-content">
                                            <select style="margin:10px 0;" id="skin_id_layer4_type" name="skin_id_layer4_type" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'skin_id_layer4_type')" class="tooltip-next">
                                                <option value="none">Select Background Type</option>
                                                <option value="layer4_color" <?php if($get_skin_data['skin_id_layer4_type']=='layer4_color') echo 'selected="selected"';?> >Color</option>
                                                <option value="layer4_imagefull" <?php if($get_skin_data['skin_id_layer4_type']=='layer4_imagefull') echo 'selected="selected"';?> >Image (Fullscreen)</option>
                                                <option value="layer4_image" <?php if($get_skin_data['skin_id_layer4_type']=='layer4_image') echo 'selected="selected"';?> >Image (Positioned)</option>
                                                <option value="layer4_pattern" <?php if($get_skin_data['skin_id_layer4_type']=='layer4_pattern') echo 'selected="selected"';?>>Pattern</option>
                                                <option value="layer4_video" <?php if($get_skin_data['skin_id_layer4_type']=='layer4_video') echo 'selected="selected"';?>>Video / Flash</option>
                                                <option value="layer4_cycle" <?php if($get_skin_data['skin_id_layer4_type']=='layer4_cycle') echo 'selected="selected"';?>>Image / Video Cycle</option>
                                            </select>
											<div class="tooltip-info" style="margin-left:10px;margin-top:12px;"></div><div class="tooltip large">
                                            <p>1. Color<br />
                                            - Select a background color, optionally add a secondary color to create a gradient effect and control the opacity of Primary and Secondary colors.</p>
                                            <p>2. Fullscreen<br />
                                            - Display an image fullscreen in the background.<br />
                                            - Recommended image width is between 1200-2000px.
                                            </p>
                                            <p>
                                            3. Image positioned<br />
                                            - Position an image in the background.<br />
                                             </p>
                                            <p>
                                            4. Pattern<br />
                                            - Set a pattern to the background.
                                            </p>
                                            <p>
                                            5. Video / Flash<br />
                                            - Add YouTube, Vimeo, JW Player or Flash to background of the page.
                                            </p>
                                            <p>
                                            6. Image / Video Cycle<br />
                                            - Animation of Images from Post Categories or Gallery Slide Sets
                                            </p>
                                            </div>                    
                                            <table id="layer4_color" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer4_pri_color">Primary Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer4_pri_color" name="skin_id_layer4_pri_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_pri_color'])); ?>" /><span class="color_icon">&nbsp;</span></td>
                                                    <td width="140px" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer4_pri_opac">Primary Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer4_pri_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer4_pri_opac" name="skin_id_layer4_pri_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer4_pri_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_pri_opac'])); else echo '100'; ?>" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer4_sec_color">Secondary Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer4_sec_color" name="skin_id_layer4_sec_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_sec_color'])); ?>" /><span class="color_icon">&nbsp;</span></td>
                                                    <td width="140px" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer4_sec_opac">Secondary Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer4_sec_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer4_sec_opac" name="skin_id_layer4_sec_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer4_sec_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_sec_opac'])); else echo '100'; ?>" /><small class="description">Secondary is Optional, completing both Primary and Secondary fields will display a gradient effect.</small>
                                                    </td>
                                                </tr>                                
                                            </table>
                                            <table id="layer4_imagefull" class="borderless">
                                                <tr>
                                                    <td width="140px" colspan="2" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer4_imagefull_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer4_imagefull_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer4_imagefull_opac" name="skin_id_layer4_imagefull_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer4_imagefull_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_imagefull_opac'])); else echo '100'; ?>" />
                                                    </td>                                 
                                                </tr>                           
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;">
                                                        <div class="label-wrap"><label for="skin_id_layer4_imagefull">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_id_layer4_imagefull" name="skin_id_layer4_imagefull" type="text" value="<?php echo $get_skin_data['skin_id_layer4_imagefull'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer4_imagefull" class="thickbox custom_media_uploader" title="Add an Image"><img src="http://devserver-1.creativeworkz.co.uk/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a> <br />
                                                            </div>                                    
                                                    </td> 
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer4_imagefull_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer4_imagefull_color" name="skin_id_layer4_imagefull_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_imagefull_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the image.</small>
                                                    </td>                                                                   
                                                </tr>    
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;" colspan="2">
                                                        <div class="label-wrap"><label for="skin_id_layer4_imagefeatured">Featured Image</label></div>
                                                            <div style="position:relative">
                                                                <input name="skin_id_layer4_imagefeatured" id="skin_id_layer4_imagefeatured" type="checkbox" class="tooltip-next"  value="enable" <?php if ($get_skin_data['skin_id_layer4_imagefeatured'] == "enable"){ echo "checked"; } ?> /><div class="tooltip-info" style="margin-left:10px;margin-top:12px;"></div><div class="tooltip large">Enable this option to use the Page / Post Featured Image. This will override the Image URL set above.</div>
                                                            </div>                                    
                                                    </td>                                                                    
                                                </tr>                                                                                                 
                                            </table>
                                            <table id="layer4_image" class="borderless">
                                                <tr>
                                                    <td width="140px" colspan="2" class="tr-top"><div style="width:110px" class="label-wrap"><label for="skin_id_layer4_image_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer4_image_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer4_image_opac" name="skin_id_layer4_image_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer4_image_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_image_opac'])); else echo '100'; ?>" />
                                                    </td>                                 
                                                </tr>                           
                                                <tr>
                                                    <td class="media-list-wrap tr-top" style="width:160px;">
                                                        <div class="label-wrap"><label for="skin_id_layer4_image">Image URL</label></div>
                                                            <div style="position:relative">
                                                                <input class="get-media-list" id="skin_id_layer4_image" name="skin_id_layer4_image" type="text" value="<?php echo $get_skin_data['skin_id_layer4_image'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer4_image" class="thickbox custom_media_uploader" title="Add an Image"><img src="http://devserver-1.creativeworkz.co.uk/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;"></a> <br />
                                                            </div>                                    
                                                    </td> 
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer4_image_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer4_image_color" name="skin_id_layer4_image_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_image_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the image.</small>
                                                    </td>                                                                   
                                                </tr> 
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer4_image_valign">Image Vertical Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer4_image_valign" name="skin_id_layer4_image_valign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_valign = array("top","bottom","center");
                                                                    foreach ($skin_image_valign as $skin_image_valign) {
                                                                    if ($get_skin_data['skin_id_layer4_image_valign'] == $skin_image_valign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_valign ."'>". $skin_image_valign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer4_image_halign">Image Horizontal Position</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer4_image_halign" name="skin_id_layer4_image_halign">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_halign = array("left","right","center");
                                                                    foreach ($skin_image_halign as $skin_image_halign) {
                                                                    if ($get_skin_data['skin_id_layer4_image_halign'] == $skin_image_halign && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_halign ."'>". $skin_image_halign."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	                                    						                                                    
                                                </tr>    
                                                <tr>
                                                    <td style="width:215px;" class="tr-top">
                                                        <div class="label-wrap" style="width:140px"><label for="skin_id_layer4_image_repeat">Image Repeat</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer4_image_repeat" name="skin_id_layer4_image_repeat">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_image_repeat = array("repeat","repeat-x","repeat-y","no-repeat");
                                                                    foreach ($skin_image_repeat as $skin_image_repeat) {
                                                                    if ($get_skin_data['skin_id_layer4_image_repeat'] == $skin_image_repeat && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_image_repeat ."'>". $skin_image_repeat."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>	
                                                    <td style="width:215px;" class="tr-top">                                 
                                                    </td>	                                    						                                                    
                                                </tr>                        
                                            </table> 
                                            <table id="layer4_pattern" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer4_pattern_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer4_pattern_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer4_pattern_opac" name="skin_id_layer4_pattern_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer4_pattern_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_pattern_opac'])); else echo '100'; ?>" />
                                                    </td>                               
                                                </tr>
                                                <tr>
                                                    <td style="width:100px;" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer4_pattern">Image Pattern</label></div>
                                                            <div style="position:relative" class="tooltip-next">
                                                                <select id="skin_id_layer4_pattern" name="skin_id_layer4_pattern">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    
                                                                    foreach ($skin_patterns as $skin_pattern) {
                                                                    if ($get_skin_data['skin_id_layer4_pattern'] == $skin_pattern && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_pattern ."'>". $skin_pattern."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>
															<div class="tooltip-info" style="margin-left:10px;margin-top:4px;"></div><div class="tooltip xlarge">
                                                            <?php foreach ($skin_patterns as $skin_pattern) { ?>
                                                            <span class="pattern-swatch" style="background-image:url(<?php echo get_template_directory_uri(); ?>/images/<?php echo $skin_pattern; ?>.png);">
															<span class="pattern-text"><?php echo $skin_pattern; ?></span></span> 
                                                            <?php } ?>
                                                            </div>           
                                                    </td>
                                                    <td width="140px" class="tr-top"><div class="label-wrap"><label for="skin_id_layer4_pattern_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer4_pattern_color" name="skin_id_layer4_pattern_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_pattern_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - color is displayed behind the pattern.</small>
                                                    </td>                                                       
                                                </tr>
                                            </table>                               
                                        <table id="layer4_video" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer4_video_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer4_video_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer4_video_opac" name="skin_id_layer4_video_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer4_video_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_video_opac'])); else echo '100'; ?>" />
                                                    </td>							
                                                </tr>
                                                <tr>
                                                    <td style="width:340px" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer4_video">Video URL:</label></div>
                                                            <div style="position:relative">
                                                                <input id="skin_id_layer4_video" name="skin_id_layer4_video" type="text" value="<?php echo $get_skin_data['skin_id_layer4_video'] ?>" /> <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="skin_id_layer4_video" class="thickbox custom_media_uploader" title="Add a Video"><img src="/wp-admin/images/media-button-video.gif" alt="Add Video" onclick="return false;"></a><br />
                                                            </div>                                    
                                                    </td> 
                                                    <td class="tr-top">
                                                        <div class="label-wrap">Video Type</div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer4_video_type" name="skin_id_layer4_video_type">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $skin_video_type = array("youtube","vimeo","flash","jwplayer");
                                                                    foreach ($skin_video_type as $skin_video_type) {
                                                                    if ($get_skin_data['skin_id_layer4_video_type'] == $skin_video_type && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_video_type ."'>". $skin_video_type."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select>
                                                            </div>                                    
                                                    </td>                  
                                                </tr>
                                                <tr>
                                                    <td style="width:100px;" colspan="2" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer4_video_loop">Video Loop</label></div>
                                                            <div style="position:relative">
                                                                <select id="skin_id_layer4_video_loop" name="skin_id_layer4_video_loop">
                                                                    <?php
                                                                    $skin_video_loop = array("1","0");
                                                                    foreach ($skin_video_loop as $skin_video_loop) {
                                                                    if ($get_skin_data['skin_id_layer4_video_loop'] == $skin_video_loop && $z+1 != $count){
                                                                    $selected = "selected='selected'";	
                                                                    }else{
                                                                    $selected = "";
                                                                    }
                                                                    echo"<option $selected value='". $skin_video_loop ."'>". $skin_video_loop."</option>";
                                                                    }
                                                                    ?>                                                
                                                                </select><small class="description">(Excludes Flash Video)</small>
                                                            </div>                                    
                                                    </td>                                                            
                                                </tr>
                                            </table>  
                                            <table id="layer4_cycle" class="borderless">
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2"><div style="width:110px" class="label-wrap"><label for="skin_id_layer4_cycle_opac">Layer Opacity:</label></div>
                                                        <div class="slider-wrap">
                                                            <div id="skin_id_layer4_cycle_opac_slider" class="opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                                <a style="left: 0%;" class="button-secondary ui-slider-handle ui-state-default ui-corner-all" href="#"></a>
                                                            </div>      
                                                        </div>
                                                        <input type="text" id="skin_id_layer4_cycle_opac" name="skin_id_layer4_cycle_opac" class="opacvalue" value="<?php if($get_skin_data['skin_id_layer4_cycle_opac']) echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_cycle_opac'])); else echo '100'; ?>" />
                                                    </td>							
                                                </tr>                                           
                                                <tr>                                                   
                                                    <td width="200px" class="tr-top">
                                                        <div class="label-wrap"><label for="skin_id_layer4_cycle_timeout">Slide Timeout</label></div>
                                                            <div style="position:relative">
                                                                <input id="skin_id_layer4_cycle_timeout" name="skin_id_layer4_cycle_timeout" style="width:40px" type="text" value="<?php echo $get_skin_data['skin_id_layer4_cycle_timeout'] ?>" /><small class="description">seconds</small><br />
                                                            </div>   
                                                    </td>
                                                    <td class="tr-top"><div class="label-wrap"><label for="skin_id_layer4_cycle_color">Background Color:</label></div><span class="colorfield">#</span> <input class="medium skin_manager_color" id="skin_id_layer4_cycle_color" name="skin_id_layer4_cycle_color" type="text" value="<?php echo stripslashes(htmlspecialchars($get_skin_data['skin_id_layer4_cycle_color'])); ?>" /><span class="color_icon">&nbsp;</span><small class="description">Optional - the color black (000000) is recommended.</small>
                                                    </td>                                                      					
                                                </tr>   
                                                <tr>
                                                    <td width="140px" class="tr-top" colspan="2">
                                                        <select style="margin:10px 0;" id="skin_id_layer4_datasource" name="skin_id_layer4_datasource" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'skin_id_layer4_datasource')">
                                                            <option value="nodatasource-4">Select Data Source</option>
                                                            <option <?php if($get_skin_data['skin_id_layer4_datasource']=='layer4-data-1') echo 'selected'; ?> value="layer4-data-1">Attached Media</option>
                                                            <option <?php if($get_skin_data['skin_id_layer4_datasource']=='layer4-data-6') echo 'selected'; ?> value="layer4-data-6">Gallery Media</option>
                                                            <option <?php if($get_skin_data['skin_id_layer4_datasource']=='layer4-data-2') echo 'selected'; ?> value="layer4-data-2">Post Categories</option>
                                                            
															<?php if(class_exists('WPSC_Query')) { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer4_datasource']=='layer4-data-5') echo 'selected'; ?> value="layer4-data-5">Product Categories / Tags</option>
                                                            <?php } ?>                     
                                                            
															<?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer4_datasource']=='layer4-data-3') echo 'selected'; ?> value="layer4-data-3">Flickr Set</option>
                                                            <?php } ?>
                                                            
															<?php if(get_option('slideset_enable')=='enable') { ?>
                                                            <option <?php if($get_skin_data['skin_id_layer4_datasource']=='layer4-data-4') echo 'selected'; ?> value="layer4-data-4">Slide Set</option>
                                                            <?php } ?>  
                                                        </select><br />
                                                        
                                                        
                                                       <div id="nodatasource-4"></div>
                                                    	<div id="layer4-data-1">
                                                         <div class="label-wrap tooltip-next"><label for="skin_id_layer4_cycle_attached"><strong>Attached Media</strong></label></div><div class="tooltip-info"></div><div class="tooltip">This option uses Media attached to the Page or Post (<em>See documentation for more information</em>). The Page / Post ID can be located within the browser URL when edting a post or page. e.g. http://domain.com/wp-admin/post.php?post=301 <br /><br />
Enter ID of <strong>301</strong></div><br class="clear" />
                                                        <input type="text" style="width:50px;" name="skin_id_layer4_cycle_attached" id="skin_id_layer4_cycle_attached"  value="<?php echo $get_skin_data['skin_id_layer4_cycle_attached'] ?>" /> 
                                                        <small class="description">Comma separate for multiple ID's</small>
                                                        </div>
                                                        <div id="layer4-data-2">
                                                        <div class="label-wrap"><label for="skin_id_layer4_cycle_cat"><strong>Post Categories</strong></label></div><div class="clear"></div>
                                                        <?php
                                                        $categories=  get_categories(); 
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer4_cycle_cat[]" name="skin_id_layer4_cycle_cat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer4_cycle_cat'])) {
                                                            foreach ($get_skin_data['skin_id_layer4_cycle_cat'] as $cats) {					
                                                            if($cats==$cat->term_id) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->cat_name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->cat_name.'" />';
                                        
                                                            $option .= ' '.$cat->cat_name;
                                                            $option .= ' ('.$cat->category_count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }
                                                    
                                                        ?>     
                                                        </div>
                                                        <?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                                                        <div id="layer4-data-3">
                                                        <div class="label-wrap"><label for="skin_id_layer4_cycle_flickr"><strong>Flickr Sets</strong></label></div><br class="clear" />
                                                        <select id="skin_id_layer4_cycle_flickr" name="skin_id_layer4_cycle_flickr">
                                                        <?php 
														require_once(NV_FILES."/adm/inc/phpFlickr/phpFlickr.php");
														$f = new phpFlickr(get_option('flickr_apikey')); // API
														$user = get_option('flickr_userid');
														$ph_sets = $f->photosets_getList($user);
												
														foreach ($ph_sets['photoset'] as $ph_set):
															if(!$ph_set) { ?>
																	<option value="">No Sets Found</option>            	
															<?php } else {?>
																	<option value="">Select Flickr Set</option>
																	<option value="<?php echo $ph_set['id']; ?>" <?php if($get_skin_data['skin_id_layer4_cycle_flickr']==$ph_set['id']) { ?> selected="selected" <?php } ?>><?php echo  $ph_set['title']; ?></option>     
																	<?php }
														endforeach; ?>
                                                        </select>
                                                        </div>  
                                                        <?php } ?>              
                                                        <?php if(get_option('slideset_enable')=='enable') { ?>       
														<div id="layer4-data-4">
                                                        <div class="label-wrap"><label for="skin_id_layer4_cycle_slideset"><strong>Gallery Slide Sets</strong></label></div><div class="clear"></div>
                                                        <?php 		
                                                            $slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
                                                            $slideset_data_ids = explode(",", $slideset_data_ids);
                                    
                                                            if($slideset_data_ids) {			
                                                                    foreach ($slideset_data_ids as $slideset_data_ids) {
                                                                        $option='<input type="checkbox" id="skin_id_layer4_cycle_slideset[]" name="skin_id_layer4_cycle_slideset[]"';		
                                                                        if (is_array($get_skin_data['skin_id_layer4_cycle_slideset'])) {
                                                                        foreach ($get_skin_data['skin_id_layer4_cycle_slideset'] as $slidesets) {					
                                                                            if($slidesets==$slideset_data_ids) {
                                                                                $option=$option.' checked="checked"'; 
                                                                            }
                                                                        }
                                                                        } else {
                                                                            if($get_skin_data['skin_id_layer4_cycle_slideset']==$slideset_data_ids) {
                                                                                $option=$option.' checked="checked"'; 
                                                                            } 										
                                                                        }
                                                                        $option .= ' value="'.$slideset_data_ids.'" />';
                                                    
                                                                        $option .= ' '.$slideset_data_ids;
                                                                        $option .= '<br />';
                                                                        echo $option;
                                                                    }
                                                            }						
                                                                            
                                                        ?>
                                                        </div>
                                                        <?php } ?>
                                                        <?php if(class_exists('WPSC_Query')) { ?>                                                        
                                                        <div id="layer4-data-5">
                                                        <div class="label-wrap"><label for="skin_id_layer4_cycle_prodcat"><strong>Product Categories</strong></label></div><div class="clear"></div>
														<?php
														
														if( class_exists('Woocommerce') ) : 
															
														  $categories=  get_terms('product_cat', 'orderby=name&hide_empty=0');
														  
														else : 
														  
														  $categories=  get_terms('wpsc_product_category', 'orderby=name&hide_empty=0');
														  
														endif;

					
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer4_cycle_prodcat[]" name="skin_id_layer4_cycle_prodcat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer4_cycle_prodcat'])) {
                                                            foreach ($get_skin_data['skin_id_layer4_cycle_prodcat'] as $cats) {					
                                                            if($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->name.'" />';
                                        
                                                            $option .= ' '.$cat->name;
                                                            $option .= ' ('.$cat->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }	?><br />
                                                        <div class="label-wrap"><label for="skin_id_layer4_cycle_prodtag"><strong>Product Tags</strong></label></div><div class="clear"></div>
                                                        <?php
														$tags=  get_terms('product_tag', 'orderby=name&hide_empty=1');
														
                                                        foreach ($tags as $tag) {
                                                            $option='<input type="checkbox" id="skin_id_layer4_cycle_prodtag[]" name="skin_id_layer4_cycle_prodtag[]"';
                                                            if (is_array($get_skin_data['skin_id_layer4_cycle_prodtag'])) {
                                                            foreach ($get_skin_data['skin_id_layer4_cycle_prodtag'] as $tags) {					
                                                            if($tags==$tag->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($tags==$tag->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$tag->name.'" />';
                                        
                                                            $option .= ' '.$tag->name;
                                                            $option .= ' ('.$tag->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          } ?>
                                                        
                                                        </div>
                                                        <?php } ?>
 														<div id="layer4-data-6">
                                                        <div class="label-wrap"><label for="skin_id_layer4_cycle_mediacats"><strong>Gallery Media Categories</strong></label></div><div class="clear"></div>
														<?php
														
														$categories=  get_terms('media-category', 'orderby=name&hide_empty=0');
					
                                                        foreach ($categories as $cat) {
                                                            $option='<input type="checkbox" id="skin_id_layer4_cycle_mediacat[]" name="skin_id_layer4_cycle_mediacat[]"';
                                                            if (is_array($get_skin_data['skin_id_layer4_cycle_mediacat'])) {
                                                            foreach ($get_skin_data['skin_id_layer4_cycle_mediacat'] as $cats) {					
                                                            if($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            } elseif($cats==$cat->name) {
                                                                $option=$option.' checked="checked"'; 
                                                            }
                                                            }
                                                            }
                                                            $option .= ' value="'.$cat->name.'" />';
                                        
                                                            $option .= ' '.$cat->name;
                                                            $option .= ' ('.$cat->count.')';
                                                            $option .= '<br />';
                                                            echo $option;
                                                          }	?><br />
                                                          </div>                                                                                                       
                                                    </td>							
                                                </tr>                                                                            
										</table>                         
                                    </td>
								</tr><?php //******** layer4 END ?>                      
							</table>                                                           
						</div>
					</td>
				</tr>                         
			</tbody>    
		</table>
                	</td>
				</tr>                
			</tbody>               
		</table>
		<p>&nbsp;</p>    
	</div>
</div>
<p><input type="submit" class="button-primary skin-save" id="save-skin" value="<?php _e('Save Skin Preset','NorthVantage'); ?>" name="save" /></p>
<input type="hidden" name="action" value="update" />             
</form>
</div>
