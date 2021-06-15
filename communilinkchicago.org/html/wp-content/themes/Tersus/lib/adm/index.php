<?php
function handleAdminMenu() {
    // You have to add one to the "post" writing/editing page, and one to the "page" writing/editing page
    add_meta_box('shortcodegen', 'Shortcode Generator', 'insertForm', 'post', 'normal', 'high');
    add_meta_box('shortcodegen', 'Shortcode Generator', 'insertForm', 'page', 'normal', 'high');
	add_meta_box('shortcodegen', 'Shortcode Generator', 'insertForm', 'portfolio', 'normal', 'high');
}

add_action('admin_menu', 'handleAdminMenu');

function insertForm() { ?>

<script type="text/javascript" charset="utf8" > // Load Sections
jQuery(document).ready(function() {
	toggle_shrtcode('none','dynshortcode_selector');
	toggle_shrtcode('twocolumns','dynshortcode_columns');
	toggle_shrtcode('postgallery_image','dynshortcode_postgallery');	
	toggle_shrtcode('sc-nodata','sc_datasource_selector');	
	toggle_shrtcode('linkbutton','dynshortcode_button_type');	
});
</script>
        <table class="form-table">
             <tr valign="top">
                <td width="140px" ><label for="dynshortcode_bar"><strong><?php _e('Shortcode:','NorthVantage');?></strong></label></td>
                <td >
                    <select name="dynshortcode[selector]" id="dynshortcode_selector" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_selector')">
						<option value="none">Select Shortcode</option>
						<option value="postgallery">Gallery</option>
                        <option value="columnlayout">Columns</option>
						<option value="styledboxes">Styled Boxes</option>
                        <option value="button">Button</option>
                        <option value="dividers">Dividers</option>
                        <option value="blockquote">Block Quote</option>
                        <option value="highlight">Highlight</option>
                        <option value="imgeffect">Image Shortcode</option>
                        <option value="videoshortcode">Video Shortcode</option>
                        <option value="audioshortcode">Audio Shortcode</option>
					    <option value="tabs">Tabs</option>
                        <option value="accordion">Accordion</option> 
                        <option value="list">List</option>  
                        <option value="reveal">Reveal Content</option>
                        <option value="dropcaps">Drop Caps</option>
                        <option value="contactform">Contact Form</option>
                        <option value="socialicons">Social Icons</option>
                        <option value="pricetable">Pricing Table</option>
						<option value="tooltips">ToolTips</option>
                        <option value="content_animator">Content Animator</option>
                        <option value="recentposts">Recent Posts</option>
                    </select>
                </td>
            </tr>
		</table>
        <div id="none"></div>

       <div id="postgallery">
        <small class="description">Select gallery type and categories to use.</small>
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><strong><label for="dynshortcode_postgallery" style="color:#669900"><?php _e('Select Type:','NorthVantage');?></label></strong></td>
                <td>
					<select name="dynshortcode[postgallery]" id="dynshortcode_postgallery" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_postgallery')">
						<option value="postgallery_image">Stage Gallery</option>
                        <option value="postgallery_slider">Group Slider Gallery</option>
                        <option value="postgallery_grid">Grid Gallery</option>
						<option value="postgallery_accordion">Accordion Gallery</option>
                        <option value="postgallery_islider">iSlider Gallery</option>
                        <option value="postgallery_nivo">Nivo Gallery</option>    
					</select>
                </td>
            </tr>
            </table>
         <div id="postgallery_image">
		<table class="form-table">       
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_image_imgw"><?php _e('Gallery Width:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_image_imgw]" id="dynshortcode_pg_image_imgw" /> px
                </td>
                <td width="140px" ><label for="dynshortcode_pg_image_imgh"><?php _e('Gallery Height:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_image_imgh]" id="dynshortcode_pg_image_imgh" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_image_animation"><?php _e('Animation Type:','NorthVantage');?></label></td>
                <td >
    			<select id="dynshortcode_pg_image_animation" name="dynshortcode[pg_image_animation]" class="widefat" style="width:auto">
            	<?php 
    			$animation_types = array("fade","blindY","blindZ","blindX","cover","curtainX","curtainY","fadeZoom","growX","growY","none","scrollUp","scrollDown","scrollLeft","scrollRight","scrollHorz","scrollVert","shuffle","slideX","slideY","toss","turnUp","turnDown","turnLeft","turnRight","uncover","wipe","zoom");
    		 
                      foreach ($animation_types as $animation_type) {
    					$option = '<option value="'.$animation_type.'">';
    					$option .= $animation_type;
                        $option .= '</option>';
                        echo $option;
                } ?>	
    
            	</select>  
                </td>
                <td width="140px" ><label for="dynshortcode_pg_image_tween"><?php _e('Animation Tweening:','NorthVantage');?></label></td>
                <td >
    			<select id="dynshortcode_pg_image_tween" name="dynshortcode[pg_image_tween]" class="widefat" style="width:auto">
            	<?php 
				$tween_types = array("linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce");
		 
                  foreach ($tween_types as $tween_type) {
					$option = '<option value="'.$tween_type.'">';
                    $option .= $tween_type;
                    $option .= '</option>';
                    echo $option;
                } ?>
            	</select>  
                </td>
            </tr>
            <tr>
                <td width="140px" ><label for="dynshortcode_pg_imagenav"><?php _e('Navigation:','NorthVantage');?></label></td>
                <td colspan="3">
                 	<select name="dynshortcode[pg_imagenav]" id="dynshortcode_pg_imagenav">
						<option value="">Bullet Nav</option>
						<option value="enabled">Bullet Nav+Left/Right</option>      
						<option value="disabled">Disable All Nav</option>                
					</select>                        
                </td>                
            </tr>              
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_imagetimeout"><?php _e('Slides Timeout:','NorthVantage');?></label></td>
                <td colspan="3">
                    <input type="text" style="width:50px;" name="dynshortcode[pg_imagetimeout]" id="dynshortcode_pg_imagetimeout" /> seconds <br />
					<small class="description">Default 10 seconds</small>
                </td>
            </tr>
                   
        </table>         
         </div>
 
        <div id="postgallery_slider">
		<table class="form-table">       
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_slider_content"><?php _e('Gallery Content','NorthVantage');?></label></td>
                <td colspan="3">
                 	<select name="dynshortcode[pg_slider_content]" id="dynshortcode_pg_slider_content">
						<option value="textimage">Text/Image</option>
						<option value="titleimage">Title/Image</option>
						<option value="titleoverlay">Title Overlay Image</option>
						<option value="titletextoverlay">Title &amp; Text Overlay Image</option>
						<option value="image">Image Only</option>
						<option value="text">Text Only</option>
					</select>                        
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_slider_columns"><?php _e('Columns','NorthVantage');?></label></td>
                <td colspan="3">
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slider_columns]" id="dynshortcode_pg_slider_columns" /><small class="description">Default is 3 Columns.</small>
                </td>
            </tr>              
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_slidervertical"><?php _e('Enable Vertical Layout:','NorthVantage');?></label></td>
                <td colspan="3">
                	<input name="dynshortcode[pg_slidervertical]" id="dynshortcode_pg_slidervertical" type="checkbox" value="yes" />
                    <small class="description">Alternatively image links to post/url.</small>
                </td>
            </tr>            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_sliderlightbox"><?php _e('Enable Lightbox:','NorthVantage');?></label></td>
                <td colspan="3" >
                	<input name="dynshortcode[pg_sliderlightbox]" id="dynshortcode_pg_sliderlightbox" type="checkbox" value="yes" />
                    <small class="description">Alternatively image links to post/url.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_slider_width"><?php _e('Gallery Width:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slider_width]" id="dynshortcode_pg_slider_width" /> px
                </td>
                <td width="140px" ><label for="dynshortcode_pg_slider_height"><?php _e('Gallery Height:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slider_height]" id="dynshortcode_pg_slider_height" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_slider_imgwidth"><?php _e('Image Width','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slider_imgwidth]" id="dynshortcode_pg_slider_imgwidth" /> px
                </td>
                <td width="140px" ><label for="dynshortcode_pg_slider_imgheight"><?php _e('Image Height','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slider_imgheight]" id="dynshortcode_pg_slider_imgheight" /> px
                </td>
            </tr>                      
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_imgalign"><?php _e('Image Align','NorthVantage');?></label></td>
                <td colspan="3">
                 	<select name="dynshortcode[pg_imgalign]" id="dynshortcode_pg_imgalign">
						<option value="">Center</option>
						<option value="left">Left</option>
                        <option value="right">Right</option>
					</select>                        
                </td>
            </tr>            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_slidertimeout"><?php _e('Slide Timeout:','NorthVantage');?></label></td>
                <td colspan="3">
                    <input type="text" style="width:50px;" name="dynshortcode[pg_slidertimeout]" id="dynshortcode_pg_slidertimeout" /> seconds
                </td>
            </tr>   			
		</table> 
         </div>

        <div id="postgallery_grid">
		<table class="form-table">       
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_grid_content"><?php _e('Gallery Content','NorthVantage');?></label></td>
                <td colspan="3">
                 	<select name="dynshortcode[pg_grid_content]" id="dynshortcode_pg_grid_content">
						<option value="textimage">Text/Image</option>
						<option value="titleimage">Title/Image</option>
						<option value="titleoverlay">Title Overlay Image</option>
						<option value="titletextoverlay">Title &amp; Text Overlay Image</option>						
						<option value="image">Image Only</option>
						<option value="text">Text Only</option>
					</select>                        
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_grid_columns"><?php _e('Columns','NorthVantage');?></label></td>
                <td colspan="3">
                    <input type="text" style="width:50px;" name="dynshortcode[pg_grid_columns]" id="dynshortcode_pg_grid_columns" /><small class="description">Default is 3 Columns.</small>
                </td>
            </tr>  	            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_gridfilter"><?php _e('Animated Filtering','NorthVantage');?></label></td>
                <td colspan="3">
					<input name="dynshortcode[pg_gridfilter]" id="dynshortcode_pg_gridfilter" type="checkbox" value="yes" />  
					<small class="description">Enable <strong>Animated</strong> Category Filtering.</small>               
                </td>
            </tr>  				
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_gridlightbox"><?php _e('Enable Lightbox:','NorthVantage');?></label></td>
                <td colspan="3">
                	<input name="dynshortcode[pg_gridlightbox]" id="dynshortcode_pg_gridlightbox" type="checkbox" value="yes" />
                    <small class="description">Alternatively image links to post/url.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_grid_width"><?php _e('Gallery Width:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_grid_width]" id="dynshortcode_pg_grid_width" /> px
                </td>
                <td width="140px" ><label for="dynshortcode_pg_grid_height"><?php _e('Row Height:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_grid_height]" id="dynshortcode_pg_grid_height" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_grid_imgwidth"><?php _e('Image Width','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_grid_imgwidth]" id="dynshortcode_pg_grid_imgwidth" /> px
                </td>
                <td width="140px" ><label for="dynshortcode_pg_grid_imgheight"><?php _e('Image Height','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_grid_imgheight]" id="dynshortcode_pg_grid_imgheight" /> px
                </td>
            </tr>
		</table> 
         </div>       
        <div id="postgallery_accordion">
		<table class="form-table">       
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_accordion_content"><?php _e('Gallery Content','NorthVantage');?></label></td>
                <td >
                 	<select name="dynshortcode[pg_accordion_content]" id="dynshortcode_pg_accordion_content">
						<option value="textimage">Text/Image</option>
						<option value="titleimage">Title/Image</option>
						<option value="image">Image Only</option>
						<option value="text">Text Only</option>
					</select>                        
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_accordion_minititle"><?php _e('Show Startup Mini Titles','NorthVantage');?></label></td>
                <td >
                 	<select name="dynshortcode[pg_accordion_minititle]" id="dynshortcode_pg_accordion_minititle">
						<option value="enable">Enable</option>
						<option value="disable">Disable</option>
					</select>
                </td>
            </tr>  			  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_accordion_autorotate"><?php _e('Auto Play','NorthVantage');?></label></td>
                <td >
                 	<select name="dynshortcode[pg_accordion_autorotate]" id="dynshortcode_pg_accordion_autorotate">
						<option value="enable">Enable</option>
						<option value="disable">Disable</option>
					</select>                        
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_accordiontimeout"><?php _e('Auto Play Timeout:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_accordiontimeout]" id="dynshortcode_pg_accordiontimeout" /> seconds <small class="description">Default is 10 seconds, Auto Play has to be enabled.</small>
                </td>
            </tr>   			  	
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_accordionlightbox"><?php _e('Enable Lightbox:','NorthVantage');?></label></td>
                <td >
                	<input name="dynshortcode[pg_accordionlightbox]" id="dynshortcode_pg_accordionlightbox" type="checkbox" value="yes" />
                    <small class="description">Alternatively image links to post/url.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_accordion_width"><?php _e('Gallery Width:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_accordion_width]" id="dynshortcode_pg_accordion_width" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_accordion_imgheight"><?php _e('Image Height','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_accordion_imgheight]" id="dynshortcode_pg_accordion_imgheight" /> px
                </td>
            </tr>
		</table> 
         </div> 	
        <div id="postgallery_islider">
        <table class="form-table">       
                <tr valign="top">
                    <td width="140px" ><label for="dynshortcode_pg_isliderlightbox"><?php _e('Enable Lightbox:','NorthVantage');?></label></td>
                    <td >
                        <input name="dynshortcode[pg_isliderlightbox]" id="dynshortcode_pg_isliderlightbox" type="checkbox" value="yes" />
                        <small class="description">Alternatively image links to post/url.</small>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="140px" ><label for="dynshortcode_pg_islider_width"><?php _e('Gallery Width:','NorthVantage');?></label></td>
                    <td >
                        <input type="text" style="width:50px;" name="dynshortcode[pg_islider_width]" id="dynshortcode_pg_islider_width" /> px <small class="description">Optional - this controls the overall width of the gallery.</small>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="140px" ><label for="dynshortcode_pg_islider_height"><?php _e('Gallery Height:','NorthVantage');?></label></td>
                    <td >
                        <input type="text" style="width:50px;" name="dynshortcode[pg_islider_height]" id="dynshortcode_pg_islider_height" /> px <small class="description">Optional - this controls the overall height of the gallery.</small>
                    </td>
                </tr>
                <tr valign="top">
                    <td width="140px" ><label for="dynshortcode_pg_islidertimeout"><?php _e('Slide Timeout:','NorthVantage');?></label></td>
                    <td >
                        <input type="text" style="width:50px;" name="dynshortcode[pg_islidertimeout]" id="dynshortcode_pg_islidertimeout" /> seconds
                    </td>
                </tr>   			
        </table> 
         </div>
         
        <div id="postgallery_nivo">
		<table class="form-table"> 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_nivoeffect"><?php _e('Animation Effect:','NorthVantage');?></label></td>
                <td >
    			<select id="dynshortcode_pg_nivoeffect" name="dynshortcode[pg_nivoeffect]" class="widefat" style="width:auto">
            	<?php 
				$nivo_effects = array("random","sliceDown","sliceDownLeft", "sliceUp", "sliceUpLeft", "sliceUpDown", "sliceUpDownLeft", "fold", "fade", "slideInRight", "slideInLeft", "boxRandom", "boxRain", "boxRainReverse", "boxRainGrow", "boxRainGrowReverse");
		 
                  foreach ($nivo_effects as $nivo_effect) {
					$option = '<option value="'.$nivo_effect.'">';
                    $option .= $nivo_effect;
                    $option .= '</option>';
                    echo $option;
                } ?>
            	</select>  
                </td>
            </tr>              
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_nivolightbox"><?php _e('Enable Lightbox:','NorthVantage');?></label></td>
                <td >
                	<input name="dynshortcode[pg_nivolightbox]" id="dynshortcode_pg_nivolightbox" type="checkbox" value="yes" />
                    <small class="description">Alternatively image links to post/url.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_nivo_width"><?php _e('Gallery Width:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_nivo_width]" id="dynshortcode_pg_nivo_width" /> px <small class="description">Optional - this controls the overall width of the gallery.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_nivo_height"><?php _e('Gallery Height:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_nivo_height]" id="dynshortcode_pg_nivo_height" /> px <small class="description">Optional - this controls the overall height of the gallery.</small>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_nivotimeout"><?php _e('Slide Timeout:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[pg_nivotimeout]" id="dynshortcode_pg_nivotimeout" /> seconds
                </td>
            </tr>   			
		</table> 
         </div>                  	   
         <table class="form-table"> 
            <tr valign="top">
                <td width="140px">
					<label for="sc_datasource_selector" style="color:#39C"><strong><?php _e('Data Source:','NorthVantage');?></strong></label>
                </td>
                <td colspan="3">
                    <p>
                    <select name="sc_datasource[selector]" id="sc_datasource_selector" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'sc_datasource_selector')">
                    <option value="sc-nodata">Select Data Source </option>
                    <option value="sc-data-1">Attached Media</option>
                    <option value="sc-data-6">Gallery Media</option>
                    <option value="sc-data-2">Post Categories</option>
					<?php if(class_exists('WPSC_Query') || class_exists('Woocommerce') ) { ?>
						<option value="sc-data-5">Product Categories / Tags</option>
					<?php } ?>                     
                    <?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                        <option value="sc-data-3">Flickr Set</option>
                    <?php } ?>
                    <?php if(get_option('slideset_enable')=='enable') { ?>
                        <option value="sc-data-4">Slide Set</option>
                    <?php } ?>  
                    </select>
                    </p>
                	<div id="sc-nodata"></div>
                	<div id="sc-data-1">
                    	<label for="dynshortcode_postcat"><strong><?php _e('Enter Post / Page ID:','NorthVantage');?></strong></label><br />
						<input type="text" style="width:50px;" name="dynshortcode[attachedmedia]" id="dynshortcode_attachedmedia" /> <small class="description"> Comma separate for multiple ID's</small>
					</div>
                    <div id="sc-data-2">
            			<label for="dynshortcode_postcat"><strong><?php _e('Select Post Categories:','NorthVantage');?></strong></label><br />
                        <?php
                        $categories=  get_categories(); 
                        foreach ($categories as $cat) {
                            $option='<input type="checkbox" id="dynshortcode_postcat[]" name="dynshortcode_postcat[]"';					
                            $option .= ' value="'.$cat->cat_name.'" />';
        
                            $option .= $cat->cat_name;
                            $option .= ' ('.$cat->category_count.')';
                            $option .= '<br />';
                            echo $option;
                          } ?>
						  
						  <br />
						<label for="dynshortcode_postformat"><strong><?php _e('Display &amp; Filter by Post Format:','NorthVantage');?></strong></label><br />
                        
						<?php $post_formats = get_theme_support( 'post-formats' ); ?>
						
    					<select name="dynshortcode[postformat]" id="dynshortcode_postformat">
							<option value="">Disabled</option>
							<?php foreach ($post_formats[0] as $post_format): ?>
							<option value="<?php echo $post_format; ?>"><?php echo $post_format; ?></option>     
                            <?php endforeach; ?>
                     	</select>
                     </div>
                     <?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                     <div id="sc-data-3">
                     	<label for="dynshortcode_flickrset"><strong><?php _e('Select Flickr Set:','NorthVantage');?></strong></label><br />
                     	 <select name="dynshortcode[flickrset]" id="dynshortcode_flickrset">
							 <?php
                                require_once(NV_FILES."/adm/inc/phpFlickr/phpFlickr.php");
                                $f = new phpFlickr(get_option('flickr_apikey')); // API
                                $user = get_option('flickr_userid');
                                $ph_sets = $f->photosets_getList($user);
                        
                                foreach ($ph_sets['photoset'] as $ph_set):
                                    if(!$ph_set) { ?>
                                            <option value="">No Sets Found</option>            	
                                    <?php } else {?>
                                            <option value="">Select Set</option>
                                            <option value="<?php echo $ph_set['id']; ?>"><?php echo  $ph_set['title']; ?></option>     
                                            <?php }
                                endforeach; 					 
                             ?>
                     	</select>
                     </div>
                     <?php } ?>
                     <?php if(get_option('slideset_enable')=='enable') { ?>
                     <div id="sc-data-4">
                     	<label for="dynshortcode_slideset"><strong><?php _e('Select Slide Set:','NorthVantage');?></strong></label><br />
						<?php
                            $slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
                            $slideset_data_ids = explode(",", $slideset_data_ids);
                    
                            if($slideset_data_ids) {			
                                    foreach ($slideset_data_ids as $slideset_data_ids) {
                                        $option='<input type="checkbox" id="dynshortcode_slideset[]" name="dynshortcode_slideset[]"';					
                                        $option .= ' value="'.$slideset_data_ids.'" />';
                    
                                        $option .= $slideset_data_ids;
                                        $option .= '<br />';
                                        echo $option;
                                    }
                            }
                        ?>					 
                     </div>
                     <?php } ?>
                     <?php if( class_exists('WPSC_Query') || class_exists('Woocommerce') ) { ?>
                     <div id="sc-data-5">
                     	<label for="dynshortcode_productcattag"><strong><?php _e('Select Product Categories:','NorthVantage');?></strong></label><br />
						<?php 

							if( class_exists('Woocommerce') ) : 
										
								$categories=  get_terms('product_cat', 'orderby=name&hide_empty=0');
									  
							else : 
									  
								$categories=  get_terms('wpsc_product_category', 'orderby=name&hide_empty=0');
									  
							endif;
		
							foreach ($categories as $cat) {
								$option='<input type="checkbox" id="dynshortcode_postpcat[]" name="dynshortcode_postpcat[]"';					
								$option .= ' value="'.$cat->name.'" />';
								
								$option .= $cat->name;
								$option .= ' ('.$cat->count.')';
								$option .= '<br />';
								echo $option;
							}
					?>		
                        <label for="dynshortcode_productcattag"><strong><?php _e('Select Product Tags:','NorthVantage');?></strong></label><br /> 
						<?php 
						$tags=  get_terms('product_tag', 'orderby=name&hide_empty=1');
        
                            foreach ($tags as $tag) {
        
                            $option = '<input type="checkbox" id="dynshortcode_posttag[]" name="dynshortcode_posttag[]" '; 
                            
                            if (is_array($data[ $meta_box[ 'name' ]])) {
                            foreach ($data[ $meta_box[ 'name' ]] as $tags) {					
                            if($tags==$tag->name) {
                            $option .= 'checked="checked"'; 
                            }
                            }
                            } else {
                            if($data[ $meta_box[ 'name' ]]==$tag->name) {
                            $option .= 'checked="checked"'; 
                            }
                            }				
                            $option .= ' value="'.$tag->name.'">';
                            $option .= '<small class="description">'.$tag->name;
                            $option .= ' ('.$tag->count.') </small><br />';
                            echo $option;
						} ?>                        
                     </div>
                     <?php } ?>
                      <div id="sc-data-6">
                     	<label for="dynshortcode_mediacat"><strong><?php _e('Select Gallery Media Categories:','NorthVantage');?></strong></label><br />
						<?php 
							$categories=  get_terms('media-category', 'orderby=name&hide_empty=0');
		
							foreach ($categories as $cat) {
								$option='<input type="checkbox" id="dynshortcode_mediacat[]" name="dynshortcode_mediacat[]"';					
								$option .= ' value="'.$cat->name.'" />';
								
								$option .= $cat->name;
								$option .= ' ('.$cat->count.')';
								$option .= '<br />';
								echo $option;
							}
					?>		                       
                     </div>
                </td>
            </tr>   
            <tr valign="top">
                <td width="140px" ><strong><label for="dynshortcode_gallery_id" style="color:#FF0000"><?php _e('Gallery ID:','NorthVantage');?></label></strong></td>
                <td colspan="3">
                    <input type="text" style="width:80px" name="dynshortcode[gallery_id]" id="dynshortcode_gallery_id" /><small class="description">Required if multiple post galleries on page. e.g. 2</small>
                </td>
            </tr>   
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_gallery_title"><?php _e('Gallery  Title:','NorthVantage');?></label></td>
                <td colspan="3">
                    <input type="text" style="width:130px" name="dynshortcode[gallery_title]" id="dynshortcode_gallery_title" />
                </td>
            </tr>                                            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_pg_gallery_align"><?php _e('Gallery Align:','NorthVantage');?></label></td>
                <td colspan="3">
                 	<select name="dynshortcode[pg_gallery_align]" id="dynshortcode_pg_gallery_align">
						<option value="">None</option>
						<option value="alignleft">Left</option>
						<option value="alignright">Right</option>
						<option value="aligncenter">Center</option>                        
					</select>                        
                </td>
            </tr>          
			<tr valign="top">
                <td width="140px" ><label for="dynshortcode_postgallery_imageeffect"><?php _e('Image Effect','NorthVantage');?></label></td>
                <td colspan="3" >
                 	<select name="dynshortcode[postgallery_imageeffect]" id="dynshortcode_postgallery_imageeffect">
						<option value="">No effect</option>
						<option value="shadow">Shadow</option>
						<option value="reflection">Reflect</option>  
						<option value="shadowreflection">Shadow / Reflect</option>
                        <option value="frame">Frame</option>
                        <?php /*<option value="blackwhite">Black &amp; White</option> 
                        <option value="shadowblackwhite">Shadow + Black &amp; White</option>*/ ?>                                                                   
					</select>                        
                </td>
            </tr>            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_postgallery_numposts"><?php _e('Posts Limit:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[postgallery_numposts]" id="dynshortcode_postgallery_numposts" /><small class="description">Limit the number of posts shown.</small>
                </td>
                <td width="140px" ><label for="dynshortcode_postgallery_excerpt"><?php _e('Excerpt Word Limit:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:50px;" name="dynshortcode[postgallery_excerpt]" id="dynshortcode_postgallery_excerpt" /><small class="description">Default is 55 words.</small>
                </td>
            </tr> 			              
             <tr valign="top">
                <td width="140px" ><label for="dynshortcode_postgallery_sortby"><?php _e('Post Sort By','NorthVantage');?></label></td>
                <td >
                 	<select name="dynshortcode[postgallery_sortby]" id="dynshortcode_postgallery_sortby">
                        <option value="">Post Order (Default)</option>
                        <option value="date">Date</option>
                        <option value="rand">Random</option>
                        <option value="title">Title</option>
                     </select>                        
                </td>
                <td width="140px" ><label for="dynshortcode_postgallery_orderby"><?php _e('Post Order By','NorthVantage');?></label></td>
                <td >
                 	<select name="dynshortcode[postgallery_orderby]" id="dynshortcode_postgallery_orderby">
                        <option value="">Ascending (Default)</option>
                        <option value="DESC">Descending</option>
                     </select>                        
                </td>
            </tr>                                                                      
		</table>
        <p>&nbsp;</p>
        <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p><p>&nbsp;</p>
    
        </div>  
 

        <div id="columnlayout">
        <small class="description">Select column layout and paste content (including HTML) into fields.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="wpYourPluginName_content"><?php _e('Layout:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[columns]" id="dynshortcode_columns" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_columns')">
						<option value="twocolumns">2 Columns</option>
						<option value="threecolumns">3 Columns</option>
                        <option value="twothreecolumns">2/3 Columns</option>
						<option value="fourcolumns">4 Columns</option>
                        <option value="threefourcolumns">3/4 Columns</option>
					</select>
                </td>
            </tr>
			<tr>
				<td width="90px" ><label for="dynshortcode_columnsclass"><?php _e('CSS Classes:','NorthVantage');?></label></td>
                <td colspan="3"><input type="text" name="dynshortcode[columnsclass]" id="dynshortcode_columnsclass" /> <small class="description">Add CSS Classes to Columns.</small>  </td>            
            </tr>                                                        
		</table>
        <div id="twocolumns">

		<table class="form-table">       
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_twocol_first"><?php _e('Column 1 Content:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[twocol_first]" id="dynshortcode_twocol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_twocol_second"><?php _e('Column 2 Content','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[twocol_second]" id="dynshortcode_twocol_second" />
                </td>
            </tr>  
        </table>

        </div>
        
        <div id="threecolumns">

		<table class="form-table">       
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_threecol_first"><?php _e('Column 1 Content:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threecol_first]" id="dynshortcode_threecol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_threecol_second"><?php _e('Column 2 Content','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threecol_second]" id="dynshortcode_threecol_second" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_threecol_third"><?php _e('Column 3 Content','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threecol_third]" id="dynshortcode_threecol_third" />
                </td>
            </tr>  
        </table>

        
        </div>
 
         <div id="twothreecolumns">

		<table class="form-table">       
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_threecol_first"><?php _e('1/3 Column Content:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[twothreecol_first]" id="dynshortcode_twothreecol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_threecol_second"><?php _e('2/3 Column Content','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[twothreecol_second]" id="dynshortcode_twothreecol_second" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_23pos"><?php _e('2/3 Column Position','NorthVantage');?></label></td>
                <td >
                 	<select name="dynshortcode[23pos]" id="dynshortcode_23pos">
						<option value="right">Right</option>
						<option value="left">Left</option>
					</select>                   
                </td>
            </tr>  
        </table>

        
        </div>
        
        <div id="fourcolumns">
		<table class="form-table">       
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_fourcol_first"><?php _e('Column 1 Content:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[fourcol_first]" id="dynshortcode_fourcol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_fourcol_second"><?php _e('Column 2 Content','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[fourcol_second]" id="dynshortcode_fourcol_second" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_fourcol_third"><?php _e('Column 3 Content','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[fourcol_third]" id="dynshortcode_fourcol_third" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_fourcol_fourth"><?php _e('Column 4 Content','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[fourcol_fourth]" id="dynshortcode_fourcol_fourth" />
                </td>
            </tr>  
        </table>

        </div>        
        <div id="threefourcolumns">

		<table class="form-table">       
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_threefourcol_first"><?php _e('1/4 Column Content:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threefourcol_first]" id="dynshortcode_threefourcol_first" />
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_threefourcol_second"><?php _e('3/4 Column Content','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:100%;" name="dynshortcode[threefourcol_second]" id="dynshortcode_threefourcol_second" />
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_fourcol_third"><?php _e('3/4 Column Position','NorthVantage');?></label></td>
                <td >
                 	<select name="dynshortcode[34pos]" id="dynshortcode_34pos">
						<option value="right">Right</option>
						<option value="left">Left</option>
					</select>                   
                </td>
            </tr>  
        </table>


        </div>
 		<table class="form-table">
            <tr valign="top">
                <td width="140px" ><label class="tooltip-next" for="dynshortcode_border"><?php _e('Border:','NorthVantage');?></label><div class="tooltip-info"></div><div class="tooltip">This is option will only<br /> function if the Main section <br />of the skin has a <br />border/background or you <br />
 have wrapped the <br />shortcode within a <br />Custom Style Wrap <br />shortcode. </div></td>
                <td >
                	<select name="dynshortcode[border]" id="dynshortcode_border">
						<option value="">No border</option>
						<option value="border">Border</option>
					</select>
                </td>
            </tr>   
			<tr valign="top">
                <td colspan="2" >
                <small class="description">Column height will make all columns of equal height, this is optional.</small>
                </td>
            </tr> 
              <tr valign="top">
                <td width="140px" ><label for="dynshortcode_colheight"><?php _e('Columns Height','NorthVantage');?></label></td>
                <td >
                 <input type="text" style="width:50px" name="dynshortcode[colheight]" id="dynshortcode_colheight" /> px
                </td>
            </tr>   
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>    
        </div>
        
        
        
        <div id="styledboxes">
        <small class="description">Select styled box, enter text for box.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_styledboxes"><?php _e('Select Type:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[styledboxes]" id="dynshortcode_styledboxes" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_styledboxes')">
						<option value="general">General</option>
                        <option value="general shaded">General Shaded</option>
                        <option value="blank">Blank</option>
                        <option value="warning">Warning</option>
						<option value="information">Information</option>
                        <option value="download">Download</option>
						<option value="help">Help</option>                                          
					</select>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_boxwidth"><?php _e('Box Width: <small class="description">(Default 100%)</small>','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[boxwidth]" id="dynshortcode_boxwidth" /> px
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_boxcontent"><?php _e('Box content:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[boxcontent]" id="dynshortcode_boxcontent" />
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_box_align"><?php _e('Alignment:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[box_align]" id="dynshortcode_box_align">
						<option value="">None</option>
						<option value="left">Left</option>
						<option value="right">Right</option>
						<option value="center">Center</option>                        
					</select>
                </td>
            </tr>                                     
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>    
        </div>  
        
        <div id="button">
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_button_type"><?php _e('Button Type:','NorthVantage');?></label></td>
                <td>
                	<select name="dynshortcode[button_type]" id="dynshortcode_button_type" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'dynshortcode_button_type')">
						<option value="linkbutton">Button</option>
						<option value="droppanelbutton">Drop Panel Trigger</option>
					</select>
                </td>
            </tr>        
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_button_color"><?php _e('Color:','NorthVantage');?></label></td>
                <td>
                	<select name="dynshortcode[button_color]" id="dynshortcode_button_color">
						<option value="black">Black</option>
                        <option value="blue-lite">Blue Lite</option>
						<option value="blue">Blue</option>                        
						<option value="green-lite">Green Lite</option>
                        <option value="green">Green</option>
                        <option value="grey-lite">Grey Lite</option> 
						<option value="grey">Grey</option>                            
                        <option value="orange-lite">Orange Lite</option>   
                        <option value="orange">Orange</option>   
                        <option value="pink-lite">Pink Lite</option>   
                        <option value="pink">Pink</option>  
                        <option value="purple-lite">Purple Lite</option>   
                        <option value="purple">Purple</option>  
                        <option value="red-lite">Red Lite</option>
                        <option value="red">Red</option>
                        <option value="teal-lite">Teal Lite</option>   
                        <option value="teal">Teal</option>
                        <option value="transparent">Transparent</option>   
                        <option value="white">White</option>
                        <option value="yellow-lite">Yellow Lite</option>   
                        <option value="yellow">Yellow</option>                      
					</select>
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_button_width"><?php _e('Width:','NorthVantage');?></label></td>
                <td>
                	<select name="dynshortcode[button_width]" id="dynshortcode_button_width">
						<option value="">Normal</option>
						<option value="full">Full</option>
						<option value="threequarter">Three Quarter</option>                                                 
						<option value="half">Half</option>
						<option value="onequarter">One Quarter</option>                        
                  
					</select>
                </td>
            </tr>        
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_button_align"><?php _e('Align:','NorthVantage');?></label></td>
                <td >
                	<select name="dynshortcode[button_align]" id="dynshortcode_button_align">
						<option value="">Left</option>
						<option value="right">Right</option>
                        <option value="center">Center</option>
					</select>
                </td>
            </tr>                              
            </table>
         <div id="linkbutton">
         <table class="form-table">           
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_button_link"><?php _e('Button URL:','NorthVantage');?></label></td>
                <td>
					<input type="text" style="width:200px" name="dynshortcode[button_link]" id="dynshortcode_button_link" />
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_button_text"><?php _e('Button Text:','NorthVantage');?></label></td>
                <td>
					<input type="text" style="width:200px" name="dynshortcode[button_text]" id="dynshortcode_button_text" />
                </td>
            </tr>            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_button_target"><?php _e('Link Target:','NorthVantage');?></label></td>
                <td >
                	<select name="dynshortcode[button_target]" id="dynshortcode_button_target">
						<option value="">Self</option>
						<option value="_blank">Blank Page</option>
					</select>
                </td>
            </tr>                                
		</table> 
        </div>
        <div id="droppanelbutton">
         <table class="form-table">           
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_droppanelbutton_text"><?php _e('Button Text:','NorthVantage');?></label></td>
                <td>
					<input type="text" style="width:100%;" name="dynshortcode[droppanelbutton_text]" id="dynshortcode_droppanelbutton_text" />
                </td>
            </tr>                           
		</table>         
        </div>                
		<p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>    
        </div>

        <div id="dividers">
        <small class="description">Select horizontal break line with or without top link.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_hozbreak"><?php _e('Select Type:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[hozbreak]" id="dynshortcode_hozbreak">
						<option value="divider_line">Line Divider</option>
						<option value="divider_linetop">Line Divder Top Link</option>
                        <option value="divider_shadow">Shadow (Bottom) Divder</option>
                        <option value="divider_shadow_top">Shadow (Top) Divder</option>
                        <option value="divider_blank">Blank</option>
					</select>
                </td>
            </tr>                
		</table>
		<table class="form-table">          
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_divideropacity"><?php _e('Opacity:','NorthVantage');?><br />
<small class="description">Shadow Dividers <strong>ONLY</strong></small></label></td>
                <td >
					<input type="text" style="width:40px" name="dynshortcode[divideropacity]" id="dynshortcode_divideropacity" /><small class="description">% (0-100)</small>
                </td>
            </tr>                    
		</table>                      
        <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>     
        </div>
             
        <div id="blockquote">
        <small class="description">Select block quote type.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_blockquote"><?php _e('Select Type:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[blockquote]" id="dynshortcode_blockquote">
						<option value="blockquote_line">Block Quote Line</option>
						<option value="blockquote_quotes">Block Quote Quotes</option>
					</select>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_blockquote_align"><?php _e('Alignment:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[blockquote_align]" id="dynshortcode_blockquote_align">
                        <option value="left">Left</option>
						<option value="right">Right</option>
                        <option value="center">Center</option>
					</select>
                </td>
            </tr>            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_blockquote_text"><?php _e('Block Quote Text:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[blockquote_text]" id="dynshortcode_blockquote_text" />
                </td>
            </tr>                    
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div> 
        
        <div id="imgeffect">
        <small class="description">Select Image effect.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_imageeffect"><?php _e('Select Effect:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[imageeffect]" id="dynshortcode_imageeffect">
						<option value="none">No Effect</option>
                        <option value="frame">Frame</option>
						<option value="reflect">Reflect</option>
						<option value="shadow">Shadow</option>    
						<option value="shadowreflection">Shadow / Reflect</option>                                                
                        <?php /* <option value="blackwhite">Black &amp; White</option> 
                        <option value="frameblackwhite">Frame + Black &amp; White</option>  
                        <option value="shadowblackwhite">Shadow + Black &amp; White</option>*/ ?>                                                                                         
					</select>
                </td>
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imagelightbox"><?php _e('Enable Lightbox:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[imagelightbox]" id="dynshortcode_imagelightbox">
						<option value="">Disabled</option>
						<option value="yes">Enabled</option>                                              
					</select>
                </td>
            </tr>          
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_imageeffectwidth"><?php _e('Image Width:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:60px;" name="dynshortcode[imageeffectwidth]" id="dynshortcode_imageeffectwidth" /> px
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_imageeffectheight"><?php _e('Image Height:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:60px;" name="dynshortcode[imageeffectheight]" id="dynshortcode_imageeffectheight" /> px
                </td>
            </tr>            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_imageeffecturl"><?php _e('Image URL:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:200px" name="dynshortcode[imageeffecturl]" id="dynshortcode_imageeffecturl" /> 
                     
                    <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="dynshortcode_imageeffecturl" class="thickbox custom_media_uploader">
                    	<img src="/wp-admin/images/media-button-image.gif?ver=20100531" alt="Add an Image" onclick="return false;">
                    </a>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_imageeffectvidurl"><?php _e('Lightbox Media URL:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:200px" name="dynshortcode[imageeffectvidurl]" id="dynshortcode_imageeffectvidurl" />
                    <small class="description">URL of alternative file e.g. youtube video (Lightbox effect only!).</small>
                </td>
            </tr>        
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_imageeffectlinkurl"><?php _e('Link URL:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[imageeffectlinkurl]" id="dynshortcode_imageeffectlinkurl" />
                </td>
            </tr>                
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_imageeffectalt"><?php _e('Image Title Text:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[imageeffectalt]" id="dynshortcode_imageeffectalt" />
                </td>
            </tr>          
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_alttextoverlay"><?php _e('Enable Title Text Overlay:','NorthVantage');?></label></td>
                <td >
                	<input name="dynshortcode[alttextoverlay]" id="dynshortcode_alttextoverlay" type="checkbox" value="yes" />
                    <small class="description">Overlay the title text on the image when mouse is rolled over.</small>
                </td>
            </tr>			  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_imageeffectalign"><?php _e('Alignment:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[imageeffectalign]" id="dynshortcode_imageeffectalign">
						<option value="">None</option>
						<option value="alignleft">Left</option>
						<option value="alignright">Right</option>
						<option value="aligncenter">Center</option>                        
					</select>
                </td>
            </tr>                                          
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>

        <div id="videoshortcode">
        <small class="description">Embed Video.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_videoshortcode"><?php _e('Select Video Type:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[videoshortcode]" id="dynshortcode_videoshortcode">
						<option value="youtube">YouTube</option>
						<option value="vimeo">Vimeo</option>
						<option value="flash">Flash</option>    
						<option value="jwplayer">JW Player</option>                                                                                         
					</select>
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_videoshortcode"><?php _e('Video Ratio:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[videoratio]" id="dynshortcode_videoratio">
						<option value="sixteen_by_nine">16:9</option>
						<option value="four_by_three">4:3</option>                                                                                    
					</select>
                </td>
            </tr>                        
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_videoshortcodewidth"><?php _e('Video Width:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:60px" name="dynshortcode[videoshortcodewidth]" id="dynshortcode_videoshortcodewidth" /> px
                </td>
            </tr>     
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_videoshortcodeurl"><?php _e('Video URL:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:200px" name="dynshortcode[videoshortcodeurl]" id="dynshortcode_videoshortcodeurl" />
                </td>
            </tr>            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_videoshortcodeimgurl"><?php _e('JW Player Image URL:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:200px" name="dynshortcode[videoshortcodeimgurl]" id="dynshortcode_videoshortcodeimgurl" />
					<small class="description">Enter holding image URL for JW Player videos.</small> 
                </td>
            </tr>   
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_videoshortcodeid"><?php _e('Video ID:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:18%;" name="dynshortcode[videoshortcodeid]" id="dynshortcode_videoshortcodeid" /><small class="description">Required if multiple jw player videos on a page. e.g. 2</small>
                </td>
            </tr>  			
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_videoshortcodeautoplay"><?php _e('Video  Autoplay:','NorthVantage');?></label></td>
                <td >
                	<input name="dynshortcode[videoshortcodeautoplay]" id="dynshortcode_videoshortcodeautoplay" type="checkbox" value="yes" />
                </td>
            </tr>
            <tr>
				<td width="90px" ><label for="dynshortcode_videoshortcode_shadowsize"><?php _e('Enable Shadow Effect:','NorthVantage');?></label></td>
                <td colspan="3"><input name="dynshortcode[videoshortcode_shadowsize]" id="dynshortcode_videoshortcode_shadowsize" type="checkbox" value="yes" /></td>            
            </tr>            							  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_videoshortcodealign"><?php _e('Alignment:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[videoshortcodealign]" id="dynshortcode_videoshortcodealign">
						<option value="">None</option>
						<option value="alignleft">Left</option>
						<option value="alignright">Right</option>
						<option value="aligncenter">Center</option>                        
					</select>
                </td>
            </tr>                                          
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>

        <div id="audioshortcode">
        <small class="description">Embed Audio.</small>   
        <table class="form-table">           
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_audioshortcodewidth"><?php _e('Audio Player Width:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:60px" name="dynshortcode[audioshortcodewidth]" id="dynshortcode_audioshortcodewidth" /> px
                </td>
            </tr>          
             <tr valign="top">
                <td width="140px" ><label for="dynshortcode_audioshortcodeurl"><?php _e('Audio URL:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:200px" name="dynshortcode[audioshortcodeurl]" id="dynshortcode_audioshortcodeurl" />
                </td>
            </tr>            
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_audioshortcodeimgurl"><?php _e('Cover Image URL:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:200px" name="dynshortcode[audioshortcodeimgurl]" id="dynshortcode_audioshortcodeimgurl" />
					<small class="description">Enter cover image URL for the JW Player (optional).</small> 
                </td>
            </tr>   
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_audioshortcodeid"><?php _e('Audio ID:','NorthVantage');?></label></td>
                <td >
                    <input type="text" style="width:18%;" name="dynshortcode[audioshortcodeid]" id="dynshortcode_audioshortcodeid" /><small class="description">Required if multiple JW Player's on a page. e.g. 2</small>
                </td>
            </tr>  			
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_audioshortcodeautoplay"><?php _e('Audio  Autoplay:','NorthVantage');?></label></td>
                <td >
                	<input name="dynshortcode[audioshortcodeautoplay]" id="dynshortcode_audioshortcodeautoplay" type="checkbox" value="yes" />
                </td>
            </tr>
            <tr>
				<td width="90px" ><label for="dynshortcode_audioshortcode_shadowsize"><?php _e('Enable Shadow Effect:','NorthVantage');?></label></td>
                <td colspan="3"><input name="dynshortcode[audioshortcode_shadowsize]" id="dynshortcode_audioshortcode_shadowsize" type="checkbox" value="yes" /></td>            
            </tr>            							  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_audioshortcodealign"><?php _e('Alignment:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[audioshortcodealign]" id="dynshortcode_audioshortcodealign">
						<option value="">None</option>
						<option value="alignleft">Left</option>
						<option value="alignright">Right</option>
						<option value="aligncenter">Center</option>                        
					</select>
                </td>
            </tr>                                          
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>        
                 
        <div id="highlight">
        <small class="description">Select Hightlight type and enter text (Light Highlight is based on theme link colour).</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_highlight"><?php _e('Select Type:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[highlight]" id="dynshortcode_highlight">
						<option value="one">Highlight Light</option>
						<option value="two">Highlight Dark</option>
					</select>
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_highlight_text"><?php _e('Highlighted Text:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[highlight_text]" id="dynshortcode_highlight_text" />
                </td>
            </tr>                            
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>  
        <div id="tabs">
        <small class="description">Enter Number of Tabs Required and click <em>"Send Shortcode to Editor"</em>.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_numtabs"><?php _e('Enter Number of Tabs:','NorthVantage');?></label></td>
                <td>
					<input type="text" style="width:35px;" name="dynshortcode[numtabs]" id="dynshortcode_numtabs" />
                </td>
            </tr>    
			<tr>
				<td width="90px" ><label for="dynshortcode_tabsclass"><?php _e('CSS Classes:','NorthVantage');?></label></td>
                <td colspan="3"><input type="text" name="dynshortcode[tabsclass]" id="dynshortcode_tabsclass" /> <small class="description">Add CSS Classes to Tab Panels.</small>  </td>            
            </tr>                                                 
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>
        <div id="accordion">
        <small class="description">Enter Number of Accordion Panels Required.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_numaccordion"><?php _e('Enter Number of Panels:','NorthVantage');?></label></td>
                <td>
					<input type="text" style="width:35px;"  name="dynshortcode[numaccordion]" id="dynshortcode_numaccordion" />
                </td>
            </tr>
			<tr>
				<td width="90px" ><label for="dynshortcode_accordionclass"><?php _e('CSS Classes:','NorthVantage');?></label></td>
                <td colspan="3"><input type="text" name="dynshortcode[accordionclass]" id="dynshortcode_accordionclass" /> <small class="description">Add CSS Classes to Accordion Panels.</small>  </td>            
            </tr>            
            <tr>
				<td width="90px" ><label for="dynshortcode_accordioncollapse"><?php _e('Collapse Panels:','NorthVantage');?></label></td>
                <td colspan="3"><input name="dynshortcode[accordioncollapse]" id="dynshortcode_accordioncollapse" type="checkbox" value="yes" /> <small class="description">Panels will be collapsed on startup.</small>  </td>            
            </tr>                 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_accordioncolor"><?php _e('Select Arrow Color:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[accordioncolor]" id="dynshortcode_accordioncolor">
                    	<option value="black">Black</option>
						<option value="blue-lite">Blue Lite</option>
						<option value="blue">Blue</option>                        
						<option value="green-lite">Green Lite</option>
                        <option value="green">Green</option>
                        <option value="grey-lite">Grey Lite</option>
						<option value="grey">Grey</option>                             
                        <option value="orange-lite">Orange Lite</option>   
                        <option value="orange">Orange</option>   
                        <option value="pink-lite">Pink Lite</option>   
                        <option value="pink">Pink</option>  
                        <option value="purple-lite">Purple Lite</option>   
                        <option value="purple">Purple</option>  
                        <option value="red-lite">Red Lite</option>
                        <option value="red">Red</option>
                        <option value="teal-lite">Teal Lite</option>   
                        <option value="teal">Teal</option>
                        <option value="transparent">Transparent</option>   
                        <option value="white">White</option>
                        <option value="yellow-lite">Yellow Lite</option>   
                        <option value="yellow">Yellow</option>                                                                                                    
					</select>
                </td>
            </tr>                                                   
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>        
        <div id="list"> 
        <small class="description">Select list type and color plus how many list items.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_highlight"><?php _e('Select List Type:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[liststyle]" id="dynshortcode_liststyle">
						<option value="arrow">Arrow</option>
						<option value="check">Check</option>
                        <option value="orb">Bullet</option>
                        <option value="cross">Cross</option>
                        
					</select>
                </td>
            </tr>        
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_listcolor"><?php _e('Select Color:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[listcolor]" id="dynshortcode_listcolor">
                    	<option value="black">Black</option>
						<option value="blue-lite">Blue Lite</option>
						<option value="blue">Blue</option>                        
						<option value="green-lite">Green Lite</option>
                        <option value="green">Green</option>
                        <option value="grey-lite">Grey Lite</option> 
						<option value="grey">Grey</option>                          
                        <option value="orange-lite">Orange Lite</option>   
                        <option value="orange">Orange</option>   
                        <option value="pink-lite">Pink Lite</option>   
                        <option value="pink">Pink</option>  
                        <option value="purple-lite">Purple Lite</option>   
                        <option value="purple">Purple</option>  
                        <option value="red-lite">Red Lite</option>
                        <option value="red">Red</option>
                        <option value="teal-lite">Teal Lite</option>   
                        <option value="teal">Teal</option>
                        <option value="transparent">Transparent</option>   
                        <option value="white">White</option>
                        <option value="yellow-lite">Yellow Lite</option>   
                        <option value="yellow">Yellow</option>
					</select>
                </td>
            </tr>             
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_numlist"><?php _e('Enter Number of List Items:','NorthVantage');?></label></td>
                <td>
					<input type="text" style="width:35px;"  name="dynshortcode[numlist]" id="dynshortcode_numlist" />
                </td>
            </tr>                                         
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>        
		<div id="reveal"> 
        <small class="description">Select list type and color plus how many list items.</small>   
        <table class="form-table">
           <tr valign="top">
               <td width="140px" ><label for="dynshortcode_revealtitle"><?php _e('Reveal Title:','NorthVantage');?></label></td>
               <td >
					<input type="text" style="100px;" name="dynshortcode[revealtitle]" id="dynshortcode_revealtitle" />
               </td>
           </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_revealcolor"><?php _e('Select Color:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[revealcolor]" id="dynshortcode_revealcolor">
                    	<option value="black">Black</option>
						<option value="blue-lite">Blue Lite</option>
						<option value="blue">Blue</option>                        
						<option value="green-lite">Green Lite</option>
                        <option value="green">Green</option>
                        <option value="grey-lite">Grey Lite</option>
						<option value="grey">Grey</option>                           
                        <option value="orange-lite">Orange Lite</option>   
                        <option value="orange">Orange</option>   
                        <option value="pink-lite">Pink Lite</option>   
                        <option value="pink">Pink</option>  
                        <option value="purple-lite">Purple Lite</option>   
                        <option value="purple">Purple</option>  
                        <option value="red-lite">Red Lite</option>
                        <option value="red">Red</option>
                        <option value="teal-lite">Teal Lite</option>   
                        <option value="teal">Teal</option>
                        <option value="transparent">Transparent</option>   
                        <option value="white">White</option>
                        <option value="yellow-lite">Yellow Lite</option>   
                        <option value="yellow">Yellow</option>                                                                                                    
					</select>
                </td>
            </tr>           
           <tr valign="top">
                <td width="140px" ><label for="dynshortcode_revealcontent"><?php _e('Box content:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[revealcontent]" id="dynshortcode_revealcontent" />
                </td>
           </tr> 
           <tr valign="top">
                <td width="140px" ><label for="dynshortcode_revealwidth"><?php _e('Box Width: <small class="description">(Default 100%)</small>','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[revealwidth]" id="dynshortcode_revealwidth" /> px
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_revealalign"><?php _e('Alignment:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[revealalign]" id="dynshortcode_revealalign">
						<option value="">None</option>
						<option value="left">Left</option>
						<option value="right">Right</option>
						<option value="center">Center</option>                        
					</select>
                </td>
            </tr>                                                          
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>        
		<div id="dropcaps"> 
        <small class="description">Select list type and color plus how many list items.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_dropcapstyle"><?php _e('Drop Cap Style:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[dropcapstyle]" id="dynshortcode_dropcapstyle">
						<option value="one">Style One</option>
						<option value="two">Style Two</option>                 
					</select>
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_dropcapcolor"><?php _e('Select Color:','NorthVantage');?></label></td>
                <td>
					<select name="dynshortcode[dropcapcolor]" id="dynshortcode_dropcapcolor">
                    	<option value="black">Black</option>
						<option value="blue-lite">Blue Lite</option>
						<option value="blue">Blue</option>                        
						<option value="green-lite">Green Lite</option>
                        <option value="green">Green</option>
                        <option value="grey-lite">Grey Lite</option> 
						<option value="grey">Grey</option>                            
                        <option value="orange-lite">Orange Lite</option>   
                        <option value="orange">Orange</option>   
                        <option value="pink-lite">Pink Lite</option>   
                        <option value="pink">Pink</option>  
                        <option value="purple-lite">Purple Lite</option>   
                        <option value="purple">Purple</option>  
                        <option value="red-lite">Red Lite</option>
                        <option value="red">Red</option>
                        <option value="teal-lite">Teal Lite</option>   
                        <option value="teal">Teal</option>
                        <option value="transparent">Transparent</option>   
                        <option value="white">White</option>
                        <option value="yellow-lite">Yellow Lite</option>   
                        <option value="yellow">Yellow</option>                                                                                                    
					</select>
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_dropcap"><?php _e('Drop Cap Text:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[dropcap]" id="dynshortcode_dropcap" />
                </td>
            </tr>                                     
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>
		<div id="contactform"> 
        <small class="description">Add a contact form to your page.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_contact_id"><?php _e('Contact Form ID:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[contact_id]" id="dynshortcode_contact_id" /><small class="description">Required for Multiple Contact Forms.</small>
                </td>
            </tr>  
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_contact_emailto"><?php _e('Email To:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:150px;" name="dynshortcode[contact_emailto]" id="dynshortcode_contact_emailto" /><small class="description">Optional, uses Admin Email if blank.</small>
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_contact_thankyou"><?php _e('Thank You Message:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:300px;" name="dynshortcode[contact_thankyou]" id="dynshortcode_contact_thankyou" /><small class="description">Optional, uses default message if blank.</small>
                </td>
            </tr>                                                             
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>
		<div id="socialicons"> 
        <small class="description">Add social icons to your page.</small><small class="description"><strong>Alternative URL</strong> is optional, by default the shortcode uses URL set in <a href="/wp-admin/admin.php?page=socialmedia">Social Media Options</a> page. </small>
        <table class="form-table">
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_align">Align Social Icons:</label></td>
                <td colspan="3">
					<select name="dynshortcode[social_align]" id="dynshortcode_social_align">
						<option value="">Select</option>
                        <option value="left">Left</option>
						<option value="right">Right</option>                        
						<option value="center">Center</option>                                                                                                   
					</select>                
                </td>
            </tr>
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_share">Share Icon:</label></td>
                <td colspan="3"><input name="dynshortcode[social_share]" id="dynshortcode_social_share" type="checkbox" value="yes" /><small class="description">Social icons are displayed when the Share Icon is clicked.</small></td>
            </tr>
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_digg">Digg:</label></td>
                <td width="20px"><input name="dynshortcode[social_digg]" id="dynshortcode_social_digg" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_digg_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_digg_url]" id="dynshortcode_social_digg_url" /><small class="description">Optional</small></td>
            </tr>
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_fb">Facebook:</label></td>
                <td width="20px"><input name="dynshortcode[social_fb]" id="dynshortcode_social_fb" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_fb_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_fb_url]" id="dynshortcode_social_fb_url" /><small class="description">Optional</small></td>
            </tr>
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_linkedin">LinkedIn:</label></td>
                <td width="20px"><input name="dynshortcode[social_linkedin]" id="dynshortcode_social_linkedin" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_linkedin_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_linkedin_url]" id="dynshortcode_social_linkedin_url" /><small class="description">Optional</small></td>
            </tr> 
             <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_deli">Del.icio.us:</label></td>
                <td width="20px"><input name="dynshortcode[social_deli]" id="dynshortcode_social_deli" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_deli_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_deli_url]" id="dynshortcode_social_deli_url" /><small class="description">Optional</small></td>
            </tr>
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_reddit">Reddit:</label></td>
                <td width="20px"><input name="dynshortcode[social_reddit]" id="dynshortcode_social_reddit" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_reddit_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_reddit_url]" id="dynshortcode_social_reddit_url" /><small class="description">Optional</small></td>
            </tr>
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_stumble">Stumble Upon:</label></td>
                <td width="20px"><input name="dynshortcode[social_stumble]" id="dynshortcode_social_stumble" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_stumble_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_stumble_url]" id="dynshortcode_social_stumble_url" /><small class="description">Optional</small></td>
            </tr> 
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_twitter">Twitter:</label></td>
                <td width="20px"><input name="dynshortcode[social_twitter]" id="dynshortcode_social_twitter" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_twitter_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_twitter_url]" id="dynshortcode_social_twitter_url" /><small class="description">Optional</small></td>
            </tr> 
			<tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_google">Google Plus:</label></td>
                <td width="20px"><input name="dynshortcode[social_google]" id="dynshortcode_social_google" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_google_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_google_url]" id="dynshortcode_social_google_url" /><small class="description">Optional</small></td>
            </tr>                
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_rss">RSS:</label></td>
                <td width="20px"><input name="dynshortcode[social_rss]" id="dynshortcode_social_rss" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_rss_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_rss_url]" id="dynshortcode_social_rss_url" /><small class="description">Optional</small></td>
            </tr> 
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_youtube">YouTube:</label></td>
                <td width="20px"><input name="dynshortcode[social_youtube]" id="dynshortcode_social_youtube" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_youtube_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_youtube_url]" id="dynshortcode_social_youtube_url" /><small class="description">Optional</small></td>
            </tr> 
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_vimeo">Vimeo:</label></td>
                <td width="20px"><input name="dynshortcode[social_vimeo]" id="dynshortcode_social_vimeo" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_vimeo_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_vimeo_url]" id="dynshortcode_social_vimeo_url" /><small class="description">Optional</small></td>
            </tr>    
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_pinterest">Pinterest:</label></td>
                <td width="20px"><input name="dynshortcode[social_pinterest]" id="dynshortcode_social_pinterest" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_pinterest_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_pinterest_url]" id="dynshortcode_social_pinterest_url" /><small class="description">Optional</small></td>
            </tr>   
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_instagram">Instagram:</label></td>
                <td width="20px"><input name="dynshortcode[social_instagram]" id="dynshortcode_social_instagram" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_instagram_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_instagram_url]" id="dynshortcode_social_instagram_url" /><small class="description">Optional</small></td>
            </tr> 
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_soundcloud">Soundcloud:</label></td>
                <td width="20px"><input name="dynshortcode[social_soundcloud]" id="dynshortcode_social_soundcloud" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_soundcloud_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_soundcloud_url]" id="dynshortcode_social_soundcloud_url" /><small class="description">Optional</small></td>
            </tr>                           
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_email">Email:</label></td>
                <td width="20px"><input name="dynshortcode[social_email]" id="dynshortcode_social_email" type="checkbox" value="yes" /></td>
                <td width="140px" ><label for="dynshortcode_social_email_url">Alternative URL:</label></td>
                <td ><input type="text" style="width:150px;" name="dynshortcode[social_email_url]" id="dynshortcode_social_email_url" /><small class="description">Optional</small></td>
            </tr>                                                                                                                                                     
		</table>        <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>
        </div>  
		<div id="pricetable"> 
         
        
        
        
        <table class="form-table">
            <tr valign="top">
                <td width="140px" >
                	<small class="description">Add a Pricing Table.</small> 
                </td>
                <td >
					<strong class="tooltip-next" for="dynshortcode_tooltip_trigger"><?php _e('Tip','NorthVantage');?></strong><div class="tooltip-info"></div><div class="tooltip">Once code has been sent to the editor - enter the text <strong>droppaneltrigger </strong> into the URL attribute to trigger the Drop Panel.</div> 
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" >
                	<label for="dynshortcode_customstyle_id"><?php _e('Columns:','NorthVantage');?></label>
                </td>
                <td >
					<select name="dynshortcode[pricetable_columns]" id="dynshortcode_pricetable_columns">
						<option value="2">Two</option>                    	
                        <option value="3">Three</option>
						<option value="4">Four</option>                        
						<option value="5">Five</option>
                        <option value="6">Six</option>                                                                                                                              
					</select> 
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_customstyle_content"><?php _e('Featured Column:','NorthVantage');?></label></td>
                <td >
					<select name="dynshortcode[pricetable_featurecolumn]" id="dynshortcode_pricetable_featurecolumn">
						<option value="1">One</option>  
                        <option value="2">Two</option>                    	
                        <option value="3">Three</option>
						<option value="4">Four</option>                        
						<option value="5">Five</option>
                        <option value="6">Six</option>                                                                                                                              
					</select> 
                </td>
            </tr>    
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_customstyle_content"><?php _e('Featured Color:','NorthVantage');?></label></td>
                <td >
					<select name="dynshortcode[pricetable_featurecolor]" id="dynshortcode_pricetable_featurecolor">
						<option value="black">Black</option>
                        <option value="blue-lite">Blue Lite</option>
						<option value="blue">Blue</option>                        
						<option value="green-lite">Green Lite</option>
                        <option value="green">Green</option>
                        <option value="grey-lite">Grey Lite</option> 
						<option value="grey">Grey</option>                            
                        <option value="orange-lite">Orange Lite</option>   
                        <option value="orange">Orange</option>   
                        <option value="pink-lite">Pink Lite</option>   
                        <option value="pink">Pink</option>  
                        <option value="purple-lite">Purple Lite</option>   
                        <option value="purple">Purple</option>  
                        <option value="red-lite">Red Lite</option>
                        <option value="red">Red</option>
                        <option value="teal-lite">Teal Lite</option>   
                        <option value="teal">Teal</option>
                        <option value="transparent">Transparent</option>   
                        <option value="white">White</option>
                        <option value="yellow-lite">Yellow Lite</option>   
                        <option value="yellow">Yellow</option>                                                                                                                        
					</select> 
                </td>
            </tr> 
                                                                                            
		</table>          
        <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div> 
		<div id="tooltips"> 
        <small class="description">Add a tooltip to your content.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label class="tooltip-next" for="dynshortcode_tooltip_trigger"><?php _e('Tooltip Trigger:','NorthVantage');?></label><div class="tooltip-info"></div><div class="tooltip">This can be text, a link, an image etc.</div></td>
                <td >
					<input type="text" style="width:140px;" name="dynshortcode[tooltip_trigger]" id="dynshortcode_tooltip_trigger" />
                </td>
            </tr> 
            <tr valign="top">
                <td width="140px" ><label class="tooltip-next" for="dynshortcode_tooltip_trigger_icon"><?php _e('Enable Information Icon:','NorthVantage');?></label></td>
                <td >
					<input name="dynshortcode[tooltip_trigger_icon]" id="dynshortcode_tooltip_trigger_icon" type="checkbox" value="yes" /> 
                </td>
            </tr>                         
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_tooltip_content"><?php _e('Tooltip Content:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:100%;" name="dynshortcode[tooltip_content]" id="dynshortcode_tooltip_content" />
                </td>
            </tr>
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_social_align">Tooltip Position:</label></td>
                <td colspan="3">
					<select name="dynshortcode[tooltip_position]" id="dynshortcode_tooltip_position">
						<option value="top right">Top Right</option>                    	
                        <option value="top left">Top Left</option>
						<option value="top center">Top Center</option>                        
						<option value="bottom right">Bottom Right</option>
                        <option value="bottom left">Bottom Left</option>
						<option value="bottom center">Bottom Center</option>                                                                                                                                   
					</select>                
                </td>
            </tr>
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_tooltip_color">Tooltip Color:</label></td>
                <td colspan="3">
					<select name="dynshortcode[tooltip_color]" id="dynshortcode_tooltip_color">
						<option value="dark">Dark</option>                    	
                        <option value="light">Light</option>                                                                                                                                   
					</select>                
                </td>
            </tr>                                                                                                   
		</table>          
        <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>
		<div id="content_animator"> 
        <small class="description">Animate your content by wrapping it within a Content Animator shortcode.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="140px" ><label class="tooltip-next" for="dynshortcode_animator_id"><strong style="color:#F00;"><?php _e('Animator ID:','NorthVantage');?></strong></label><div class="tooltip-info"></div><div class="tooltip">You must provide a unique ID <br />for each Content Animator shortcode.</div></td>
                <td colspan="3">
					<input type="text" style="width:100px;" name="dynshortcode[animator_id]" id="dynshortcode_animator_id" />
                </td>
            </tr> 
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_animator_content">Content to Animate:</label></td>
                <td colspan="3">
					<input type="text" style="width:100%" name="dynshortcode[animator_content]" id="dynshortcode_animator_content" />					 
                </td>
            </tr>              
            <tr valign="top">
                <td width="140px" ><label class="tooltip-next" for="dynshortcode_animator_delay"><?php _e('Delay:','NorthVantage');?></label><div class="tooltip-info"></div><div class="tooltip">Set a delay time before<br />the animation starts.<br /> Ideal for spacing a <br />sequence of animations.</div></td>
                <td  colspan="3">
					<input type="text" style="width:70px;" name="dynshortcode[animator_delay]" id="dynshortcode_animator_delay" /> <span class="description">miliseconds e.g. 5000 = 5 seconds</span>
                </td>
            </tr>     
            <tr valign="top">
                <td width="140px" ><label class="tooltip-next" for="dynshortcode_animator_speed"><?php _e('Effect Speed:','NorthVantage');?></label><div class="tooltip-info"></div><div class="tooltip">Set how fast to perform the animation.</div></td>
                <td colspan="3">
					<input type="text" style="width:70px" name="dynshortcode[animator_speed]" id="dynshortcode_animator_speed" /> <span class="description">miliseconds e.g. 5000 = 5 seconds</span>
                </td>
            </tr>
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_animator_effect"><?php _e('Animation Effect:','NorthVantage');?></label></td>
                <td colspan="3">
				<select id="dynshortcode_animator_effect" name="dynshortcode[animator_effect]" class="widefat" style="width:auto">
            	<?php 
				$effect_types = array("fade","slide");
		 
                  foreach ($effect_types as $effect_type) {
					$option = '<option value="'.$effect_type.'">';
                    $option .= $effect_type;
                    $option .= '</option>';
                    echo $option;
                } ?>
            	</select>                  					
                </td>
            </tr>        
            <tr valign="top">
                <td width="90px" ><label class="tooltip-next" for="dynshortcode_animator_direction">Animate In Direction:</label><div class="tooltip-info"></div><div class="tooltip">Set the direction from where the animation starts.</div></td>
                <td colspan="3">
					<select name="dynshortcode[animator_direction]" id="dynshortcode_animator_direction">
						<option value="left">Left</option>                    	
                        <option value="right">Right</option>
						<option value="up">Up</option>                        
						<option value="down">Down</option>                                                                                                                                   
					</select>                
                </td>
            </tr>             
            <tr valign="top">
                <td width="140px" ><label for="dynshortcode_tooltip_content"><?php _e('Animation Easing:','NorthVantage');?></label></td>
                <td colspan="3">
				<select id="dynshortcode_animator_easing" name="dynshortcode[animator_easing]" class="widefat" style="width:auto">
            	<?php 
				$tween_types = array("linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce");
		 
                  foreach ($tween_types as $tween_type) {
					$option = '<option value="'.$tween_type.'">';
                    $option .= $tween_type;
                    $option .= '</option>';
                    echo $option;
                } ?>
            	</select>                  					
                </td>
            </tr>                 
            <tr valign="top">
                <td width="90px" ><label class="tooltip-next" for="dynshortcode_animator_margin_top">Top Margin:</label><div class="tooltip-info"></div><div class="tooltip">Add a top margin value <br />
