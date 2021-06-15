<div class="wrap">

<form  method="post" action="options.php">
<?php settings_fields( 'general-settings-group' );

$settings_list='pagelayout,breadcrumb,pagecomments,cufon_font,googlefont_url_1,googlefont_url_2,googlefont_css_1,googlefont_css_2,buddylayout,buddycolone,buddycolone_border,buddycoltwo,buddycoltwo_border,sidebars_num,jwplayer_js,jwplayer_swf,jwplayer_yt,jwplayer_skin,jwplayer_skinpos,jwplayer_height,jwplayer_plugins,flickr_apikey,flickr_userid,timthumb_disable,priority_loading,slideset_enable,medialib_disable,sociallink_digg,sociallink_fb,sociallink_linkedin,sociallink_deli,sociallink_reddit,sociallink_stumble,sociallink_twitter,sociallink_rss,sociallink_youtube,sociallink_vimeo,rss_feed,rss_title,twitter_usrname,twitter_feednum,twitter_label,default_skin,arhpostdisplay,arhpostcontent,arhexcerpt,arhpostpostmeta,arhimgdisplay,arhimgheight,arhimgwidth,arhimgeffect,postimgdisplay,postimgheight,postimgwidth,postimgeffect,arhlayout,archbreadcrumb,archcontentborder,archcolone,archcolone_border,archcoltwo,archcoltwo_border,branding_menu,header_height,branding_margin,menu_margin,branding_disable,branding_url,wpcustomm_enable,header_html,mainfooter,footer_columns_num,lowerfooter,lowfooterleft,lowfooterright,filter_categories';  

$settings_fields=explode(',',$settings_list);
$settings_options=array();

foreach($settings_fields as $settings_field) {
	$settings_options[$settings_field] = get_option($settings_field);
}


$settings_options = serialize($settings_options); // serialise data
$settings_options=base64_encode($settings_options); // encode data

// Gallery Data Export
$slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
$slideset_data_ids = explode(",", $slideset_data_ids);

$gallery_data_options=array();

foreach($slideset_data_ids as $slideset_data_id) {
	$gallery_data_options[$slideset_data_id]=maybe_unserialize(get_option('slideset_data_'.$slideset_data_id));
}

$gallery_data_options = serialize($gallery_data_options); // serialise data
$gallery_data_options=base64_encode($gallery_data_options); // encode data

// Skin Data Export
$skin_data_ids  = substr(maybe_unserialize(get_option('skin_data_ids')), 0, -1);  // trim last comma
$skin_data_ids = explode(",", $skin_data_ids);

$skin_data_options=array();

foreach($skin_data_ids as $skin_data_id) {
	$skin_data_options[$skin_data_id]=maybe_unserialize(get_option('skin_data_'.$skin_data_id));
}

$skin_data_options = serialize($skin_data_options); // serialise data
$skin_data_options=base64_encode($skin_data_options); // encode data


?>
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">General Settings</h2>


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Responsive Design</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px">
		<label for="pagelayout">Responsive Design</label>
	</td>
    <td class="tr-top">           
	
            <label for="enable_responsive"><small class="description">Enable</small></label>
            <input type="radio" name="enable_responsive" <?php if(get_option('enable_responsive')=='enable' || get_option('enable_responsive')=='') {?> checked="checked" <?php } ?>  value="enable" /> 
    
            <label for="enable_responsive"><small class="description">Disable</small></label>
            <input type="radio" name="enable_responsive" <?php if(get_option('enable_responsive')=="disable") {?> checked="checked" <?php } ?>  value="disable" /> 
  
               
	</td>
</tr>
</table>

</div><!-- /inside -->
</div><!-- /postbox -->



