<?php require NV_FILES .'/adm/inc/widget-options.php'; ?>
<div class="wrap">
<form method="post" action="options.php">
<?php settings_fields( 'droppanel-settings-group' ); ?>
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">Header Settings</h2>

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Menu/Branding Settings</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px">
		<label for="branding_alignment">Branding Alignment</label>  
    </td>
	<td class="tr-top" colspan="3">
         <select name="branding_alignment">
            <option <?php if(get_option('branding_alignment')=="left") {?> selected="selected" <?php } ?> value="left">Left Align</option>    
            <option <?php if(get_option('branding_alignment')=="right") {?> selected="selected" <?php } ?> value="right">Right Align</option>
            <option <?php if(get_option('branding_alignment')=="center") {?> selected="selected" <?php } ?> value="center">Center Align</option> 
        </select> 
	</td>
</tr>
<tr>
    <td class="tr-top" style="width:120px;background:#fff;">
		<label for="menu_alignment">Menu Alignment</label> 
	</td>
    <td class="tr-top" style="background:#fff;" colspan="3">
         <select name="menu_alignment">
            <option <?php if(get_option('menu_alignment')=="right") {?> selected="selected" <?php } ?> value="right">Right Align</option>         
            <option <?php if(get_option('menu_alignment')=="left") {?> selected="selected" <?php } ?> value="left">Left Align</option>    
            <option <?php if(get_option('menu_alignment')=="center") {?> selected="selected" <?php } ?> value="center">Center Align</option>    
        </select> 
	</td>    
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;">
    	<label for="header_height">Header Settings</label>
	</td>
	<td class="tr-top" style="width:170px;">
    	<label for="header_height">Header Height</label>
    	<input type="text" name="header_height" style="width:30px" value="<?php echo get_option('header_height'); ?>" /> <small class="description">px</small>
	</td>
    <td class="tr-top" style="width:200px;">
		<label for="branding_margin">Branding Top Margin</label>
    	<input type="text" name="branding_margin" style="width:30px" value="<?php echo get_option('branding_margin'); ?>" /> <small class="description">px</small>    
    </td>
    <td class="tr-top">
		<label for="menu_margin">Menu Top Margin</label>
    	<input type="text" name="menu_margin" style="width:30px" value="<?php echo get_option('menu_margin'); ?>" /> <small class="description">px</small>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
        <label for="branding_disable">Display Branding</label> 
	</td>
	<td class="tr-top" style="width:170px;background:#fff;" colspan="3">
        <label for="branding_disable">Enable</label> 
        <input type="radio" name="branding_disable" <?php if(get_option('branding_disable')=="") {?> checked="checked" <?php } ?>  value="" /> 
      
        <label for="branding_disable">Disable</label> 
        <input type="radio" name="branding_disable" <?php if(get_option('branding_disable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Drop Panel / Search</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
        <label for="branding_disable">Drop Panel</label> 
	</td>
	<td class="tr-top" style="background:#fff;">
        <label for="branding_disable">Enable</label> 
        <input type="radio" name="enable_droppanel" <?php if(get_option('enable_droppanel')=="") {?> checked="checked" <?php } ?>  value="" /> 
      
        <label for="branding_disable">Disable</label> 
        <input type="radio" name="enable_droppanel" <?php if(get_option('enable_droppanel')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label for="droppanel_button_align">Trigger Button Align</label>
    </td>
    <td class="tr-top">
        <select name="droppanel_button_align">
            <option <?php if(get_option('droppanel_button_align')=="") {?> selected="selected" <?php } ?> value="">Center</option>
            <option <?php if(get_option('droppanel_button_align')=="left") {?> selected="selected" <?php } ?> value="left">Left</option>           
        </select>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
		<label for="droppanel_columns_num">Drop Panel Columns</label>
    </td>
    <td class="tr-top" style="background:#fff;">
        <select name="droppanel_columns_num">
            <option <?php if(get_option('droppanel_columns_num')=="") {?> selected="selected" <?php } ?> value="">4 Columns</option>
            <option <?php if(get_option('droppanel_columns_num')=="3") {?> selected="selected" <?php } ?> value="3">3 Columns</option>
            <option <?php if(get_option('droppanel_columns_num')=="2") {?> selected="selected" <?php } ?> value="2">2 Columns</option> 
            <option <?php if(get_option('droppanel_columns_num')=="1") {?> selected="selected" <?php } ?> value="1">1 Column</option>                
        </select>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;">
        <label for="enable_search">Search</label> 
	</td>
	<td class="tr-top">
        <label for="enable_search">Enable</label> 
        <input type="radio" name="enable_search" <?php if(get_option('enable_search')=="") {?> checked="checked" <?php } ?>  value="" /> 
      
        <label for="enable_search">Disable</label> 
        <input type="radio" name="enable_search" <?php if(get_option('enable_search')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Header Custom Field</span></h3>
<div class="inside">
<table class="form-table">
    <tr valign="top">
        <td class="tr-top" style="width:120px;">
            <label class="tooltip-next" for="enable_search">Content</label> <div class="tooltip-info"></div><div class="tooltip">Add content to Header Search Box area (Top Right). e.g. Social Icons Shortcode, Telephone Number.</div><br class="clear large" />
        </td class="tr-top">
        <td  class="tr-top">
            <textarea name="header_customfield" id="header_customfield" style="width:100%;height:50px" /><?php echo get_option('header_customfield'); ?></textarea>
      </td>
    </tr>
</table>                 
                                              
</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Header Infobar Message</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label for="enable_search">Content</label> 
    </td class="tr-top">
    <td  class="tr-top">
    	<textarea name="header_infobar" id="header_infobar" style="width:100%;height:100px" /><?php echo get_option('header_infobar'); ?></textarea>
  </td>
</tr>
</table>
</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Branding Image</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
    	<strong class="tooltip-next">Branding Image (Primary) URL</strong> <div class="tooltip-info"></div><div class="tooltip">Enter Image URL or leave empty to display <strong>Blog Title</strong> &amp; <strong>Tagline</strong> text, see <a href="options-general.php">Settings</a>.</div><br class="clear large" />
    	<label for="branding_url">URL of  Image</label>
        	<input type="text" name="branding_url" id="branding_url" size="50" value="<?php echo get_option('branding_url'); ?>" /> 
  			<a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="branding_url" class="thickbox button custom_media_uploader">Upload / Insert</a>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top">
    	<strong class="tooltip-next">Branding Image (Secondary) URL</strong> <div class="tooltip-info"></div><div class="tooltip">An alternative version of the branding can be used in Skin Settings. e.g. Dark background settings.</div><br class="clear large" />
    	<label for="branding_url_sec">URL of Image</label>
        	<input type="text" name="branding_url_sec" id="branding_url_sec" size="50" value="<?php echo get_option('branding_url_sec'); ?>" /> 
  			<a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="branding_url_sec" class="thickbox button custom_media_uploader">Upload / Insert</a>
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>WordPress Custom Menu</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
    <td class="tr-top"  style="width:120px">
    	<label class="tooltip-next" for="wpcustomm_enable">Custom Menu</label><div class="tooltip-info"></div><div class="tooltip">Enables / Disables WordPress custom menu for the Main Navigation menu. See Appearance -> Menus to setup.</div>
    </td>
    <td class="tr-top">
        <label for="wpcustomm_enable">Enable</label> 
		<input type="radio" name="wpcustomm_enable" <?php if(get_option('wpcustomm_enable')=="enable" ) {?> checked="checked" <?php } ?>  value="enable" /> 
    
        <label for="wpcustomm_enable">Disable</label> 
		<input type="radio" name="wpcustomm_enable" <?php if(get_option('wpcustomm_enable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
    </td>
</tr>
<tr>
    <td class="tr-top" style="width:120px;background:#fff;">
    	<label for="wpcustomm_enable">Custom Menu Descriptions</label>
    </td>
    <td class="tr-top"  style="background:#fff;">
        <label for="wpcustommdesc_enable">Enable</label> 
		<input type="radio" name="wpcustommdesc_enable" <?php if(get_option('wpcustommdesc_enable')=="enable" ) {?> checked="checked" <?php } ?>  value="enable" /> 
    
        <label for="wpcustommdesc_enable">Disable</label> 
		<input type="radio" name="wpcustommdesc_enable" <?php if(get_option('wpcustommdesc_enable')=="disable" || get_option('wpcustommdesc_enable')=="") {?> checked="checked" <?php } ?>  value="disable" /><br />
        <small class="description">Enable Custom Menu descriptions for Extended Menu ONLY. See documentation for more information.</small>
    </td>    
</tr>
</table>
</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Add Custom HTML / Shortcode</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
	<td class="tr-top">
	<small class="description">Enter Custom HTML to be placed within the header section.</small><br /><br />
	<textarea name="header_html" id="header_html" style="width:100%;height:100px" /><?php echo get_option('header_html'); ?></textarea>
  </td>
</tr>
</table>
</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Add Custom CSS</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
	<td class="tr-top">
	<small class="description">Enter Custom CSS.</small><br /><br />
	<textarea name="header_css" id="header_css" style="width:100%;height:100px" /><?php echo get_option('header_css'); ?></textarea>
  </td>
</tr>
</table>
</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Add Favicon</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
	<td class="tr-top">
	<small class="description">Enter the URL of your Favicon.</small><br /><br />
	<input type="text" name="header_favicon"  id="header_favicon" style="width:300px" id="header_favicon"  value="<?php echo get_option('header_favicon'); ?>" />
    <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="header_favicon" class="thickbox button custom_media_uploader">Upload / Insert</a>
  </td>
</tr>
</table>
</div><!-- /inside -->
</div><!-- /postbox -->



<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes','NorthVantage') ?>" />
</p>


</div>
</div>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="droppanel, contact, contacttitle, contactdesc, contactemail, contactmsg" />


</form>
</div>