to help position the content.</div></td>
                <td colspan="3">
					<input type="text" style="width:30px" name="dynshortcode[animator_margin_top]" id="dynshortcode_animator_margin_top" />	<small class="description">px</small>				 
                </td>
            </tr>  
            <tr valign="top">
                <td width="90px" ><label class="tooltip-next" for="dynshortcode_animator_margin_left">Left Margin:</label><div class="tooltip-info right"></div><div class="tooltip">Add a left margin value <br />
to help position the content <br />
when the <strong>alignment is set to left</strong>.</div></td>
                <td colspan="3">
					<input type="text" style="width:30px" name="dynshortcode[animator_margin_left]" id="dynshortcode_animator_margin_left" /> <small class="description">px</small>	 
                </td>
            </tr> 
            <tr valign="top">
                <td width="90px" ><label class="tooltip-next" for="dynshortcode_animator_margin_right">Right Margin:</label><div class="tooltip-info"></div><div class="tooltip">Add a right margin value <br />
to help position the content <br />
when the <strong>alignment is set to right</strong>.</div></td>
                <td colspan="3">
					<input type="text" style="width:30px" name="dynshortcode[animator_margin_right]" id="dynshortcode_animator_margin_right" /> <small class="description">px</small>	 
                </td>
            </tr>                                                        
            <tr valign="top">
                <td width="90px" ><label for="dynshortcode_animator_align">Align:</label></td>
                <td width="60px">
					<select name="dynshortcode[animator_align]" id="dynshortcode_animator_align">
						<option value="left">Left</option>                    	
                        <option value="right">Right</option>   
                        <option value="center">Center</option>                                                                                                                                   
					</select>                
                </td>
              <td width="60px" ><label class="tooltip-next" for="dynshortcode_animator_float">Float:</label><div class="tooltip-info"></div><div class="tooltip">Enabling float allows the content to be placed over other content.</div></td>
                <td>
					<select name="dynshortcode[animator_float]" id="dynshortcode_animator_float">
						<option value="no">No</option>                    	
                        <option value="yes">Yes</option>                                                                                                                                
					</select>                
                </td>                
            </tr>                                                                                                                                                                                    
		</table>          
        <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>                                      

		<div id="recentposts"> 
        <small class="description">Select post categories and options.</small>   
        <table class="form-table">
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_recentposts_content"><?php _e('Content:','NorthVantage');?></label></td>
                <td colspan="3">
					<select name="dynshortcode[recentposts_content]" id="dynshortcode_recentposts_content">
						<option value="textimage">Text/Image</option>
						<option value="titleimage">Title/Image</option>
						<option value="image">Image Only</option>
						<option value="text">Text Only</option>
					</select>  
                </td>
            </tr>  
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_recentposts_cats"><?php _e('Select Post Categories:','NorthVantage');?></label>			</td>
                <td colspan="3">
						<?php
                    $categories=  get_categories(); 
                    foreach ($categories as $cat) {
                        $option='<input type="checkbox" id="dynshortcode_recentposts_cats[]" name="dynshortcode_recentposts_cats[]"';					
                        $option .= ' value="'.$cat->cat_name.'" />';
    
                        $option .= $cat->cat_name;
                        $option .= ' ('.$cat->category_count.')';
                        $option .= '<br />';
                        echo $option;
                      }
                
					?> 
                </td>
            </tr> 
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_recentposts_imgwidth"><?php _e('Image Width:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[recentposts_imgwidth]" id="dynshortcode_recentposts_limit" />
                </td>
                <td width="80px" ><label for="dynshortcode_recentposts_imgheight"><?php _e('Image Height:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[recentposts_imgheight]" id="dynshortcode_recentposts_offset" />
                </td>
            </tr>               
			<tr valign="top">
                <td width="80px" ><label for="dynshortcode_recentposts_imageeffect"><?php _e('Image Effect','NorthVantage');?></label></td>
                <td >
                 	<select name="dynshortcode[recentposts_imageeffect]" id="dynshortcode_recentposts_imageeffect">
						<option value="">No effect</option>
                        <option value="frame">Frame</option>
						<option value="shadow">Shadow</option>
						<option value="reflect">Reflect</option>  
						<option value="shadowreflect">Shadow / Reflect</option>                                                
					</select>                        
                </td>
                <td width="80px" ><label for="dynshortcode_recentposts_imgalign"><?php _e('Image Align:','NorthVantage');?></label></td>
                <td colspan="3">
					<select name="dynshortcode[recentposts_imgalign]" id="dynshortcode_recentposts_imgalign">
						<option value="alignleft">Left</option>
						<option value="alignright">Right</option>
						<option value="aligncenter">Center</option>                        
					</select>
                </td>
            </tr>                      
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_recentposts_limit"><?php _e('Posts Limit:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[recentposts_limit]" id="dynshortcode_recentposts_limit" />
                </td>
                <td width="80px" ><label for="dynshortcode_recentposts_offset"><?php _e('Posts Offset:','NorthVantage');?></label></td>
                <td >
					<input type="text" style="width:50px;" name="dynshortcode[recentposts_offset]" id="dynshortcode_recentposts_offset" />
                </td>
            </tr>         		              
             <tr valign="top">
                <td width="80px" ><label for="dynshortcode_recentposts_sortby"><?php _e('Post Sort By','NorthVantage');?></label></td>
                <td>
                 	<select name="dynshortcode[recentposts_sortby]" id="dynshortcode_recentposts_sortby">
                        <option value="date">Date</option>
                        <option value="rand">Random</option>
                        <option value="title">Title</option>
                     </select>                        
                </td>
                <td width="80px" ><label for="dynshortcode_recentposts_orderby"><?php _e('Post Order By','NorthVantage');?></label></td>
                <td >
                 	<select name="dynshortcode[recentposts_orderby]" id="dynshortcode_recentposts_orderby">
                        <option value="ASC">Ascending</option>
                        <option value="DESC">Descending</option>
                     </select>                        
                </td>
            </tr>     
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_recentposts_date"><?php _e('Show Date:','NorthVantage');?></label></td>
                <td>
	                 <select name="dynshortcode[recentposts_date]" id="dynshortcode_recentposts_date">
                        <option>No</option>
                        <option value="yes">Yes</option>
                     </select>                      
                </td>
                <td width="80px" ><label for="dynshortcode_recentposts_meta"><?php _e('Show Metadata:','NorthVantage');?></label></td>
                <td>
	                 <select name="dynshortcode[recentposts_meta]" id="dynshortcode_recentposts_meta">
                        <option>No</option>
                        <option value="yes">Yes</option>
                     </select>   
                </td>                
            </tr>
            <tr valign="top">
                <td width="80px" ><label for="dynshortcode_recentposts_excerpt"><?php _e('Excerpt Word Limit:','NorthVantage');?></label></td>
                <td colspan="3">
                    <input type="text" style="width:18%;" name="dynshortcode[recentposts_excerpt]" id="dynshortcode_recentposts_excerpt" /><small class="description">Default is 55 words.</small>
                </td>           
            </tr>             	                                                              
		</table>          <p class="submit">
            <input type="button" onclick="return shortcodegenerator.sendToEditor(this.form);" value="<?php _e('Send Shortcode to Editor &raquo;','NorthVantage');?>" />
        </p><p>&nbsp;</p>      
        </div>                                             
<?php
}




