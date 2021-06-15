<?php if ( !is_admin() ) if( !session_id() ) session_start();


/* ------------------------------------

:: INITIATE JQUERY / STYLING

------------------------------------*/

function init_nvscripts()
{
    if ( !is_admin() )
	{

		wp_register_style('northvantage-style', get_bloginfo('stylesheet_url'),false,null);
        wp_enqueue_style('northvantage-style');
		
		if( get_option('enable_responsive') != 'disable' ) :
		
			wp_register_style('northvantage-responsive', get_template_directory_uri().'/stylesheets/responsive.css',false,null);
			wp_enqueue_style('northvantage-responsive');
		
		endif;
	
		wp_enqueue_script('jquery-ui-core',false,array('jquery'));
		wp_enqueue_script('jquery-effects-core',false,array('jquery'),true);

		wp_deregister_script('jquery-fancybox');	
	    wp_register_script('jquery-fancybox', get_template_directory_uri().'/js/jquery.fancybox.min.js',false,null,true);
        wp_enqueue_script('jquery-fancybox');

		wp_deregister_script('jquery-reflection');	
	    wp_register_script('jquery-reflection', get_template_directory_uri().'/js/jquery.reflection.js',false,null,true);
        wp_enqueue_script('jquery-reflection');		

		$template_array = array(
			'template_url' => get_template_directory_uri(),
		);

		wp_deregister_script('nv-script');	
	    wp_register_script('nv-script', get_template_directory_uri().'/js/nv-script.pack.js',false,array('jquery'));
		wp_localize_script('nv-script', 'NV_SCRIPT', $template_array );
        wp_enqueue_script('nv-script');
		
    }
}    

add_action('wp_enqueue_scripts', 'init_nvscripts',100);


function _remove_script_version( $src )
{ 
	// remove script version
    $parts = explode( '?', $src );
	return $parts[0];
}

add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


function strposa($haystack, $needles=array(), $offset=0)
{
	$chr = array();
	foreach($needles as $needle)
	{
		$res = strpos($haystack, $needle, $offset);
		if ($res !== false) $chr[$needle] = $res;
	}
	if(empty($chr)) return false;
	return min($chr);
}
	

function add_defer_to_scripts( $url )
{
	$scripts = array(
			'stage.slider.min',
			'group.slider.min',
			'jquery.fancybox.min',
			'content.animator.min',
			'jwplayer',
			'reflection',
			'jw-player.init.min',
			'touch.gestures.min',
			'jquery.tooltips',
			'contact.form'
		);
		
	if ( FALSE === strposa( $url, $scripts, 1) ) {
		return $url;
	} 
	
	return "$url' async defer='defer";
}


add_filter( 'clean_url', 'add_defer_to_scripts', 11, 1 );

/* ------------------------------------

:: DEFINE DIRECTORIES

------------------------------------*/

define( 'NV_DIR', get_template_directory());
define( 'NV_FILES', NV_DIR . '/lib' );

require NV_FILES .'/adm/inc/note-admin.php';require NV_FILES .'/inc/constants.php';
require NV_FILES .'/inc/sub-functions.php';
require NV_DIR .'/custom-functions.php';

if(is_admin()) require_once NV_FILES . '/adm/index.php';

require NV_FILES .'/adm/inc/advanced-excerpt/advanced-excerpt.php';
require NV_FILES .'/adm/inc/custom-widgets.php';


/* ------------------------------------

:: FONT LISTS

------------------------------------*/

global $cufonfont;

$cufonfont = array(
'aller' => 'aller',
'andika' => 'andika',
'bebas-neue' => 'bebas-neue',
'colaborate' => 'colaborate',
'daniel' => 'daniel',
'deftone-stylus' => 'deftone-stylus',
'droid-serif' => 'droid-serif',
'geo-sans' => 'geo-sans',
'harabara' => 'harabara',
'josefin-sans' => 'josefin-sans',
'league-gothic' => 'league-gothic',
'miso' => 'miso',
'molot' => 'molot',
'museo' => 'museo',
'myriad-pro' => 'myriad-pro',
'pt-sans' => 'pt-sans',
'quicksand' => 'quicksand',
'sansation' => 'sansation',
'vegur' => 'vegur',
'yanone-kaffeesatz' => 'yanone-kaffeesatz'); // Cufon Font List

