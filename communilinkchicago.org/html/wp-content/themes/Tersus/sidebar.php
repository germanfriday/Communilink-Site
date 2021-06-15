<?php
/**
 * @package WordPress
 * @subpackage NorthVantage
*/

/***************************************************************/
/*	Call Custom Page Variables							   	  */
/***************************************************************/

if(!is_search()) {
	require NV_FILES ."/inc/page-constants.php"; // Get constants
}

// If not singular use default config.

if(!is_page()) {
	if(!is_singular()) {
	 $NV_layout=get_option("arhlayout"); 
	 $NV_sidebar_one_select=get_option("archcolone");
	 $NV_sidebar_two_select=get_option("archcoltwo");
	}
}

// If is singular but no layout config, use default.
if(!is_page()) {
	if(!$NV_layout) $NV_layout=get_option("arhlayout"); 
	if(!$NV_sidebar_one_select) $NV_sidebar_one_select=get_option("archcolone");
	if(!$NV_sidebar_two_select) $NV_sidebar_two_select=get_option("archcoltwo");
	
}

// Check if BuddyPress page
if (class_exists( 'BP_Core_User' ) ) {
	
	if(!bp_is_blog_page()) {
		$NV_layout=get_option("buddylayout"); 
		$NV_sidebar_one_select=get_option("buddycolone");
		$NV_sidebar_two_select=get_option("buddycoltwo");
	}
}

if( class_exists( 'bbPress' ) ) {

	if ( is_bbpress() ) {
		$NV_layout=get_option("buddylayout"); 
		$NV_sidebar_one_select=get_option("buddycolone");
		$NV_sidebar_two_select=get_option("buddycoltwo");
	}

}

global $NV_layout_force;

if($NV_layout_force) {
	$NV_layout="layout_four";
}


/***************************************************************/
/*	Call Custom Page Variables *END*					   	  */
/***************************************************************/

if( empty( $NV_sidebar_one_select ) ) $NV_sidebar_one_select ='Sidebar1'; 
if( empty( $NV_sidebar_two_select ) ) $NV_sidebar_two_select ='Sidebar2'; 

if(
	$NV_layout=='layout_three' || 
	$NV_layout=='layout_five' || 
	$NV_layout=='layout_six'
) 	$NV_columns ='three'; else $NV_columns='four';

if($NV_layout=="layout_six" || $NV_layout=="layout_two" || $NV_layout=="layout_three" ) { ?>
		
    <div class="sidebar columns <?php echo $NV_columns; ?> <?php if($NV_sidebar_one_borders=="sidebarwrap") { echo 'border'; } ?>">
        <ul>
            <?php  if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($NV_sidebar_one_select)) : endif; ?>
        </ul>
    </div><!-- /sidebar-content -->


<?php if($NV_layout=="layout_three") { ?>     

    <div class="sidebar columns <?php echo $NV_columns; ?>  <?php if($NV_sidebar_two_borders=="sidebarwrap") { echo 'border'; } ?>">
        <ul>
            <?php  if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($NV_sidebar_two_select)) : endif; ?>
        </ul>
    </div><!-- /sidebar-content -->
   
<?php } 

}

if($NV_layout!="layout_one") { ?>
	
    <?php if($NV_layout!="layout_two" && $NV_layout!="layout_three" && $NV_layout!="layout_six" ) { ?>


    <div class="sidebar columns <?php echo $NV_columns; ?>  <?php if($NV_sidebar_one_borders=="sidebarwrap") { echo 'border'; } ?> <?php if($NV_layout=="layout_four" || $NV_layout=='') echo 'right last';  ?>">
        <ul>
            <?php  if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($NV_sidebar_one_select)) : endif; ?>
        </ul>
    </div><!-- /sidebar-content -->

     
<?php } 

if($NV_layout=="layout_five" || $NV_layout=="layout_six") { ?>

    <div class="sidebar columns <?php echo $NV_columns; ?>  <?php if($NV_sidebar_two_borders=="sidebarwrap") { echo 'border'; } ?> <?php if($NV_layout=="layout_five" || $NV_layout=='layout_six') echo 'right last';  ?>">
        <ul>
            <?php  if (!function_exists('dynamic_sidebar') || !dynamic_sidebar($NV_sidebar_two_select)) : endif; ?>
        </ul>
    </div><!-- /sidebar-content -->    
     
<?php } 

} ?>