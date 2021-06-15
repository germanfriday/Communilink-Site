<?php 

	wp_deregister_script('jquery-tooltips');	
	wp_register_script('jquery-tooltips',get_template_directory_uri().'/js/jquery.tooltips.js',false,array('jquery'));
	wp_enqueue_script('jquery-tooltips');
	
	if($NV_textresize=="yes") { ?>
				<div class="textresize">
					<ul>
						<li class="resize-sml decreaseFont"></li>
						<li class="resize-lrg increaseFont"></li>
					</ul>
				</div><!-- /textresizer -->
	<?php }
	
	if($NV_socialicons=="yes") {
	
	if($NV_disableheart=="yes") { ?>
	<div class="socialicons display"><?php } else { ?>
		<div id="togglesocial">
			<ul>                     
				<li class="socialinit nvcolor-wrap"><div class="socialinithide"></div><span class="nvcolor"></span></li>
				<li  style="display: none;" class="socialhide nvcolor-wrap"><div class="socialinithide"></div><span class="nvcolor"></span></li>
			</ul>
		</div><!-- /togglesocial -->                            
	<div class="socialicons"  style="display:none;">
	<?php }
	
	require NV_FILES .'/adm/inc/social-media-urls.php'; // get social media button links ?>
	
	<ul>
	<?php if($NV_socialdigg!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_digg); ?>" title="Digg" target="_blank"><span class="nvcolor"></span><div class="social-icon social-digg"></div></a>
		</div>
		<div class="tooltip dark">Digg</div>
	</li><?php } ?>
	<?php if($NV_socialfb!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_fb); ?>" title="Facebook" target="_blank"><span class="nvcolor"></span><div class="social-icon social-facebook"></div></a>
		</div>
		<div class="tooltip dark">Facebook</div>
	</li><?php } ?> 
	<?php if($NV_sociallinkedin!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_linkedin); ?>" title="LinkedIn" target="_blank"><span class="nvcolor"></span><div class="social-icon social-linkedin"></div></a>
		</div>
		<div class="tooltip dark">LinkedIn</div>
	</li><?php } ?> 
	<?php if($NV_socialdeli!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_deli); ?>" title="Del.icio.us" target="_blank"><span class="nvcolor"></span><div class="social-icon social-delicious"></div></a>
		</div>
		<div class="tooltip dark">Del.icio.us</div>
	</li><?php } ?> 
	<?php if($NV_socialreddit!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_reddit); ?>" title="Reddit" target="_blank"><span class="nvcolor"></span><div class="social-icon social-reddit"></div></a>
		</div>
		<div class="tooltip dark">Reddit</div>
	</li><?php } ?>  
	<?php if($NV_socialstumble!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_stumble); ?>" title="Stumble Upon" target="_blank"><span class="nvcolor"></span><div class="social-icon social-stumble"></div></a>
		</div>
		<div class="tooltip dark">Stumble Upon</div>
	</li><?php } ?>  
	<?php if($NV_socialtwitter!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_twitter); ?>" title="Twitter" target="_blank"><span class="nvcolor"></span><div class="social-icon social-twitter"></div></a>
		</div>
		<div class="tooltip dark">Twitter</div>
	</li><?php } ?>  
	<?php if($NV_socialgoogle!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_google); ?>" title="Google Plus" target="_blank"><span class="nvcolor"></span><div class="social-icon social-google"></div></a>
		</div>
		<div class="tooltip dark">Google Plus</div>
	</li><?php } ?>  
	<?php if($NV_socialrss!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_rss); ?>" title="RSS" target="_blank"><span class="nvcolor"></span><div class="social-icon social-rss"></div></a>
		</div>
		<div class="tooltip dark">RSS</div>
	</li><?php } ?>
	<?php if($NV_socialyoutube!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_youtube); ?>" title="YouTube" target="_blank"><span class="nvcolor"></span><div class="social-icon social-youtube"></div></a>
		</div>
		<div class="tooltip dark">YouTube</div>
	</li><?php } ?>  
	<?php if($NV_socialvimeo!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_vimeo); ?>" title="Vimeo" target="_blank"><span class="nvcolor"></span><div class="social-icon social-vimeo"></div></a>
		</div>
		<div class="tooltip dark">Vimeo</div>
	</li><?php } ?>  
	<?php if($NV_socialpinterest!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_pinterest); ?>" title="Pinterest" target="_blank"><span class="nvcolor"></span><div class="social-icon social-pinterest"></div></a>
		</div>
		<div class="tooltip dark">Pinterest</div>
	</li><?php } ?>  
	<?php if($NV_socialinstagram!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_instagram); ?>" title="Instagram" target="_blank"><span class="nvcolor"></span><div class="social-icon social-instagram"></div></a>
		</div>
		<div class="tooltip dark">Instagram</div>
	</li><?php } ?>      
	<?php if($NV_socialsoundcloud!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_soundcloud); ?>" title="Soundcloud" target="_blank"><span class="nvcolor"></span><div class="social-icon social-soundcloud"></div></a>
		</div>
		<div class="tooltip dark">Soundcloud</div>
	</li><?php } ?>      
	<?php if($NV_socialemail!="yes") { ?>
	<li class="nvcolor-wrap">
		<div  class="tooltip-info top center" data-tooltip-position="top center">
			<a href="<?php echo getsociallink($sociallink_email); ?>" title="Email" target="_blank"><span class="nvcolor"></span><div class="social-icon social-email"></div></a>
		</div>
		<div class="tooltip dark">Email</div>
	</li><?php } ?>  
	</ul>
	</div><!-- /socialicons -->
	
	<?php } ?>

<div class="clear"></div>