if(get_option('cufon_font')) { 
 $customcufon=array('custom-cufon-font' => get_option('cufon_font'));
 $cufonfont = array_merge((array)$cufonfont, (array)$customcufon); // Add custom cufon font to main cufon list
}


global $nv_font;

$nv_font = array(
'Cambria' => 'Cambria, "Hoefler Text", Utopia, "Liberation Serif", "Nimbus Roman No9 L Regular", Times, "Times New Roman", serif',
'Constantia' => 'Constantia, "Lucida Bright", Lucidabright, "Lucida Serif", Lucida, "DejaVu Serif", "Bitstream Vera Serif", "Liberation Serif", Georgia, serif',
'Palatino Linotype' => '"Palatino Linotype", Palatino, Palladio, "URW Palladio L", "Book Antiqua", Baskerville, "Bookman Old Style", "Bitstream Charter", "Nimbus Roman No9 L", Garamond, "Apple Garamond", "ITC Garamond Narrow", "New Century Schoolbook", "Century Schoolbook", "Century Schoolbook L", Georgia, serif',
'Helvetica Neue' => '"Helvetica Neue", Helvetica, Arial, serif',
'Frutiger' => 'Frutiger, "Frutiger Linotype", Univers, Calibri, "Gill Sans", "Gill Sans MT", "Myriad Pro", Myriad, "DejaVu Sans Condensed", "Liberation Sans", "Nimbus Sans L", Tahoma, Geneva, "Helvetica Neue", Helvetica, Arial, sans-serif',
'Corbel' => 'Corbel, "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", "DejaVu Sans", "Bitstream Vera Sans", "Liberation Sans", Verdana, "Verdana Ref", sans-serif',
'Segoe UI' => '"Segoe UI", Candara, "Bitstream Vera Sans", "DejaVu Sans", "Bitstream Vera Sans", "Trebuchet MS", Verdana, "Verdana Ref", sans-serif',
'Impact' => 'Impact, Haettenschweiler, "Franklin Gothic Bold", Charcoal, "Helvetica Inserat", "Bitstream Vera Sans Bold", "Arial Black", sans-serif',
'Consolas' => 'Consolas, "Andale Mono WT", "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", "DejaVu Sans Mono", "Bitstream Vera Sans Mono", "Liberation Mono", "Nimbus Mono L", Monaco, "Courier New", Courier, monospace'
); // Font List

global $googlefont;

$googlefont = array(
'"Abril Fatface"'=>'"Abril Fatface"',
'"Allan"' => '"Allan:700"',
'Allerta' => 'Allerta',
'Arvo' => 'Arvo:700,400',
'Cabin' => 'Cabin',
'Cardo' => 'Cardo:700,400',
'Corben' => 'Corben:700,400',
'"Crimson Text"' => 'Crimson Text:700,400',
'"Dancing Script"' => 'Dancing Script',
'"Droid Sans"' => 'Droid Sans:700,400',
'"Droid Serif"' => 'Droid Serif:700,400',
'"Goudy Bookletter 1911"' => 'Goudy Bookletter 1911',
'"Josefin Sans"' => 'Josefin Sans:100,400',
'Lato' => 'Lato:100,400',
'Lekton' => 'Lekton:700,400',
'Lobster' =>'Lobster',
'Molengo' => 'Molengo',
'Nobile' => 'Nobile:700,400',
'"Open Sans"' => 'Open Sans:400,300',
'"Poiret One"' => 'Poiret One',
'"PT Sans"' => 'PT Sans:400,700',
'Quicksand' => 'Quicksand:400,300,700',
'Raleway' => 'Raleway:100',
'Ubuntu' => 'Ubuntu:700,400',
'Vollkorn' => 'Vollkorn:400,700'
); // Google Font List

if( get_option('googlefont_url_1') && get_option('googlefont_css_1') ) { 
 $fontcss = str_replace("'", '"',get_option('googlefont_css_1')); // replace ' with "
 $customgoogle=array($fontcss => get_option('googlefont_url_1'));
 $googlefont = array_merge((array)$googlefont, (array)$customgoogle); // Add custom google font (one) to main google list
}

