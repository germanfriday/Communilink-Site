<?php 
/* Meta Config 
** Build Page & Post option forms.
*/

if(isset($meta_box[ 'type' ]) && $meta_box[ 'type' ]=="text") { 
	if(isset($meta_box[ 'opentag' ])) {echo $meta_box[ 'opentag' ];} ?>
        <div class="page-options <?php if(isset($meta_box[ 'size' ])) { echo $meta_box[ 'size' ]; } ?>">
            <p><?php echo $meta_box[ 'description' ]; ?></p>
        </div><div class="clear"></div>
    <?php if(isset($meta_box[ 'closetag' ])) {echo $meta_box[ 'closetag' ];} 

} elseif (isset($meta_box[ 'type' ]) && $meta_box[ 'type' ]=="field") { 
	if(isset($meta_box[ 'opentag' ])) {echo $meta_box[ 'opentag' ];} ?>
        <div class="page-options <?php if(isset($meta_box[ 'size' ])) { echo $meta_box[ 'size' ]; } ?>">
            <label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
            
            <input type="text" <?php if(!empty($meta_box[ 'class' ])) { ?> class="<?php echo $meta_box[ 'class' ]; ?>" <?php } ?> name="<?php if(isset($meta_box[ 'name' ])) echo $meta_box[ 'name' ]; ?>"  id="<?php if(isset($meta_box[ 'name' ])) echo $meta_box[ 'name' ]; ?>" value="<?php if(isset($data[$meta_box['name']])) echo htmlspecialchars($data[$meta_box['name']]); ?>" /> <?php if(isset($meta_box[ 'extras' ])) { echo $meta_box[ 'extras' ]; } ?>
            
            
            <p><?php if(isset($meta_box[ 'description' ])) echo $meta_box['description']; ?></p>
        </div>
    <?php if(isset($meta_box[ 'closetag' ])) {echo $meta_box[ 'closetag' ];} 
	
} elseif ( isset($meta_box[ 'type' ]) && $meta_box[ 'type' ]=="textarea") { 
	if($meta_box['opentag']) {echo $meta_box[ 'opentag' ];} ?>
        <div class="page-options <?php if(isset($meta_box[ 'size' ])) { echo $meta_box[ 'size' ]; } ?>">
            <label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
            <textarea <?php if( !empty( $meta_box[ 'class' ] ) ) { ?> class="<?php echo $meta_box[ 'class' ]; ?>" <?php } ?> name="<?php if(!empty( $meta_box[ 'name' ] ) ) echo $meta_box[ 'name' ]; ?>"  id="<?php if(!empty( $meta_box[ 'name' ] ) ) echo $meta_box[ 'name' ]; ?>" /><?php if(!empty( $meta_box[ 'name' ] ) ) echo htmlspecialchars( $data[$meta_box['name'] ] ); ?></textarea><?php if(isset($meta_box[ 'extras' ])) { echo $meta_box[ 'extras' ]; } ?>
            <p><?php echo $meta_box['description']; ?></p>
        </div>
    <?php if(!empty($meta_box[ 'closetag' ])) {echo $meta_box[ 'closetag' ];} 
	
} elseif ( isset($meta_box[ 'type' ]) && $meta_box[ 'type' ]=="hidden") { 
	if( isset($meta_box[ 'opentag' ])) {echo $meta_box[ 'opentag' ];} ?>
            <input type="hidden" <?php if(isset($meta_box[ 'class' ])) { ?> class="<?php echo $meta_box[ 'class' ]; ?>" <?php } ?> name="<?php echo $meta_box[ 'name' ]; ?>"  id="<?php echo $meta_box[ 'name' ]; ?>" value="<?php echo htmlspecialchars($data[$meta_box['name']]); ?>" /> <?php if(isset($meta_box[ 'extras' ])) { echo $meta_box[ 'extras' ]; } ?>
            <p><?php if(isset($meta_box[ 'description' ])) echo $meta_box['description']; ?></p>
            
            <?php if($meta_box[ 'id' ]=="slideset") { ?>
            	<div class="clear"></div>
				<ul id="catselect">
					<?php
					if(htmlspecialchars($data[$meta_box['name']])) {
						$selected_cats = explode(",", htmlspecialchars($data[$meta_box['name']]));
							
						if(is_array($selected_cats)) {
							foreach ($selected_cats as $selected_cat) { ?>
								<li class="button-secondary" title="<?php echo $selected_cat; ?>"><span class="cat-remove"></span><?php echo $selected_cat; ?></li>
							<?php }
						} else { ?>
								<li class="button-secondary" title="<?php echo $selected_cats; ?>"><span class="cat-remove"></span><?php echo $selected_cats; ?></li>
							<?php }							
					  } ?>
                      </ul>				
			<?php }
    if(!empty($meta_box[ 'closetag' ])) {echo $meta_box[ 'closetag' ];} 

} elseif ( isset($meta_box[ 'type' ]) && $meta_box[ 'type' ]=="chkbox") { 
	if(isset($meta_box[ 'opentag' ])) {echo $meta_box[ 'opentag' ];} 
		if( isset($meta_box[ 'array' ]) ) {
			if($meta_box['array']=="cats") { 
			
                  $categories=get_categories(); 

					foreach ($categories as $cat) {

                    $option = '<input type="checkbox" name="'. $meta_box[ 'name' ] .'[]" '; 
					
					if (is_array($data[$meta_box[ 'name' ]])) {
					foreach ($data[$meta_box['name']] as $cats) {					
					if($cats==$cat->term_id) {
					$option .= 'checked="checked"'; 
					} elseif($cats==$cat->cat_name) {
					$option .= 'checked="checked"'; 
					}
					}
					} else {
					if($data[$meta_box['name']]==$cat->term_id) {
					$option .= 'checked="checked"'; 
					} elseif ($data[$meta_box['name']]==$cat->cat_name) {
					$option .= 'checked="checked"'; 
					}
					}				
					$option .= ' value="'. htmlspecialchars($cat->term_id) .'">';
                    $option .= '<small class="description">'.$cat->cat_name;
                    $option .= ' ('.$cat->category_count.') </small><br />';
                    echo $option;
                  }
				  
			} elseif($meta_box[ 'array']=="archivecats") {
				
                  $categories=  get_categories(); 

					foreach ($categories as $cat) {

                    $option = '<input type="checkbox" name="'. $meta_box[ 'name' ] .'[]" '; 
					
					if (is_array($data[ $meta_box[ 'name' ]])) {
					foreach ($data[ $meta_box[ 'name' ]] as $cats) {					
					if($cats==$cat->term_id) {
					$option .= 'checked="checked"'; 
					}
					}
					} else {
					if($data[ $meta_box[ 'name' ]]==$cat->term_id) {
					$option .= 'checked="checked"'; 
					}
					}				
					$option .= ' value="'.$cat->term_id.'">';
                    $option .= '<small class="description">'.$cat->cat_name;
                    $option .= ' ('.$cat->category_count.') </small>';
                    echo $option;
                  }
			
			} elseif($meta_box[ 'array']=="mediacats") { ?>

                 <?php 
			  		
                  $categories=  get_terms('media-category', 'orderby=name&hide_empty=0');

					foreach ($categories as $cat) {

                    $option = '<input type="checkbox" name="'. $meta_box[ 'name' ] .'[]" '; 
					
					if (is_array($data[ $meta_box[ 'name' ]])) {
					foreach ($data[ $meta_box[ 'name' ]] as $cats) {					
					if($cats==$cat->name) {
					$option .= 'checked="checked"'; 
					}
					}
					} else {
					if($data[ $meta_box[ 'name' ]]==$cat->name) {
					$option .= 'checked="checked"'; 
					}
					}				
					$option .= ' value="'.$cat->name.'">';
                    $option .= '<small class="description">'.$cat->name;
                    $option .= ' ('.$cat->count.') </small><br />';
                    echo $option;
                  }
				  
    
    		} elseif($meta_box[ 'array']=="productcats") { ?>

                 <?php 
				 
				  if( class_exists('Woocommerce') ) : 
			  		
                  $categories=  get_terms('product_cat', 'orderby=name&hide_empty=0');
				  
				  else : 
				  
				  $categories=  get_terms('wpsc_product_category', 'orderby=name&hide_empty=0');
				  
				  endif;

					foreach ($categories as $cat) {

                    $option = '<input type="checkbox" name="'. $meta_box[ 'name' ] .'[]" '; 
					
					if (is_array($data[ $meta_box[ 'name' ]])) {
					foreach ($data[ $meta_box[ 'name' ]] as $cats) {					
					if($cats==$cat->name) {
					$option .= 'checked="checked"'; 
					}
					}
					} else {
					if($data[ $meta_box[ 'name' ]]==$cat->name) {
					$option .= 'checked="checked"'; 
					}
					}				
					$option .= ' value="'.$cat->name.'">';
                    $option .= '<small class="description">'.$cat->name;
                    $option .= ' ('.$cat->count.') </small><br />';
                    echo $option;
                  }
				  
    
    		} elseif($meta_box[ 'array']=="producttags") { ?>

                 <?php 
			  
                  $tags=  get_terms('product_tag', 'orderby=name&hide_empty=1');

					foreach ($tags as $tag) {

                    $option = '<input type="checkbox" name="'. $meta_box[ 'name' ] .'[]" '; 
					
					if (is_array($data[ $meta_box[ 'name' ]])) {
					foreach ($data[ $meta_box[ 'name' ]] as $tags) {					
					if($tags==$tag->name) {
					$option .= 'checked="checked"'; 
					}
					}
					} else {
					if($data[ $meta_box[ 'name' ]]==$tag->name) {
					$option .= 'checked="checked"'; 
					}
					}				
					$option .= ' value="'.$tag->name.'">';
                    $option .= '<small class="description">'.$tag->name;
                    $option .= ' ('.$tag->count.') </small><br />';
                    echo $option;
                  }
				  
                 ?>
    
    <?php }
			
			if(isset($meta_box[ 'closetag' ])) {echo $meta_box[ 'closetag' ];}  
		
		} else { ?>

<div class="page-options <?php if(isset($meta_box[ 'size' ])) { echo $meta_box[ 'size' ]; } ?>">
<label for="<?php if(isset($meta_box[ 'name' ])) echo $meta_box[ 'name' ]; ?>"><?php if(isset($meta_box[ 'title' ])) echo $meta_box[ 'title' ]; ?></label>
<input type="checkbox" name="<?php echo $meta_box[ 'name' ]; ?>" <?php if($data[ $meta_box[ 'name' ] ]=="yes") {?> checked="checked"  <?php } ?> value="yes" />
<?php if(isset( $meta_box[ 'description' ] )) echo $meta_box[ 'description' ]; ?>
</div>
<?php if(isset($meta_box[ 'closetag' ])) {echo $meta_box[ 'closetag' ];} ?>
<?php } }

