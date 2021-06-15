	<div class="wrapper"> 
    	<header id="header-wrap" class="row <?php echo $NV_frame_header; ?>">

			<?php 
			
			if( get_option('enable_droppanel')!="disable" || $NV_infobar!='') { // Check if drop panel is enabled or infobar is empty
			$NV_isdroppanel='droppanel'; ?> 

			<div id="toppanel">			
			
				<?php
					
                if(get_option('enable_droppanel')!="disable") {	?>
                
					<div id="panel" style=" <?php if(isset($hasError) || isset($captchaError)) { ?>min-height:300px <?php } ?>">
						<div class="content clearfix">
								<?php
								$get_droppanel_num = (get_option('droppanel_columns_num')!="") ? get_option('droppanel_columns_num') : '4'; // If not set, default to 4 columns
								$NV_droppanelcolumns_text=numberToWords($get_droppanel_num ); // convert number to word
								$i=1;
								while($i<=$get_droppanel_num) { 
									if ( is_active_sidebar('droppanel'.$i) ) { ?>
									<div class="block columns <?php echo $NV_droppanelcolumns_text."_column "; if($i == $get_droppanel_num) { echo "last"; } ?>">
									
										<ul>
											<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Drop Panel Column '.$i)) : endif; ?>
										</ul>
									
									</div>
									<?php } $i++;	
								} ?>
			   
						</div><!-- / content -->
						
					</div> <!-- / panel -->
					<div class="tab-wrap <?php if( get_option('droppanel_button_align') !='' ) echo get_option('droppanel_button_align'); ?>">
						<div id="toggle" class="trigger">
							<a id="open" class="toggle open" href="#"></a>
							<a id="close" style="display: none;" class="toggle close" href="#"></a>
						</div><!-- /trigger -->
					</div> <!-- / tab-wrap -->

                <?php 				
				
				}
				
				if($NV_infobar!='') { ?>
                    <div class="header-infobar <?php echo $NV_infobar_classes; ?>">
                        <div class="infobar-content"><?php echo do_shortcode($NV_infobar); ?></div><span class="infobar-close"><a href="#"></a></span>
                    </div>
                <?php } ?>
            
            </div> <!--/toppanel -->
            <?php } ?>
        
            <div id="header" class="skinset-header nv-skin <?php echo $NV_isdroppanel; ?>">
            	<div id="header-bg" class="skinset-header nv-skin"></div>
                    <?php if(get_option('enable_search')!=='disable' || function_exists('wpsc_cart_item_count') || class_exists('Woocommerce') || get_option('header_customfield')!=='' ) { ?>
                    <div class="icon-dock-wrap">
                        <ul class="icon-dock clearfix">
					
							<?php 
							
							if( get_option('header_customfield')!='' ) { echo '<li class="customfield">'.do_shortcode( get_option('header_customfield') ).'</li>'; } // Custom Header Field
						
							
							if( class_exists('Woocommerce') ) {
							
							global $woocommerce; // WooCommerce ?>
                            <li class="shop-cart">
                                <span class="shop-cart-items">
                                    <a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'NorthVantage'); ?>">
                                        <span class="shop-cart-itemnum">
                                            <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'NorthVantage'), $woocommerce->cart->cart_contents_count);?> -
                                        </span>
                                        <?php echo $woocommerce->cart->get_cart_total(); ?>
                                    </a>
                                </span>
                                <span class="shop-cart-icon">
                                    <a target="_parent" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"></a>
                                </span>
							</li>
                 			<?php } ?>
                            
                            <?php if ( function_exists('wpsc_cart_item_count') ) { // WP e-Commerce ?>
                            <li class="shop-cart">
                                <span class="shop-cart-items">
                                	<a target="_parent" href="<?php echo get_option('shopping_cart_url'); ?>"><span class="shop-cart-itemnum"><?php echo wpsc_cart_item_count(); ?></span> <?php _e( 'items', 'NorthVantage' ); ?></a> 
                                </span>
                                <span class="shop-cart-icon">
                                    <a target="_parent" href="<?php echo get_option('shopping_cart_url'); ?>"></a>
                                </span>
                                <div class="shopping-cart-wrapper widget_wp_shopping_cart shop-cart-contents">
                                    <?php include( wpsc_get_template_file_path( 'wpsc-cart_widget.php' ) ); ?>
                                </div>
                            </li>
                            <?php } 
							
							if(get_option('enable_search')!=='disable') { ?>  
    						
                            <li class="searchform">
                                <form method="get" id="panelsearchform" class="disabled" action="<?php echo home_url(); ?>">
                                    <fieldset>
                                        <input type="text" name="s" id="drops" />
                                        <input type="button" id="panelsearchsubmit" value="&nbsp;" />
                                    </fieldset>
                                </form>
                            </li>
                            <?php } ?>
                        </ul>       
                    </div>     
                    <?php } ?>
				<?php 
				
				if(get_option('header_html')) : ?>
				<div class="custom-html"><?php echo do_shortcode(get_option('header_html')); ?></div>
				<?php endif;
				
				if(get_option('branding_disable')!='disable') : ?>
                
                <div id="header-logo" class="<?php echo $NV_branding_alignment; ?>">
                    <div id="logo">
    				<?php if(get_option("branding_url")) : // Is Branding Image Set 
			
						if($NV_branding_ver=='secondary') : 
							$NV_branding_url = get_option("branding_url_sec"); 
						else : 
							$NV_branding_url = get_option('branding_url'); // check is secondary branding is selected 
						endif; ?>

                        <a href="<?php echo home_url(); ?>/"><img src="<?php echo $NV_branding_url; ?>" alt="<?php bloginfo('name'); ?>" /></a>
    				
					<?php else: ?>
                    
                        <h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
                        <h2 class="description"><?php bloginfo('description'); ?></h2>
                        
    				<?php endif; ?>
                    </div>
                    <div class="clear"></div>
                </div><!-- /header-logo -->
                <?php endif; ?>  
                
                <div id="nv-tabs" class="<?php echo $NV_menu_alignment; ?>">
           
				<?php 
				
				if(get_option('wpcustomm_enable')!="disable") : // WP3.0 Custom Menu Support
                    
                    $walker = new dyn_walker;
                    wp_nav_menu(array(
					'echo' => true,
					'container' => 'ul',
					'menu_class'      => 'menu hide-on-phones', 
					'menu_id' => 'dyndropmenu',
					'theme_location' => 'mainnav',
					'walker' => $walker	
					));
                    
					
					if (!class_exists('UberMenu') && get_option('enable_responsive')!='disable') : // check if responsive is disabled
					
                    wp_nav_menu(array(
					'theme_location' => 'mainnav',
					'container' => 'div',
					'container_class' => 'hide-on-desktops', 
					'container_id'    => 'nv_selectmenu',					
					'walker'         => new Walker_Nav_Menu_Dropdown(),
					'items_wrap'     => '<select><option value="">'.__( 'Select a Page', 'NorthVantage' ).'</option>%3$s</select>'
					));
					
					endif;
                  
				else :
					
					if (get_option('enable_responsive')!='disable') : // check if responsive is disabled ?>
                    
                    <div id="nv_selectmenu" class="hide-on-desktops wp-page-nav">
					<?php wp_dropdown_pages( $args ); ?> 
                    </div>
                    
                    <?php endif; ?>
                    
                    <ul id="dropmenu" class="skinset-menu nv-skin menu hide-on-phones">
                    <?php echo DYN_menupages(); ?>
                        <li class="menubreak"></li>
                    <?php if(get_option('droppanel')!="disable") { ?>
                    <?php if(get_option('droptriggername')) { ?>
                        <li class="page_item"><a href="#" class="droppaneltrigger" title="<?php echo get_option('droptriggername'); ?>"><?php echo get_option('droptriggername'); ?></a><span class="menudesc"><?php echo get_option('droptriggerdesc'); ?></span></li>
                    <?php } ?>
                    <?php } ?>
                    </ul>
				<?php 
				endif; ?>
                </div><!-- /nv-tabs -->
                <div class="clear"></div>
            
            </div><!-- /header -->
        </header><!-- /header-wrap -->
	</div>