if( get_option('googlefont_url_2') && get_option('googlefont_css_2') ) { 
 $fontcss = str_replace("'", '"',get_option('googlefont_css_2')); // replace " with blank
 $customgoogle=array($fontcss => get_option('googlefont_url_2'));
 $googlefont = array_merge((array)$googlefont, (array)$customgoogle); // Add custom google font (two) to main google list
}

/* ------------------------------------

:: ARCHIVE EXCERPT

------------------------------------*/

function new_excerpt_more($more) {
       global $post;
	return '... <a href="'. get_permalink($post->ID) . '">' . __( 'Read More', 'NorthVantage' )  . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


/* ------------------------------------

:: MENU FILTER

------------------------------------*/

function DYN_menupages() {

add_filter('wp_list_pages', 'DYN_page_lists');
$menupageslist = wp_list_pages('echo=0&title_li=&');

remove_filter('wp_list_pages', 'DYN_page_lists'); // Remove filter to not affect all calls to wp_list_pages
return $menupageslist;

}

/* ------------------------------------

:: MENU DESCRIPTIONS

------------------------------------*/

function DYN_page_lists($output) {	
	global $wpdb;

	$get_MenuDesc = mysql_query("SELECT p.ID, p.post_title, p.guid, p.post_parent, pm.meta_value FROM " . $wpdb->posts . " AS p LEFT JOIN (SELECT post_id, meta_value FROM " . $wpdb->postmeta . " AS ipm WHERE meta_key = 'pgopts') AS pm ON p.ID = pm.post_id WHERE p.post_type = 'page' AND p.post_status = 'publish' ORDER BY p.menu_order ASC");
	while ($row = mysql_fetch_assoc($get_MenuDesc)) {
			extract($row);
			$post_title = wptexturize($post_title);
			$data = maybe_unserialize(get_post_meta( $ID, 'pgopts', true ));		

			$menudesc=$data["menudesc"];		
			
			if($menudesc!="") {
			$output = str_replace('>' . $post_title .'</a>' , '>' . $post_title . '</a><span class="menudesc">' . $data["menudesc"] . '</span>', $output);
			}
			
		}	

			$parts = preg_split('/(<ul|<li|<\/ul>)/',$output,null,PREG_SPLIT_DELIM_CAPTURE);
			$newmenu = '';
			$level = 0;
			foreach ($parts as $part) {
			if ('<ul' == $part) {++$level; }
			if ('</ul>' == $part) {--$level;}
			$newmenu .= $part;
			}

	return $newmenu;
}


/* ------------------------------------

:: SIDEBARS

------------------------------------*/

global $wpdb,$num_sidebars;


$get_sidebar_num = get_option('sidebars_num');

if($get_sidebar_num) {
$num_sidebars=get_option('sidebars_num');  //  Sidebars number of Sidebars defined in Admin settings.
}

else {
$num_sidebars="2";
}

	$i=1;
    while($i<=$num_sidebars)
	{

			if ( function_exists('register_sidebar')) {
				register_sidebar(
				array(
				'name'=>'sidebar'.$i,
				'id'=>'sidebar'.$i,
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				));
			}
	$i++;
	}


$get_droppanel_num 	=	(get_option('droppanel_columns_num')!="") 	? get_option('droppanel_columns_num') 	: '4'; // If not set, default to 4 columns
$get_footer_num 	= 	(get_option('footer_columns_num')!="") 		? get_option('footer_columns_num') 		: '4'; // If not set, default to 4 columns
	
	$i=1;
    while($i<=$get_droppanel_num)
	{

			if ( function_exists('register_sidebar')) {
				register_sidebar(array(
				'name'=>'Drop Panel Column '.$i,
				'id'=>'droppanel'.$i,				
				'description' => 'Widgets in this area will be shown in Drop Panel column '.$i.'.',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				));
			}

	$i++;
	}

	$i=1;
    while($i<=$get_footer_num)
	{

			if ( function_exists('register_sidebar')) {
				register_sidebar(
				array(
				'name'=>'Footer Column '.$i,
				'id'=>'footer'.$i,
				'description' => 'Widgets in this area will be shown in Footer column '.$i.'.',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				));
			}
	$i++;
	}	


/* ------------------------------------

:: CUSTOM FIELDS

------------------------------------*/

require NV_FILES .'/adm/inc/meta-fields.php';

/* ------------------------------------

:: GALLERY POST TYPE

------------------------------------*/

require NV_FILES .'/adm/inc/gallery-post-type.php';

/* ------------------------------------

:: SHORTCODES

------------------------------------*/

require NV_FILES .'/inc/shortcodes.php';

/* ------------------------------------

:: BREADCRUMBS

------------------------------------*/

require NV_FILES .'/inc/breadcrumbs.php';

/* ------------------------------------

:: PAGINATION

------------------------------------*/

function pagination( $query, $baseURL ) {
	
	$page = $query->query_vars["paged"];
	if ( !$page ) $page = 1;
	$qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
	// Only necessary if there's more posts than posts-per-page
	if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {
		echo '<ul class="paging">';
		// Previous link?
		if ( $page > 1 ) {
			if(get_option("permalink_structure")) {
				echo '<li class="pagebutton previous"><a href="'.$baseURL.'page/'.($page-1).'/'.$qs.'">&laquo; previous</a></li>';
			} else {
				echo '<li class="pagebutton previous"><a href="'.$baseURL.'&amp;paged='.($page-1).'">&laquo; previous</a></li>';
			}			
			
		}
		// Loop through pages
		for ( $i=1; $i <= $query->max_num_pages; $i++ ) {
			// Current page or linked page?
			if ( $i == $page ) {
				echo '<li class="pagebutton active">'.$i.'</li>';
			} else {
			if(get_option("permalink_structure")) {
				echo '<li class="pagebutton"><a href="'.$baseURL.'page/'.$i.'/'.$qs.'">'.$i.'</a></li>';
			} else {
				echo '<li class="pagebutton"><a href="'.$baseURL.'&amp;paged='.$i.'">'.$i.'</a></li>';
			}
			}
		}
		// Next link?
		if ( $page < $query->max_num_pages ) {
			if(get_option("permalink_structure")) {
				echo '<li class="pagebutton next"><a href="'.$baseURL.'page/'.($page+1).'/'.$qs.'">&raquo;</a></li>';
			} else {
				echo '<li class="pagebutton next"><a href="'.$baseURL.'&amp;paged='.($page+1).'">&raquo;</a></li>';
			}				
		}
		echo '</ul>';
	}

}


/* ------------------------------------

:: POST COMMENTS

------------------------------------*/

function nv_fields($fields) {
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields =  array(
	'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' . 
	'<label for="author">' . __( 'Name','NorthVantage') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .'</p>',
	'email'  => '<p class="comment-form-email"><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.
	'<label for="email">' . __( 'Email','NorthVantage') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '</p>',
	'url'    => '<p class="comment-form-url"> <input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />'.
	'<label for="url">' . __( 'Website','NorthVantage') . '</label>' . '</p>',
);
return $fields;

}
add_filter('comment_form_default_fields','nv_fields');

function NorthVantage_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer class="comment-meta row">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 39;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 39;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time*/
						printf( __( '%1$s %2$s ', 'NorthVantage' ),
							sprintf( '<span class="fn"><h6>%s</h6></span>', get_comment_author_link() ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time*/
								sprintf( __( '%1$s at %2$s', 'NorthVantage' ), get_comment_date(), get_comment_time() )
							)
						);
					?>

					<?php edit_comment_link( __( '- Edit', 'NorthVantage' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-author .vcard -->

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'NorthVantage' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'NorthVantage' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
}

function nv_recent_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar( $comment->comment_author_email, 48 ); ?>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.','NorthVantage') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s','NorthVantage'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)','NorthVantage'),'  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
}