elseif ( isset($meta_box[ 'type' ]) && $meta_box[ 'type' ]=="radio") { ?>
	<?php if(isset($meta_box[ 'opentag' ])) {echo $meta_box[ 'opentag' ];} ?>
    <?php if(isset($meta_box[ 'maintitle' ])) {echo '<label>'.$meta_box[ 'maintitle' ].'</label>';} ?>
    <div class="page-options <?php if(isset($meta_box[ 'size' ])) { echo $meta_box[ 'size' ]; } ?>">
        <label for="<?php echo $meta_box[ 'name' ]; ?>"><?php echo $meta_box[ 'title' ]; ?></label>
        <p><input type="radio" name="<?php echo $meta_box[ 'name' ]; ?>" <?php if($data[ $meta_box[ 'name' ] ]==$meta_box[ 'id' ]) {?> checked="checked"  <?php } ?> value="<?php echo $meta_box[ 'id' ]; ?>" />
        <?php if(isset($meta_box[ 'image' ])) { ?><img src="<?php echo get_template_directory_uri(); ?>/lib/adm/imgs/<?php  if(isset($meta_box[ 'image' ])) echo $meta_box[ 'image' ]; ?>" alt="<?php  if(isset($meta_box[ 'name' ])) echo $meta_box[ 'name' ]; ?>" /><?php } ?><?php  if(isset($meta_box[ 'description' ])) echo $meta_box[ 'description' ]; ?></p>
    </div>
    <?php if(isset($meta_box[ 'closetag' ])) {echo $meta_box[ 'closetag' ];} ?>
<?php }

