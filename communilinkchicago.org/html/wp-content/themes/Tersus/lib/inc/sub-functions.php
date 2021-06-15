<?php 

function custom_html($title,$content) {
	if($title) {
	echo "<h3>".$title."</h3>";
	}
	echo $content;
}

function contact_form($id,$title,$desc,$adminemail,$msg) {
if(!$adminemail) {$adminemail=get_option("admin_email");} 
$adminemail=str_replace('@','#',$adminemail);	
?>

<script type='text/javascript'>
<?php if(get_option('priority_loading')=='enable') { ?>
head.ready(function() {
<?php } ?>
(function ($) {
$(document).ready(function(){
 $('#<?php echo $id; ?>contactform input').focus(function() {
	$(this).removeClass('fielderror');
 });
 $('#<?php echo $id; ?>contactform textarea').focus(function() {
	$(this).removeClass('fielderror');
 });
	
 $("#<?php echo $id; ?>contactform #<?php echo $id; ?>submit").click(function(){

  $("#<?php echo $id; ?>contactform_wrap .error").slideUp();
  var hasError = false;
  var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

  var emailToVal = $("#<?php echo $id; ?>emailTo").val();
  emailToVal=emailToVal.replace('#','@');
  if(emailToVal == '') {
   $("#<?php echo $id; ?>emailTo").addClass('fielderror');
   hasError = true;
  } else if(!email_regex.test(emailToVal)) {
   $("#<?php echo $id; ?>emailTo").addClass('fielderror');
   hasError = true;
  }

  var emailFromVal = $("#<?php echo $id; ?>emailFrom").val();
  
  if(emailFromVal == '') {
   $("#<?php echo $id; ?>emailFrom").addClass('fielderror');
   hasError = true;
  } else if(!email_regex.test(emailFromVal)) {
   $("#<?php echo $id; ?>emailFrom").addClass('fielderror');
   hasError = true;
  }

  var subjectVal = $("#<?php echo $id; ?>subject").val();

  var messageVal = $("#<?php echo $id; ?>message").val();

  if(messageVal == '') {
   $("#<?php echo $id; ?>message").addClass('fielderror');
   hasError = true;
  }

  var nameVal = $("#<?php echo $id; ?>name").val();
  if(nameVal == '') {
   $("#<?php echo $id; ?>name").addClass('fielderror');
   hasError = true;
  }
  

  if(hasError == false) {
			
   $.post('<?php echo get_template_directory_uri().'/lib/inc/contact-send.php' ?>',$("#<?php echo $id; ?>contactform").serialize(),

     function(data){
		$("#<?php echo $id; ?>contactform_wrap .error").slideUp();		
		$('#<?php echo $id; ?>contactform .field').val('');
		$("#<?php echo $id; ?>contactform_wrap .success").slideDown(function() {
			$(this).delay(5000).slideUp('slow');	
		});
    }
   );
  } else if(hasError == true) {
	  $("#<?php echo $id; ?>contactform_wrap .error").slideDown();
  }

  return false;
 });
}); 

})(jQuery);
<?php if(get_option('priority_loading')=='enable') { ?>
});
<?php } ?>
</script>

<div id="<?php echo $id; ?>contactform_wrap" class="contactform_wrap">
	<div class="success">
    <h3><?php _e('Thanks!', 'NorthVantage' ); ?></h3>
	<p><?php if($msg) { echo $msg; } else { _e('Your email was successfully sent. Your enquiry will be dealt with as soon as possible.', 'NorthVantage' ); } ?></p>
	</div>
    <div class="error">
		 <p><img src="<?php echo get_template_directory_uri(); ?>/images/error.png" alt="error key" /> <?php _e('Required fields not completed correctly.', 'NorthVantage' ); ?></p>
	</div>
    <form action="#" id="<?php echo $id; ?>contactform" class="contactform" method="post">
        <ol class="forms">	
            <li><input type="text" name="<?php echo $id; ?>name" id="<?php echo $id; ?>name" value="" class="field" />
            <label for="<?php echo $id; ?>name"><small><?php _e('Name', 'NorthVantage' ); ?> <span class="required">*</span></small></label></li>
            <li><input type="text" name="<?php echo $id; ?>emailFrom" id="<?php echo $id; ?>emailFrom" value="" class="field" />
            <label for="<?php echo $id; ?>emailFrom"><small><?php _e('Email', 'NorthVantage' ) ?> <span class="required">*</span></small></label></li>        
            <li><textarea name="<?php echo $id; ?>message" id="<?php echo $id; ?>message" class="field"></textarea></li>
            <li><input type="text" name="<?php echo $id; ?>siteURL" id="<?php echo $id; ?>siteURL" value="" class="hfield" /></li>
            <li><button type="submit" id="<?php echo $id; ?>submit"><?php _e('Submit', 'NorthVantage' ); ?></button></li>
            <li><input type="hidden" name="<?php echo $id; ?>subject" id="<?php echo $id; ?>subject" value="<?php _e('Contact Form Submission from ', 'NorthVantage' ); ?>" />
            <input type="hidden" name="<?php echo $id; ?>emailTo" id="<?php echo $id; ?>emailTo" value="<?php echo $adminemail; ?>" />
            <input type="hidden" name="<?php echo $id; ?>fields" id="<?php echo $id; ?>fields" value="<?php echo get_option('blogname');?>|<?php _e('Name', 'NorthVantage' ); ?>|<?php _e('Email', 'NorthVantage' ); ?>|<?php _e('Comments', 'NorthVantage' ); ?>" />
            <input type="hidden" name="form_id" value="<?php echo $id; ?>" /></li>
        </ol>
    </form>
</div>
<?php } 

function pages_list($title,$exclude) {
	if($title) {
	echo "<h3>".$title."</h3>";
	}
	
	echo "<ul class=\"widgetlinks\">";
	$show_pages = wp_list_pages('echo=0&title_li=&exclude='.$exclude);
	$show_pages = preg_replace("@<span[^>]*?>.*?</span>@si", "", $show_pages); // Removes page descriptions
	echo $show_pages;
	echo "</ul>";
}

function recent_posts($title,$cat,$posts) {
	if($title) {
	echo "<h3>".$title."</h3>";
	} 
	
	echo "<ul class=\"widgetlinks\">";	
	global $post;
	$getposts = get_posts('category='.$cat.'&numberposts='.$posts);
	foreach($getposts as $post) :
	?>
	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php endforeach;
	wp_reset_query();
	echo "</ul>";
}