/* ------------------------------------

:: THUMBNAIL SUPPORT

------------------------------------*/

add_theme_support( 'post-thumbnails' ); 

/* ------------------------------------

:: POST FORMATS SUPPORT

------------------------------------*/

add_theme_support( 'post-formats', array( 'aside', 'link', 'status', 'quote', 'image' , 'video', 'audio' ));

/* ------------------------------------

:: AUTOMATIC FEED LINKS

------------------------------------*/

add_theme_support( 'automatic-feed-links' );

/* ------------------------------------

:: DEFINE CONTETN WIDTH

------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 980;

/* ------------------------------------

:: WP CUSTOM MENU SHORTCODE

------------------------------------*/

function list_menu($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => '', 
		'container_id'    => '', 
		'menu_class'      => 'menu', 
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 0,
		'walker'          => '',
		'theme_location'  => ''), 
		$atts));
 
 
	return wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location));
}

add_shortcode("listmenu", "list_menu"); //Create the shortcode



/* ------------------------------------

:: WP CUSTOM MENU SUPPORT

------------------------------------*/

add_theme_support( 'nav-menus' );
	register_nav_menus( array(
		'mainnav' => __( 'Main Navigation', 'NorthVantage' ),
	) );
	

class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu{

	var $to_depth = -1;

