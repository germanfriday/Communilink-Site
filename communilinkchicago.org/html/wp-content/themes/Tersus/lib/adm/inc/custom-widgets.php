<?php
/**
 * Plugin Name: Widget Gallery
 * Version: 1.1
 * Author: NORTHVANTAGE
 * Author URI: http://northvantage.co.uk
 *
*/

add_action( 'widgets_init', 'load_mini_gallery' );


function load_mini_gallery() {
	register_widget( 'Mini_Gallery_Widget' );
}


class Mini_Gallery_Widget extends WP_Widget {

	/* ------------------------------------
	:: SETUP WIDGET 
	------------------------------------*/

	function Mini_Gallery_Widget() {
		/* Widget settings.*/
		$widget_ops = array( 'classname' => 'gallery', 'description' => __('NorthVantage Widget Image/Text gallery, use posts or a gallery slide set.','NorthVantage') );

		/* Widget control settings.*/
		$control_ops = array( 'width' => 320, 'height' => 350, 'id_base' => 'gallery-widget' );

		/* Create the widget.*/
		$this->WP_Widget( 'gallery-widget', __('NorthVantage Widget Gallery','NorthVantage'), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );

	/* ------------------------------------
	:: WIDGET VARIABLES
	------------------------------------*/
	
		$title = apply_filters('widget_title', $instance['title'] );
		if(!$instance['width'])  $NV_imgwidth='290'; else $NV_imgwidth = $instance['width'];
		if(!$instance['height']) $NV_imgheight='170'; else $NV_imgheight = $instance['height'];
		if(!$instance['gallery_height']) $NV_galleryheight='200'; else $NV_galleryheight = $instance['gallery_height'];
		
		$NV_galleryheight	='height="'. $NV_galleryheight.'"';
		$NV_imgheight		='imgheight="'.$NV_imgheight.'"';
		$NV_imgwidth		='imgwidth="'.$NV_imgwidth.'"';

		if($instance['excerpt']) 	$excerpt = 'excerpt="'.$instance['excerpt'].'"'; else $excerpt='';
		if($instance['img_align']) 	$image_align = 'image_align="'.$instance['img_align'].'"'; else $image_align='';
		if($instance['timeout']) 	$timeout = 'timeout="'.$instance['timeout'].'"'; else $timeout='';
		if($instance['orderby']) 	$orderby = 'orderby="'.$instance['orderby'].'"'; else $orderby='';
		if($instance['sortby']) 	$sortby = 'sortby="'.$instance['sortby'].'"'; else $sortby='';
		
		$tween 		= 'tween="'.$instance['tween_type'].'"';
		$animation 	= 'animation="'.$instance['animation_type'].'"';
		 
		
	/* ------------------------------------
	:: DISPLAY WIDGET
	------------------------------------*/
		
		echo "<li class=\"widget sidebar-slider\">";
		
		/* Display the widget title if one was input (before and after defined by themes).*/
		if ( isset($title) )
			echo $before_title . $title . $after_title;
		
		$chars = array("[", "]", "-");
		
		global $is_widget; $is_widget=true;
		
		$galid = str_replace($chars,"",$this->get_field_name( 'id' )); 
		
		if($instance['datasource']==$this->get_field_id( 'data-1' )) {
			$NV_datasource='attached_id="'.$instance['attachedmedia'].'"';	
		} elseif($instance['datasource']==$this->get_field_id( 'data-2' )) {

		if($instance['gallerycats']!='') {
			$string='';
			foreach ($instance['gallerycats'] as $value) { $string = $string.$value.","; }
			$cats = lTrim($string,',');	
			$NV_datasource='categories="'.$cats.'"';
		}
		if($instance['gallerypostformat']!='') {
			$NV_datasource.=$NV_datasource.' post_format="'.$instance['gallerypostformat'].'"';
		}		
		
		} elseif($instance['datasource']==$this->get_field_id( 'data-3' )) {
			$NV_datasource='flickr_set="'.$instance['flickrset'].'"';	
		} elseif($instance['datasource']==$this->get_field_id( 'data-4' )) {
			
			foreach ($instance['slidesetid'] as $value) { $string = $string.$value.",";	}
			$slidesets = lTrim($string,',');
			$NV_datasource='slidesetid="'.$slidesets.'"';	
		
		} elseif($instance['datasource']==$this->get_field_id( 'data-5' )) {

			if($instance['productcats']) {

				foreach ($instance['productcats'] as $value) { $string = $string.$value.","; }
				$pcats = lTrim($string,',');	
				$NV_datasource='product_categories="'.$pcats.'"';
			}
			
			if($instance['producttags']) {
				
				foreach ($instance['producttags'] as $value) { $string = $string.$value.","; }
				$ptags = lTrim($string,',');	
				$NV_datasource.='product_tags="'.$ptags.'"';	
			}
			
		} elseif($instance['datasource']==$this->get_field_id( 'data-6' )) {

			foreach ($instance['mediacats'] as $value) { $string = $string.$value.","; }
			$mediacats = lTrim($string,',');	
			$NV_datasource='media_categories="'.$mediacats.'"';	
		}


		
		echo do_shortcode('[postgallery_slider content="'.$instance['content_type'].'" '.$NV_datasource.' columns="1" id="'.$galid.'" imageeffect="'.$instance['img_effect'].'" '.$NV_galleryheight.' '.$NV_imgwidth.' '.$NV_imgheight.' '.$timeout.' '.$excerpt.' '.$orderby.' '.$sortby.' '.$tween.' '.$animation.' '.$image_align.' width="290" align="center"/]');
		
		
		echo "</li>";
	}



