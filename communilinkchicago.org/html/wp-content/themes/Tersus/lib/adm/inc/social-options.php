<div class="wrap">
<form method="post" action="options.php">
<?php 
settings_fields( 'social-options-group' ); 

require NV_FILES .'/adm/inc/social-media-urls.php'; // get social media button links ?>

<div class="metabox-holder">
<div>
<div id="icon-themes" class="icon32"></div><h2 style="padding-bottom:15px">Social Media Options</h2>

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Social Media Button Links</span></h3>
<div class="inside">
<p>&nbsp;</p>
<small class="description">Leave fields <em>blank</em> to restore default URL's.</small>
<table class="form-table">
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_digg">Digg</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_digg" value="<?php echo $sociallink_digg; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_fb">Facebook</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_fb" value="<?php echo $sociallink_fb; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_linkedin">LinkedIn</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_linkedin" value="<?php echo $sociallink_linkedin; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_deli">Del.icio.us</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_deli" value="<?php echo $sociallink_deli; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_reddit">Reddit</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_reddit" value="<?php echo $sociallink_reddit; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_stumble">Stumble</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_stumble" value="<?php echo $sociallink_stumble; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_twitter">Twitter</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_twitter" value="<?php echo $sociallink_twitter; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_google">Google Plus</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_google" value="<?php echo $sociallink_google; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_rss">RSS</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_rss" value="<?php echo $sociallink_rss; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_youtube">YouTube</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_youtube" value="<?php echo $sociallink_youtube; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_vimeo">Vimeo</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_vimeo" value="<?php echo $sociallink_vimeo; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_pinterest">Pinterest</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_pinterest" value="<?php echo $sociallink_pinterest; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_instagram">Instagram</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_instagram" value="<?php echo $sociallink_instagram; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_soundcloud">Soundcloud</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_soundcloud" value="<?php echo $sociallink_soundcloud; ?>" /></td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:80px"><label for="sociallink_email">Email</label></td>
    <td class="tr-top"><input type="text" style="width:250px" name="sociallink_email" value="<?php echo $sociallink_email; ?>" /></td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Main RSS Feed</span>  </h3>
<div class="inside">
<table class="form-table">
<tr valign="top">
    <td class="tr-top" style="width:200px"><label for="rss_feed" class="tooltip-next">Main RSS Feed URL</label><div class="tooltip-info"></div><div class="tooltip">Enter Main RSS Feed URL. This must be a relative URL. e.g. /category/YOUR-CATEGORY-NAME/feed/ </div><br class="clear" /></td>
    <td class="tr-top"><input type="text" name="rss_feed" value="<?php echo get_option('rss_feed'); ?>" /><small class="description">e.g. /category/YOUR-CATEGORY-NAME/feed/</small> </td>
</tr>
<tr valign="top">
    <td class="tr-top" style="width:200px"><label for="rss_title">Main RSS Title</label></td>
    <td class="tr-top"><input type="text" name="rss_title" value="<?php if(get_option('rss_title')) echo get_option('rss_title'); else echo 'Blog'; ?>" /></td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<div class="postbox">
<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span>Twitter</span></h3>
<div class="inside">
<table class="form-table">

<tr valign="top">
<td class="tr-top" style="width:200px"><label for="twitter_usrname" class="tooltip-next">Enter your Twitter username</label>  <div class="tooltip-info"></div><div class="tooltip">By entering Twitter information, the users Tweets will be displayed when activated within pages or posts.</div><br class="clear" /></td>
<td class="tr-top"><input type="text" name="twitter_usrname" value="<?php echo get_option('twitter_usrname'); ?>" /><small class="description">Latest Tweets will be pulled from this username.</small> </td>
</tr>
<tr valign="top">
<td class="tr-top" style="width:200px"><label for="twitter_feednum">Number of Tweets</label></td>
<td class="tr-top"><input type="text" name="twitter_feednum" value="<?php echo get_option('twitter_feednum'); ?>" /><small class="description">Enter the amount of Tweets you would like to display.</small></td>
</tr>
</table>


</div><!-- /inside -->
</div><!-- /postbox -->

<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes','NorthVantage'); ?>" />
</p>


</div>
</div>

<input type="hidden" name="action" value="update" />
</form>
</div>