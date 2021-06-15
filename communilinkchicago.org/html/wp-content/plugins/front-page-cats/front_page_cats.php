<?php
/*
Plugin Name: Front Page Categories
Version: 0.3
Plugin URI: http://wordpress.org/#
Description: Select categories to display on the front page.
Author: Ryan Boren
*/ 

function fpc_where($where) {
  // Change this to the categories you want to show on the front page.
  // Example:  $cats_to_show = '1 2 3 4';
  $cats_to_show = '1';

	global $wpdb, $wp_query;

	if (! $wp_query->is_home) {
		return $where;
	}

	$cat = $cats_to_show;
	if (stristr($cat,'-')) {
		// Note: if we have a negative, we ignore all the positives. It must
		// always mean 'everything /except/ this one'. We should be able to do
		// multiple negatives but we don't :-(
		$eq = '!=';
		$andor = 'AND';
		$cat = explode('-',$cat);
		$cat = intval($cat[1]);
	} else {
		$eq = '=';
		$andor = 'OR';
	}

	$cat_array = explode(' ', $cat);
	$whichcat .= ' AND (category_id '.$eq.' '.intval($cat_array[0]);
	$whichcat .= get_category_children($cat_array[0], ' '.$andor.' category_id '.$eq.' ');
	for ($i = 1; $i < (count($cat_array)); $i = $i + 1) {
		$whichcat .= ' '.$andor.' category_id '.$eq.' '.intval($cat_array[$i]);
		$whichcat .= get_category_children($cat_array[$i], ' '.$andor.' category_id '.$eq.' ');
	}
	$whichcat .= ')';

	$where .= $whichcat;

  return $where;
}

function fpc_join($join) {
	global $wpdb, $wp_query;

	if (! $wp_query->is_home) {
		return $join;
	}

	$join .= " LEFT JOIN $wpdb->post2cat ON ($wpdb->posts.ID = $wpdb->post2cat.post_id) ";

  return $join;
}

add_filter('posts_join', 'fpc_join');
add_filter('posts_where', 'fpc_where');

?>