    function start_lvl(&$output, $depth){
      $output .= '</option>';
    }


    function end_lvl(&$output, $depth){
      $indent = str_repeat("\t", $depth); // don't output children closing tag
    }


    function start_el(&$output, $item, $depth, $args){

		$indent = ( $depth ) ? str_repeat( "&nbsp;", $depth * 4 ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
	

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$value = ' value="'. $item->url .'"';
		$output .= '<option'.$id.$value.$class_names.'>';


		$item_output = $args->before;
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	
		$output .= $indent.$item_output;

    }


    function end_el(&$output, $item, $depth){
		$output = str_replace('id="menu-', 'id="select-menu-', $output);
		if(substr($output, -9) != '</option>')
      		$output .= "</option>"; // replace closing </li> with the option tag
    }

}

class dyn_walker extends Walker_Nav_Menu
{

	function start_lvl(&$output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu skinset-menu nv-skin\">\n";
	}

	
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		if($depth=="0") {
		$output .= $indent . '<li class="menubreak"></li><li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		} else {
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';		
		}
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= '<span class="menutitle">'.$args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after.'</span>';
		if($item->attr_title) {
		$item_output .= '<span class="menudesc">' . $item->attr_title  . '</span>';
		}
		$item_output .= '</a>';
		if($item->description && get_option('wpcustommdesc_enable')=='enable') {
		$item_output .= '<div class="menudesc">' . do_shortcode($item->description) . '</div>';
		}		
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}



/* ------------------------------------

:: TIMTHUMB PATH

------------------------------------*/

function dyn_getimagepath($img_src) {
    global $blog_id;
	if (isset($blog_id) && $blog_id > 0) {
		$imageParts = explode('/files/', $img_src);
		if (isset($imageParts[1])) {
			$img_src = '/wp-content/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
		}
	}
	return $img_src;
}


/* ------------------------------------

:: ADMIN STYLING

------------------------------------*/

add_action( 'admin_menu', 'create_meta_box' );
add_action( 'save_post', 'save_options' );
add_action('admin_head', 'add_admin_theme');

function add_admin_theme() { ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/adm/css/admin.css" type="text/css" /> 
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/adm/css/colorpicker.css" type="text/css" /> 
<?php }


/* ------------------------------------

:: BBPRESS

------------------------------------*/

add_theme_support( 'bbpress' );

if (class_exists('bbPress')) {
	wp_enqueue_style( 'bbp-nv-bbpress', get_stylesheet_directory_uri() . '/stylesheets/bbpress.css',false,null);
}

function filter_bbPress_breadcrumb_separator() {
//$sep = ' » ';
$sep = is_rtl() ? __( ' <span class="subbreak">/</span> ', 'bbpress' ) : __( ' <span class="subbreak">/</span> ', 'bbpress' );
return $sep;
}

add_filter('bbp_breadcrumb_separator', 'filter_bbPress_breadcrumb_separator');


/* ------------------------------------

:: BUDDYPRESS

------------------------------------*/

function bp_dtheme_enqueue_styles() {
    // Bump this when changes are made to bust cache
    $version = '20110804';
 
    // Default CSS
    wp_enqueue_style( 'bp-default-main', get_template_directory_uri() . '/stylesheets/style-buddypress.css', array(), $version );
 
    // Right to left CSS
    if ( is_rtl() )
        wp_enqueue_style( 'bp-default-main-rtl',  get_template_directory_uri() . '/_inc/css/default-rtl.css', array( 'bp-default-main' ), $version );
}


function bp_dtheme_enqueue_scripts() {
	// Do not enqueue JS if it's disabled
	if ( get_option( 'bp_tpack_disable_js' ) )
		return;

	// Add words that we need to use in JS to the end of the page so they can be translated and still used.
	$params = array(
		'my_favs'           => __( 'My Favorites', 'buddypress' ),
		'accepted'          => __( 'Accepted', 'buddypress' ),
		'rejected'          => __( 'Rejected', 'buddypress' ),
		'show_all_comments' => __( 'Show all comments for this thread', 'buddypress' ),
		'show_all'          => __( 'Show all', 'buddypress' ),
		'comments'          => __( 'comments', 'buddypress' ),
		'close'             => __( 'Close', 'buddypress' )
	);

	// BP 1.5+
	if ( version_compare( BP_VERSION, '1.3', '>' ) ) {
		// Bump this when changes are made to bust cache
		$version            = '20110818';

		$params['view']     = __( 'View', 'buddypress' );
	}
	// BP 1.2.x
	else {
		$version = '20110729';

		if ( bp_displayed_user_id() )
			$params['mention_explain'] = sprintf( __( "%s is a unique identifier for %s that you can type into any message on this site. %s will be sent a notification and a link to your message any time you use it.", 'buddypress' ), '@' . bp_get_displayed_user_username(), bp_get_user_firstname( bp_get_displayed_user_fullname() ), bp_get_user_firstname( bp_get_displayed_user_fullname() ) );
	}

	// Enqueue the global JS - Ajax will not work without it
	wp_enqueue_script( 'dtheme-ajax-js', BP_PLUGIN_URL . '/bp-themes/bp-default/_inc/global.js', array( 'jquery' ), $version );

	// Localize the JS strings
	wp_localize_script( 'dtheme-ajax-js', 'BP_DTheme', $params );
}


if ( function_exists('bp_is_blog_page') && !is_admin()) {
	add_action( 'wp_print_styles', 'bp_dtheme_enqueue_styles' );
	add_action( 'wp_enqueue_scripts', 'bp_dtheme_enqueue_scripts' );
}

/* Constant paths.*/
/* We define MY_THEME and MY_THEME_URL here for use in and calling functions-buddypress.php*/
	define( 'MY_THEME', get_stylesheet_directory() );
	define( 'MY_THEME_URL', get_stylesheet_directory_uri() );


/* Load the BuddyPress functions for the theme*/
	require_once( MY_THEME . '/functions-buddypress.php' );


/* ------------------------------------

:: WP E-COMMERCE

------------------------------------*/

function wpsc_product_rater_nv() {
	global $wpsc_query;
	$product_id = get_the_ID();
	$output = '';
	if ( get_option( 'product_ratings' ) == 1 ) {
		$output .= "<div class='product_footer row'>";

		$output .= "<div class='product_average_vote'>";
		$output .= "<strong>" . __( 'Avg. Customer Rating', 'wpsc' ) . ":</strong>";
		$output .= wpsc_product_existing_rating_nv( $product_id );
		$output .= "</div>";

		$output .= "<div class='product_user_vote'>";

		$output .= "<strong><span id='rating_" . $product_id . "_text'>" . __( 'Your Rating', 'wpsc' ) . ":</span>";
		$output .= "<span class='rating_saved' id='saved_" . $product_id . "_text'> " . __( 'Saved', 'wpsc' ) . "</span>";
		$output .= "</strong>";

		$output .= wpsc_product_new_rating( $product_id );
		$output .= "</div>";
		$output .= "</div>";
	}
	return $output;
}

function wpsc_product_existing_rating_nv( $product_id ) {
	global $wpdb;
	$get_average = $wpdb->get_results( "SELECT AVG(`rated`) AS `average`, COUNT(*) AS `count` FROM `" . WPSC_TABLE_PRODUCT_RATING . "` WHERE `productid`='" . $product_id . "'", ARRAY_A );
	$average = floor( $get_average[0]['average'] );
	$count = $get_average[0]['count'];
	$output  = "  <span class='votetext'>";
	for ( $l = 1; $l <= $average; ++$l ) {
		$output .= "<img class='goldstar' src='" .get_template_directory_uri() . "/images/gold-star.png' alt='$l' title='$l' />";
	}
	$remainder = 5 - $average;
	for ( $l = 1; $l <= $remainder; ++$l ) {
		$output .= "<img class='goldstar' src='" .get_template_directory_uri() . "/images/grey-star.png' alt='$l' title='$l' />";
	}

	$output .= "</span> \r\n";
	return $output;
}

function remove_wpsc_style() {
    global $wp_styles;
    wp_deregister_style( 'wpsc-gold-cart-grid-view' );
	wp_deregister_style( 'wpsc-gold-cart' );
}

add_action('wp_print_styles', 'remove_wpsc_style', 100);

/* ------------------------------------

:: WOOCOMMERCE

------------------------------------*/

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
 
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'NorthVantage'); ?>">
		<span class="shop-cart-itemnum">
			<?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'NorthVantage'), $woocommerce->cart->cart_contents_count);?> - 
		</span>
         <?php echo $woocommerce->cart->get_cart_total(); ?>
		
    </a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;

}