	/* ------------------------------------
	:: UPDATE SETTINGS
	------------------------------------*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs).*/
		$instance['datasource'] = $new_instance['datasource'];
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['gallery_height'] = $new_instance['gallery_height'];
		$instance['height'] = strip_tags( $new_instance['height'] );
		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['attachedmedia'] = $new_instance['attachedmedia'];
		$instance['mediacats'] = $new_instance['mediacats'];
		$instance['gallerycats'] = $new_instance['gallerycats'];
		$instance['gallerypostformat'] = $new_instance['gallerypostformat'];
		$instance['productcats'] = $new_instance['productcats'];
		$instance['producttags'] = $new_instance['producttags'];
		$instance['slidesetid'] = $new_instance['slidesetid'];
		$instance['flickrset'] = $new_instance['flickrset'];
		$instance['img_effect'] = $new_instance['img_effect'];
		$instance['img_align'] = $new_instance['img_align'];
		$instance['content_type'] = $new_instance['content_type'];
		$instance['tween_type'] = $new_instance['tween_type'];
		$instance['animation_type'] = $new_instance['animation_type'];
		$instance['timeout'] = $new_instance['timeout'];
		$instance['excerpt'] = $new_instance['excerpt'];
		$instance['orderby'] = $new_instance['orderby'];
		$instance['sortby'] = $new_instance['sortby'];

