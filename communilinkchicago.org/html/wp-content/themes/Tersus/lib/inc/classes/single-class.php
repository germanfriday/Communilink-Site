<?php 
/**
 * The template for displaying single post data
 *
 * @package WordPress
*/


if(wp_get_post_tags($post->ID)) { // related posts ?>
<div id="related_posts" class="row">
    <section class=" <?php echo $columns.' '.$offset_columns; ?>">
    <?php add_image_size( 'related-posts', 84, 84, true );
    $tags = wp_get_post_tags($post->ID);
    if ($tags) {
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
    $args=array(
    'tag__in' => $tag_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=>5, // Number of related posts that will be shown.
    'caller_get_posts'=>1,
    'orderby'=>'rand' // Randomize the posts
    );
    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {
    echo '<h3>'.__('Related Posts','NorthVantage').'</h3>
    <ul>';
    while( $my_query->have_posts() ) {
    $my_query->the_post(); ?>
    <li class="columns five_column">
    <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>">
    <?php the_post_thumbnail( 'related-posts' ); ?>
    </a>
    <a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    </li>
    <?php }
    echo '</ul>';
    } }
    ?>
    <?php wp_reset_query(); ?>
    </section>
</div>
<?php }	?>
    
    
<?php if ( get_the_author_meta( 'description' ) && $NV_authorname) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
<div class="author-info row">
    <aside id="author-avatar" class="columns two">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 68 ); ?>
    </aside><!-- #author-avatar -->    

    <section id="author-description" class="columns ten last clearfix">
        <h3><?php printf( esc_attr__( 'About %s', 'NorthVantage' ), get_the_author() ); ?></h3>
        <p><?php the_author_meta( 'description' ); ?></p>
        <div id="author-link">
            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'NorthVantage' ), get_the_author() ); ?>
            </a>
        </div><!-- #author-link	-->
    </section><!-- #author-description -->
</div>
<?php endif;
comments_template();