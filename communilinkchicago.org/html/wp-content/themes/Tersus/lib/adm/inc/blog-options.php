<div class="wrap">
<form method="post" action="options.php">
<?php settings_fields( 'blog-settings-group' ); ?>
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">Blog / Archive Settings</h2>

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Blog Pages Layout</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px">
		<label for="arhlayout">Page Layout</label>
	</td>
    <td class="tr-top">           
		<div class="page-options medium">
            <label for="arhlayout">Full Width</label><br />
            <input type="radio" name="arhlayout" <?php if(get_option('arhlayout')=="layout_one") {?> checked="checked" <?php } ?>  value="layout_one" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_one.png" alt="layout full width" />
        </div>
		<div class="page-options medium">   
            <label for="arhlayout">1x Column (Left)</label><br />
            <input type="radio" name="arhlayout" <?php if(get_option('arhlayout')=="layout_two") {?> checked="checked" <?php } ?>  value="layout_two" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_two.png" alt="layout one column left" />
        </div>

		<div class="page-options medium">
            <label for="arhlayout">2x Column (Left) </label><br />
            <input type="radio" name="arhlayout" <?php if(get_option('arhlayout')=="layout_three") {?> checked="checked" <?php } ?>  value="layout_three" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_three.png" alt="layout one column right" />
        </div>           

		<div class="page-options medium">
            <label for="arhlayout">1x Column (Right) </label><br />
            <input type="radio" name="arhlayout" <?php if(get_option('arhlayout')=="layout_four") {?> checked="checked" <?php } ?>  value="layout_four" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_four.png" alt="layout one column right" />
        </div>    


		<div class="page-options medium">
            <label for="arhlayout">2x Column (Right) </label><br />
            <input type="radio" name="arhlayout" <?php if(get_option('arhlayout')=="layout_five") {?> checked="checked" <?php } ?>  value="layout_five" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_five.png" alt="layout one column right" />
        </div>   

		<div class="page-options medium">
            <label for="arhlayout">2x Column (Left,Right) </label><br />
            <input type="radio" name="arhlayout" <?php if(get_option('arhlayout')=="layout_six") {?> checked="checked" <?php } ?>  value="layout_six" /> <img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/layout_six.png" alt="layout one column right" />
        </div>    
        
	</td>
</tr>