		return $instance;
	}


	/* ------------------------------------
	:: WIDGET FORM
	------------------------------------*/
	
	function form( $instance ) {

		/* Set up some default widget settings.*/ ?>
		<script type="text/javascript" charset="utf8" > // Load Sections
        jQuery(document).ready(function() {
            var datasource =jQuery("#<?php echo $this->get_field_id( 'datasource' ); ?>").val();
            toggle_shrtcode(datasource,'<?php echo $this->get_field_id( 'datasource' ); ?>');
        });
        </script>        

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title: (Optional)','NorthVantage'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:96%;" />
		</p>
		<div class="widget_column two">
		<!-- Image Height: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Image Height:','NorthVantage'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'height' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" style="width:30px;" /><small> px <em>(170 default)</em></small>	
		</p>
		</div>
        <div class="widget_column two last">
		<!-- Image Width: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Image Width:','NorthVantage'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'width' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" style="width:30px;" /><small> px</small>	
		</p>        
		</div>
		<p class="clear">
			<label for="<?php echo $this->get_field_id( 'gallery_height' ); ?>"><?php _e('Gallery Height:','NorthVantage'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'gallery_height' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'gallery_height' ); ?>" value="<?php echo $instance['gallery_height']; ?>" style="width:30px;" /><small> px (default 200)</small>	
		</p>         

			<label for="<?php echo $this->get_field_id( 'datasource' ); ?>"><strong><?php _e('Datasource:','NorthVantage'); ?></strong></label><br /><br />
			<select id="<?php echo $this->get_field_id( 'datasource' ); ?>" name="<?php echo $this->get_field_name( 'datasource' ); ?>" class="widefat" style="width:100%;" onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,'<?php echo $this->get_field_id( 'datasource' ); ?>')">
            
    			<option value="<?php echo $this->get_field_id( 'nodata' ); ?>" <?php if($instance['datasource']==$this->get_field_id( 'nodata' )) { ?> selected="selected" <?php } ?>>Select Data Source </option>
                <option value="<?php echo $this->get_field_id( 'data-1' ); ?>" <?php if($instance['datasource']==$this->get_field_id( 'data-1' )) { ?> selected="selected" <?php } ?>>Attached Media</option>
                <option value="<?php echo $this->get_field_id( 'data-6' ); ?>" <?php if($instance['datasource']==$this->get_field_id( 'data-6' )) { ?> selected="selected" <?php } ?>>Gallery Media</option>
                <option value="<?php echo $this->get_field_id( 'data-2' ); ?>" <?php if($instance['datasource']==$this->get_field_id( 'data-2' )) { ?> selected="selected" <?php } ?>>Post Categories</option>
				<?php if( class_exists('WPSC_Query') || class_exists('Woocommerce') ) { ?>
					<option value="<?php echo $this->get_field_id( 'data-5' ); ?>" <?php if($instance['datasource']==$this->get_field_id( 'data-5' )) { ?> selected="selected" <?php } ?>>Product Categories / Tags</option>
				<?php } ?>                
                <?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                	<option value="<?php echo $this->get_field_id( 'data-3' ); ?>" <?php if($instance['datasource']==$this->get_field_id( 'data-3' )) { ?> selected="selected" <?php } ?>>Flickr Set</option>
				<?php } ?>
                <?php if(get_option('slideset_enable')=='enable') { ?>
                	<option value="<?php echo $this->get_field_id( 'data-4' ); ?>" <?php if($instance['datasource']==$this->get_field_id( 'data-4' )) { ?> selected="selected" <?php } ?>>Slide Set</option>
				<?php } ?>                     
                
			</select>
		
        <div id="<?php echo $this->get_field_id( 'nodata' ); ?>"></div>
        <div id="<?php echo $this->get_field_id( 'data-1' ); ?>" class="datasource">

<?php 	/* ------------------------------------
		:: ATTACHED MEDIA
		------------------------------------*/ ?>        
		
		<label for="<?php echo $this->get_field_id( 'attachedmedia' ); ?>"><strong><?php _e('Post / Page ID:','NorthVantage'); ?></strong></label><br />
		<p>
        	<input id="<?php echo $this->get_field_id( 'attachedmedia' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'attachedmedia' ); ?>" value="<?php echo $instance['attachedmedia']; ?>" style="width:100px;" /> <small> Comma separate for multiple</small>	
		</p>
                
        </div>
        <div id="<?php echo $this->get_field_id( 'data-4' ); ?>" class="datasource">

<?php 	/* ------------------------------------
		:: GALLERY SLIDESET
		------------------------------------*/ ?> 
        
        <h4>Slide Set ID</h4>
		<p><small class="description">Selecting a Slide Set ID will override any category selected.</small></p>
					<?php 		
						$slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
						$slideset_data_ids = explode(",", $slideset_data_ids);

						if($slideset_data_ids) {			
								foreach ($slideset_data_ids as $slideset_data_ids) {
									$option='<input type="checkbox" id="'. $this->get_field_id( 'slidesetid' ) .'[]" name="'. $this->get_field_name( 'slidesetid' ) .'[]"';		
									if (is_array($instance['slidesetid'])) {
									foreach ($instance['slidesetid'] as $slidesets) {					
										if($slidesets==$slideset_data_ids) {
											$option=$option.' checked="checked"'; 
										}
									}
									} else {
										if($instance['slidesetid']==$slideset_data_ids) {
											$option=$option.' checked="checked"'; 
										} 										
									}
									$option .= ' value="'.$slideset_data_ids.'" />';
				
									$option .= ' '.$slideset_data_ids;
									$option .= '<br />';
									echo $option;
								}
						}						
										
					?>
 		
        </div>
		<div id="<?php echo $this->get_field_id( 'data-2' ); ?>" class="datasource">