function categories($title,$cats) {
	if($title) {
	echo "<h3>".$title."</h3>";
	} 
	
	echo "<ul class=\"widgetlinks\">";	
	if($cats) {
	foreach ($cats as $value)
	{
		$string = $string.$value.",";
    }
	wp_list_categories('include='.$string.'&title_li=');
	} else {
	wp_list_categories('title_li=');
	}
	echo "</ul>";	
}

function meta_information($title,$meta1,$meta2,$meta3,$meta4,$meta5) {
	if($title) {
	echo "<h3>".$title."</h3>";
	} 
	
	echo "<ul class=\"widgetlinks\">";	
	if($meta1) {
	wp_register();
	} ?>
    
	<?php if($meta2) { ?>
    <li><?php wp_loginout(); ?></li>
    <?php } ?>
    
    <?php if($meta3) { ?>
	<li><a href="<?php bloginfo('rss2_url'); ?>" >Entries RSS</a></li> 
    <?php } ?>
    
	<?php if($meta4) { ?>
	<li><?php post_comments_feed_link('RSS 2.0'); ?></li>
    <?php } ?>
    
    <?php if($meta5) { ?>
	<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
	<?php wp_meta();
	}
	echo "</ul>";	
}


function catch_image() { // Check if image exists within post and return first one. 
  global $post, $posts;
  $first_img = '';
  $short_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $shrtoutput = preg_match_all('/imageeffect.+url=[\'"]([^\'"]+)[\'"].*/i', $post->post_content, $shrtmatches); // Check shortcode image
  
  $short_img = $output[1][0];
  $first_img = $shrtoutput[1][0];

  if($short_img) {
  return $short_img;
  } else {
  return $first_img;  
  }
}

function nv_html2rgb($color)
{
    if ($color[0] == '#')
        $color = substr($color, 1);

    if (strlen($color) == 6)
        list($r, $g, $b) = array($color[0].$color[1],
                                 $color[2].$color[3],
                                 $color[4].$color[5]);
    elseif (strlen($color) == 3)
        list($r, $g, $b) = array($color[0].$color[0], $color[1].$color[1], $color[2].$color[2]);
    else
        return false;

    $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);

    return $r.','.$g.','.$b;
}

function getsociallink($socialitem) { // replace [variable] with real variable

$permalink=get_permalink();
$title = get_the_title();
$url = home_url('url');

$find=array('[get_permalink]','[get_the_title]','[get_blogurl]');
$replace=array($permalink,$title,$url);
$socialitem = str_replace($find,$replace, $socialitem);

return htmlspecialchars ( $socialitem );
}

function setlayer($layer,$setvalue,$skin) { // set custom layer styles

$layersettings=''; // reset
 
$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));

	
if($setvalue==$layer.'_color') { // if layer settings are set to color
	
 $color_pri= $get_skin_data['skin_id_'.$layer.'_pri_color'];
 $color_sec= $get_skin_data['skin_id_'.$layer.'_sec_color'];

 if(!$color_sec) $color_sec=$color_pri;

 $rgb_color_pri=nv_html2rgb($color_pri);
 $rgb_color_sec=nv_html2rgb($color_sec);
 $opacity_pri=$get_skin_data['skin_id_'.$layer.'_pri_opac'];
 if($opacity_pri=='100') $opacity_pri='1'; elseif($opacity_pri=='.') $opacity_pri='0'; elseif($opacity_pri<'10') $opacity_pri='0.1'.$opacity_pri; else $opacity_pri='0.'.$opacity_pri; // add decimal if required
 $opacity_sec=$get_skin_data['skin_id_'.$layer.'_sec_opac'];
 if($opacity_sec=='100') $opacity_sec='1'; elseif($opacity_sec=='.') $opacity_sec='0'; elseif($opacity_sec<'10') $opacity_sec='0.1'.$opacity_sec; else $opacity_sec='0.'.$opacity_sec; // add decimal if required
 $ie_opacity_pri = $opacity_pri * 255;
 $ie_opacity_pri = dechex($ie_opacity_pri);
 $ie_opacity_sec = $opacity_sec * 255;
 $ie_opacity_sec = dechex($ie_opacity_sec);

 if($ie_opacity_pri=='0') $ie_opacity_pri='00';
 if($ie_opacity_sec=='0') $ie_opacity_sec='00';
				
		
$layersettings.='
 background: rgb( '.$rgb_color_pri.' );
 background: rgba( '.$rgb_color_pri.',  '.$opacity_pri.');
 background-color: transparent;
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#'. $ie_opacity_pri.$color_pri.' , endColorstr=#'.$ie_opacity_sec.$color_sec.');
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#'.$ie_opacity_pri.$color_pri.' , endColorstr=#'.$ie_opacity_sec.$color_sec.')";
 background: -o-linear-gradient(top,rgba('.$rgb_color_pri.','.$opacity_pri.'), rgba( '.$rgb_color_sec.','. $opacity_sec.'));
 background: -moz-linear-gradient(100% 100% 90deg, rgba( '.$rgb_color_sec.','. $opacity_sec.'), rgba( '.$rgb_color_pri.','. $opacity_pri.'));
 background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba( '.$rgb_color_pri.','.$opacity_pri.')), to(rgba( '.$rgb_color_sec.','. $opacity_sec.')));
 *background: transparent;
 zoom:1;';
} 

if($setvalue==$layer.'_imagefull') { // if layer settings are set to fullscreen image

$imagefull_opac=$get_skin_data['skin_id_'.$layer.'_imagefull_opac'];

if($imagefull_opac) { // if opacity is set

if($imagefull_opac=='100') $imagefull_opac_dec='1'; elseif($imagefull_opac=='.') $imagefull_opac_dec='0'; elseif($imagefull_opac<'10')  $imagefull_opac_dec='.0'.$imagefull_opac; else $imagefull_opac_dec='.'.$imagefull_opac;

$layersettings.='
 opacity:'.$imagefull_opac_dec.';
 -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity='.$imagefull_opac.')";
 filter: alpha(opacity='.$imagefull_opac.');';
}

$imagefull_color=$get_skin_data['skin_id_'.$layer.'_imagefull_color'];

if($imagefull_color) { // if back color is set
$layersettings.='
 background-color: #'.$imagefull_color.';'; 
}

} // fullscreen END