// create custom plugin settings menu
add_action('admin_menu', 'cwz_create_menu');

function cwz_create_menu() {

	//create new top-level menu
	
	add_menu_page('Theme General Settings', 'Theme Options', 'administrator', 'main', 'load_main');
	add_submenu_page( 'main', 'Theme General Settings', 'Documentation', 'administrator', 'main', 'load_main');
	add_submenu_page( 'main', 'General Settings', 'General Settings', 'administrator', 'general', 'load_options');
	add_submenu_page( 'main', 'Skin Settings', 'Skin Settings', 'administrator', 'skinmanager', 'load_skinmanager');
	add_submenu_page( 'main', 'Blog Settings', 'Blog Settings', 'administrator', 'blog', 'load_blogoptions');
	add_submenu_page( 'main', 'Header Settings', 'Header Settings', 'administrator', 'header', 'load_droppanel');
	add_submenu_page( 'main', 'Footer Settings', 'Footer Settings', 'administrator', 'footer', 'load_footer');
	add_submenu_page( 'main', 'Social Media Options', 'Social Media Options', 'administrator', 'socialmedia', 'load_socialmedia');
	
	
	if(get_option('slideset_enable')=='enable') { // deprecated function
		add_submenu_page( 'main', 'Gallery Slide Sets', 'Gallery Slide Sets', 'administrator', 'gallery_slidesets', 'load_gallery_slidesets');
	}
	
	add_action( 'admin_init', 'register_themesettings');
}