<?php 	/* ------------------------------------
		:: POST CATEGORIES
		------------------------------------*/ ?> 
                
		<p>
        	<label for="<?php echo $this->get_field_id( 'gallerycats' ); ?>"><strong><?php _e('Select Post Categories:','NorthVantage'); ?></strong></label><br /><br />
			<?php 
				$categories=  get_categories(); 
				foreach ($categories as $cat) {
					$option='<input type="checkbox" id="'. $this->get_field_id( 'gallerycats' ) .'[]" name="'. $this->get_field_name( 'gallerycats' ) .'[]"';
					if (is_array($instance['gallerycats'])) {
					foreach ($instance['gallerycats'] as $cats) {					
					if($cats==$cat->term_id) {
						$option=$option.' checked="checked"'; 
					} elseif($cats==$cat->cat_name) {
						$option=$option.' checked="checked"'; 
					}
					}
					}
					$option .= ' value="'.$cat->cat_name.'" />';

                    $option .= ' '.$cat->cat_name;
                    $option .= ' ('.$cat->category_count.')';
                    $option .= '<br />';
                    echo $option;
                  }
				  
			?>	
        </p>   
		<p>
			<label for="<?php echo $this->get_field_id( 'gallerypostformat' ); ?>"><strong><?php _e('Display &amp; Filter by Post Format:','NorthVantage')?></strong></label><br />
			<select name="<?php echo $this->get_field_name( 'gallerypostformat' ); ?>" id="<?php echo $this->get_field_id( 'gallerypostformat' ); ?>">
            <option value="">Disabled</option>
			<?php
			$post_formats = get_theme_support( 'post-formats' );
						                        
			foreach ($post_formats[0] as $post_format): ?>
				
                <option value="<?php echo $post_format; ?>" <?php if($instance['gallerypostformat']==$post_format) { ?> selected="selected" <?php } ?>><?php echo  $post_format; ?></option>     
			<?php endforeach; ?>
 			</select>
        </p>         	
		</div>
        <?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
        <div id="<?php echo $this->get_field_id( 'data-3' ); ?>" class="datasource">

<?php 	/* ------------------------------------
		:: FLICKR SET
		------------------------------------*/ ?>
         
        	<p>
			<label for="<?php echo $this->get_field_id( 'flickrset' ); ?>"><strong><?php _e('Select Flickr Set:','NorthVantage')?></strong></label><br />
			<select name="<?php echo $this->get_field_name( 'flickrset' ); ?>" id="<?php echo $this->get_field_id( 'flickrset' ); ?>">
			<?php
			require_once(NV_FILES."/adm/inc/phpFlickr/phpFlickr.php");
			$f = new phpFlickr(get_option('flickr_apikey')); // API
			$user = get_option('flickr_userid');
			$ph_sets = $f->photosets_getList($user);
                        
			foreach ($ph_sets['photoset'] as $ph_set):
				if(!$ph_set) { ?>
						<option value="">No Sets Found</option>            	
				<?php } else {?>
						<option value="">Select Set</option>
                        <option value="<?php echo $ph_set['id']; ?>" <?php if($instance['flickrset']==$ph_set['id']) { ?> selected="selected" <?php } ?>><?php echo  $ph_set['title']; ?></option>     
						<?php }
			endforeach; ?>
 			</select>
        	</p>
        </div>
		<?php } ?>
        
		<?php if(class_exists('WPSC_Query') || class_exists('Woocommerce') ) { ?>
        <div id="<?php echo $this->get_field_id( 'data-5' ); ?>" class="datasource">

<?php 	/* ------------------------------------
		:: PRODUCT CATEGORIES / TAGS
		------------------------------------*/ ?> 
        <p>
		<label for="<?php echo $this->get_field_id( 'productcats' ); ?>"><strong><?php _e('Select Product Categories:','NorthVantage'); ?></strong></label><br /><br />
		
		<?php 
		
		
		if( class_exists('Woocommerce') ) : 
			  		
        	$categories=  get_terms('product_cat', 'orderby=name&hide_empty=0');
				  
		else : 
				  
			$categories=  get_terms('wpsc_product_category', 'orderby=name&hide_empty=0');
				  
		endif;
		
		
		foreach ($categories as $cat) {
		
			$option = '<input type="checkbox" id="'. $this->get_field_id( 'productcats' ) .'[]" name="'.$this->get_field_name( 'productcats' ) .'[]" '; 
			
			if (is_array($instance['productcats'])) {
				foreach ($instance['productcats'] as $cats) {
				if($cats==$cat->name) {
				$option .= 'checked="checked"'; 
				}
			}
			} else {
				if($instance['productcats']==$cat->name) {
				$option .= 'checked="checked"'; 
				}
			}				
			$option .= ' value="'.$cat->name.'">';
			  $option .= '<small class="description">'.$cat->name;
			  $option .= ' ('.$cat->count.') </small><br />';
			  echo $option;
		}		
		
		?><br />
        <label for="<?php echo $this->get_field_id( 'producttags' ); ?>"><strong><?php _e('Select Product Tags:','NorthVantage'); ?></strong></label><br /><br />

<?php 
		$tags=  get_terms('product_tag', 'orderby=name&hide_empty=1');
		
		foreach ($tags as $tag) {
		
		  $option = '<input type="checkbox" id="'. $this->get_field_id( 'producttags' ) .'[]" name="'. $this->get_field_name( 'producttags' ) .'[]" '; 
				
				if (is_array($instance['producttags'])) {
				foreach ($instance['producttags'] as $tags) {		
				if($tags==$tag->name) {
				$option .= 'checked="checked"'; 
				}
				}
				} else {
				if($instance['producttags']==$tag->name) {
				$option .= 'checked="checked"'; 
				}
				}	
				$option .= ' value="'.$tag->name.'">';
		  $option .= '<small class="description">'.$tag->name;
		  $option .= ' ('.$tag->count.') </small><br />';
		  echo $option;
		  
		} ?>
		</p>
        </div>
        <?php } ?>
        <div id="<?php echo $this->get_field_id( 'data-6' ); ?>" class="datasource">

