<?php
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * @package WordPress
*/
 
/* :: Get Custom Field Data
---------------------------------------------*/

include(NV_FILES .'/inc/classes/blog-class.php');
include(NV_FILES .'/inc/classes/post-fields-class.php');

/* :: / -------------------------------------*/ 

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<div class="row clearfix"> 
    
		<?php if($NV_arhpostpostmeta=='display' && $NV_postmetaalign=='') { ?>
        <aside class="post-metadata columns two">
        	<?php include(NV_FILES .'/inc/classes/metadata-class.php'); // Style Meta Data ?>
        </aside><!-- /post-metadata -->
        <?php } ?>
        
        <section class="entry <?php echo $columns; ?> row">
  
                <?php if(isset($NV_previewimgurl)) {
                    echo do_shortcode('[imageeffect type="'.$NV_imageeffect.'" '.$NV_image_size.' align="'.$NV_imgalign.'" alt="'.get_the_title().'" link="'.$NV_permalink.'" '.$NV_showlightbox.' url="'.$NV_previewimgurl.'" ]'); 
                } ?>
           
            <div class="post-titles">
            
				<?php include(NV_FILES .'/inc/classes/post-title-class.php'); // Style Post Titles ?>

				<?php if($NV_arhpostpostmeta=='display' && $NV_postmetaalign=='post_title') { ?>
                     
                <?php include(NV_FILES .'/inc/classes/metadata-class.php'); ?>
                    
                <?php } ?>
            
            </div><!-- / .post-titles -->
        	
            <?php echo $NV_description; 
			
			if(!isset($NV_disablereadmore)) $NV_disablereadmore='';
			
            if($NV_disablegallink!='yes' && $NV_disablereadmore!='yes' && $NV_nolink!='yes') { ?>
           	<p><a class="read-more" href="<?php if($NV_galexturl) echo $NV_galexturl; else echo get_permalink(); ?>"><?php _e( 'Read more  &rarr;', 'NorthVantage' );  ?></a></p>
            <?php } ?>
            
            <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'NorthVantage' ) . '</span>', 'after' => '</div>' ) ); ?>
       
        </section><!-- / .entry -->      
 	</div><!-- / .row -->
    
    <?php if($is_widget!=true) {  // Check if placed within a widget ?>
    
    <footer class="row">
		<?php if(is_archive() || is_home() || $is_blog_page) { ?>
        <div class="<?php echo $offset_columns; ?>">
        	<div class="hozbreak-top clearfix blog"><a href="#top" class="clearfix"><?php _e( 'Back to Top', 'NorthVantage' ); ?></a></div>
        </div>
		<?php } elseif(is_single()) { 
			include(NV_FILES .'/inc/classes/single-class.php');
		} // end if single ?>
    </footer>
    
    <?php } ?>
    
</article><!-- #post-<?php the_ID(); ?> -->