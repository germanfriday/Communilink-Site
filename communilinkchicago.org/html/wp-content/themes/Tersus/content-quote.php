<?php
/**
 * The template for displaying posts in the Quote Post Format on index and archive pages
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
        <section class="entry row">
			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
                <?php the_excerpt(); ?>
            <?php else : ?>
                <?php echo do_shortcode('[blockquote type="blockquote_quotes" align="center"]'. get_the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'NorthVantage' )).'[/blockquote]'); ?>
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