if($setvalue==$layer.'_image') { // if layer settings are set to positioned image

$image_opac=$get_skin_data['skin_id_'.$layer.'_image_opac'];

if($image_opac) { // if opacity is set

if($image_opac=='100') $image_opac_dec='1'; elseif($image_opac=='.') $image_opac_dec='0'; elseif($image_opac<'10')  $image_opac_dec='.0'.$image_opac; else $image_opac_dec='.'.$image_opac;

$ie_opacity_pri='00';

$layersettings.='
 background:transparent;
 opacity:'.$image_opac_dec.';
 -ms-filter: 
 progid:DXImageTransform.Microsoft.Alpha(opacity='.$image_opac.')
 progid:DXImageTransform.Microsoft.gradient(startColorstr=#00FFFFFF,endColorstr=#00FFFFFF);
 zoom:1;';
}

$image_color=$get_skin_data['skin_id_'.$layer.'_image_color'];

if($image_color) { // if back color is set
$layersettings.='
 background-color: #'.$image_color.';'; 
}

$image=$get_skin_data['skin_id_'.$layer.'_image'];

if($image) { // if back color is set
$layersettings.='
 background-image: url('.$image.');'; 
}

$image_valign=$get_skin_data['skin_id_'.$layer.'_image_valign'];
$image_halign=$get_skin_data['skin_id_'.$layer.'_image_halign'];

if($image_halign || $image_valign) { // if positioning is set

if(!$image_halign) $image_halign='0'; // set defaults
if(!$image_valign) $image_valign='0'; 

$layersettings.='
 background-position: '.$image_halign.' '.$image_valign.';'; 
}

$image_repeat=$get_skin_data['skin_id_'.$layer.'_image_repeat'];

if($image_repeat) { // if image repeat is set
$layersettings.='
 background-repeat: '.$image_repeat.';'; 
}


} // image END

if($setvalue==$layer.'_pattern') { // if layer settings are set to pattern

$pattern_opac=$get_skin_data['skin_id_'.$layer.'_pattern_opac'];

if($pattern_opac) { // if opacity is set

if($pattern_opac=='100') $pattern_opac_dec='1'; elseif($pattern_opac=='.') $pattern_opac_dec='0'; elseif($pattern_opac<'10')  $pattern_opac_dec='.0'.$pattern_opac;  else $pattern_opac_dec='.'.$pattern_opac;

$layersettings.='
 opacity:'.$pattern_opac_dec.';
 -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity='.$pattern_opac.')";
 filter: alpha(opacity='.$pattern_opac.');';
}

$pattern_color=$get_skin_data['skin_id_'.$layer.'_pattern_color'];

if($pattern_color) { // if back color is set
$layersettings.='
 background-color: #'.$pattern_color.';'; 
}

$pattern=$get_skin_data['skin_id_'.$layer.'_pattern'];

if($pattern) { // if pattern is set
$layersettings.='
 background-image: url('.get_template_directory_uri().'/images/'.$pattern.'.png);'; 
}


} // pattern END

if($setvalue==$layer.'_video') { // if layer settings are set to video

$video_opac=$get_skin_data['skin_id_'.$layer.'_video_opac'];

if($video_opac) { // if opacity is set

if($video_opac=='100') $video_opac_dec='1'; elseif($video_opac=='.') $video_opac_dec='0'; elseif($video_opac<'10')  $video_opac_dec='.0'.$video_opac; else $video_opac_dec='.'.$video_opac;

$layersettings.='
 opacity:'.$video_opac_dec.';
 -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity='.$video_opac.')";
 filter: alpha(opacity='.$video_opac.');';
}
} // video END

if($layersettings) {
 return '#custom-'.$layer.' {'.$layersettings.'
}
';	
}

if($setvalue==$layer.'_cycle') { // if layer settings are set to cycle

$cycle_opac=$get_skin_data['skin_id_'.$layer.'_cycle_opac'];

if($cycle_opac) { // if opacity is set

if($cycle_opac=='100') $cycle_opac_dec='1';  elseif($cycle_opac=='.') $cycle_opac_dec='0'; elseif($cycle_opac<'10')  $cycle_opac_dec='.0'.$cycle_opac; else $cycle_opac_dec='.'.$cycle_opac;

$layersettings.='
 opacity:'.$cycle_opac_dec.';
 -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity='.$cycle_opac.')";
 filter: alpha(opacity='.$cycle_opac.');';
}

$cycle_color=$get_skin_data['skin_id_'.$layer.'_cycle_color'];

if($cycle_color) { // if back color is set
$layersettings.='
 background-color: #'.$cycle_color.';'; 
}

} // cycle END

if($layersettings) {
 return '#custom-'.$layer.' {'.$layersettings.'
}
';	
}
}



function setlayer_html($layer,$setvalue,$skin) { // set custom layer html

$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));


