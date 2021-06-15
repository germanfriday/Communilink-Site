<?php 
/**
 * The template for displaying Post Meta Data
 *
 * @package WordPress
*/
 ?>
<ul class="post-metadata-wrap clearfix">
	<?php if(is_user_logged_in()) { ?>
    <li class="edit-link"><?php edit_post_link(__('Edit', 'NorthVantage' ), '', ''); ?></li>
    <?php } ?>
    <li class="post-date">
    <?php if ( $NV_postmetaalign == 'post_title' ) : ?>
        <div class="date-day"><span class="date-icon">&nbsp;</span><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time('F j, Y'); ?></a></div>
    <?php else : ?>
        <div class="date-day"><?php the_time('d'); ?></div>
        <div class="date-year"><a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><?php the_time('M, Y'); ?></a></div>
	<?php endif;?>
    </li>  
    <li class="post-format"><span>&nbsp;</span></li>   
	<?php if($NV_authorname) { ?>
    <li class="author-title"><h6><?php _e('Created By:', 'NorthVantage' ); ?></h6></li>
    <li class="author-name"><span class="author-icon">&nbsp;</span><?php echo get_the_author_meta('first_name') ." ". get_the_author_meta('last_name'); ?></li>
    <?php } ?>
	<li class="category-title"><h6><?php _e('Categories:', 'NorthVantage' ); ?></h6></li>
    <li class="category-list"><?php the_category(', ') ?></li>    
    <li class="comments-title"><h6><?php _e('Comments:', 'NorthVantage' ); ?></h6></li>
    <li class="comments-list"><span class="comments-icon">&nbsp;</span><?php comments_popup_link( __('No Comments', 'NorthVantage' ) .' ', '1 '. __('Comment', 'NorthVantage' ) . ' ', '% '. __('Comments', 'NorthVantage' )); ?></li>    
			<?php if(get_the_tags()!='') {?>
    <li class="tags-title"><h6><?php _e('Tags:', 'NorthVantage' ); ?></h6></li>
    <li class="tags-list"><span class="tags-icon">&nbsp;</span><?php the_tags('',', '); ?></li>
    <?php } ?>
</ul>