<?php 	/* ------------------------------------
		:: GALLERY MEDIA
		------------------------------------*/ ?> 
        <p>
		<label for="<?php echo $this->get_field_id( 'gallerymedia' ); ?>"><strong><?php _e('Select Gallery Media Categories:','NorthVantage'); ?></strong></label><br /><br />
		
		<?php $categories=  get_terms('media-category', 'orderby=name&hide_empty=0');
		
		foreach ($categories as $cat) {
		
		  		$option = '<input type="checkbox" id="'. $this->get_field_id( 'mediacats' ) .'[]" name="'. $this->get_field_name( 'mediacats' ) .'[]" '; 
				
				if (is_array($instance['mediacats'])) {
					foreach ($instance['mediacats'] as $cats) {		
						if($cats==$cat->name) {
						$option .= 'checked="checked"'; 
						}
					}
				} else {
					if($instance['mediacats']==$cat->name) {
					$option .= 'checked="checked"'; 
					}
				}	
				$option .= ' value="'.$cat->name.'">';
		  $option .= '<small class="description">'.$cat->name;
		  $option .= ' ('.$cat->count.') </small><br />';
		  echo $option;
		} ?>	
		</p>
        </div>        

		<p>
			<label for="<?php echo $this->get_field_id( 'content_type' ); ?>"><?php _e('Content Type:','NorthVantage'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'content_type' ); ?>" name="<?php echo $this->get_field_name( 'content_type' ); ?>" class="widefat" style="width:100%;">
				<option value="image" <?php if ( 'image' == $instance['content_type'] ) echo 'selected="selected"'; ?>>Image</option>
                <option value="text" <?php if ( 'text' == $instance['content_type'] ) echo 'selected="selected"'; ?>>Text</option>
         		<option value="textimage" <?php if ( 'textimage' == $instance['content_type'] ) echo 'selected="selected"'; ?>>Text/Image</option>
				<option value="titleimage" <?php if ( 'titleimage' == $instance['content_type'] ) echo 'selected="selected"'; ?>>Title/Image</option>
				<option value="titleoverlay" <?php if ( 'titleoverlay' == $instance['content_type'] ) echo 'selected="selected"'; ?>>Title Overlay Image</option>
				<option value="titletextoverlay" <?php if ( 'titletextoverlay' == $instance['content_type'] ) echo 'selected="selected"'; ?>>Title &amp; Text Overlay Image</option>
			</select>
		</p>
		<div class="widget_column two">
			<label for="<?php echo $this->get_field_id( 'img_effect' ); ?>"><?php _e('Image Effect:','NorthVantage'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'img_effect' ); ?>" name="<?php echo $this->get_field_name( 'img_effect' ); ?>" class="widefat" style="width:100%;">
				<option value="none" <?php if ( 'none' == $instance['img_effect'] ) echo 'selected="selected"'; ?>>No Effect</option>
                <option value="frame" <?php if ( 'frame' == $instance['img_effect'] ) echo 'selected="selected"'; ?>>Frame</option>
                <option value="shadow" <?php if ( 'shadow' == $instance['img_effect'] ) echo 'selected="selected"'; ?>>Shadow</option>
				<option value="reflection" <?php if ( 'reflection' == $instance['img_effect'] ) echo 'selected="selected"'; ?>>Reflection</option>
                <option value="shadowreflection" <?php if ( 'shadowreflection' == $instance['img_effect'] ) echo 'selected="selected"'; ?>>Reflection &amp; Shadow</option>
			</select>        
		</div>
		<div class="widget_column two last">
			<label for="<?php echo $this->get_field_id( 'img_align' ); ?>"><?php _e('Image Align:','NorthVantage'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'img_align' ); ?>" name="<?php echo $this->get_field_name( 'img_align' ); ?>" class="widefat" style="width:100%;">
				<option value="center" <?php if ( 'center' == $instance['img_align'] ) echo 'selected="selected"'; ?>>Center</option>
                <option value="left" <?php if ( 'left' == $instance['img_align'] ) echo 'selected="selected"'; ?>>Left</option>
                <option value="right" <?php if ( 'right' == $instance['img_align'] ) echo 'selected="selected"'; ?>>Right</option>
			</select>
		</div>
        <br class="clear"><br />
        <div class="widget_column two">
        <label for="<?php echo $this->get_field_id( 'animation_type' ); ?>"><?php _e('Animation Type:','NorthVantage'); ?></label> 
        <select id="<?php echo $this->get_field_id( 'animation_type' ); ?>" name="<?php echo $this->get_field_name( 'animation_type' ); ?>" class="widefat" style="width:100%;">
        <?php 
				 $animation_types = array("scrollHorz","blindX","blindY","blindZ","cover","curtainX","curtainY","fade","fadeZoom","growX","growY","none","scrollUp","scrollDown","scrollLeft","scrollRight","scrollHorz","scrollVert","shuffle","slideX","slideY","toss","turnUp","turnDown","turnLeft","turnRight","uncover","wipe","zoom");
		 
                  foreach ($animation_types as $animation_type) {
				  	if($instance['animation_type']==$animation_type) {
                    $option = '<option selected="selected" value="'.$animation_type.'">';
					} else {
					$option = '<option value="'.$animation_type.'">';
					}
                    $option .= $animation_type;
                    $option .= '</option>';
                    echo $option;
                  } ?>
					

        </select>    
        </div>
        <div class="widget_column two last">
        <label for="<?php echo $this->get_field_id( 'tween_type' ); ?>"><?php _e('Tween Type:','NorthVantage'); ?></label> 
        <select id="<?php echo $this->get_field_id( 'tween_type' ); ?>" name="<?php echo $this->get_field_name( 'tween_type' ); ?>" class="widefat" style="width:100%;">
        <?php 
				 $tween_types = array("easeInOutExpo","linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce");
		 
                  foreach ($tween_types as $tween_type) {
				  	if($instance['tween_type']==$tween_type) {
                    $option = '<option selected="selected" value="'.$tween_type.'">';
					} else {
					$option = '<option value="'.$tween_type.'">';
					}
                    $option .= $tween_type;
                    $option .= '</option>';
                    echo $option;
                  } ?>
					

        </select>    
        </div>
        <br class="clear"><br />
		<div class="widget_column two">
			<label for="<?php echo $this->get_field_id( 'timeout' ); ?>"><?php _e('Timeout:','NorthVantage'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'timeout' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'timeout' ); ?>" value="<?php echo $instance['timeout']; ?>" style="width:50px" /> <small> <em>seconds</em></small>	
		</div>        
		<div class="widget_column two last">
			<label for="<?php echo $this->get_field_id( 'excerpt' ); ?>"><?php _e('Excerpt:','NorthVantage'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'excerpt' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'excerpt' ); ?>" value="<?php echo $instance['excerpt']; ?>" style="width:50px" /> <small><em>(55 default)</em></small>	
		</div>
        <br class="clear"><br />
		<div class="widget_column two">
			<label for="<?php echo $this->get_field_id( 'sortby' ); ?>"><?php _e('Sort by:','NorthVantage'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'sortby' ); ?>" name="<?php echo $this->get_field_name( 'sortby' ); ?>" class="widefat" style="width:100%;">
				<option value="date" <?php if ( 'date' == $instance['sortby'] ) echo 'selected="selected"'; ?>>Date</option>
                <option value="rand" <?php if ( 'rand' == $instance['sortby'] ) echo 'selected="selected"'; ?>>Random</option>
				<option value="title" <?php if ( 'title' == $instance['sortby'] ) echo 'selected="selected"'; ?>>Title</option>
			</select>        
		</div>
		<div class="widget_column two last">
			<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e('Order by:','NorthVantage'); ?></label> 
			<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>" class="widefat" style="width:100%;">
				<option value="" <?php if ( '' == $instance['orderby'] ) echo 'selected="selected"'; ?>>Ascending</option>
                <option value="DESC" <?php if ( 'DESC' == $instance['orderby'] ) echo 'selected="selected"'; ?>>Descending</option>
			</select>
		</div>       
        <br class="clear"><br /> 
	<?php
	}
}



