<?php
/**
 * @package WordPress
 * @subpackage NorthVantage
*/

/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div class="mid-wrap left out-threequarter">
	<div id="content">
    <h2>Links:</h2>
        <ul>
        <?php wp_list_bookmarks(); ?>
        </ul>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
