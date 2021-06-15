<?php
/**
 * @package WordPress
 * @subpackage NorthVantage
*/

/*
Template Name: Sitemap
*/ 

get_header();

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
            <h3><?php echo __('Pages', 'NorthVantage' ); ?></h3>
            <ul><?php wp_list_pages("title_li=" ); ?></ul>
            
            <h3><?php echo __('Feeds', 'NorthVantage' ); ?></h3>
            <ul>
                <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>
                <li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>
            </ul>
            
            <h3><?php echo __('Categories', 'NorthVantage' ); ?></h3>
            <ul><?php wp_list_categories('orderby=name&title_li='); ?></ul>
            
            <h3><?php echo __('Blog Posts', 'NorthVantage' ); ?></h3>
            <ul><?php $archive_query = new WP_Query('showposts=1000&cat=-8');
                    while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
                         (<?php comments_number('0', '1', '%'); ?>)
                        </li>
                    <?php endwhile; ?>
            </ul>
            
            <h3><?php echo __('Archives', 'NorthVantage' ); ?></h3>
            <ul>
                <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
            </ul>	
         
		</article>
	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php } // Hide Content *END* ?>

<?php get_footer(); ?>