/**
 * Plugin Name: Contact Form
 * Version: 1.0
 * Author: NORTHVANTAGE
 * Author URI: http://northvantage.co.uk
 *
*/

add_action( 'widgets_init', 'load_nv_contact_form' );


function load_nv_contact_form() {
	register_widget( 'nv_contact_form' );
}


class nv_contact_form extends WP_Widget {

	/* ------------------------------------
	:: SETUP WIDGET 
	------------------------------------*/

	function nv_contact_form() {
		
		/* Widget settings.*/
		$widget_ops = array( 'classname' => 'contact_form', 'description' => __('NorthVantage Contact Form.','NorthVantage') );

		/* Widget control settings.*/
		$control_ops = array( 'width' => 320, 'height' => 350, 'id_base' => 'contactform-widget' );

		/* Create the widget.*/
		$this->WP_Widget( 'contactform-widget', __('NorthVantage Contact Form','NorthVantage'), $widget_ops, $control_ops );
	}


	function widget( $args, $instance ) {
		extract( $args );
		 
		
	/* ------------------------------------
	:: DISPLAY WIDGET
	------------------------------------*/
		if(isset($instance['title'])) $title = apply_filters('widget_title', $instance['title'] );
		
		echo "<li class=\"widget nv-contact-form\">";
		
		/* Display the widget title if one was input (before and after defined by themes).*/
		if ( isset($title) )
			echo $before_title . $title . $after_title;
		
		$chars = array("[", "]");
		$contactid = str_replace($chars,"",$this->get_field_name( 'id' )); 
		
		echo do_shortcode('[enquiry_form thankyou="'.$instance['thankyou'].'" id="'.$contactid.'" emailto="'.$instance['emailto'].'" /]');
		
		echo "</li>";
	}