function register_themesettings() {

//  GENERAL OPTIONS 

	// Pages Layout
	register_setting( 'general-settings-group', 'enable_responsive');
	register_setting( 'general-settings-group', 'pagelayout');
	register_setting( 'general-settings-group', 'breadcrumb');
	register_setting( 'general-settings-group', 'pagecomments');
	register_setting( 'general-settings-group', 'author_bio');

	// Cufon / Google fonts.
	register_setting( 'general-settings-group', 'cufon_font');
	register_setting( 'general-settings-group', 'nv_font_type');
	
	
	register_setting( 'general-settings-group', 'googlefont_url_1');
	register_setting( 'general-settings-group', 'googlefont_url_2');
	
	register_setting( 'general-settings-group', 'googlefont_css_1');
	register_setting( 'general-settings-group', 'googlefont_css_2');
	

	// BuddyPress Page Layout Config
	register_setting( 'general-settings-group', 'buddylayout');
	register_setting( 'general-settings-group', 'buddycontentborder');
	
	register_setting( 'general-settings-group', 'buddycolone');
	register_setting( 'general-settings-group', 'buddycolone_border');
	
	register_setting( 'general-settings-group', 'buddycoltwo');
	register_setting( 'general-settings-group', 'buddycoltwo_border');	

	// Number of Sidebars to generate.
	register_setting( 'general-settings-group', 'sidebars_num');
	
	// Timthumb
	register_setting( 'general-settings-group', 'timthumb_disable');
	

	// JW Player.
	register_setting( 'general-settings-group', 'jwplayer_js');
	register_setting( 'general-settings-group', 'jwplayer_swf');
	register_setting( 'general-settings-group', 'jwplayer_yt');	
	register_setting( 'general-settings-group', 'jwplayer_skin');	
	register_setting( 'general-settings-group', 'jwplayer_skinpos');
	register_setting( 'general-settings-group', 'jwplayer_plugins');
	register_setting( 'general-settings-group', 'jwplayer_height');
	

	// Flickr API
	register_setting( 'general-settings-group', 'flickr_apikey');
	register_setting( 'general-settings-group', 'flickr_userid');

	// Priority Loading
	//register_setting( 'general-settings-group', 'priority_loading');
	unregister_setting( 'general-settings-group', 'priority_loading');
	delete_option('priority_loading');
	

	// Gallery Slide Set Media Library Image List
	register_setting( 'general-settings-group', 'slideset_enable');
	register_setting( 'general-settings-group', 'medialib_disable');
	

// Social Options

	// Social Options
	register_setting( 'social-options-group', 'sociallink_digg');
	register_setting( 'social-options-group', 'sociallink_fb');
	register_setting( 'social-options-group', 'sociallink_linkedin');
	register_setting( 'social-options-group', 'sociallink_deli');
	register_setting( 'social-options-group', 'sociallink_google');
	register_setting( 'social-options-group', 'sociallink_reddit');
	register_setting( 'social-options-group', 'sociallink_stumble');
	register_setting( 'social-options-group', 'sociallink_twitter');
	register_setting( 'social-options-group', 'sociallink_rss');
	register_setting( 'social-options-group', 'sociallink_youtube');	
	register_setting( 'social-options-group', 'sociallink_vimeo');
	register_setting( 'social-options-group', 'sociallink_pinterest');
	register_setting( 'social-options-group', 'sociallink_email');
	register_setting( 'social-options-group', 'sociallink_instagram');
	register_setting( 'social-options-group', 'sociallink_soundcloud');
	
	// RSS Feed
	register_setting( 'social-options-group', 'rss_feed');
	register_setting( 'social-options-group', 'rss_title');
	
	// Twitter Feed.
	register_setting( 'social-options-group', 'twitter_usrname');
	register_setting( 'social-options-group', 'twitter_feednum');
	register_setting( 'social-options-group', 'twitter_label');

// 	SKIN MANAGER
	register_setting( 'skin-settings-group', 'default_skin');

//	BLOG OPTIONS 

	// Post Display Type

	register_setting( 'blog-settings-group', 'arhpostdisplay');
	register_setting( 'blog-settings-group', 'arhpostcolumns');
	register_setting( 'blog-settings-group', 'arhpostcontent');
	register_setting( 'blog-settings-group', 'arhexcerpt');	
	register_setting( 'blog-settings-group', 'arhpostpostmeta');		
	
	
	// Index Image config
	
	register_setting( 'blog-settings-group', 'arhimgdisplay');
	register_setting( 'blog-settings-group', 'arhimgheight');	
	register_setting( 'blog-settings-group', 'arhimgwidth');	
	register_setting( 'blog-settings-group', 'arhimgeffect');	
	register_setting( 'blog-settings-group', 'arhimgalign');
	register_setting( 'blog-settings-group', 'postmetaalign');	

	
	// Post Image config
	
	register_setting( 'blog-settings-group', 'postimgdisplay');
	register_setting( 'blog-settings-group', 'postimgheight');	
	register_setting( 'blog-settings-group', 'postimgwidth');	
	register_setting( 'blog-settings-group', 'postimgeffect');	
	register_setting( 'blog-settings-group', 'postimgalign');	
	

	// Archive / Index Page Layout Config
	register_setting( 'blog-settings-group', 'arhlayout');
	
	register_setting( 'blog-settings-group', 'archcolone');


//  HEADER SETTINGS 

	// Branding Menu Position.
	register_setting( 'droppanel-settings-group', 'branding_alignment');
	register_setting( 'droppanel-settings-group', 'menu_alignment');

	// Header Height.
	register_setting( 'droppanel-settings-group', 'header_height');	

	// Branding Margin
	register_setting( 'droppanel-settings-group', 'branding_margin');

	// Menu Margin
	register_setting( 'droppanel-settings-group', 'menu_margin');

	// Branding Disable
	register_setting( 'droppanel-settings-group', 'branding_disable');

	// Branding Image URL.
	register_setting( 'droppanel-settings-group', 'branding_url');
	register_setting( 'droppanel-settings-group', 'branding_url_sec');

	// WP Custom Menu for Main Menu.
	register_setting( 'droppanel-settings-group', 'wpcustomm_enable');
	register_setting( 'droppanel-settings-group', 'wpcustommdesc_enable' );

	// Custom HTML
	register_setting( 'droppanel-settings-group', 'header_html');	
	
	// Custom CSS
	register_setting( 'droppanel-settings-group', 'header_css');		

	// Favicon
	register_setting( 'droppanel-settings-group', 'header_favicon');	

	// Enable Drop Panel
	register_setting( 'droppanel-settings-group', 'enable_droppanel');

	// Trigger Button Align
	register_setting( 'droppanel-settings-group', 'droppanel_button_align');	

	// Enable Search
	register_setting( 'droppanel-settings-group', 'enable_search');	

	// Columns Number
	register_setting( 'droppanel-settings-group', 'droppanel_columns_num');
	
	// Header Infobar
	register_setting( 'droppanel-settings-group', 'header_infobar');
	
	// Header Social Icons
	register_setting( 'droppanel-settings-group', 'header_customfield');



//  Footer Options

	// Display Footer
	register_setting( 'footer-settings-group', 'mainfooter');

	// Columns Number
	register_setting( 'footer-settings-group', 'footer_columns_num');
	
	// Lower footer LEFT
	register_setting( 'footer-settings-group', 'lowerfooter');

	// Lower footer LEFT
	register_setting( 'footer-settings-group', 'lowfooterleft');
	
	// Lower footer RIGHT
	register_setting( 'footer-settings-group', 'lowfooterright');
	
	
	// Gallery Creator
	register_setting( 'gallery-settings-group', 'slideset_data');	
	register_setting( 'gallery-settings-group', 'slideset_number');	
	register_setting( 'gallery-settings-group', 'filter_categories');	
}