/* ------------------------------------

:: SLIDE SET UPGRADE

------------------------------------*/

if(get_option('slideset_data_update')!='yes' && get_option('slideset_data')!='') {
		update_option('slideset_data_update','yes');
		$get_slideset_num = maybe_unserialize(get_option('slideset_number'));
		$get_gallery_data = maybe_unserialize(get_option('slideset_data')); 
		  
		  for($i = 0; $i < $get_slideset_num; $i++) {
		  		 foreach ($get_gallery_data as $key => $value) {
    				if($key=="slideset_id".$i."_id") {
    					$options_gallery_ids .= $value.",";	
						$slide_set_id = $value;
    				}
					if ( preg_match("/slideset_id".$i."/", $key) ) {
        				$find = "/slideset_id".$i."/";
						$replace = "slideset_id"; 
         				$key = preg_replace ($find, $replace, $key); 						
						$options_gallery_slidesets[$key] = $value;					
					
					}		 
				 }
                
        			update_option( 'slideset_data_'.$slide_set_id, $options_gallery_slidesets);
        			$options_gallery_slidesets="";
		  		}
				
				update_option( 'slideset_data_ids', $options_gallery_ids );
}


/*	Make NorthVantage available for translation	*/ // Load languages directory for translation
	load_theme_textdomain( 'NorthVantage', NV_DIR . '/languages' );

	$locale = get_locale();
	$locale_file = NV_DIR . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );



/* ------------------------------------

:: WP MINIFY FIX FOR GOOGLE JQUERY CDN

------------------------------------*/

function add_minify_location(){
	if (class_exists('WPMinify')) {?>

<!-- WP-Minify JS -->
<!-- WP-Minify CSS -->

<?php }
}
add_action('wp_head','add_minify_location',99);


/*	Remove WP auto formatting*/

function remove_wpautop( $content ) { 
    $content = do_shortcode( shortcode_unautop( $content ) ); 

    $new_content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
	$new_content = str_replace('<br />', "", $new_content);
	return $new_content;
}


/* ------------------------------------

:: DISPLAY ADMIN NOTICE

------------------------------------*/
 
add_action('admin_notices', 'nv_admin_notice');
 
function nv_admin_notice() {
    global $current_user ;
        $user_id = $current_user->ID;
        /* Check that the user hasn't already clicked to ignore the message*/
		$theme_name = get_current_theme();
    if ( ! get_user_meta($user_id, 'nv_ignore_notice') ) {
        echo '<div class="updated"><p>';
        printf(__('Please read the <strong><a href="http://northvantage.co.uk/helpdocs/'. $theme_name .'/documentation.pdf" target="_blank">Getting Started</a></strong> section of the documentation for help using this <strong>Theme</strong>. <a href="%1$s">Hide Notice</a>'), '?nv_ignore_notice=0');
        echo "</p></div>";
    }
}
 
add_action('admin_init', 'nv_ignore_notice');
 
function nv_ignore_notice() {
    global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta*/
        if ( isset($_GET['nv_ignore_notice']) && '0' == $_GET['nv_ignore_notice'] ) {
             add_user_meta($user_id, 'nv_ignore_notice', 'true', true);
    }
}







/* ------------------------------------

:: BUILD SKIN PRESETS

------------------------------------*/

build_skinpresets();

?>