	/* ------------------------------------
	:: UPDATE SETTINGS
	------------------------------------*/
	
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs).*/
		$instance['thankyou'] = strip_tags( $new_instance['thankyou'] );
		$instance['emailto'] = strip_tags( $new_instance['emailto'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}


	/* ------------------------------------
	:: WIDGET FORM
	------------------------------------*/
	
	function form( $instance ) {

		/* Set up some default widget settings.*/ ?>
	
		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title: (Optional)','NorthVantage'); ?></label>
            
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php if(isset($instance['title']) || !empty($instance['title']) ) echo $instance['title']; ?>" style="width:96%;" />
		</p>

		<!-- Email to: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'emailto' ); ?>"><?php _e('Email to address:','NorthVantage'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'emailto' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'emailto' ); ?>" value="<?php if(isset($instance['emailto'])) echo $instance['emailto']; ?>" style="width:96%;" /><br />
<small> if this field is left blank it will send to the default WP admin email address.</small>	
		</p>
	
		<!-- Thank you message: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'thankyou' ); ?>"><?php _e('Thank you message:','NorthVantage'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'thankyou' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'thankyou' ); ?>" value="<?php if(isset($instance['thankyou'])) echo $instance['thankyou']; ?>" multiple="multiple" style="width:96%;" /><br />
<small> A default message will be displayed if this field is left blank.</small>	
		</p>        
		
	<?php
	}
} ?>