if(isset($_REQUEST['page'])) $curr_page = $_REQUEST['page']; else $curr_page='';

if($curr_page=="droppanel" || $curr_page=="footer") {

	add_filter('admin_head','footerdrop_Admin'); // Display TinyMCE in Admin Options
    
	function footerdrop_Admin() {
	wp_enqueue_script( 'common');
	wp_enqueue_script( 'jquery-color');
	if (function_exists('add_thickbox')) add_thickbox();
	wp_print_scripts('media-upload');
	wp_admin_css();
	wp_enqueue_script('utils');
	wp_print_scripts('editor');
	do_action('admin_print_styles-post-php');
	do_action('admin_print_styles');
	
	} 
}

if($curr_page=="general") {
	
	function generalScripts() {
	
	wp_enqueue_script( 'jquery');
	if (function_exists('add_thickbox')) add_thickbox();
	wp_admin_css();
	
	}
	
	add_action( 'admin_print_scripts', 'generalScripts');
	
	function import_theme_data() {
	
		if (isset($_POST['save'])) {
	
			if($_FILES['theme_import']!='') {
				$theme_import=$_FILES['theme_import']['tmp_name'];
				$theme_import=file_get_contents($theme_import);
				$theme_import=base64_decode($theme_import);
				$theme_import=unserialize($theme_import);
				
				foreach($theme_import as $key => $value) {
					update_option( $key, $value );	
				}
			}


			if($_FILES['slideset_import']!='') {
				$slideset_import=$_FILES['slideset_import']['tmp_name'];
				$slideset_import=file_get_contents($slideset_import);
				$slideset_import=base64_decode($slideset_import);
				$slideset_import=unserialize($slideset_import);
				
				foreach($slideset_import as $key => $value) {
					update_option( 'slideset_data_'.$key, $value );
					$slideset_ids.=$key.',';
				}
				
				update_option( 'slideset_data_ids', $slideset_ids );		
			}


			if($_FILES['skins_import']!='') {

				$skins_import = $_FILES['skins_import']['tmp_name'];
				$skins_import=file_get_contents($skins_import);
				$skins_import=base64_decode($skins_import);
				$skins_import=unserialize($skins_import);
				
				foreach($skins_import as $key => $value) {
					update_option( 'skin_data_'.$key, $value );
					$skins_ids.=$key.',';
		
				}
				update_option( 'skin_data_ids', $skins_ids );
			}
			
			
		}
	
	}
	
	add_action('admin_menu', 'import_theme_data');
}