if($setvalue==$layer.'_cycle') { // if layer settings are set to cycle

$cycle_timeout=$get_skin_data['skin_id_'.$layer.'_cycle_timeout'];

if($cycle_timeout) { // if back color is set
 $timeout ='timeout="'.$cycle_timeout.'"';
}

if(!isset($timeout)) $timeout='';

if(isset($get_skin_data['skin_id_'.$layer.'_datasource'])) 		$cycle_datasource = $get_skin_data['skin_id_'.$layer.'_datasource']; else $cycle_datasource='';
if(isset($get_skin_data['skin_id_'.$layer.'_cycle_attached'])) 	$cycle_attached=$get_skin_data['skin_id_'.$layer.'_cycle_attached']; else $cycle_attached='';
if(isset($get_skin_data['skin_id_'.$layer.'_cycle_cat'])) 		$cycle_cat=$get_skin_data['skin_id_'.$layer.'_cycle_cat']; else $cycle_cat='';
if(isset($get_skin_data['skin_id_'.$layer.'_cycle_flickr'])) 	$cycle_flickr=$get_skin_data['skin_id_'.$layer.'_cycle_flickr']; else $cycle_flickr='';
if(isset($get_skin_data['skin_id_'.$layer.'_cycle_slideset'])) 	$cycle_slideset=$get_skin_data['skin_id_'.$layer.'_cycle_slideset']; else $cycle_slideset='';
if(isset($get_skin_data['skin_id_'.$layer.'_cycle_prodcat'])) 	$cycle_prodcat=$get_skin_data['skin_id_'.$layer.'_cycle_prodcat']; else $cycle_prodcat='';
if(isset($get_skin_data['skin_id_'.$layer.'_cycle_prodtag'])) 	$cycle_prodtag=$get_skin_data['skin_id_'.$layer.'_cycle_prodtag']; else $cycle_prodtag='';
if(isset($get_skin_data['skin_id_'.$layer.'_cycle_mediacat'])) 	$cycle_mediacat=$get_skin_data['skin_id_'.$layer.'_cycle_mediacat']; else $cycle_mediacat='';

if($cycle_datasource) { // if datasource is set

if(strpos($cycle_datasource,'data-1')!==false) {
	
 $datasource='attached_id="'.$cycle_attached.'"';	
 
} elseif(strpos($cycle_datasource,'data-2')!==false) {
	
 foreach ($cycle_cat as $cycle_cats) { $data=$data.$cycle_cats.','; }
 $data = rTrim($data,',');	
 $datasource='categories="'.$data.'"';	
 
} elseif(strpos($cycle_datasource,'data-3')!==false) {
	
 $datasource='flickr_set="'.$cycle_flickr.'"';	
	
} elseif(strpos($cycle_datasource,'data-4')!==false) {
	
 foreach ($cycle_slideset as $cycle_slidesets) { $data=$data.$cycle_slidesets.','; }
 $data = rTrim($data,',');	
 $datasource='slidesetid="'.$data.'"';	
	
} elseif(strpos($cycle_datasource,'data-5')!==false) {

if($cycle_prodcat) {

 foreach ($cycle_prodcat as $cycle_prodcats) { $data=$data.$cycle_prodcats.','; }
 $data = rTrim($data,',');	
 $datasource='product_categories="'.$data.'"';	

}

if($cycle_prodtag) {

 foreach ($cycle_prodtag as $cycle_prodtags) { $data=$data.$cycle_prodtags.','; }
 $data = rTrim($data,',');	
 $datasource.=' product_tags="'.$data.'"';	

}
	
} elseif(strpos($cycle_datasource,'data-6')!==false) {
	
 foreach ($cycle_mediacat as $cycle_mediacats) { $data=$data.$cycle_mediacats.','; }
 $data = rTrim($data,',');	
 $datasource='media_categories="'.$data.'"';	
 
}

return do_shortcode('[postgallery_image  id="'.$layer.'" navigation="disabled" customlayer="yes" speed="1000" '.$datasource.' animation="fade" tween="easeOutSine"  '.$timeout.' /]'); 
}

}

if($setvalue==$layer.'_imagefull') { // if layer settings are set to fullscreen image

if($get_skin_data['skin_id_'.$layer.'_imagefeatured']=='enable') {
	$post_image_id = get_post_thumbnail_id(get_the_ID());
	if ($post_image_id) {
		$thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
		$imagefull=$thumbnail[0];
		$imagefull	=	parse_url($imagefull, PHP_URL_PATH); // make relative Image URL
	} else {
		$imagefull=$get_skin_data['skin_id_'.$layer.'_imagefull'];
	}
} else {
	$imagefull=$get_skin_data['skin_id_'.$layer.'_imagefull'];
}
if($imagefull) {
 return '<div class="fullimage"><img src="'.$imagefull.'" /></div>';
}

} // cycle END

if($setvalue==$layer.'_video') { // if layer settings are set to cycle
$video=$get_skin_data['skin_id_'.$layer.'_video'];
$video_type=$get_skin_data['skin_id_'.$layer.'_video_type'];
$video_loop=$get_skin_data['skin_id_'.$layer.'_video_loop'];


if($video_type && $video) {
return do_shortcode('[videoembed type="'.$video_type.'"  url="'.$video.'" loop="'.$video_loop.'" customlayer="yes" autoplay="yes" id="'.$layer.'-video"]');
}
} // video END

}

function setcufon($element,$skin,$inherited_elements,$z) { // set custom cufon fonts
 
$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));

if(isset($get_skin_data['skin_id_'.$element.'_heading_font'.$z])) $heading_font= stripslashes($get_skin_data['skin_id_'.$element.'_heading_font'.$z]); else $heading_font='';
if(isset($get_skin_data['skin_id_'.$element.'_h1_font'.$z])) $h1_font= stripslashes($get_skin_data['skin_id_'.$element.'_h1_font'.$z]); else $h1_font='';
if(isset($get_skin_data['skin_id_'.$element.'_h2_font'.$z])) $h2_font= stripslashes($get_skin_data['skin_id_'.$element.'_h2_font'.$z]); else $h2_font='';

$x='';

if($z) { // format css style number
$x=str_replace('_','',$z); 
$x=$x+1;
$x='-'.$x;	
} 

if($heading_font!='') {

$htags='h3, h4, h5, h6';

if($h2_font!='') {
	$htags='h2,'.$htags;
	$h2tag='.skinset-'.$element.$x.' h2,';
} else {
	$h2tag='';	
}

if($h1_font!='') {
	$htags='h1,'.$htags;
	$h1tag='.skinset-'.$element.$x.' h1,';
} else {
	$h1tag='';	
}

$class='';

$class = setcss($inherited_elements,$htags);
 
if($z) { // format css style number
$z=str_replace('_','',$z); 
$z=$z+1;
$z='-'.$z;	
} 
 
 $cufonclasses = $class. $h1tag.$h2tag.'.skinset-'.$element.$z.' h3, .skinset-'.$element.$z.' h4, .skinset-'.$element.$z.' h5, .skinset-'.$element.$z.' h6, .skinset-'.$element.$z.' .cufon-replace,.skinset-'.$element.$z.' .custom-style.cufon-replace,.skinset-'.$element.$z.' #nv-tabs .menudesc p ';
 init_cufon($cufonclasses,$heading_font);
}

if($h1_font) {
  $class = setcss($inherited_elements,'h1');
 $cufonclasses = $class. '.skinset-'.$element.$z.' h1';
 init_cufon($cufonclasses,$h1_font);
}

 if($h2_font) {
 $class = setcss($inherited_elements,'h2');
 $cufonclasses = $class. '.skinset-'.$element.$z.' h2';
 init_cufon($cufonclasses,$h2_font);
 }

}


