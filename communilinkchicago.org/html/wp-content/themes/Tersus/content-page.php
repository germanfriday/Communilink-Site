<?php
/**
 * The template for displaying posts in the Quote Post Format on index and archive pages
 *
 * @package WordPress
*/ ?>

<article class="post" id="post-<?php the_ID(); ?>"><!-- post -->                         
	<div class="entry row">
		<?php $content = the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                
		<?php wp_link_pages(array('before' => '<ul class="paging"><li class="pages">'.__('Pages', 'NorthVantage' ).':</li> ', 'after' => '</ul>','link_before'=> '<li class="pagebutton">',  'next_or_number' => 'number', 'link_after'=> '</li>',)); ?>
	</div><!-- /entry -->  
						
	<footer>
	<?php edit_post_link(__('Edit this entry.', 'NorthVantage' ), '<p>', '</p>'); ?>
    <?php if(get_option('pagecomments')=="enable") { comments_template(); }// Enable this line for comments on pages ?> 
	</footer>
                        
</article>