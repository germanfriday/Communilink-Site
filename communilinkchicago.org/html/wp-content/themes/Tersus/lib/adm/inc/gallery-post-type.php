<?php


add_action('init', 'portfolio_register');  
  
function portfolio_register() {  
    $args = array(  
        'label' => __('Gallery Media','NorthVantage'),  
        'singular_label' => __('Gallery Data','NorthVantage'),  
        'public' => true,  
        'show_ui' => true,  
        'capability_type' => 'post',  
        'hierarchical' => false,  
        'rewrite' => true,  
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes')  
       );  
  
    register_post_type( 'portfolio' , $args );  
}  

register_taxonomy("media-category", array("portfolio"), array("hierarchical" => true, "label" => "Media Categories", "singular_label" => "Media Category", "rewrite" => true));

add_filter("manage_edit-portfolio_columns", "project_edit_columns");   
  
function project_edit_columns($columns){  
        $columns = array(  
            "cb" => "<input type=\"checkbox\" />",  
            "title" => "Gallery Media",  
            "description" => "Description",    
            "type" => "Media Category",  
        );  
  
        return $columns;  
} 

add_action("manage_posts_custom_column",  "project_custom_columns"); 
  
function project_custom_columns($column){  
        global $post;  
        switch ($column)  
        {  
            case "description":  
                the_excerpt();  
                break;  
            case "type":  
                echo get_the_term_list($post->ID, 'media-category', '', ', ','');  
                break;  
        }  
} 

add_action( 'restrict_manage_posts', 'my_restrict_manage_posts' );
function my_restrict_manage_posts() {
	global $typenow;
	$taxonomy = 'media-category';
	if( $typenow != "page" && $typenow != "post" ){
		$filters = array($taxonomy);
		foreach ($filters as $tax_slug) {
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
			echo "<option value=''>Show All $tax_name</option>";
			foreach ($terms as $term) { echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>'; }
			echo "</select>";
		}
	}
}


/* ------------------------------------
::  Add ID's to Gallery Media Page
------------------------------------*/

function gmid_column($cols) {
	$cols['ssid'] = 'ID';
	return $cols;
}

function gmid_return_value($value, $column_name, $id) {
	if ($column_name == 'ssid')
		$value = $id;
	return $value;
}

function gmid_value($column_name, $id) {
	if ($column_name == 'ssid')
		echo $id;
}



function gallerymediaid_add() {
	
if(!function_exists('ssid_add')) add_action('manage_posts_custom_column', 'gmid_value', 10, 2); // check if Simply Show ID's function is not active

add_filter('manage_edit-portfolio_columns', 'gmid_column');
add_action('manage_portfolio_column', 'gmid_return_value', 10, 2);

}

add_action('admin_init', 'gallerymediaid_add');


/* ------------------------------------
::  Add Order Column to Gallery Media Page
------------------------------------*/

function add_new_portfolio_column($portfolio_columns) {
  $portfolio_columns['menu_order'] = "Order";
  return $portfolio_columns;
}
add_action('manage_edit-portfolio_columns', 'add_new_portfolio_column');
add_action('manage_edit-post_columns', 'add_new_portfolio_column');

/**
* show custom order column values
*/
function show_order_column($name){
  global $post;

  switch ($name) {
    case 'menu_order':
      $order = $post->menu_order;
      echo $order;
      break;
   default:
      break;
   }
}

add_action('manage_posts_custom_column','show_order_column');


/**
* make column sortable
*/
function order_column_register_sortable($columns){
  $columns['menu_order'] = 'menu_order';
  return $columns;
}

add_filter('manage_edit-portfolio_sortable_columns','order_column_register_sortable');
add_filter('manage_edit-post_sortable_columns','order_column_register_sortable');


add_post_type_support( 'post', 'page-attributes' );

/* ------------------------------------
::  Add Gallery Fields to Attachments
------------------------------------*/

function nv_attach_gallery_fields( $form_fields, $post ) {

	$form_fields['gallery-link-url'] = array(
		'label' => 'Slide Link URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'gallery-link-url', true ),
		'helps' => 'Add link URL to Gallery Slide Image',
	);

	$form_fields['gallery-video-url'] = array(
		'label' => 'Slide Video URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'gallery-video-url', true ),
		'helps' => 'Add URL for Gallery Slide Video',
	);	

	$form_fields['gallery-slide-timeout'] = array(
		'label' => 'Slide Timeout',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'gallery-slide-timeout', true ),
		'helps' => 'Add timeout for Gallery Slide',
	);		

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'nv_attach_gallery_fields', 10, 2 );


/* ------------------------------------
::  Save Attachment Gallery Fields
------------------------------------*/

function nv_gallery_fields_save( $post, $attachment ) {

	if( isset( $attachment['gallery-link-url'] ) )
		update_post_meta( $post['ID'], 'gallery-link-url', $attachment['gallery-link-url'] );

	if( isset( $attachment['gallery-video-url'] ) )
		update_post_meta( $post['ID'], 'gallery-video-url', $attachment['gallery-video-url'] );		

	if( isset( $attachment['gallery-slide-timeout'] ) )
		update_post_meta( $post['ID'], 'gallery-slide-timeout', $attachment['gallery-slide-timeout'] );				

	return $post;
}

add_filter( 'attachment_fields_to_save', 'nv_gallery_fields_save', 10, 2 );
?>