function setelement($element,$skin,$inherited_elements,$z) { // set custom layer styles
 
$get_skin_data = maybe_unserialize(get_option('skin_data_'.$skin));

$layersettings=$elementsettings=$menu_inherit_element=$css=$heading_color_settings=$h1_color_settings=$h1_tag_settings=$h2_color_settings=$h2_tag_settings=$h3_color_settings=$h4_color_settings=$h5_color_settings=$h6_color_settings=$font_color_settings=$class=$linkhover_color_settings=$heading_tag_settings=$elemhover_bgcolor_settings=$elem_extras_2=$link_color_settings=$elem_bgcolor_settings=$elem_extras_1=''; // reset

// FONT SIZE
if(isset($get_skin_data['skin_id_'.$element.'_font_size'.$z])) $font_size= stripslashes($get_skin_data['skin_id_'.$element.'_font_size'.$z]); else $font_size='';

if($font_size) {
$elementsettings.='
 font-size:'.$font_size.'px;';
}

// FONT 
if(isset($get_skin_data['skin_id_'.$element.'_font'.$z])) $font= stripslashes($get_skin_data['skin_id_'.$element.'_font'.$z]); else $font='';

if($font) {
$elementsettings.='
 font-family:'.$font.';';
}

// HEADING FONT
if(isset($get_skin_data['skin_id_'.$element.'_heading_font'.$z])) $heading_font= stripslashes($get_skin_data['skin_id_'.$element.'_heading_font'.$z]); else $heading_font='';

if($heading_font!=='' && get_option("nv_font_type")!="enable") {
$heading_tag_settings='
 font-family:'.$heading_font.';';
}

// HEADING SIZE
if(isset($get_skin_data['skin_id_'.$element.'_heading_size'.$z])) $heading_size= stripslashes($get_skin_data['skin_id_'.$element.'_heading_size'.$z]); else $heading_size='';

// H1 FONT
if(isset($get_skin_data['skin_id_'.$element.'_h1_font'.$z])) $h1_font= stripslashes($get_skin_data['skin_id_'.$element.'_h1_font'.$z]); else $h1_font='';

if($h1_font!=='' && get_option("nv_font_type")!="enable") {
$h1_tag_settings='
 font-family:'.$h1_font.';';
}

// H2 COLOR
if(isset($get_skin_data['skin_id_'.$element.'_h2_font'.$z])) $h2_font= stripslashes($get_skin_data['skin_id_'.$element.'_h2_font'.$z]); else $h2_font='';

if($h2_font!=='' && get_option("nv_font_type")!="enable") {
$h2_tag_settings='
 font-family:'.$h2_font.';';
}

// FONT COLOR
if(isset($get_skin_data['skin_id_'.$element.'_font_color'.$z])) $font_color= $get_skin_data['skin_id_'.$element.'_font_color'.$z]; else $font_color='';

if($font_color) {
$font_color_settings='
 color:#'.$font_color.';';
$elementsettings.='
 color:#'.$font_color.';'; 
}

// LINK COLOR
if(isset($get_skin_data['skin_id_'.$element.'_link_color'.$z])) $link_color= $get_skin_data['skin_id_'.$element.'_link_color'.$z]; else $link_color='';

if($link_color) {
$link_color_settings='
 color:#'.$link_color.';';
$elem_bgcolor_settings='
 background-color:#'.$link_color.';'; // set background color for various elements
$elem_extras_1='
 border-bottom: 1px dashed #'.$link_color.';'; // set background color for various elements
}

// LINK HOVER COLOR
if(isset($get_skin_data['skin_id_'.$element.'_linkhover_color'.$z])) $linkhover_color= $get_skin_data['skin_id_'.$element.'_linkhover_color'.$z]; else $linkhover_color='';

if($linkhover_color) {
$linkhover_color_settings='
 color:#'.$linkhover_color.';';
$elemhover_bgcolor_settings='
 background-color:#'.$linkhover_color.';';
$elem_extras_2='
 border-top: 2px solid #'.$linkhover_color.';'; // set background color for various elements  
}

// H1 COLOR
if(isset($get_skin_data['skin_id_'.$element.'_h1_color'.$z])) $h1_color= $get_skin_data['skin_id_'.$element.'_h1_color'.$z]; else $h1_color='';

if($h1_color || $heading_size) {
if($h1_color) {
 $h1_color_settings='
 color:#'.$h1_color.';';
}

if($heading_size) {
 $hsize=42+$heading_size;
 $h1_color_settings.='
 font-size:'.$hsize.'px;'; 
}

}

// H2 COLOR
if(isset($get_skin_data['skin_id_'.$element.'_h2_color'.$z])) $h2_color= $get_skin_data['skin_id_'.$element.'_h2_color'.$z]; else $h2_color='';

if($h2_color || $heading_size) {

if($h2_color) {
 $h2_color_settings='
 color:#'.$h2_color.';';
}

if($heading_size) {
 $hsize=31+$heading_size;
 $h2_color_settings.='
 font-size:'.$hsize.'px;'; 
}
 
}

// H3 COLOR
if(isset($get_skin_data['skin_id_'.$element.'_h3_color'.$z])) $h3_color= $get_skin_data['skin_id_'.$element.'_h3_color'.$z]; else $h3_color='';

if($h3_color || $heading_size) {

if($h3_color) {
 $h3_color_settings='
 color:#'.$h3_color.';';
}
if($heading_size) {
 $hsize=24+$heading_size;
 $h3_color_settings.='
 font-size:'.$hsize.'px;'; 
}
 
}

// H4 COLOR
if(isset($get_skin_data['skin_id_'.$element.'_h4_color'.$z])) $h4_color= $get_skin_data['skin_id_'.$element.'_h4_color'.$z]; else $h4_color='';

if($h4_color || $heading_size) {

if($h4_color) {
 $h4_color_settings='
 color:#'.$h4_color.';';
}

if($heading_size) {
 $hsize=17+$heading_size;
 $h4_color_settings.='
 font-size:'.$hsize.'px;';
}

}


// H5 COLOR
if(isset($get_skin_data['skin_id_'.$element.'_h5_color'.$z])) $h5_color= $get_skin_data['skin_id_'.$element.'_h5_color'.$z]; else $h5_color='';

if($h5_color || $heading_size) {
	
if($h5_color) {
 $h5_color_settings='
 color:#'.$h5_color.';';
}

if($heading_size) {
 $hsize=14+$heading_size;
 $h5_color_settings.='
 font-size:'.$hsize.'px;';
}
 
}

// H6 COLOR
if(isset( $get_skin_data['skin_id_'.$element.'_h6_color'.$z])) $h6_color= $get_skin_data['skin_id_'.$element.'_h6_color'.$z]; else $h6_color='';

if($h6_color || $heading_size) {

if($h6_color) {
 $h6_color_settings='
 color:#'.$h6_color.';';
}

if($heading_size) {
 $hsize=12+$heading_size;
 $h6_color_settings.='
 font-size:'.$hsize.'px;';
} 
}

if(isset( $get_skin_data['skin_id_'.$element.'_border_color'.$z]) ) $border_color= $get_skin_data['skin_id_'.$element.'_border_color'.$z]; else $border_color='';



$color_pri= $get_skin_data['skin_id_'.$element.'_pri_color'.$z];
$color_sec= $get_skin_data['skin_id_'.$element.'_sec_color'.$z];

 
if(!$color_sec) $color_sec=$color_pri;
 
if($color_pri) {
 $rgb_color_pri=nv_html2rgb($color_pri);
 $rgb_color_sec=nv_html2rgb($color_sec);
 $opacity_pri=$get_skin_data['skin_id_'.$element.'_pri_opac'.$z];
 if($opacity_pri=='100') $opacity_pri='1'; elseif($opacity_pri=='.') $opacity_pri='0'; elseif($opacity_pri<'10') $opacity_pri='0.1'.$opacity_pri; else $opacity_pri='0.'.$opacity_pri; // add decimal
 $opacity_sec=$get_skin_data['skin_id_'.$element.'_sec_opac'.$z];
 if($opacity_sec=='100') $opacity_sec='1'; elseif($opacity_sec=='.') $opacity_sec='0'; elseif($opacity_sec<'10') $opacity_sec='0.1'.$opacity_sec; else $opacity_sec='0.'.$opacity_sec; // add decimal if required

 
 $ie_opacity_pri = $opacity_pri * 255;
 $ie_opacity_pri = dechex($ie_opacity_pri);
 $ie_opacity_sec = $opacity_sec * 255;
 $ie_opacity_sec = dechex($ie_opacity_sec);
 
 if($ie_opacity_pri=='0') $ie_opacity_pri='00';
 if($ie_opacity_sec=='0') $ie_opacity_sec='00';
 
 
$elementsettings.='
 background-color: transparent !important;
 background: rgb( '.$rgb_color_pri.' );
 background: rgba( '.$rgb_color_pri.',  '.$opacity_pri.');
 filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#'. $ie_opacity_pri.$color_pri.', endColorstr=#'.$ie_opacity_sec.$color_sec.');
 -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#'.$ie_opacity_pri.$color_pri.', endColorstr=#'.$ie_opacity_sec.$color_sec.')";
 background: -o-linear-gradient(top,rgba('.$rgb_color_pri.','.$opacity_pri.'), rgba( '.$rgb_color_sec.','. $opacity_sec.'));
 background: -moz-linear-gradient(100% 100% 90deg, rgba( '.$rgb_color_sec.','. $opacity_sec.'), rgba( '.$rgb_color_pri.','. $opacity_pri.'));
 background: -webkit-gradient(linear, 0% 0%, 0% 90%, from(rgba( '.$rgb_color_pri.','.$opacity_pri.')), to(rgba( '.$rgb_color_sec.','. $opacity_sec.')));
 zoom:1;';
} else {
$elementsettings.='
  filter:none;
  -ms-filter:none;
 ';
}


if($z) { // format css style number
$z=str_replace('_','',$z); 
$z=$z+1;
$z='-'.$z;	
}

if($elementsettings) {
	
 $class = setcss($inherited_elements,'');
 $extras='';
 $formatgallery=''; 
 
 
$css_elems='.skinset-'.$element.$z.'.nv-skin'; 
 
 // Element Styling
 
 /*if($element=='main') { $formatgallery = ', .gallery-slider .gallery-wrap'; $extras=', .splitter ul li, li.pagebutton, .shop-cart .shopping-cart-wrapper, .wpsc-latest-product .item_image, .wpsc_category_grid_item, .wpsc_category_image_link img, div.blind_down, div.blind_down ul li img.live-search-image'; } // format galleries with main content settings


	$css_elems='.skinset-'.$element.$z.'.nv-skin, .skinset-'.$element.$z.' div.item-list-tabs#object-nav, .skinset-'.$element.$z.' div.item-list-tabs.activity-type-tabs, .skinset-'.$element.$z.' #groups-directory-form div.item-list-tabs,.skinset-'.$element.$z.' ul#topic-post-list li, .skinset-'.$element.$z.' #message-thread div.message-box,  .skinset-'.$element.$z.' #message-threads tbody tr, .skinset-'.$element.$z.' .forums .forum tbody tr, .skinset-'.$element.$z.' div.forums table.forum, .skinset-'.$element.$z.' .accordion .section,   .accordion .skinset-'.$element.$z.'.section, .skinset-'.$element.$z.' .nv-tabs .tab-content, .nv-tabs .skinset-'.$element.$z.'.tab-content, .nv-tabs ul li.skinset-'.$element.$z.', .skinset-'.$element.$z.' ul.ui-tabs-nav li, .skinset-'.$element.$z.'.gallery-slider .gallery-wrap '.$formatgallery.', .skinset-'.$element.$z.' .post-slider .gallery-wrap, .skinset-'.$element.$z.' .frame .gridimg-wrap, .skinset-'.$element.$z.' .styledbox.shadow .boxcontent, .skinset-'.$element.$z.' .styledbox.general .boxcontent,div.custom-style.skinset-'.$element.$z.', div.custom-style.skinset-'.$element.$z.' .nv-skin, .skinset-'.$element.$z.' .columns.border .columns-inner, .skinset-'.$element.$z.'.columns.border .columns-inner'.$extras; 
		
 
if($inherited_elements) {
$inherited_elements_array = explode(",",$inherited_elements); 
foreach($inherited_elements_array as $inherited_element) { // loop through elements which will inherit settings
	
	if($inherited_element=='menu') $menu_inherit_element=$element; // check if element styles the menu
	$css_elems.='.skinset-'.$inherited_element.$z.'.nv-skin, .skinset-'.$element.$z.' div.item-list-tabs#object-nav, .skinset-'.$element.$z.' div.item-list-tabs.activity-type-tabs, .skinset-'.$element.$z.' #groups-directory-form div.item-list-tabs, .skinset-'.$inherited_element.$z.' ul#topic-post-list li, .skinset-'.$inherited_element.$z.' #message-thread div.message-box,  .skinset-'.$inherited_element.$z.' #message-threads tbody tr, .skinset-'.$inherited_element.$z.' .forums .forum tbody tr, .skinset-'.$inherited_element.$z.' div.forums table.forum, .skinset-'.$inherited_element.$z.' .accordion .section,   .accordion .skinset-'.$inherited_element.$z.'.section, .skinset-'.$inherited_element.$z.' .nv-tabs .tab-content, .nv-tabs .skinset-'.$inherited_element.$z.'.tab-content, .nv-tabs ul li.skinset-'.$inherited_element.$z.', .skinset-'.$inherited_element.$z.' ul.ui-tabs-nav li, .skinset-'.$inherited_element.$z.'.gallery-slider .gallery-wrap '.$formatgallery.', .skinset-'.$inherited_element.$z.' .post-slider .gallery-wrap, .skinset-'.$inherited_element.$z.' .frame .gridimg-wrap, .skinset-'.$inherited_element.$z.' .styledbox.shadow .boxcontent, .skinset-'.$inherited_element.$z.' .styledbox.general .boxcontent,div.custom-style.skinset-'.$inherited_element.$z.', div.custom-style.skinset-'.$inherited_element.$z.' .nv-skin, .skinset-'.$inherited_element.$z.' .columns.border .columns-inner, .skinset-'.$inherited_element.$z.'.columns.border .columns-inner '.$extras;
} 
}*/

if(!isset($invertsettings)) $invertsettings='';

if($element=='menu ul ul' || $menu_inherit_element!='') { // set hover styling for menu
 $css.='#nv-tabs ul ul li:hover,#primary-wrapper  #nv-tabs ul li.extended-menu ul li ul li:hover {
'.$invertsettings.';
}';	
}
 
 $css.=$class.$css_elems.' {
'.$elementsettings.';
}';

 $css.='