<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
		<?php 
        $num_sidebars=get_option('sidebars_num');
        
        if($num_sidebars=="") {
            $num_sidebars="2"; // set default sidebars if no option is set
        }
        
        ?>    
		<label for="archcolone">Select Sidebar</label>
	</td>
    <td class="tr-top"  style="background:#fff;">           
        <select name="archcolone">
                <?php
                    $i=1;
                    while($i<=$num_sidebars)
                        { ?>
                            <option value="Sidebar<?php echo $i; ?>" <?php if(get_option('archcolone')=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
                        <?php $i++;
                        } 
                ?>
        </select>    
	</td>
</tr>
<?php /*
<tr valign="top">
	<td class="tr-top" style="width:120px">
		<label for="archcontentborder">Content Border</label>
	</td>
    <td class="tr-top">           
		<label for="archcontentborder"><small class="description">Enable</small></label> 
		<input type="radio" name="archcontentborder" <?php if(get_option('archcontentborder')=="enable" || get_option('archcontentborder')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 
        <label for="archcontentborder"><small class="description">Disable</small></label> 
		<input type="radio" name="archcontentborder" <?php if(get_option('archcontentborder')=="disable") {?> checked="checked" <?php } ?>  value="disable" />            
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
           <label for="archbreadcrumb">Breadcrumbs</label>
	</td>
    <td class="tr-top" style="background:#fff;">           
		<label for="archbreadcrumb"><small class="description">Enable</small></label> 
		<input type="radio" name="archbreadcrumb" <?php if(get_option('archbreadcrumb')=="enable" || get_option('archbreadcrumb')=="" ) {?> checked="checked" <?php } ?>  value="enable" /> 
        <label for="archbreadcrumb"><small class="description">Disable</small></label> 
		<input type="radio" name="archbreadcrumb" <?php if(get_option('archbreadcrumb')=="disable") {?> checked="checked" <?php } ?>  value="disable" />
	</td>
</tr>
<?php*/ ?>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Blog Pages Content</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
	<td class="tr-top">
		<label for="arhpostdisplay">Layout Type</label>
    </td>
    <td class="tr-top">           
        <select name="arhpostdisplay">
            <option <?php if(get_option('arhpostdisplay')=="") {?> selected="selected" <?php } ?> value="">Normal</option>    
            <option <?php if(get_option('arhpostdisplay')=="grid") {?> selected="selected" <?php } ?> value="grid">Grid</option>                      
        </select>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
		<label for="arhpostcolumns">Grid Layout Columns</label>
    </td>    
    <td class="tr-top" style="background:#fff;">           
        <select name="arhpostcolumns">
        	<?php
			
				$columns = array(
				'two' 	=> '2',
				'three' => '3',
				'four' 	=> '4',
				'five' 	=> '5',
				'six' 	=> '6',
				);
				
				foreach( $columns as $column => $num ) {
					$selected = ( get_option('arhpostcolumns') == $num ? $selected = 'selected="selected"' : '');
					
					echo '<option '. $selected .' value="'. $num .'">'. $column .'</option>';   
				}
				
			?>                
        </select>
	</td>
  </td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;">
           <label class="tooltip-next" for="arhpostcontent">Post Content</label><div class="tooltip-info"></div><div class="tooltip">Custom Image - URL of Image File (see posts)<br />
First Image - The first image inserted into the post. <br />
Full Post - NOT recommended for large posts</div>
	</td>
    <td class="tr-top">           
        <select name="arhpostcontent">
            <option <?php if(get_option('arhpostcontent')=="") {?> selected="selected" <?php } ?> value="">Excerpt Only</option>    
            <option <?php if(get_option('arhpostcontent')=="excerpt_image") {?> selected="selected" <?php } ?> value="excerpt_image">Excerpt + First Image / Custom Image</option>  
            <option <?php if(get_option('arhpostcontent')=="image_only") {?> selected="selected" <?php } ?> value="image_only">First Image / Custom Image Only</option>    
            <option <?php if(get_option('arhpostcontent')=="full_post") {?> selected="selected" <?php } ?> value="full_post">Full Post</option>                              
        </select>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
		<label class="tooltip-next" for="arhpostpostmeta">Post Metadata</label><div class="tooltip-info"></div><div class="tooltip">Display Comments, Tags, Date Metadata</div>           
	</td>
    <td class="tr-top" style="background:#fff;">           
        <select name="arhpostpostmeta">
            <option <?php if(get_option('arhpostpostmeta')=="") {?> selected="selected" <?php } ?> value="">Archive / Single Post</option>    
            <option <?php if(get_option('arhpostpostmeta')=="archive_only") {?> selected="selected" <?php } ?> value="archive_only">Archive Only</option>  
            <option <?php if(get_option('arhpostpostmeta')=="post_only") {?> selected="selected" <?php } ?> value="post_only">Single Post Only</option>    
            <option <?php if(get_option('arhpostpostmeta')=="disabled") {?> selected="selected" <?php } ?> value="disabled">Disabled</option>                              
        </select>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px">
		<label class="tooltip-next" for="postmetaalign">Post Metadata Align</label><div class="tooltip-info"></div><div class="tooltip">Choose the alignment of the Postmeta Data.</div>           
	</td>
    <td class="tr-top">           
        <select name="postmetaalign">
            <option <?php if(get_option('postmetaalign')=="") {?> selected="selected" <?php } ?> value="">Left Aligment</option>    
            <option <?php if(get_option('postmetaalign')=="post_title") {?> selected="selected" <?php } ?> value="post_title">Post Title</option>                           
        </select>
	</td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Blog Pages Images</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px">
           <label for="arhimgalign">Image Alignment</label>
	</td>
    <td class="tr-top">           
            <select name="arhimgalign">
                <option <?php if(get_option('arhimgalign')=="" || get_option('arhimgalign')=="aligncenter") {?> selected="selected" <?php } ?> value="aligncenter">Center</option>    
                <option <?php if(get_option('arhimgalign')=="alignleft") {?> selected="selected" <?php } ?> value="alignleft">Left</option>                      
                <option <?php if(get_option('arhimgalign')=="alignright") {?> selected="selected" <?php } ?> value="alignright">Right</option> 
            </select>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px">
           <label for="arhimgeffect">Image Effect</label>
	</td>
    <td class="tr-top">           
            <select name="arhimgeffect">
                <option <?php if(get_option('arhimgeffect')=="") {?> selected="selected" <?php } ?> value="">Shadow / Reflection</option>    
                <option <?php if(get_option('arhimgeffect')=="reflection") {?> selected="selected" <?php } ?> value="reflection">Reflection</option>                      
                <option <?php if(get_option('arhimgeffect')=="shadow") {?> selected="selected" <?php } ?> value="shadow">Shadow</option> 
                <option <?php if(get_option('arhimgeffect')=="frame") {?> selected="selected" <?php } ?> value="frame">Frame</option> 
                <option <?php if(get_option('arhimgeffect')=="none") {?> selected="selected" <?php } ?> value="none">None</option> 
            </select>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
            <label for="arhimgdisplay">Enable Lightbox</label>
	</td>
    <td class="tr-top" style="background:#fff;">
            <select name="arhimgdisplay">
                <option <?php if(get_option('arhimgdisplay')=="") {?> selected="selected" <?php } ?> value="">Disabled</option>    
                <option <?php if(get_option('arhimgdisplay')=="lightbox") {?> selected="selected" <?php } ?> value="lightbox">Enabled</option>                      
            </select>        
  </td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px">
        <label for="arhimgheight">Image Height</label>
	</td>
	<td class="tr-top" >
        <input type="text" name="arhimgheight" size="6" value="<?php echo get_option('arhimgheight'); ?>" /><small class="description">px &nbsp;&nbsp; (default is 300) - If width value is blank it will be automatically calculated from this height value </small>
  </td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
        <label for="arhimgheight">Image Width</label>
	</td>    
	<td class="tr-top" style="background:#fff;">        
        <input type="text" name="arhimgwidth" size="6" value="<?php echo get_option('arhimgwidth'); ?>" /><small class="description">px</small>
  </td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Single Post Images</span></h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
	<td class="tr-top" style="width:120px">
           <label for="postimgalign">Image Alignment</label>
	</td>
    <td class="tr-top">           
            <select name="postimgalign">
                <option <?php if(get_option('postimgalign')=="" || get_option('postimgalign')=="aligncenter") {?> selected="selected" <?php } ?> value="aligncenter">Center</option>    
                <option <?php if(get_option('postimgalign')=="alignleft") {?> selected="selected" <?php } ?> value="alignleft">Left</option>                      
                <option <?php if(get_option('postimgalign')=="alignright") {?> selected="selected" <?php } ?> value="alignright">Right</option> 
            </select>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px">
           <label for="postimgeffect">Image Effect</label>
	</td>
    <td class="tr-top">           
            <select name="postimgeffect">
                <option <?php if(get_option('postimgeffect')=="") {?> selected="selected" <?php } ?> value="">Shadow / Reflection</option>    
                <option <?php if(get_option('postimgeffect')=="reflection") {?> selected="selected" <?php } ?> value="reflection">Reflection</option>                      
                <option <?php if(get_option('postimgeffect')=="shadow") {?> selected="selected" <?php } ?> value="shadow">Shadow</option> 
                <option <?php if(get_option('postimgeffect')=="frame") {?> selected="selected" <?php } ?> value="frame">Frame</option> 
                <option <?php if(get_option('postimgeffect')=="none") {?> selected="selected" <?php } ?> value="none">None</option> 
            </select>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
            <label for="postimgdisplay">Enable Lightbox</label>
	</td>
    <td class="tr-top" style="background:#fff;">
            <select name="postimgdisplay">
                <option <?php if(get_option('postimgdisplay')=="") {?> selected="selected" <?php } ?> value="">Disabled</option>    
                <option <?php if(get_option('postimgdisplay')=="lightbox") {?> selected="selected" <?php } ?> value="lightbox">Enabled</option>                      
            </select>        
  </td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px">
        <label for="postimgheight">Image Height</label>
	</td>
	<td class="tr-top" >
        <input type="text" name="postimgheight" size="6" value="<?php echo get_option('postimgheight'); ?>" /><small class="description">px &nbsp;&nbsp; If width value is blank it will be automatically calculated from this height value </small>
  </td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff;">
        <label for="postimgheight">Image Width</label>
	</td>    
	<td class="tr-top" style="background:#fff;">        
        <input type="text" name="postimgwidth" size="6" value="<?php echo get_option('postimgwidth'); ?>" /><small class="description">px</small>
  </td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->


<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes', 'NorthVantage') ?>" />
</p>


</div>
</div>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="inskin,outskin,branding_url,font_color,font_link,font_hover,side_link,side_hover,sidebars_num,nv_font_type,cufontags,cufon_font,cufongradpri_1,cufongradpri_2,cufongradpri_3,cufongradpri_4,cufongradsec_1,cufongradsec_2,cufongradsec_3,cufongradsec_4,twitter_usrname,twitter_feednum,twitter_label" />


</form>
</div>