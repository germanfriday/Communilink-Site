<?php 
/**
 * The template for displaying Post Titles
 *
 * @package WordPress
*/
 
if($NV_posttitle) {  

if($NV_posttitle != "BLANK") { 

if(is_single()) { ?>
    	<h1><?php echo htmlspecialchars($NV_posttitle); ?></h1>
    <?php } else { ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo htmlspecialchars($NV_posttitle); ?></a></h2>
    <?php } ?>
<?php } 
 
} else {  

if($NV_posttitle != "BLANK") { 
	if(is_single()) { ?>
    	<h1><?php the_title(); ?></h1>	
    <?php } else { ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>	
    <?php } ?>      	
<?php } 

} 

if($NV_postsubtitle) { ?>
    <h3><?php echo htmlspecialchars($NV_postsubtitle); ?></h3>
<?php } ?>