if($curr_page=="skinmanager") {
	
	function skinScripts() {
		wp_deregister_script('jquery-ui-core');
		wp_register_script( 'jquery-ui-core', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
		wp_enqueue_script( 'jquery-ui-core' );	
		wp_admin_css();
	}

	add_action( 'admin_print_scripts', 'skinScripts');
	
	function save_skin_data() {
	
		if ( isset($_POST['save']) ) {
		
			foreach ($_POST as $key => $value) {
					if ( preg_match("/skin_id/", $key) ) {
						$options_skin_presets[$key] = $value;
    				if($key=="skin_id_dbid") {
						$skin_dbid = $value;
    				}						
    				if($key=="skin_id_id") {
						$skin_set_id = $value;
    				}		
				}
			}
			
			if($skin_dbid) { delete_option( 'skin_data_'.$skin_dbid, $options_skin_presets); } // remove previous data 
			update_option( 'skin_data_'.$skin_set_id, $options_skin_presets);
			
			$skin_data_ids = maybe_unserialize(get_option('skin_data_ids'));
			
					if($skin_dbid) {
					$skin_data_ids = str_replace($skin_dbid.",", $skin_set_id.",", $skin_data_ids);
					$skin_data_ids = str_replace(",,", ",", $skin_data_ids);
					} else {
					$skin_data_ids = str_replace($skin_set_id.",", "", $skin_data_ids);
					$skin_data_ids=$skin_data_ids.$skin_set_id.",";
					$skin_data_ids = str_replace(",,", ",", $skin_data_ids);
					}
					
					delete_option('skin_data_ids');
					update_option( 'skin_data_ids', $skin_data_ids );				 

   			}

		if ( isset($_POST['delete']) ) {
		   	$skin_id_dbid = $_POST['skin_id_dbid'];
			
			if($skin_id_dbid) { delete_option( 'skin_data_'.$skin_id_dbid, $options_skin_presets); } // remove previous data 
			
			$skin_data_ids = maybe_unserialize(get_option('skin_data_ids'));
			
					if($skin_id_dbid) {
					$skin_data_ids = str_replace($skin_id_dbid.",", "", $skin_data_ids);
					$skin_data_ids = str_replace(",,", ",", $skin_data_ids);
					}
					
					
					delete_option('skin_data_ids');
					update_option( 'skin_data_ids', $skin_data_ids );

   			}
	
}
	add_action('admin_menu', 'save_skin_data');
	
}


if($curr_page=="gallery_slidesets") {

	function slidesetScripts() {
		wp_admin_css();
	}

	add_action( 'admin_print_scripts', 'slidesetScripts');

	
	function save_gallery_data() {
	
		if ( isset( $_POST['upgrade'] ) ) {
          $get_slideset_num = maybe_unserialize(get_option('slideset_number'));
          $get_gallery_data = maybe_unserialize(get_option('slideset_data')); 
		  
		  for($i = 0; $i < $get_slideset_num; $i++) {
		  		 foreach ($get_gallery_data as $key => $value) {
    				if($key=="slideset_id".$i."_id") {
    					$options_gallery_ids .= $value.",";	
						$slide_set_id = $value;
    				}
					if ( preg_match("/slideset_id".$i."/", $key) ) {
        				$find = "/slideset_id".$i."/";
						$replace = "slideset_id"; 
         				$key = preg_replace ($find, $replace, $key); 						
						$options_gallery_slidesets[$key] = $value;					
					
					}		 
				 }
                
        			update_option( 'slideset_data_'.$slide_set_id, $options_gallery_slidesets);
        			$options_gallery_slidesets="";
		  		}
				
				update_option( 'slideset_data_ids', $options_gallery_ids );
				update_option('slideset_data_update','yes');
		}			


	
		if (isset( $_POST['save'] ) ) {
		

			if(isset($_POST['filter_categories'])) {
			$filter_categories = $_POST['filter_categories'];
			delete_option( 'filter_categories');
			update_option( 'filter_categories', $filter_categories);

			}
		
			foreach ($_POST as $key => $value) {
					if ( preg_match("/slideset_id/", $key) ) {
						$options_gallery_slidesets[$key] = $value;
    				if($key=="slideset_id_dbid") {
						$slide_set_dbid = $value;
    				}						
    				if($key=="slideset_id_id") {
						$slide_set_id = $value;
    				}		
				}
			}
			
			if($slide_set_dbid) { delete_option( 'slideset_data_'.$slide_set_dbid, $options_gallery_slidesets); } // remove previous data 
			update_option( 'slideset_data_'.$slide_set_id, $options_gallery_slidesets);
			
			$slideset_data_ids = maybe_unserialize(get_option('slideset_data_ids'));
			
					if($slide_set_dbid) {
					$slideset_data_ids = str_replace($slide_set_dbid.",", $slide_set_id.",", $slideset_data_ids);
					$slideset_data_ids = str_replace(",,", ",", $slideset_data_ids);
					} else {
					$slideset_data_ids = str_replace($slide_set_id.",", "", $slideset_data_ids);
					$slideset_data_ids=$slideset_data_ids.$slide_set_id.",";
					$slideset_data_ids = str_replace(",,", ",", $slideset_data_ids);
					}
					
					delete_option('slideset_data_ids');
					update_option( 'slideset_data_ids', $slideset_data_ids );				 

   			}

		if ( isset( $_POST['delete'] ) ) {
		   	$slideset_id_dbid = $_POST['slideset_id_dbid'];
			
			if($slideset_id_dbid) { delete_option( 'slideset_data_'.$slideset_id_dbid, $options_gallery_slidesets); } // remove previous data 
			
			$slideset_data_ids = maybe_unserialize(get_option('slideset_data_ids'));
			
					if($slideset_id_dbid) {
					$slideset_data_ids = str_replace($slideset_id_dbid.",", "", $slideset_data_ids);
					$slideset_data_ids = str_replace(",,", ",", $slideset_data_ids);
					}
					
					
					delete_option('slideset_data_ids');
					update_option( 'slideset_data_ids', $slideset_data_ids );

   			}
	
}
	add_action('admin_menu', 'save_gallery_data');
	
}


add_action( 'admin_print_scripts', 'load_scripts');

function load_scripts() {
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script( 'media-invoker', get_template_directory_uri().'/lib/adm/js/wp-media-invoker.js');
	wp_enqueue_script( 'nvadmin', get_template_directory_uri().'/lib/adm/js/nv.admin.js');
	wp_enqueue_script( 'tablednd', get_template_directory_uri().'/lib/adm/js/jquery.tablednd.js');
	wp_enqueue_script( 'nvcolor', get_template_directory_uri().'/lib/adm/js/colorpicker.js');
	if (function_exists('add_thickbox')) add_thickbox();
}

function load_main() {
	require NV_FILES .'/adm/inc/main.php';
}

function load_options() {
	require NV_FILES .'/adm/inc/general-options.php';
}

function load_skinmanager() {
	require NV_FILES .'/adm/inc/skin-manager.php';
}

function load_blogoptions() {
	require NV_FILES .'/adm/inc/blog-options.php';
}

function load_droppanel() {
	require NV_FILES .'/adm/inc/droppanel-options.php';
}

function load_footer() {
	require NV_FILES .'/adm/inc/footer-options.php';
}

function load_socialmedia() {
	require NV_FILES .'/adm/inc/social-options.php';
}

function load_gallery_slidesets() {
	require NV_FILES .'/adm/inc/gallery-creator.php';
}


?>