elseif ( isset($meta_box[ 'type' ]) && $meta_box[ 'type' ]=="clear") { ?>
    <div class="clear"></div>
<?php }

elseif ( isset($meta_box[ 'type' ]) && $meta_box[ 'type' ]=="menu") { ?>
<?php if(isset($meta_box[ 'opentag' ])) {echo $meta_box[ 'opentag' ];} ?>
    <div class="page-options <?php if(isset($meta_box[ 'size' ])) { echo $meta_box[ 'size' ]; } ?>">
        <label for="<?php  if(isset($meta_box[ 'name' ])) echo $meta_box[ 'name' ]; ?>"><?php  if(isset($meta_box[ 'title' ])) echo $meta_box[ 'title' ]; ?></label>
        <select name="<?php echo $meta_box[ 'name' ]; ?>" id="<?php echo $meta_box[ 'id' ]; ?>" <?php if(isset($meta_box[ 'list' ])) { ?> size="<?php echo $meta_box[ 'list' ]; ?>" multiple="multiple" style="height:70px" <?php } ?> <?php if($meta_box[ 'id' ]=="datasource_selector") echo  'onchange="toggle_shrtcode(this.options[this.options.selectedIndex].value,\'datasource_selector\')"'; ?>>

		<?php
		
		if($meta_box[ 'id' ]=="columns") { ?>
					<option value="">Select Sidebar</option>
		<?php $i=1;
			while($i<=$num_sidebars)
				{ ?>
					<option value="Sidebar<?php echo $i; ?>" <?php if($data[ $meta_box[ 'name' ] ]=="Sidebar".$i) {?> selected="selected" <?php } ?> >Sidebar<?php echo $i; ?></option>
				<?php $i++;
				}
		
		} elseif($meta_box[ 'id' ]=="twitter") { ?>
        
				<option value="none">Disabled</option>
                <option value="pagetop" <?php if($data[ $meta_box[ 'name' ] ]=="pagetop") { ?> selected="selected" <?php } ?>>Above Page Content</option>
                <option value="pagebot" <?php if($data[ $meta_box[ 'name' ] ]=="pagebot") { ?> selected="selected" <?php } ?>>Below Page Content</option>

		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="branding_alignment") { ?>
        		<option value="">Branding Alignment</option>
				<option value="left" <?php if($data[ $meta_box[ 'name' ] ]=="left") { ?> selected="selected" <?php } ?>>Left Align</option>
                <option value="right" <?php if($data[ $meta_box[ 'name' ] ]=="right") { ?> selected="selected" <?php } ?>>Right Align</option>
                <option value="center" <?php if($data[ $meta_box[ 'name' ] ]=="center") { ?> selected="selected" <?php } ?>>Center Align</option>
		<?php 
		
		} elseif($meta_box[ 'id' ]=="menu_alignment") { ?>
        		<option value="">Menu Alignment</option>
				<option value="left" <?php if($data[ $meta_box[ 'name' ] ]=="left") { ?> selected="selected" <?php } ?>>Left Align</option>
                <option value="right" <?php if($data[ $meta_box[ 'name' ] ]=="right") { ?> selected="selected" <?php } ?>>Right Align</option>
                <option value="center" <?php if($data[ $meta_box[ 'name' ] ]=="center") { ?> selected="selected" <?php } ?>>Center Align</option>
		<?php 
		
		} elseif($meta_box[ 'id' ]=="customskin") { ?>
        	<option value="">Default</option>
			<?php
			$skin_data_ids  = substr(maybe_unserialize(get_option('skin_data_ids')), 0, -1);  // trim last comma
			$skin_data_ids = explode(",", $skin_data_ids);
			
			if($skin_data_ids) {
						
				if(is_array($skin_data_ids)) {
					foreach ($skin_data_ids as $skin_data_id) {				
						if($data[ $meta_box[ 'name' ] ]==$skin_data_id) $selected="selected='selected'"; else $selected='';
						echo"<option ".$selected." value='". $skin_data_id ."'>". $skin_data_id ."</option>";
					}
				} else {
					if($data[ $meta_box[ 'name' ] ]==$skin_data_id) $selected="selected='selected'"; else $selected='';
					echo"<option value='". $skin_data_id ."'>". $skin_data_id ."</option>";
				}	
			}
						
		?>     
		
		<?php 
		
		} elseif ($meta_box[ 'id' ]=="gallerycat") { ?>
        

                 <?php 
                  $categories=  get_categories(); 
                  foreach ($categories as $cat) {
				  	if($data[ $meta_box[ 'name' ] ]==$cat->category_nicename) {
                    $option = '<option selected="selected" value="'.$cat->category_nicename.'">';
					} else {
					$option = '<option value="'.$cat->category_nicename.'">';
					}
                    $option .= $cat->cat_name;
                    $option .= ' ('.$cat->category_count.')';
                    $option .= '</option>';
                    echo $option;
                  }
               
		} elseif($meta_box[ 'id' ]=="stagegallery") { ?>
        
				<option value="image" <?php if($data[ $meta_box[ 'name' ] ]=="image") { ?> selected="selected" <?php } ?>>Image Only (Default) </option>
                <option value="textimageleft" <?php if($data[ $meta_box[ 'name' ] ]=="textimageleft") { ?> selected="selected" <?php } ?>>Image (Text Left Overlay) </option>
                <option value="textimageright" <?php if($data[ $meta_box[ 'name' ] ]=="textimageright") { ?> selected="selected" <?php } ?>>Image (Text Right Overlay) </option>
				<option value="titleoverlay" <?php if($data[ $meta_box[ 'name' ] ]=="titleoverlay") { ?> selected="selected" <?php } ?>>Image (Title Overlay Hover)</option>
                <option value="titletextoverlay" <?php if($data[ $meta_box[ 'name' ] ]=="titletextoverlay") { ?> selected="selected" <?php } ?>>Image (Title/Text Overlay Hover)</option>
                <option value="textoverlay" <?php if($data[ $meta_box[ 'name' ] ]=="textoverlay") { ?> selected="selected" <?php } ?>>Image (Text Overlay)</option>
                <option value="textonly" <?php if($data[ $meta_box[ 'name' ] ]=="textonly") { ?> selected="selected" <?php } ?>>Text Only </option>
		<?php 
		
		} elseif($meta_box[ 'id' ]=="imageeffect") { ?>
        
				<option value="none" <?php if($data[ $meta_box[ 'name' ] ]=="none") { ?> selected="selected" <?php } ?>>No Effect </option>
                <option value="shadow" <?php if($data[ $meta_box[ 'name' ] ]=="shadow") { ?> selected="selected" <?php } ?>>Drop Shadow </option>
                <option value="reflection" <?php if($data[ $meta_box[ 'name' ] ]=="reflection") { ?> selected="selected" <?php } ?>>Reflection </option>
                <option value="shadowreflection" <?php if($data[ $meta_box[ 'name' ] ]=="shadowreflection") { ?> selected="selected" <?php } ?>>Shadow &amp; Reflection</option>
                <option value="frame" <?php if($data[ $meta_box[ 'name' ] ]=="frame") { ?> selected="selected" <?php } ?>>Frame</option>
                <?php /* <option value="blackwhite" <?php if($data[ $meta_box[ 'name' ] ]=="blackwhite") { ?> selected="selected" <?php } ?>>Black &amp; White</option>
                <option value="shadowblackwhite" <?php if($data[ $meta_box[ 'name' ] ]=="shadowblackwhite") { ?> selected="selected" <?php } ?>>Shadow + Black &amp; White</option>*/?>
		
		<?php 
		} elseif($meta_box[ 'id' ]=="datasource_selector") { ?>
        
    			<option value="nodata" <?php if($data[ $meta_box[ 'name' ] ]=="nodata") { ?> selected="selected" <?php } ?>>Select Data Source </option>
                <option value="data-1" <?php if($data[ $meta_box[ 'name' ] ]=="data-1") { ?> selected="selected" <?php } ?>>Attached Media</option>
                <option value="data-6" <?php if($data[ $meta_box[ 'name' ] ]=="data-6") { ?> selected="selected" <?php } ?>>Gallery Media</option>
                <option value="data-2" <?php if($data[ $meta_box[ 'name' ] ]=="data-2") { ?> selected="selected" <?php } ?>>Post Categories</option>
				<?php if(class_exists('WPSC_Query') || class_exists('Woocommerce') ) { ?>
					<option value="data-5" <?php if($data[ $meta_box[ 'name' ] ]=="data-5") { ?> selected="selected" <?php } ?>>Product Categories / Tags</option>
				<?php } ?>                
                <?php if(get_option('flickr_apikey')!='' && get_option('flickr_userid')!='') { ?>
                	<option value="data-3" <?php if($data[ $meta_box[ 'name' ] ]=="data-3") { ?> selected="selected" <?php } ?>>Flickr Set</option>
				<?php } ?>
                <?php if(get_option('slideset_enable')=='enable') { ?>
                	<option value="data-4" <?php if($data[ $meta_box[ 'name' ] ]=="data-4") { ?> selected="selected" <?php } ?>>Slide Set</option>
				<?php } ?>
                
		<?php 
		} elseif($meta_box[ 'id' ]=="gallerypostformat") { ?>
			
            <option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Disabled</option>
        	
			<?php $post_formats = get_theme_support( 'post-formats' );
		
			foreach ($post_formats[0] as $post_format) {
			
			$is_selected='';
			
			if($data[ $meta_box[ 'name' ] ]==$post_format) { 
				$is_selected='selected="selected"'; 
			}	
			echo "<option value='". $post_format ."' ". $is_selected .">". $post_format ."</option>";
			
			}

		} elseif($meta_box[ 'id' ]=="flickrset") {
        
			if( get_option('flickr_apikey') !='' && get_option('flickr_userid') !='' ) { 
			
				require_once(NV_FILES."/adm/inc/phpFlickr/phpFlickr.php");
				$f = new phpFlickr(get_option('flickr_apikey')); // API
				$user = get_option('flickr_userid');
				$ph_sets = $f->photosets_getList($user);
		
				foreach ($ph_sets['photoset'] as $ph_set):
					if(!$ph_set) { ?>
							<option value="">No Sets Found</option>            	
					<?php } else {?>
							<option value="">Select Set</option>
							<option value="<?php echo $ph_set['id']; ?>" <?php if($data[ $meta_box[ 'name' ] ]==$ph_set['id']) { ?> selected="selected" <?php } ?>><?php echo  $ph_set['title']; ?></option>     
							<?php }
				endforeach; 
					
			}
		?>

		
		<?php 
		} elseif($meta_box[ 'id' ]=="slidesetselect") {
        
        $slideset_data_ids  = substr(maybe_unserialize(get_option('slideset_data_ids')), 0, -1);  // trim last comma
        $slideset_data_ids = explode(",", $slideset_data_ids);
			
            if(!$slideset_data_ids) {?>
					<option value="">No Slide Sets</option>            	
            <?php } else {?>
                    <option value="">Select Slide Set</option>
					<?php

					if($slideset_data_ids) {
						
                 		if(is_array($slideset_data_ids)) {
    						foreach ($slideset_data_ids as $slideset_data_ids) {
                                  echo"<option value='". $slideset_data_ids ."'>". $slideset_data_ids ."</option>";

    						}
                 		} else { 
    							  echo"<option value='". $slideset_data_ids ."'>". $slideset_data_ids ."</option>";
                 		}	
               		}	
				
					
					}
				
		?>

		
		<?php 
		} elseif($meta_box[ 'id' ]=="groupgridcontent") { ?>
        
				<option value="textimage" <?php if($data[ $meta_box[ 'name' ] ]=="textimage") { ?> selected="selected" <?php } ?>>Text &amp; Image </option>        
				<option value="titleimage" <?php if($data[ $meta_box[ 'name' ] ]=="titleimage") { ?> selected="selected" <?php } ?>>Title &amp; Image </option>
                <option value="titleoverlay" <?php if($data[ $meta_box[ 'name' ] ]=="titleoverlay") { ?> selected="selected" <?php } ?>>Title Overlay Image </option>
                <option value="titletextoverlay" <?php if($data[ $meta_box[ 'name' ] ]=="titletextoverlay") { ?> selected="selected" <?php } ?>>Title &amp; Text Overlay Image </option>
				<option value="image" <?php if($data[ $meta_box[ 'name' ] ]=="image") { ?> selected="selected" <?php } ?>>Image Only </option>
				<option value="text" <?php if($data[ $meta_box[ 'name' ] ]=="text") { ?> selected="selected" <?php } ?>>Text Only </option>                
		
		<?php 

				
		
		} elseif($meta_box[ 'id' ]=="accordiontitles") { ?>
        
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Enabled </option>        
				<option value="disabled" <?php if($data[ $meta_box[ 'name' ] ]=="disabled") { ?> selected="selected" <?php } ?>>Disabled </option>           
		
		<?php 

				
		
		} elseif($meta_box[ 'id' ]=="accordionautoplay") { ?>
        
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Disabled </option>        
				<option value="enabled" <?php if($data[ $meta_box[ 'name' ] ]=="enabled") { ?> selected="selected" <?php } ?>>Enabled </option>           
		
		<?php 

				
		
		} elseif($meta_box[ 'id' ]=="sliderimagealign") { ?>
        
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Center </option>        
				<option value="left" <?php if($data[ $meta_box[ 'name' ] ]=="left") { ?> selected="selected" <?php } ?>>Left </option> 
                <option value="right" <?php if($data[ $meta_box[ 'name' ] ]=="right") { ?> selected="selected" <?php } ?>>Right </option>           
		
		<?php 

				
		
		} elseif($meta_box[ 'id' ]=="sliderlayout") { ?>
        
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Horizontal </option>        
				<option value="vertical" <?php if($data[ $meta_box[ 'name' ] ]=="vertical") { ?> selected="selected" <?php } ?>>Vertical </option>         
		
		<?php 

				
		
		} elseif($meta_box[ 'id' ]=="groupsliderpos") { ?>
        
				<option value="above" <?php if($data[ $meta_box[ 'name' ] ]=="above") { ?> selected="selected" <?php } ?>>Above Page Content </option>        
				<option value="below" <?php if($data[ $meta_box[ 'name' ] ]=="below") { ?> selected="selected" <?php } ?>>Below Page Content </option>
		
		<?php 

		} elseif($meta_box[ 'id' ]=="nivoeffect") { ?>
        
		<?php  $nivo_effects = array("random","sliceDown","sliceDownLeft", "sliceUp", "sliceUpLeft", "sliceUpDown", "sliceUpDownLeft", "fold", "fade", "slideInRight", "slideInLeft", "boxRandom", "boxRain", "boxRainReverse", "boxRainGrow", "boxRainGrowReverse");
		 
                  foreach ($nivo_effects as $nivo_effect) {
				  	if($data[$meta_box[ 'name' ]]==$nivo_effect) {
                    $option = '<option selected="selected" value="'.$nivo_effect.'">';
					} else {
					$option = '<option value="'.$nivo_effect.'">';
					}
                    $option .= $nivo_effect;
                    $option .= '</option>';
                    echo $option;
                  } 

		} elseif($meta_box[ 'id' ]=="gridcolumns") { ?>
        
				<option value="1" <?php if($data[ $meta_box[ 'name' ] ]=="1") { ?> selected="selected" <?php } ?>>1 Column </option>    
                <option value="2" <?php if($data[ $meta_box[ 'name' ] ]=="2") { ?> selected="selected" <?php } ?>>2 Columns </option>    
                <option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>3 Columns </option>        
				<option value="4" <?php if($data[ $meta_box[ 'name' ] ]=="4") { ?> selected="selected" <?php } ?>>4 Columns </option>
				<option value="5" <?php if($data[ $meta_box[ 'name' ] ]=="5") { ?> selected="selected" <?php } ?>>5 Columns </option>
				<option value="6" <?php if($data[ $meta_box[ 'name' ] ]=="6") { ?> selected="selected" <?php } ?>>6 Columns </option>
                <option value="7" <?php if($data[ $meta_box[ 'name' ] ]=="7") { ?> selected="selected" <?php } ?>>7 Columns </option>
                <option value="8" <?php if($data[ $meta_box[ 'name' ] ]=="8") { ?> selected="selected" <?php } ?>>8 Columns </option>
                <option value="9" <?php if($data[ $meta_box[ 'name' ] ]=="9") { ?> selected="selected" <?php } ?>>9 Columns </option>
                <option value="10" <?php if($data[ $meta_box[ 'name' ] ]=="10") { ?> selected="selected" <?php } ?>>10 Columns </option>
                <option value="11" <?php if($data[ $meta_box[ 'name' ] ]=="11") { ?> selected="selected" <?php } ?>>11 Columns </option>
                <option value="12" <?php if($data[ $meta_box[ 'name' ] ]=="12") { ?> selected="selected" <?php } ?>>12 Columns </option>
		<?php 
		
		} elseif($meta_box[ 'id' ]=="gridgallery") { ?>

				<option value="textimage" <?php if($data[ $meta_box[ 'name' ] ]=="textimage") { ?> selected="selected" <?php } ?>>Text &amp; Image (Default) </option>        
				<option value="image" <?php if($data[ $meta_box[ 'name' ] ]=="image") { ?> selected="selected" <?php } ?>>Image Only </option>
                <option value="text" <?php if($data[ $meta_box[ 'name' ] ]=="text") { ?> selected="selected" <?php } ?>>Text Only </option>

		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="imgzoomcrop") { ?>

				<option value="crop" <?php if($data[ $meta_box[ 'name' ] ]=="crop") { ?> selected="selected" <?php } ?>>Crop Image</option>        
				<option value="zoom" <?php if($data[ $meta_box[ 'name' ] ]=="zoom") { ?> selected="selected" <?php } ?>>Zoom Image</option>	
				<option value="zoom crop" <?php if($data[ $meta_box[ 'name' ] ]=="zoom crop") { ?> selected="selected" <?php } ?>>Zoom &amp; Crop Image</option>			
		<?php 
		
		} elseif($meta_box[ 'id' ]=="videotype") { ?>

				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Disabled</option>        
				<option value="vimeo" <?php if($data[ $meta_box[ 'name' ] ]=="vimeo") { ?> selected="selected" <?php } ?>>Vimeo</option>		
				<option value="youtube" <?php if($data[ $meta_box[ 'name' ] ]=="youtube") { ?> selected="selected" <?php } ?>>YouTube</option>  
                <option value="swf" <?php if($data[ $meta_box[ 'name' ] ]=="swf") { ?> selected="selected" <?php } ?>>SWF</option>        
				<option value="3dvid" <?php if($data[ $meta_box[ 'name' ] ]=="3dvid") { ?> selected="selected" <?php } ?>>Video (3d Gallery Only)</option>
				<option value="jwp" <?php if($data[ $meta_box[ 'name' ] ]=="jwp") { ?> selected="selected" <?php } ?>>JW Player</option>  	  	
		<?php 

		} elseif($meta_box[ 'id' ]=="videoratio") { ?>

				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>16:9</option>        
				<option value="four_by_three" <?php if($data[ $meta_box[ 'name' ] ]=="four_by_three") { ?> selected="selected" <?php } ?>>4:3</option>		
		
		<?php 

		}  elseif($meta_box[ 'id' ]=="postshowimage") { ?>

				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Default</option>        
				<option value="single" <?php if($data[ $meta_box[ 'name' ] ]=="single") { ?> selected="selected" <?php } ?>>Single Post</option>
                <option value="archive" <?php if($data[ $meta_box[ 'name' ] ]=="archive") { ?> selected="selected" <?php } ?>>Archive Pages</option>		
                <option value="singlearchive" <?php if($data[ $meta_box[ 'name' ] ]=="singlearchive") { ?> selected="selected" <?php } ?>>Post &amp; Archive</option>		                	
		<?php 
			
		} elseif($meta_box[ 'id' ]=="imgorientation") { ?>

				<option value="landscape" <?php if($data[ $meta_box[ 'name' ] ]=="landscape") { ?> selected="selected" <?php } ?>>Landscape</option>        
				<option value="portrait" <?php if($data[ $meta_box[ 'name' ] ]=="portrait") { ?> selected="selected" <?php } ?>>Portrait</option>		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="displaytitle") { ?>
        
		<option value="disabled" <?php if($data[ $meta_box[ 'name' ] ]=="disabled") { ?> selected="selected" <?php } ?>>Disabled</option>
        <option value="center left light" <?php if($data[ $meta_box[ 'name' ] ]=="center left light") { ?> selected="selected" <?php } ?>>Center Left Light Text </option>
        <option value="center right light" <?php if($data[ $meta_box[ 'name' ] ]=="center right light") { ?> selected="selected" <?php } ?>>Center Right Light Text </option>
		<option value="center middle light" <?php if($data[ $meta_box[ 'name' ] ]=="center middle light") { ?> selected="selected" <?php } ?>>Center Middle Light Text </option>                
        <option value="center left dark" <?php if($data[ $meta_box[ 'name' ] ]=="center left dark") { ?> selected="selected" <?php } ?>>Center Left Dark Text </option>
        <option value="center right dark" <?php if($data[ $meta_box[ 'name' ] ]=="center right dark") { ?> selected="selected" <?php } ?>>Center Right Dark Text </option>
        <option value="center middle dark" <?php if($data[ $meta_box[ 'name' ] ]=="center middle dark") { ?> selected="selected" <?php } ?>>Center Middle Dark Text </option>                	

		<option value="top left light" <?php if($data[ $meta_box[ 'name' ] ]=="top left light") { ?> selected="selected" <?php } ?>>Top Left Light Text </option>
		<option value="top right light" <?php if($data[ $meta_box[ 'name' ] ]=="top right light") { ?> selected="selected" <?php } ?>>Top Right Light Text </option>
		<option value="top middle light" <?php if($data[ $meta_box[ 'name' ] ]=="top middle light") { ?> selected="selected" <?php } ?>>Top Middle Light Text </option>        
		<option value="top left dark" <?php if($data[ $meta_box[ 'name' ] ]=="top left dark") { ?> selected="selected" <?php } ?>>Top Left Dark Text </option>
		<option value="top right dark" <?php if($data[ $meta_box[ 'name' ] ]=="top right dark") { ?> selected="selected" <?php } ?>>Top Right Dark Text </option>	
 		<option value="top middle dark" <?php if($data[ $meta_box[ 'name' ] ]=="top middle dark") { ?> selected="selected" <?php } ?>>Top Middle Dark Text </option>	
        
		<option value="bottom left light" <?php if($data[ $meta_box[ 'name' ] ]=="bottom left light") { ?> selected="selected" <?php } ?>>Bottom Left Light Text </option>
		<option value="bottom right light" <?php if($data[ $meta_box[ 'name' ] ]=="bottom right light") { ?> selected="selected" <?php } ?>>Bottom Right Light Text </option>
		<option value="bottom middle light" <?php if($data[ $meta_box[ 'name' ] ]=="bottom middle light") { ?> selected="selected" <?php } ?>>Bottom Middle Light Text </option>        
		<option value="bottom left dark" <?php if($data[ $meta_box[ 'name' ] ]=="bottom left dark") { ?> selected="selected" <?php } ?>>Bottom Left Dark Text </option>
		<option value="bottom right dark" <?php if($data[ $meta_box[ 'name' ] ]=="bottom right dark") { ?> selected="selected" <?php } ?>>Bottom Right Dark Text </option>
		<option value="bottom middle dark" <?php if($data[ $meta_box[ 'name' ] ]=="bottom middle dark") { ?> selected="selected" <?php } ?>>Bottom Middle Dark Text </option>        
                	           	
		<?php 
		
		} elseif($meta_box[ 'id' ]=="gallerysortby") { ?>
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Post Order (Default)</option>
  				<option value="date" <?php if($data[ $meta_box[ 'name' ] ]=="date") { ?> selected="selected" <?php } ?>>Date</option>
                <option value="rand" <?php if($data[ $meta_box[ 'name' ] ]=="rand") { ?> selected="selected" <?php } ?>>Random</option>	
                <option value="title" <?php if($data[ $meta_box[ 'name' ] ]=="title") { ?> selected="selected" <?php } ?>>Title</option>		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="galleryorderby") { ?>
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Ascending (Default)</option>
  				<option value="DESC" <?php if($data[ $meta_box[ 'name' ] ]=="DESC") { ?> selected="selected" <?php } ?>>Descending</option>		
		<?php 
		
		} elseif($meta_box[ 'id' ]=="stageplaypause") { ?>
				<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Bullet Nav</option>
  				<option value="enabled" <?php if($data[ $meta_box[ 'name' ] ]=="enabled") { ?> selected="selected" <?php } ?>>Bullet Nav + Left/Right Nav</option>
                <option value="leftrightonly" <?php if($data[ $meta_box[ 'name' ] ]=="leftrightonly") { ?> selected="selected" <?php } ?>>Left/Right Nav</option>
				<option value="disabled" <?php if($data[ $meta_box[ 'name' ] ]=="disabled") { ?> selected="selected" <?php } ?>>Disable All Nav</option>			
		<?php 
		
		} elseif($meta_box[ 'id' ]=="stagetransition" ) { ?>
		  		<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Default</option>
		<?php  $animation_types = array("fade","blindY","blindZ","blindX","cover","curtainX","curtainY","fadeZoom","growX","growY","none","scrollUp","scrollDown","scrollLeft","scrollRight","scrollHorz","scrollVert","shuffle","slideX","slideY","toss","turnUp","turnDown","turnLeft","turnRight","uncover","wipe","zoom");
		 
                  foreach ($animation_types as $animation_type) {
				  	if($data[$meta_box[ 'name' ]]==$animation_type) {
                    $option = '<option selected="selected" value="'.$animation_type.'">';
					} else {
					$option = '<option value="'.$animation_type.'">';
					}
                    $option .= $animation_type;
                    $option .= '</option>';
                    echo $option;
                  }
					
		} elseif($meta_box[ 'id' ]=="gallery3dtween" || $meta_box[ 'id' ]=="stagetween" ) { ?>
		  		<option value="" <?php if($data[ $meta_box[ 'name' ] ]=="") { ?> selected="selected" <?php } ?>>Default</option>
		<?php  $tween_types = array("linear","easeInSine","easeOutSine", "easeInOutSine", "easeInCubic", "easeOutCubic", "easeInOutCubic", "easeInQuint", "easeOutQuint", "easeInOutQuint", "easeInCirc", "easeOutCirc", "easeInOutCirc", "easeInBack", "easeOutBack", "easeInOutBack", "easeInQuad", "easeOutQuad", "easeInOutQuad", "easeInQuart", "easeOutQuart", "easeInOutQuart", "easeInExpo", "easeOutExpo", "easeInOutExpo", "easeInElastic", "easeOutElastic", "easeInOutElastic", "easeInBounce", "easeOutBounce", "easeInOutBounce");
		 
                  foreach ($tween_types as $tween_type) {
				  	if($data[$meta_box[ 'name' ]]==$tween_type) {
                    $option = '<option selected="selected" value="'.$tween_type.'">';
					} else {
					$option = '<option value="'.$tween_type.'">';
					}
                    $option .= $tween_type;
                    $option .= '</option>';
                    echo $option;
                  }
					
		}?>		        		

        </select>

    <p><?php if(isset($meta_box[ 'description' ])) echo $meta_box[ 'description' ]; ?></p>
</div>
<?php if(isset($meta_box[ 'closetag' ])) {echo $meta_box[ 'closetag' ];} ?>
<?php } ?>