</style>
 


<style type="text/css">
';
	
}

if($font_color_settings) {
 $css.='.skinset-'.$element.$z.' div.item-list-tabs ul li a, .skinset-'.$element.$z.' .widget ul li.current_page_item a, .skinset-'.$element.$z.' span.menudesc, div.post-metadata a, .skinset-'.$element.$z.' .commentlist .comment-author a, .skinset-'.$element.$z.' .recent-metadata a, .skinset-'.$element.$z.' .nv-recent-posts h4 a, .skinset-'.$element.$z.' .post-metadata a, .skinset-'.$element.$z.' .widget.widget_pages li a, .skinset-'.$element.$z.' .widget.widget_nav_menu li a, .skinset-'.$element.$z.' .widget.widget_recent_entries li a, .skinset-'.$element.$z.' div.blind_down ul li a, #item-header-content h2 a,  .skinset-'.$element.$z.' a.topic-title, .skinset-'.$element.$z.' .bbp-topic-title a, .skinset-'.$element.$z.' a.bbp-forum-title,.skinset-'.$element.$z.' td.td-group .object-name a {'.$font_color_settings.'
}
';
}

if($link_color_settings) {
 $class = setcss($inherited_elements,'a, #content span.price, #content span.amount');
 $css.=$class.'.skinset-'.$element.$z.' a, .skinset-'.$element.$z.' #content span.price, .skinset-'.$element.$z.' #content span.amount {'.$link_color_settings.'
}
';
}

