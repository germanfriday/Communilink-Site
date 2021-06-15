<?php require NV_FILES .'/adm/inc/widget-options.php'; ?>

<div class="wrap">
<form method="post" action="options.php">
<?php settings_fields( 'footer-settings-group' ); ?>
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">Footer Settings</h2>

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div>
<h3 class='hndle'><span>Footer Options</span></h3>
<div class="inside">

<table class="form-table">
<tr valign="top">
	<td class="tr-top" stlye="width:120px">
		<label for="mainfooter">Display Footer</label>
	</td>
    <td class="tr-top">
		<label for="mainfooter">Enable</label> 
    	<input type="radio" class="hspace" name="mainfooter" <?php if(get_option('mainfooter')=="enable" || get_option('mainfooter')=="") {?> checked="checked" <?php } ?>  value="enable" />
    	<label for="mainfooter">Disable</label> 
    	<input type="radio" class="hspace" name="mainfooter" <?php if(get_option('mainfooter')=="disable") {?> checked="checked" <?php } ?>  value="disable" /><br />
        <small class="description">Disabling will remove the entire footer including the lower footer.</small>
	</td>
</tr>
<tr valign="top">
	<td class="tr-top" style="width:120px;background:#fff">
	<label for="footer_columns_num" class="tooltip-next">Columns</label><div class="tooltip-info"></div><div class="tooltip">Dimensions: <br />
4 Columns (width: 208px) <br />
3 Columns (width: 277px) <br />
2 Columns (width: 416px) <br />
1 Column (width: 832px)</div>
	</td>
    <td class="tr-top" style="background:#fff">
	<select name="footer_columns_num">
		<option <?php if(get_option('footer_columns_num')=="") {?> selected="selected" <?php } ?> value="">4 Columns</option>
		<option <?php if(get_option('footer_columns_num')=="3") {?> selected="selected" <?php } ?> value="3">3 Columns</option>
		<option <?php if(get_option('footer_columns_num')=="2") {?> selected="selected" <?php } ?> value="2">2 Columns</option> 
        <option <?php if(get_option('footer_columns_num')=="1") {?> selected="selected" <?php } ?> value="1">1 Column</option>                
	</select>
	</td>
</tr>
</table>
</div><!-- /inside -->
</div><!-- /postbox -->


<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div>
<h3 class='hndle'><span>Lower Footer Options</span></h3>
<div class="inside">

<table class="form-table">

<tr valign="top">
	<td class="tr-top"  style="width:120px">
		<label for="lowerfooter">Lower Footer</label> 
	</td>
	<td class="tr-top">
		<label for="lowerfooter">Enable</label> 
    	<input type="radio" class="hspace" name="lowerfooter" <?php if(get_option('lowerfooter')=="enable" || get_option('lowerfooter')=="") {?> checked="checked" <?php } ?>  value="enable" />
    	<label for="lowerfooter">Disable</label> 
    	<input type="radio" class="hspace" name="lowerfooter" <?php if(get_option('lowerfooter')=="disable") {?> checked="checked" <?php } ?>  value="disable" /><br />
		<small class="description">Disabling will remove the lower footer section completely.</small>
	</td>
</tr>

<tr valign="top">
	<td colspan="2" class="tr-top-lite title" style="background:#fff">
	Enter TEXT or HTML into the boxes below - either of these areas can contain <strong>Google Analytics Code</strong>. 
	</td>
</tr>
<tr valign="top">    
	<td class="tr-top-lite title"  style="width:120px">
		<label for="lowfooterleft">Lower footer (Left)</label> 
	</td>
	<td class="tr-top-lite">
		<textarea name="lowfooterleft" cols="70" rows="2" ><?php if(get_option('lowfooterleft')) { echo get_option('lowfooterleft'); } else { echo "&copy; ". date("Y") ." ".get_option("blogname"); } ?></textarea>
	</td>
</tr>

<tr valign="top">
	<td class="tr-top title" style="width:120px;background:#fff">
	<label for="lowfooterleft">Lower footer (Right)</label> 
	</td>
	<td class="tr-top" style="background:#fff">
		<textarea name="lowfooterright" cols="70" rows="2" /><?php if(get_option('lowfooterright')) { echo get_option('lowfooterright'); } ?></textarea>
        
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


