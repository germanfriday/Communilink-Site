
/* :: 	iSlider Nav 												  
---------------------------------------------*/

	(function( $ ){
	
		$('.stage-slider-wrap.islider,.post-gallery-wrap, .gallery-wrap.vertical').hover(
			function()
			{
				$(this).find('.islider-nav-wrap .nvcolor-wrap, .slidernav-left,.slidernav-right').fadeTo(500,1);	
			},
			function()
			{
				$(this).find('.islider-nav-wrap .nvcolor-wrap, .slidernav-left,.slidernav-right').fadeTo(200,0);	
			}
		);
		

/* :: 	Resize Canvas											  
---------------------------------------------*/


	
		
		$.fn.resize_canvas = function(get_elem_h) {
			
			var elem=$(this);
			
			$(elem).find('.reflect canvas').each(function() {
				var canvas_h=$(this).height();
			
				var gridwrap_h = $(this).closest(get_elem_h).height();
				var new_canvas_h = gridwrap_h-canvas_h;
				new_canvas_h=new_canvas_h/100*12;
				$(this).css('height',new_canvas_h);
			});
		}
		
	


/* :: iSlider Resizer 
---------------------------------------------*/
	
		
		$.fn.resize_islider = function(get_elem_h,animate) {
		
			var slide_height = $(this).find(get_elem_h).height();
			if(animate) {
				$(this).find('.islider-nav-ul').animate({height: slide_height},750);
			} else {
				$(this).find('.islider-nav-ul').css('height', slide_height);
			}
			
			$(this).find('.islider-nav-ul img').css({
				'height': slide_height/3+3
			});
		
		};
			


/* :: Gallery Reszier
---------------------------------------------*/


		
		$.fn.resizegallery = function(height,action,priElement,secElement,iSlider,forceHeight) {
				
			var currentheight='';
				
			if( !height ) { 
				$(this).find(priElement).each( function(e) {
					if($(this).css('display') == 'block') {
						currentheight=$(this).height();
						if(!currentheight && forceHeight) {		
							currentheight = forceHeight;	
						}
					}
				});
			}
			else
			{ 
				currentheight=height;
			}
			
			if( action=='animate' )
			{	
			
				if( iSlider ) var speed = 250; else var speed = 750;
				
				$(this).find(secElement).animate({
						height: currentheight
					}, speed, function() {
						// Animation complete.
					});		
			}
			else
			{
					$(this).find(secElement).css({
						height: currentheight
					});				
			}
				
		}
			


	
/* :: 	Stage Text								      
---------------------------------------------*/

	
		
		$.fn.stage_overlay = function(state) {
		
			if(state=='before') {
				$(this).find('div.stagetextwrap.left').css({left:'-200%',opacity:0});
				$(this).find('div.stagetextwrap.right').css({right:'-200%',opacity:0});
			} else if(state=='after') {
				var imgheight = $(this).find('.gridimg-wrap img:first').height();
				$(this).find('div.stagetextwrap').css({height:imgheight});
				$(this).find('div.stagetextwrap.left').animate({left:0,opacity:1,height:imgheight},500,'easeOutBack');
				$(this).find('div.stagetextwrap.right').animate({right:0,opacity:1,height:imgheight},500,'easeOutBack');
			}
			
		}
	
	


/* :: 	Stage Gallery							      
---------------------------------------------*/

	
		
		var stage_gallery = function() {

				$('.gallery-wrap.stage,.gallery-wrap.islider,.gallery-wrap.nivo').each(function(index, value) { 	
						
					var gallery = '#'+$(this).attr('id'),
						type = $( gallery ).attr("data-stage-type"),
						nav = $( gallery ).attr("data-stage-nav"),
						effect = $( gallery ).attr("data-stage-effect"),
						easing = $( gallery ).attr("data-stage-easing"),
						timeout_array = $( gallery + ' .timeout_array').val();
						
					
						if( type=='islider' ) {
							
							var index = 0;
							var thumbs = $( gallery + " .islider-nav-ul img");
					
							for (i=0; i<thumbs.length; i++)
							{
								$(thumbs[i]).addClass("thumb-"+i);
							}
							
							function sift()
							{
								if (index<(thumbs.length-1)){index+=1 ; }
								else {index=0}
								show (index);
							}
							
							function show(num)
							{
								imgHeight = $( gallery + ' .islider-nav-ul img').height();
								var scrollPos = (num+1)*imgHeight;
								$( gallery + " .islider-nav-ul").stop().animate({ scrollTop: scrollPos }, 1000);			
							}
							
							$( gallery + " .islider-nav").click(sift);
							show(index);
							
							
							var thumbsclone = $( gallery + " .islider-nav-ul li.copynav");
							$(thumbsclone).slice(0,3).clone().appendTo( gallery + ' .islider-nav-ul' );
						
						} else {
							
							$( gallery + ' .control-panel').append('<ul class="nav"></ul>');
							
						} 
						
						// Create jQuery Cycle Slider
						$( gallery + ' .stage-slider').cycle({ 
							fx:    effect, 
							easing: easing,
							timeoutFn: calculateTimeout,
							speed: 750,	
							before:  onBefore,
							slideExpr: '.panel',
							slideResize: 0,
							after:  onAfter,
							pager:  gallery + ' .control-panel .nav',
							pause:  1,
							cleartype:  true,
							cleartypeNoBg:  true,
							next:   gallery + ' .nav-next', 
							prev:   gallery + ' .nav-prev',
							pagerAnchorBuilder: function(idx, slide) { 
					
								if( type=='islider' ) {
									
									var $nav = $( gallery + ' .islider-nav-ul li').slice(0).find(' li:eq(' + (idx) + ') a');
									return $nav;
									
									var $nav_clone = $( gallery + ' .islider-nav-ul li').slice(1).find(' li:eq(' + (idx) + ') a');
									return $nav_clone;	
										
								} else { 
									return '<li><a href="#"></a></li>'; 
								} 
							} 
				
						});
				
				
						// Gesture Support
						$( gallery ).touchwipe({
							preventDefaultEvents: false,
								wipeLeft: function() {
									$( gallery + ' .stage-slider').cycle('next');
									return false;
								},
								  wipeRight: function() {
									$( gallery + ' .stage-slider').cycle("prev");
									return false;
								}
							
						});	
			
			
						// Resize Elements
						$(window).resize(function() {
							
							$( gallery ).resizegallery('','','.panel.current','.slider-inner-wrap'); // resize gallery
							
							if( type == 'islider' )
							{
								$( gallery ).resize_islider('.panel.current'); // resize iSlider
					
							}
						});	
						
			
			
						function onBefore() { 
						
							$(this).find("img.reflect").not('.animator-wrap img.reflect').reflect({ height:0.12,opacity:0.2 });
						
							$( gallery + ' .panel').removeClass('current');
							$(this).addClass('current');
					
						
							$(this).find('.animator-wrap').css('display','none').removeClass('played'); // remove class to init content animator	
						
							$(this).find('.animator-wrap.loaded').each(function(index, value) { 
								
								var caID = '#' + $(this).attr('id');
								
								animate_obj( caID );
						
							});		
				
							$( gallery + ' .panel.current').stage_overlay('before'); // animate stage overlay text
				
							$( gallery ).resize_islider('.panel.current'); // resize iSlider
						
							$( gallery ).resizegallery( $(this).height(),'animate','.panel','.slider-inner-wrap' ); // resize gallery	
							
				
							if($.browser.msie || $.browser.opera) { // resize canvas
								$('.stage-slider .panel.current').resize_canvas('.panel');
							}
			
				
							if( type=='islider' )
							{ 
								sift();
								$( gallery ).resizegallery( $(this).height(),'animate','.panel','.stage-slider.islider','islider' ); // resize islider gallery
							} 
				
						} 
			
						function onAfter() { 	
							
							$( gallery + ' .panel.current').stage_overlay('after'); // animate stage overlay text

							var videoid = $(this).find('.jwplayer').attr("id");
									
							if( videoid )
							{
								$( gallery + ' .group-slider .jwplayer').each(function(index)
								{
									var obj='';
									obj = $(this).attr("id");
											
									if(obj == videoid && $(this).hasClass("autostart"))
									{
										jwplayer(obj).onReady(function()
										{
											currentState = jwplayer(obj).getState(); 
											if(currentState=="IDLE")
											{
												jwplayer(obj).play();
											}
										});
									}					 
								});
							}
						
						} 
			
	
						function calculateTimeout(currElement, nextElement, opts, isForward) { 
						
							var timeouts = timeout_array.slice(0, -1).split(','),					
								index = opts.currSlide;
		
							return timeouts[index] * 1000;
						} 		

					

					$(window).load(function()
					{
						$( gallery + ' .panel:first').stage_overlay('after'); // animate stage overlay text
						
						var panel_first = $( gallery ).find('.panel:first'),
							init_height = panel_first.height();
						
						if( type != 'islider' )
						{
							if( panel_first.hasClass('reflectshadow') || panel_first.hasClass('shadow') || panel_first.hasClass('shadowreflection') )
							{
								init_height = init_height + init_height/100*13;
							}
						}
						if( type == 'islider' )
						{ 		
							$( gallery ).resizegallery('','animate','.panel', '.stage-slider.islider,.slider-inner-wrap' ,'', init_height); // resize islider gallery
							$( gallery ).resize_islider( '.panel', 'animate' ); // resize iSlider
						} 
						else
						{
							if( $( gallery + ' .panel').length>1 )
							{ 
								$( gallery ).resizegallery( init_height ,'animate','.panel','.slider-inner-wrap','', init_height ); // resize gallery
							}
						}
		
						$( gallery ).animate({ opacity:1 });
					
					});
		
			});
		}
		
		stage_gallery();
	
	})(jQuery);
	