if($linkhover_color_settings) {
 $class = setcss($inherited_elements,'a:hover');
 $css.=$class.'.skinset-'.$element.$z.' a:hover, .skinset-'.$element.$z.' .post-metadata a:hover, .skinset-'.$element.$z.' .widget.widget_pages li a:hover, .skinset-'.$element.$z.' .widget.widget_nav_menu li a:hover, .skinset-'.$element.$z.' .widget.widget_recent_entries li a:hover, #item-header-content h2 a:hover {'.$linkhover_color_settings.'
}
';	
}

if($heading_color_settings || $heading_tag_settings) {
 $class = setcss($inherited_elements,'h1, h1 a, h2, h2 a, h3, h3 a, h4, h4 a, h5, h5 a, h6, h6 a');
 $css.= $class.'.skinset-'.$element.$z.' h1, .skinset-'.$element.$z.' h1 a, .skinset-'.$element.$z.' h2, .skinset-'.$element.$z.' h2 a, .skinset-'.$element.$z.' h3, .skinset-'.$element.$z.' h3 a, .skinset-'.$element.$z.' h4, .skinset-'.$element.$z.' h4 a, .skinset-'.$element.$z.' h5, .skinset-'.$element.$z.' h5 a, .skinset-'.$element.$z.' h6, .skinset-'.$element.$z.' h6 a {'.$heading_color_settings.$heading_tag_settings.'
}
';
}

if($h1_color_settings || $h1_tag_settings) {
 $class = setcss($inherited_elements,'h1, h1 a');
 $css.= $class.'.skinset-'.$element.$z.' h1, .skinset-'.$element.$z.' h1 a {'.$h1_color_settings.$h1_tag_settings.'
}
';
}

if($h2_color_settings || $h2_tag_settings) {
 $class = setcss($inherited_elements,'h2, h2 a');
 $css.= $class.'.skinset-'.$element.$z.' h2, .skinset-'.$element.$z.' h2 a {'.$h2_color_settings.$h2_tag_settings.'
}
';	
}


if($h3_color_settings) {
 $class = setcss($inherited_elements,'h3, h3 a');
 $css.= $class.'.skinset-'.$element.$z.' h3, .skinset-'.$element.$z.' h3 a {'.$h3_color_settings.'
}
';	
}

if($h4_color_settings) {
 $class = setcss($inherited_elements,'h4, h4 a');
 $css.= $class.'.skinset-'.$element.$z.' h4,.skinset-'.$element.$z.' .tabhead a, .skinset-'.$element.$z.' .accordionhead a, .skinset-'.$element.$z.' span.price-value,.skinset-'.$element.$z.' .nv-recent-posts h4 a {'.$h4_color_settings.'
}
';	
}

if($h5_color_settings) {
 $class = setcss($inherited_elements,'h5, h5 a');
 $css.= $class.'.skinset-'.$element.$z.' h5, .skinset-'.$element.$z.' h5 a {'.$h5_color_settings.'
}
';	
}

