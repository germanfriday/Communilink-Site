<div class="wrap">
<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">Wordpress Theme</h2>

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Documentation</span></h3>
<div class="inside">
<table width="246" class="form-table">
<tr>
	<td>
    <p>&nbsp;</p>
    <?php $theme_name = get_current_theme(); ?>
	<p><a href="http://help.northvantage.co.uk/docs/<?php echo strtolower($theme_name); ?>/" class="button-primary" title="Read Documentation" target="_blank">Theme Documentation</a></p> 
    <p>&nbsp;</p>
    
    If you're ready to configure the theme please use the links provided here or on the left hand menu under the <em>Theme Options</em> tab.  
    <p>&nbsp;</p>
    <a href="admin.php?page=general" class="button" title="General Settings">General Settings</a> <a href="admin.php?page=skinmanager" class="button" title="Skin Manager">Skin Manager</a> 
    <a href="admin.php?page=blog" class="button" title="Blog Settings">Blog Settings</a> <a href="admin.php?page=droppanel" class="button" title="Header Settings">Header Settings</a> 
    <a href="admin.php?page=footer" class="button" title="Footer Settings">Footer Settings</a>  <a href="admin.php?page=socialmedia" class="button" title="Social Media Options">Social Media Options</a> 
    <?php if(get_option('slideset_enable')=='enable') { ?>
    <a href="admin.php?page=gallery_slidesets" class="button" title="Gallery Slide Sets">Gallery Slide Sets</a> 
    <?php } ?>
    </td>
</tr>
</table>
</div><!-- /inside -->
</div><!-- /postbox -->


</div>
</div>
</div>