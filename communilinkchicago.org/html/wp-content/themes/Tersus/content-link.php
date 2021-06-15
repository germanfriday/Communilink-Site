<?php
/**
 * The template for displaying posts in the Link Post Format on index and archive pages
 *
 * @package WordPress
*/
 
/* :: Get Custom Field Data
---------------------------------------------*/

include(NV_FILES .'/inc/classes/post-fields-class.php');

/* :: / -------------------------------------*/ 

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<div class="row clearfix"> 
		<?php if($NV_arhpostpostmeta=='display' && $NV_postmetaalign=='') { ?>
            
        <aside class="post-metadata columns two">
        <?php include(NV_FILES .'/inc/classes/metadata-class.php'); ?>
        </aside><!-- /post-metadata -->
            
        <?php } ?>
        
        <header class="post-titles <?php echo $columns; ?>">
			
			<?php include(NV_FILES .'/inc/classes/post-title-class.php'); // Style Post Titles ?>

			<?php if($NV_arhpostpostmeta=='display' && $NV_postmetaalign=='post_title') { ?>
                 
            <?php include(NV_FILES .'/inc/classes/metadata-class.php'); ?>
                
            <?php } ?>
            
        </header><!-- / .post-titles -->
        
        <section class="entry <?php echo $columns; ?>">
			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
                <?php the_excerpt(); ?>
            <?php else : ?>
                <?php do_shortcode(the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'NorthVantage' ) )); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'NorthVantage' ) . '</span>', 'after' => '</div>' ) ); ?>
            <?php endif; ?>
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