if($h6_color_settings) {
 $class = setcss($inherited_elements,'h6, h6 a');
 $css.= $class.'.skinset-'.$element.$z.' h6, .skinset-'.$element.$z.' h6 a  {'.$h6_color_settings.'
}
';	
}

if($elem_bgcolor_settings) {
 $class = setcss($inherited_elements,'span.nvcolor,span.highlight.one,.post-metadata li.post-date, .commentlist .reply a, div.header-message');
 $css.= $class.'.skinset-'.$element.$z.' span.nvcolor, .skinset-'.$element.$z.' span.highlight.one,.skinset-'.$element.$z.' .post-metadata li.post-date, .skinset-'.$element.$z.' .commentlist .reply a, .skinset-'.$element.$z.' div.header-infobar,.skinset-'.$element.$z.' div.item-list-tabs ul li a span {'.$elem_bgcolor_settings.'
}
';	
}

if($elemhover_bgcolor_settings) {
 $class = setcss($inherited_elements,'.nvcolor-wrap:hover span.nvcolor');
 $css.= $class.'.skinset-'.$element.$z.' .nvcolor-wrap:hover span.nvcolor {'.$elemhover_bgcolor_settings.'
}
';	
}

if($elem_extras_1) {
 $class = setcss($inherited_elements,'acronym, abbr');
 $css.= $class.'.skinset-'.$element.$z.' acronym, .skinset-'.$element.$z.' abbr {'.$elem_extras_1.'
}
';	
}

if($elem_extras_2) {
 $class = setcss($inherited_elements,'.accordionhead.ui-accordion-content-active, .ui-state-active, #primary-wrapper.nv-dark .ui-state-active,  #nv-tabs ul li ul, #primary-wrapper .skinset-header.nv-skin');
 $css.= $class.'.skinset-'.$element.$z.' .accordionhead.ui-accordion-content-active, .skinset-'.$element.$z.' .ui-state-active, .skinset-'.$element.$z.' #primary-wrapper.nv-dark .ui-state-active, .skinset-'.$element.$z.' #nv-tabs ul li ul,#primary-wrapper .skinset-'.$element.$z.'.sub-menu, .skinset-'.$element.$z.' span.menu-highlight, .skinset-'.$element.$z.' #primary-wrapper .skinset-header.nv-skin,.skinset-'.$element.$z.' div.item-list-tabs ul li.selected,.skinset-'.$element.$z.' div.item-list-tabs ul li.current, .skinset-'.$element.$z.' div.item-list-tabs ul li a.show-hide-new, .skinset-'.$element.$z.' div.item-list-tabs ul li a.new-reply-link, .skinset-'.$element.$z.' #topic-post-list, .skinset-'.$element.$z.' table.forum, .skinset-'.$element.$z.' .bbp-topics,.skinset-'.$element.$z.' .bbp-replies,.skinset-'.$element.$z.' .bbp-forums,.skinset-'.$element.$z.' ul#activity-stream {'.$elem_extras_2.'
}
';	
}

return $css;
}

function setcss($inherited_elements,$tags) {
	
if(!isset($class)) $class='';
if(!isset($z)) $z='';	

if($inherited_elements) {
 $inherited_elements = explode(",",$inherited_elements); 
 foreach($inherited_elements as $element_class) { // loop through elements which will inherit settings
	if($element_class=='menu') $element_class='menu ul ul'; // add menu attribute
	$tagsarray = explode(",",$tags);
	foreach($tagsarray as $tag) {
		$class.='.skinset-'.$element_class.$z.' '.$tag.',';
	}
 }
} else {
 $class='';
}
return $class;
}


function build_skinpresets() { // check default skin presets
 require_once NV_FILES .'/adm/inc/skin-presets.php'; // skin data
 $skin_data_ids  = maybe_unserialize(get_option('skin_data_ids'));
 
 if($skin_data_ids) {
	foreach($skin_preset_ids as $skin_preset_id => $value) {
		if (!preg_match("/".$skin_preset_id."/", $skin_data_ids) ) {
				delete_option('skin_data_ids');
				update_option( 'skin_data_ids', $skin_data_ids.$skin_preset_id.',');						
				update_option('skin_data_'.$skin_preset_id,$value);	
		}
	}
	 
 } else { // no previous skin data present

	foreach($skin_preset_ids as $skin_preset_id => $value) {
		$skin_data_ids.=$skin_preset_id.',';
		update_option( 'skin_data_'.$skin_preset_id,$value);
	}
 
	update_option( 'skin_data_ids', $skin_data_ids);	
 }
 
} 

function numberToWords ($number)
{
	$words = array ('zero',
			'one',
			'two',
			'three',
			'four',
			'five',
			'six',
			'seven',
			'eight',
			'nine',
			'ten',
			'eleven',
			'twelve',
			'thirteen',
			'fourteen',
			'fifteen',
			'sixteen',
			'seventeen',
			'eighteen',
			'nineteen',
			'twenty',
			30=> 'thirty',
			40 => 'fourty',
			50 => 'fifty',
			60 => 'sixty',
			70 => 'seventy',
			80 => 'eighty',
			90 => 'ninety',
			100 => 'hundred',
			1000=> 'thousand');
 
 	$number_in_words='';
	
	if (is_numeric ($number))
	{
		$number = (int) round($number);
		if ($number < 0)
		{
			$number = -$number;
			$number_in_words = 'minus ';
		}
		if ($number > 1000)
		{
			$number_in_words = $number_in_words . numberToWords(floor($number/1000)) . " " . $words[1000];
			$hundreds = $number % 1000;
			$tens = $hundreds % 100;
			if ($hundreds > 100)
			{
				$number_in_words = $number_in_words . ", " . numberToWords ($hundreds);
			}
			elseif ($tens)
			{
				$number_in_words = $number_in_words . " and " . numberToWords ($tens);
			}
		}
		elseif ($number > 100)
		{
			$number_in_words = $number_in_words . numberToWords(floor ($number / 100)) . " " . $words[100];
			$tens = $number % 100;
			if ($tens)
			{
				$number_in_words = $number_in_words . " and " . numberToWords ($tens);
			}
		}
		elseif ($number > 20)
		{
			$number_in_words = $number_in_words . " " . $words[10 * floor ($number/10)];
			$units = $number % 10;
			if ($units)
			{
				$number_in_words = $number_in_words . numberToWords ($units);
			}
		}
		else
		{
			$number_in_words = $number_in_words . " " . $words[$number];
		}
		return $number_in_words;
	}
	return false;
}


?>