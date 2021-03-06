
		(function( $ ) {

			function resize_container( gallery, height )
			{
				if( !height )
				{
					var init_slide_height = $( gallery + ' .groupslides-wrap').height();
				}
				else
				{
					var init_slide_height = height;
				}
						
				$( gallery +' .group-slider').animate(
				{
					height: init_slide_height
				}, 750, function() {
					// Animation complete.
				});	
			}		
		
			var group_gallery = function() {

				$('.gallery-wrap.group-slider').each(function(index, value) { 	
						
					var gallery = '#'+$(this).attr('id'),
						effect = $( gallery ).attr("data-groupslider-fx"),
						timeout = $( gallery + ' .timeout').val()*1000;
							
			
					$( gallery + ' .group-slider').cycle({ 
						fx: effect,
						timeout: timeout,
						speed: 1000,
						slideResize: 0,		
						slideExpr: '.groupslides-wrap',			
						cleartype:  true,
						cleartypeNoBg:  true,
						before:  onBefore,
						after:  onAfter,
						easing: 'easeInOutExpo',
						prev: gallery + ' .slidernav-left  a',
						next: gallery + ' .slidernav-right  a',
					});
	
		
					jQuery( gallery ).touchwipe({
						preventDefaultEvents: false,
							wipeLeft: function() {
								$( gallery + ' .group-slider').cycle('next');
								return false;
							},
							  wipeRight: function() {
								$( gallery + ' .group-slider').cycle("prev");
								return false;
							}
						
					});	
	
	
					$(window).resize(function()
					{
							var slide_height = jQuery( gallery + ' .group-slider').find('.groupslides-wrap.current').height();
							$( gallery + ' .group-slider').css('height', slide_height);	
					});	
		
		
					function onBefore()
					{ 		
						$( gallery + ' .group-slider .groupslides-wrap.current').removeClass('current');
						$(this).addClass('current');	
						
						var slide_height = $(this).height();
						resize_container( gallery, slide_height );			
					}
		
		
					function onAfter()
					{ 				
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
					

					$(window).load(function() {
						
						$( gallery ).animate({opacity:1});
						resize_container( gallery );
						
					});
			
				});	
			}


			$(document).ready(function()
			{
				$('.group-slider.shortcode, .gallery-wrap.vertical').hover(
					function()
					{
						$(this).find('.slidernav-left,.slidernav-right').fadeTo(500,1);	
					},
					function()
					{
						$(this).find('.slidernav-left,.slidernav-right').fadeTo(200,0);	
					}
				);		
		
			});		
		
			group_gallery();
		
		})(jQuery);