<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Pages Layout</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px">
		<label for="pagelayout">Page Layout</label>
	</td>
    <td class="tr-top">           
		<div class="page-options medium">
            <label for="pagelayout">Full Width</label><br />
            <input type="radio" name="pagelayout" <?php if(get_option('pagelayout')=="layout_one") {?> checked="checked" <?php } ?>  value="layout_one" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_one.png" alt="layout full width" />
        </div>
		<div class="page-options medium">   
            <label for="pagelayout">1x Column (Left)</label><br />
            <input type="radio" name="pagelayout" <?php if(get_option('pagelayout')=="layout_two") {?> checked="checked" <?php } ?>  value="layout_two" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_two.png" alt="layout one column left" />
        </div>

		<div class="page-options medium">
            <label for="pagelayout">2x Column (Left) </label><br />
            <input type="radio" name="pagelayout" <?php if(get_option('pagelayout')=="layout_three") {?> checked="checked" <?php } ?>  value="layout_three" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_three.png" alt="layout one column right" />
        </div>   

		<div class="page-options medium">
            <label for="pagelayout">1x Column (Right) </label><br />
            <input type="radio" name="pagelayout" <?php if(get_option('pagelayout')=="layout_four") {?> checked="checked" <?php } ?>  value="layout_four" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_four.png" alt="layout one column right" />
        </div>   

		<div class="page-options medium">
            <label for="pagelayout">2x Column (Right) </label><br />
            <input type="radio" name="pagelayout" <?php if(get_option('pagelayout')=="layout_five") {?> checked="checked" <?php } ?>  value="layout_five" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_five.png" alt="layout one column right" />
        </div>   

		<div class="page-options medium">
            <label for="pagelayout">2x Column (Left,Right) </label><br />
            <input type="radio" name="pagelayout" <?php if(get_option('pagelayout')=="layout_six") {?> checked="checked" <?php } ?>  value="layout_six" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_six.png" alt="layout one column right" />
        </div>                   
        
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
           <label for="breadcrumb">Breadcrumbs</label>
	</td>
    <td class="tr-top" style="background:#fff;">           
		<label for="breadcrumb"><small class="description">Enable</small></label> 
		<input type="radio" name="breadcrumb" <?php if(get_option('breadcrumb')=="enable" || get_option('breadcrumb')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 
        <label for="breadcrumb"><small class="description">Disable</small></label> 
		<input type="radio" name="breadcrumb" <?php if(get_option('breadcrumb')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;">
           <label for="pagecomments">Page Comments</label>
	</td>
    <td class="tr-top">           
		<label for="pagecomments"><small class="description">Enable</small></label> 
		<input type="radio" name="pagecomments" <?php if(get_option('pagecomments')=="enable") {?> checked="checked" <?php } ?>  value="enable" /> 
        <label for="pagecomments"><small class="description">Disable</small></label> 
		<input type="radio" name="pagecomments" <?php if(get_option('pagecomments')=="disable" || get_option('pagecomments')=="") {?> checked="checked" <?php } ?>  value="disable" />
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label  class="tooltip-next" for="author_bio">Show Author Bio</label>
		<div class="tooltip-info"></div>
		<div class="tooltip">Enable this option to display author bio information.</div>        
	</td>
    <td class="tr-top">           

  		<label for="author_bio"><small class="description">Posts Only</small></label> 
		<input type="radio" name="author_bio" <?php if(get_option('author_bio')=="posts" ) {?> checked="checked" <?php } ?>  value="posts" /> 
    
  		<label for="author_bio"><small class="description"> Posts &amp; Pages</small></label> 
		<input type="radio" name="author_bio" <?php if(get_option('author_bio')=="enable" ) {?> checked="checked" <?php } ?>  value="enable" /> 
  
  		<label for="author_bio"><small class="description"> Disable</small></label> 
		<input type="radio" name="author_bio" <?php if(get_option('author_bio')=="disable" || get_option('author_bio')=="" ) {?> checked="checked" <?php } ?>  value="disable" />
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Cuf&oacute;n / Google Font</span></h3>
<div class="inside">

<table class="form-table">

<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label for="nv_font_type">Font Type</label> 
	</td>
	<td class="tr-top" style="width:140px;">
		<label for="nv_font_type">Cuf&oacute;n Fonts</label> 
    	<input type="radio" name="nv_font_type" <?php if(get_option('nv_font_type')=="enable") {?> checked="checked" <?php } ?>  value="enable" /> 
	</td>
	<td class="tr-top" style="width:140px;">
    	<label for="nv_font_type">Google Fonts</label> 
    	<input type="radio" name="nv_font_type" <?php if(get_option('nv_font_type')=="enable_google" || get_option('nv_font_type')=="") {?> checked="checked" <?php } ?>  value="enable_google" />
	</td>
	<td class="tr-top">
		<label for="nv_font_type">Normal</label> 
    	<input type="radio" name="nv_font_type" <?php if(get_option('nv_font_type')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
	</td>    
</tr>

<tr valign="top">
  <td class="tr-top" colspan="4"  style="background:#fff;">
    <strong class="tooltip-next">Custom Cuf&oacute;n Font</strong> <div class="tooltip-info"></div><div class="tooltip" style="max-width:400px;">
 	Upload your Cuf&oacute;n javascript file to your media libary and enter the URL into the box. The font will then appear in the headings menu (Skin Manager) when Cuf&oacute;n is enabled.
    </div><br class="clear" /><br />
	<label for="nv_font_type">Font URL</label> 
        <input type="text" name="cufon_font" id="cufon_font" size="50" value="<?php echo get_option('cufon_font'); ?>" /> 
        <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="cufon_font" class="thickbox button custom_media_uploader">Upload / Insert</a>
		<p><br /><small>Download <a href="http://www.cufonfonts.com/" target="_blank">Cuf&oacute;n Fonts</a></small></p>
  </td>
</tr>
<tr valign="top">
  <td class="tr-top" colspan="4">
	<strong class="tooltip-next">Custom Google Fonts</strong> <div class="tooltip-info"></div><div class="tooltip" style="max-width:400px;">
    <strong>Step 1.</strong><br />
    Goto the Google font <a href="http://www.google.com/webfonts#ChoosePlace:select" target="_blank">library</a> - find the font you require and click the '<em>Quick-use</em>'.<br />
    <img src="<?php echo get_template_directory_uri() ?>/lib/adm/imgs/googlefont-step-1.jpg" alt="google font step one" /><br />
    <strong>Step 2.</strong><br />
    Add the font <strong>URL Name</strong> - see example below. e.g. <em>Kaushan+Script</em><br />
    <img src="<?php echo get_template_directory_uri() ?>/lib/adm/imgs/googlefont-step-2.jpg" alt="google font step two" /><br />
    <strong>Step 3.</strong><br />
    Add the font <strong>CSS Name</strong> - see example below. e.g. <em>'Kaushan Script'</em> - include the quoatation marks if displayed (Not all fonts require quotation marks)<br />
    <img src="<?php echo get_template_directory_uri() ?>/lib/adm/imgs/googlefont-step-3.jpg" alt="google font step three" /><br />    

    </div><br class="clear" /><br />
	<table class="form-table borderless">
		<tr>
        	<td style="width:300px;padding:0;">
            	<small><strong><em>Custom Font One</em></strong></small><br />
                <label for="nv_font_type">URL Name</label> 
                <input type="text" name="googlefont_url_1" size="20" value="<?php echo get_option('googlefont_url_1'); ?>" />
                <br />
                <label for="nv_font_type">CSS Name</label> 
                <input type="text" name="googlefont_css_1" size="20" value="<?php echo get_option('googlefont_css_1'); ?>" />
			</td>
       		<td style="padding:0;">
				<small><strong><em>Custom Font Two</em></strong></small><br />
                <label for="nv_font_type">URL Name</label> 
                <input type="text" name="googlefont_url_2" size="20" value="<?php echo get_option('googlefont_url_2'); ?>" />
                <br />
                <label for="nv_font_type">CSS Name</label> 
                <input type="text" name="googlefont_css_2" size="20" value="<?php echo get_option('googlefont_css_2'); ?>" />
			</td>            
		</tr>
	</table><br />
    <small>Google Fonts <a href="http://www.google.com/webfonts#ChoosePlace:select" target="_blank">Library</a></small>         
  </td>
</tr>
</table>

</div><!-- /inside -->
</div><!-- /postbox -->


<?php if (class_exists( 'BP_Core_User' ) || class_exists( 'bbPress' ) ) { ?>
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>BuddyPress / bbPress Pages Layout</span></h3>
<div class="inside">
<table class="form-table">
    <tr valign="top">
    <td class="tr-top" style="width:120px;">
    	<label>Page Layout</label>
    </td>
    <td class="tr-top">
    
        <select name="buddylayout">
            <option <?php if(get_option('buddylayout')=="layout_four") {?> selected="selected" <?php } ?> value="layout_four">1x Column (Right)</option>    
            <option <?php if(get_option('buddylayout')=="layout_one") {?> selected="selected" <?php } ?> value="layout_one">Full Width</option>
            <option <?php if(get_option('buddylayout')=="layout_two") {?> selected="selected" <?php } ?> value="layout_two">1x Column (Left)</option>
            <option <?php if(get_option('buddylayout')=="layout_three") {?> selected="selected" <?php } ?> value="layout_three">2x Column (Left)</option>
            <option <?php if(get_option('buddylayout')=="layout_five") {?> selected="selected" <?php } ?> value="layout_five">2x Column (Right)</option>
            <option <?php if(get_option('buddylayout')=="layout_six") {?> selected="selected" <?php } ?> value="layout_six">2x Column (Left,Right)</option>
        </select>         
            
      </td>
    </tr>
	<tr valign="top">
		<td class="tr-top" srtle="width:120px">
			<label for="buddycolone">Select Sidebar</label> 
		</td>
        <td class="tr-top">            
                <select name="buddycolone">
                        <?php
                            $num_sidebars=get_option('sidebars_num');
                            
                            if(!$num_sidebars) $num_sidebars='2';
                            $i=1;
                            while($i<=$num_sidebars)
                                { ?>
                                    <option value="Sidebar<?php echo $i; ?>" <?php if(get_option('buddycolone')=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
                                <?php $i++;
                                } 
                        ?>
                </select>
 		 </td>
	</tr>  
</table>


</div><!-- /inside -->
</div><!-- /postbox -->
<?php } ?>




<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Sidebars</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label for="sidebars_num">Number of Sidebars</label>
	</td>
    <td class="tr-top">           
		<input type="text" name="sidebars_num"  size="4" value="<?php echo get_option('sidebars_num'); ?>" /><small class="description">Default is 2 Sidebars. See <a href="/wp-admin/widgets.php">Widgets</a>.</small>
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>JW Player Configuration</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
    <strong class="tooltip-next">Upload JW Player Core Files</strong> <div class="tooltip-info"></div><div class="tooltip">For JW Player to work you <strong>MUST</strong> download the core files from <a href="http://www.longtailvideo.com/players/jw-flv-player/" target="_blank">Longtail Video</a>. 
        <br />You can upload the following files <em>( jwplayer.js, player.swf )</em> into the media library using the upload/insert link for each field - locate the file and click 'use' to automatically insert into the field.</div><br class="clear" /><br />
        
    	<p style="margin-bottom:5px;">
        <label for="jwplayer_js" style="width:200px;display:inline-block;"><strong>jwplayer.js</strong> <small class="description"> Javascript File </small></label>
        <input type="text" name="jwplayer_js" id="jwplayer_js" size="50" class="sliders" value="<?php echo get_option('jwplayer_js'); ?>" />
        <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="jwplayer_js" class="thickbox button custom_media_uploader">Upload / Insert</a>
    	</p>
        
        <p style="margin-bottom:5px;">
        <label for="jwplayer_swf" style="width:200px;display:inline-block;"><strong>player.swf</strong> <small class="description"> Flash File </small></label>
        <input type="text" name="jwplayer_swf" id="jwplayer_swf" size="50" value="<?php echo get_option('jwplayer_swf'); ?>" />
        <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="jwplayer_swf" class="thickbox button custom_media_uploader">Upload / Insert</a> <br /> 	
        </p>
        
        <p style="margin-bottom:5px;">
		<label for="jwplayer_plugins" style="width:200px;display:inline-block;">Plugins <small class="description">( Comma Separated )</small></label>
        <input type="text" name="jwplayer_plugins" id="jwplayer_plugins" size="50" value="<?php echo get_option('jwplayer_plugins'); ?>" />
        <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="jwplayer_plugins" class="thickbox button custom_media_uploader">Upload / Insert</a> <br /> 	
        </p>
        
        <p style="margin-bottom:5px;">
		<label for="jwplayer_skin" style="width:200px;display:inline-block;">Skin File <small class="description">( .zip )</small></label>
        <input type="text" name="jwplayer_skin" id="jwplayer_skin" size="50" value="<?php echo get_option('jwplayer_skin'); ?>" />
        <a href="<?php echo site_url(); ?>/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="jwplayer_skin" class="thickbox button custom_media_uploader">Upload / Insert</a> <br /> 	
        </p>
        
        <p style="margin-bottom:5px;">
		<label for="jwplayer_height" style="width:200px;display:inline-block;">Player Height</label>
        	<input type="text" name="jwplayer_height" size="2" value="<?php echo get_option('jwplayer_height'); ?>" /> <small class="description"> px (default 24 - optional if using a custom jwplayer skin)</small><br />               
		<label for="jwplayer_skinpos" style="width:200px;display:inline-block;">Controlbar Position</label>	
        <select name="jwplayer_skinpos">
            <option <?php if(get_option('jwplayer_skinpos')=="") {?> selected="selected" <?php } ?> value="">Over</option>
            <option <?php if(get_option('jwplayer_skinpos')=="top") {?> selected="selected" <?php } ?> value="top">Top</option>
            <option <?php if(get_option('jwplayer_skinpos')=="bottom") {?> selected="selected" <?php } ?> value="bottom">Bottom</option>                  
        </select>
        </p>
  
    
    <p>&nbsp;</p>
		    
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Flickr API</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label  class="tooltip-next" for="flickr_apikey">Flick API Key</label>
		<div class="tooltip-info"></div>
		<div class="tooltip">Obtain your <a href="http://www.flickr.com/services/apps/create/apply" target="_blank">API Key</a> from Flickr, if you do not have one already, apply for a non-commercial key. 
        <br />Next you'll require your Flickr <a href="http://www.flickr.com/services/api/explore/?method=flickr.people.findByUsername" target="_blank">User ID</a> e.g. XXXXXXXX@NO2.
	</div>        
	</td>
    <td class="tr-top">           
		<input type="text" name="flickr_apikey" size="30" value="<?php echo get_option('flickr_apikey'); ?>" />
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
		<label for="flickr_userid">Flick User ID</label>
	</td>
    <td class="tr-top"  style="background:#fff;">           
		<input type="text" name="flickr_userid" size="30" value="<?php echo get_option('flickr_userid'); ?>" />
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Timthumb Image Resizing Script</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label for="timthumb_disable">Timthumb</label>
	</td>
    <td class="tr-top">           
        <label for="timthumb_disable">Enable</label> 
        <input type="radio" name="timthumb_disable" <?php if(get_option('timthumb_disable')=="" ) {?> checked="checked" <?php } ?>  value="" /> 
      
        <label for="timthumb_disable">Disable</label> 
        <input type="radio" name="timthumb_disable" <?php if(get_option('timthumb_disable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />	  
	</td>
</tr>
</table>

</div><!-- /inside -->
</div><!-- /postbox -->

<?php /*
<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>jQuery Priority Loading</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label  class="tooltip-next" for="priority_loading">jQuery Priority</label>
		<div class="tooltip-info"></div>
		<div class="tooltip">This option is allows HTML to load before any Javascript is initiated. This should improve your <em>Google Page Speed</em> score.</div>        
	</td>
    <td class="tr-top">           
  		<label for="priority_loading">Enable</label> 
		<input type="radio" name="priority_loading" <?php if(get_option('priority_loading')=="enable" ) {?> checked="checked" <?php } ?>  value="enable" /> 
  
  		<label for="priority_loading">Disable</label> 
		<input type="radio" name="priority_loading" <?php if(get_option('priority_loading')=="") {?> checked="checked" <?php } ?>  value="" />
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->
*/?>

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Gallery Slide Set</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px;">
		<label for="timthumb_disable">Gallery Slide Sets</label>
	</td>
    <td class="tr-top">
       
  	<label for="slideset_enable">Enable</label> 
	<input type="radio" name="slideset_enable" <?php if(get_option('slideset_enable')=="enable" ) {?> checked="checked" <?php } ?>  value="enable" /> 
  
  	<label for="slideset_disable">Disable</label> 
	<input type="radio" name="slideset_enable" <?php if(get_option('slideset_enable')=="") {?> checked="checked" <?php } ?>  value="" /><br />
	<small><em style="color:#f60000">Deprecated</em> function, enable for support with DynamiX Gallery Slide Sets only.</small> 
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff">
		<label for="timthumb_disable">Image Library</label>
	</td>
    <td class="tr-top" style="background:#fff">
	<label for="medialib_disable">Enable</label> 
	<input type="radio" name="medialib_disable" <?php if(get_option('medialib_disable')=="" ) {?> checked="checked" <?php } ?>  value="" /> 

	<label for="medialib_disable">Disable</label> 
	<input type="radio" name="medialib_disable" <?php if(get_option('medialib_disable')=="disable") {?> checked="checked" <?php } ?>  value="disable" />	  		
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<p><input type="submit" name="save" class="button-primary" value="<?php _e('Save Changes','NorthVantage') ?>" /></p>
<hr />

</div>
</div>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="inskin,outskin,branding_url,font_color,font_link,font_hover,side_link,side_hover,sidebars_num,nv_font_type,cufontags,cufon_font,cufongradpri_1,cufongradpri_2,cufongradpri_3,cufongradpri_4,cufongradsec_1,cufongradsec_2,cufongradsec_3,cufongradsec_4,twitter_usrname,twitter_feednum,twitter_label" />

</form>

<form method="post" id="themeoptions-export" action="" enctype="multipart/form-data">
<div class="metabox-holder">
<div>


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Export / Import Theme Settings</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
        <label for="theme_export"><strong>Export General Theme Settings</strong></label><br />
<small class="description">Highlight all data below and copy/paste and save into a text file.</small><br />
        <textarea name="theme_export" style="width:400px;height:100px;" id="theme_export" /><?php echo $settings_options; ?></textarea><small class="description"></small>
    </td>
	<td class="tr-top">
        <label for="theme_import"><strong>Import General Theme Settings</strong></label><br />
<small class="description">Upload previously generated export text file into this field and click the 'Import Data' button.</small><br />
        <input name="theme_import"  type="file" />
        <p class="submit"><br />
			<input type="submit" name="save" class="button-primary" value="<?php _e('Import Data','NorthVantage') ?>" />
		</p>        
        
    </td>    
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

</div>
</div>
</form>

<form method="post" id="skin-export" action="" enctype="multipart/form-data">
<div class="metabox-holder">
<div>


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Export / Import Skin Mananger Settings</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top">
        <label for="sidebars_num"><strong>Export Skin Settings</strong></label><br />
<small class="description">Highlight all data below and copy/paste and save into a text file.</small><br />
        <textarea name="skins_export" style="width:400px;height:100px;" id="skins_export" /><?php echo $skin_data_options; ?></textarea><small class="description"></small>
    </td>
	<td class="tr-top">
        <label for="sidebars_num"><strong>Import Skin Settings</strong></label><br />
<small class="description">Upload previously generated export text file into this field and click the 'Import Data' button.</small><br />
        <input name="skins_import"  type="file" />
        <p class="submit"><br />
			<input type="submit" name="save" class="button-primary" value="<?php _e('Import Data','NorthVantage') ?>" />
		</p>        
    </td>    
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

</div>
</div>
</form>


</div>