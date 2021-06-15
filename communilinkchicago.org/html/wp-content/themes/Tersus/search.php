<?php get_header(); 


/******************************************************************/
/*	Page Variables							      				 */
/******************************************************************/
$NV_layout=get_option("arhlayout");
/******************************************************************/
/*	Page Variables *END*					      				 */
/******************************************************************/

if($NV_hidecontent!="yes") { ?>

<?php if($NV_layout!="layout_four" && $NV_layout!="layout_five") { get_sidebar(); } ?>

	<div id="content" class="columns <?php if($NV_layout=="layout_one") { ?>twelve<?php } 
		elseif($NV_layout=="layout_two") { ?>eight last<?php }
		elseif($NV_layout=="layout_three") { ?>six last<?php }
		elseif($NV_layout=="layout_four") { ?>eight<?php }
		elseif($NV_layout=="layout_five") { ?>six<?php }
		elseif($NV_layout=="layout_six") { ?>six<?php }
		else { ?>eight<?php } ?>">

		<article>
<?php if ( have_posts() ) : ?>
   
			<h2 class="pagetitle"><?php _e('Search Results For: ', 'NorthVantage' ); ?> <?php /* Search Count*/ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = esc_html($s, 1); $count = $allsearch->post_count; echo '<span class="search-terms"> "'. $key .'</span>" ( '. $count . ' '. __('articles found','NorthVantage'). ' )'; wp_reset_query(); ?></h2>

		<?php while (have_posts()) : the_post(); ?>
                
                <h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<strong class="search-excerpt">\0</strong>', $title); ?><?php echo $title; ?></a></h3>
                
		<?php endwhile; ?>                
<?php else : ?>

		<h2><?php _e('No posts found. Try a different search? ', 'NorthVantage' ); ?></h2>

<?php endif; ?>                

<?php include(NV_FILES .'/inc/wp-pagenavi.php');
if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

		</article>
	</div><!-- #content -->
    
<?php get_sidebar(); ?>

<?php } // Hide Content *END* ?>

<?php get_footer(); ?>