jQuery.noConflict();
var div, selectMenu, i;

//*********************************************/
// Function that Shows an HTML element
//*********************************************/

function showDiv(divID) {
	//"use strict";
	//div = document.getElementById(divID);
	//div.style.display = ""; //display div
	jQuery('#'+divID).fadeTo('slow', 1, function() {
      // Animation complete.
    });
}

//*********************************************/
// Function that Hides an HTML element
//*********************************************/
function hideDiv(divID) {
	//"use strict";
	//div = document.getElementById(divID);
	//div.style.display = "none"; // hide
	jQuery('#'+divID).fadeTo('slow', 0, function(e) {
      jQuery(this).css('display','none');// Animation complete.
    });
}
//*****************************************************************************/
// Function that Hides all the Div elements in the select menu Value
//*****************************************************************************/
function hideAllDivs(mnID) {
	//"use strict";
	//Loop through the seclect menu values and hide all
	selectMenu = document.getElementById(mnID);

	for (i=0; i<=selectMenu.options.length -1; i++)
	{
		jQuery('#'+selectMenu.options[i].value).hide();
	}
}
//*********************************************/
// Main function that calls others to toggle divs
//*********************************************/
function toggle_shrtcode(showID,mnID) {
	hideAllDivs(mnID); // Hide all
	showDiv(showID); // Show the one we asked for
}

//*********************************************/
// Shortcode generator
//*********************************************/


var wpGenerateShortcodeAdmin = function () {};

wpGenerateShortcodeAdmin.prototype = {
    options           : {},
    generateShortCode : function() {

	var codetype = jQuery("#dynshortcode_selector option:selected").val();
	
	// Columns Settings
	var columntype = jQuery("#dynshortcode_columns option:selected").val();
	var border = jQuery("#dynshortcode_border option:selected").val();
    var twothirdpos = jQuery("#dynshortcode_23pos option:selected").val();
	var threefourthpos = jQuery("#dynshortcode_34pos option:selected").val(); 
	
	// Gallery Settings
	var postgallerytype = jQuery("#dynshortcode_postgallery option:selected").val(); 
	var postgallerycontent = jQuery("#dynshortcode_pg_slider_content option:selected").val();
	var postgalleryimageeffect = jQuery("#dynshortcode_postgallery_imageeffect option:selected").val();
	var postgalleryalign = jQuery("#dynshortcode_pg_gallery_align option:selected").val();
	var postgalleryimage_animation = jQuery("#dynshortcode_pg_image_animation option:selected").val();
	var postgalleryimage_tween = jQuery("#dynshortcode_pg_image_tween option:selected").val();
	var postgalleryimagenav = jQuery("#dynshortcode_pg_imagenav option:selected").val();
	var postgallerysortby = jQuery("#dynshortcode_postgallery_sortby option:selected").val();		
	var postgalleryorderby = jQuery("#dynshortcode_postgallery_orderby option:selected").val();	
	var postgallerygridcontent = jQuery("#dynshortcode_pg_grid_content option:selected").val();
	var postgalleryaccordioncontent = jQuery("#dynshortcode_pg_accordion_content option:selected").val();
	var postgalleryaccordion_minititles = jQuery("#dynshortcode_pg_accordion_minititle option:selected").val();
	var postgalleryaccordion_autorotate = jQuery("#dynshortcode_pg_accordion_autorotate option:selected").val();
	var postgalleryimagealign = jQuery("#dynshortcode_pg_imgalign option:selected").val();
	var datasource_selector = jQuery("#sc_datasource_selector option:selected").val();
	var gallerypostformat = jQuery("#dynshortcode_postformat option:selected").val();
	var flickrset = jQuery("#dynshortcode_flickrset option:selected").val();
	var postgallerynivoeffect = jQuery("#dynshortcode_pg_nivoeffect option:selected").val();
	
	// Price Table
	
    var pricetable_columns = jQuery("#dynshortcode_pricetable_columns option:selected").val();
	var pricetable_featured = jQuery("#dynshortcode_pricetable_featurecolumn option:selected").val(); 
	var pricetable_color = jQuery("#dynshortcode_pricetable_featurecolor option:selected").val(); 
	
	// Styled Boxes
	
	var styledboxes = jQuery("#dynshortcode_styledboxes option:selected").val();
	var styledboxesalign = jQuery("#dynshortcode_box_align option:selected").val();
	
	// Button
	var buttontype = jQuery("#dynshortcode_button_type option:selected").val();
	var buttontarget = jQuery("#dynshortcode_button_target option:selected").val();
	var buttoncolor = jQuery("#dynshortcode_button_color option:selected").val();
	var buttonwidth = jQuery("#dynshortcode_button_width option:selected").val();
	var buttonalign = jQuery("#dynshortcode_button_align option:selected").val();

	// Hoz break link
	var hozbreak = jQuery("#dynshortcode_hozbreak option:selected").val();	
	
	// Blockquote
	var blockquote = jQuery("#dynshortcode_blockquote option:selected").val();	
	var blockquotealign = jQuery("#dynshortcode_blockquote_align option:selected").val();	
	
	// Highlight
	var highlight = jQuery("#dynshortcode_highlight option:selected").val();	
	
	// Image Effect
	var imageeffect = jQuery("#dynshortcode_imageeffect option:selected").val();	
	var imageeffectalign = jQuery("#dynshortcode_imageeffectalign option:selected").val();	
	var imageeffectlightbox = jQuery("#dynshortcode_imagelightbox option:selected").val();	
		

	// Video Shortcode
	var videotype = jQuery("#dynshortcode_videoshortcode option:selected").val();	
	var videoratio = jQuery("#dynshortcode_videoratio option:selected").val();	
	var videoshortcodealign = jQuery("#dynshortcode_videoshortcodealign option:selected").val();	
	
	// Audio Shortcode
	var audioshortcodealign = jQuery("#dynshortcode_audioshortcodealign option:selected").val();			

	// List 
	
	var listcolor =  jQuery("#dynshortcode_listcolor option:selected").val();
	var liststyle =  jQuery("#dynshortcode_liststyle option:selected").val();

	// Reveal 
	
	var revealalign = jQuery("#dynshortcode_revealalign option:selected").val();
	if(revealalign) {
	var revealalign = 'align="' + revealalign +'"';
	}
	var revealcolor =  jQuery("#dynshortcode_revealcolor option:selected").val();

	// Accordion
	
	var accordioncolor =  jQuery("#dynshortcode_accordioncolor option:selected").val();

	if(this['options']['accordioncollapse']=="yes") {
	var accordioncollapse = 'collapse="' + this['options']['accordioncollapse'] +'"';
	} else {
	var accordioncollapse = '';	
	}		

	// Drop Caps 
	
	var dropcapstyle =  jQuery("#dynshortcode_dropcapstyle option:selected").val();
	var dropcapcolor =  jQuery("#dynshortcode_dropcapcolor option:selected").val();

	// Tooltip
	
	var tooltip_position =  jQuery("#dynshortcode_tooltip_position option:selected").val();
	var tooltip_color =  jQuery("#dynshortcode_tooltip_color option:selected").val();

	
	// Content Animator
	
	var animator_align =  jQuery("#dynshortcode_animator_align option:selected").val();
	var animator_float =  jQuery("#dynshortcode_animator_float option:selected").val();
	var animator_easing =  jQuery("#dynshortcode_animator_easing option:selected").val();
	var animator_direction =  jQuery("#dynshortcode_animator_direction option:selected").val();
	var animator_effect =  jQuery("#dynshortcode_animator_effect option:selected").val();	

	// Recent Posts
	var recentpostscontent = jQuery("#dynshortcode_recentposts_content option:selected").val();
	var recentpostsimageeffect = jQuery("#dynshortcode_recentposts_imageeffect option:selected").val();
	var recentpostsimagealign = jQuery("#dynshortcode_recentposts_imgalign option:selected").val();
	var recentpostsshadowsize = jQuery("#dynshortcode_recentposts_shadowsize option:selected").val();
	var recentpostssortby = jQuery("#dynshortcode_recentposts_sortby option:selected").val();
	var recentpostsorderby = jQuery("#dynshortcode_recentposts_orderby option:selected").val();
	var recentpostmeta = jQuery("#dynshortcode_recentposts_meta option:selected").val();	
	var recentpostdate = jQuery("#dynshortcode_recentposts_date option:selected").val();		

	if(this['options']['recentposts_imgheight']) {
	var recentposts_imgheight = 'image_height="' + this['options']['recentposts_imgheight'] +'"';
	} else {
	var recentposts_imgheight = 'image_height="50"';	
	}
	if(this['options']['recentposts_imgwidth']) {
	var recentposts_imgwidth = 'image_width="' + this['options']['recentposts_imgwidth'] +'"';
	} else {
	var recentposts_imgwidth = 'image_width="50"';	
	}
	
	if(this['options']['recentposts_offset']) {
	var recentposts_offset = 'offset="' + this['options']['recentposts_offset'] +'"';
	} else {
	var recentposts_offset = '';	
	}
	
	if(this['options']['recentposts_limit']) {
	var recentposts_limit = 'limit="' + this['options']['recentposts_limit'] +'"';
	} else {
	var recentposts_limit = 'limit="5"';	
	}		
	
	if(this['options']['recentposts_excerpt']) {
	var recentposts_excerpt = 'excerpt="' + this['options']['recentposts_excerpt'] +'"';
	} else {
	var recentposts_excerpt = 'excerpt="15"';	
	}	

	var recentposts_cats = [];
	jQuery("input[name^='dynshortcode_recentposts_cats']").each(function() {
     if (this.checked) { recentposts_cats.push(this.value); }
	});

	if(recentposts_cats!='') {
	var recentposts_cats = 'categories="'+recentposts_cats+'"';
	}
		

	// Post Slider

	if(this['options']['pg_slider_columns']) {
	var postgalleryslider_columns = 'columns="' + this['options']['pg_slider_columns'] +'"';
	} else {
	var postgalleryslider_columns = '';	
	}

	if(this['options']['pg_slider_height']) {
	var postgalleryslider_height = 'height="' + this['options']['pg_slider_height'] +'"';
	} else {
	var postgalleryslider_height = '';	
	}
	
	if(this['options']['pg_slider_width']) {
	var postgalleryslider_width = 'width="' + this['options']['pg_slider_width'] +'"';
	} else {
	var postgalleryslider_width = '';	
	}	

	if(this['options']['pg_slider_imgheight']) {
	var postgalleryslider_imgheight = 'imgheight="' + this['options']['pg_slider_imgheight'] +'"';
	} else {
	var postgalleryslider_imgheight = '';	
	}
	if(this['options']['pg_slider_imgwidth']) {
	var postgalleryslider_imgwidth = 'imgwidth="' + this['options']['pg_slider_imgwidth'] +'"';
	} else {
	var postgalleryslider_imgwidth = '';	
	}	
	

	if(this['options']['pg_sliderlightbox']=="yes") {
	var postgalleryslider_lightbox = 'lightbox="' + this['options']['pg_sliderlightbox'] +'"';
	} else {
	var postgalleryslider_lightbox = '';	
	}
	
	if(this['options']['pg_slidervertical']=="yes") {
	var postgalleryslider_vertical = 'vertical="' + this['options']['pg_slidervertical'] +'"';
	} else {
	var postgalleryslider_vertical = '';	
	}	

	if(this['options']['pg_slidertimeout']) {
	var postgalleryslider_timeout = 'timeout="' + this['options']['pg_slidertimeout'] +'"';
	} else {
	var postgalleryslider_timeout = '';	
	}
	
	// Grid
	
	if(this['options']['pg_grid_height']) {
	var postgallerygrid_height = 'height="' + this['options']['pg_grid_height'] +'"';
	} else {
	var postgallerygrid_height = '';	
	}
	
	if(this['options']['pg_grid_width']) {
	var postgallerygrid_width = 'width="' + this['options']['pg_grid_width'] +'"';
	} else {
	var postgallerygrid_width = '';	
	}	
	
	if(this['options']['pg_grid_columns']) {
	var postgallerygrid_columns = 'columns="' + this['options']['pg_grid_columns'] +'"';
	} else {
	var postgallerygrid_columns = '';	
	}	

	if(this['options']['pg_grid_imgheight']) {
	var postgallerygrid_imgheight = 'imgheight="' + this['options']['pg_grid_imgheight'] +'"';
	} else {
	var postgallerygrid_imgheight = 'imgheight="120"';	
	}
	if(this['options']['pg_grid_imgwidth']) {
	var postgallerygrid_imgwidth = 'imgwidth="' + this['options']['pg_grid_imgwidth'] +'"';
	} else {
	var postgallerygrid_imgwidth = 'imgwidth="200"';	
	}	
	

	if(this['options']['pg_gridlightbox']=="yes") {
	var postgallerygrid_lightbox = 'lightbox="' + this['options']['pg_gridlightbox'] +'"';
	} else {
	var postgallerygrid_lightbox = '';	
	}

	if(this['options']['pg_gridfilter']=="yes") {
	var postgallerygrid_filter = 'filtering="' + this['options']['pg_gridfilter'] +'"';
	} else {
	var postgallerygrid_filter = '';	
	}
	
	// Accordion
	
	if(this['options']['pg_accordion_width']) {
	var postgalleryaccordion_gallerywidth = 'width="' + this['options']['pg_accordion_width'] +'"';
	} else {
	var postgalleryaccordion_gallerywidth = '';	
	}

	if(this['options']['pg_accordion_imgheight']) {
	var postgalleryaccordion_imgheight = 'height="' + this['options']['pg_accordion_imgheight'] +'"';
	} else {
	var postgalleryaccordion_imgheight = '';	
	}
	

	if(this['options']['pg_accordionlightbox']=="yes") {
	var postgalleryaccordion_lightbox = 'lightbox="' + this['options']['pg_accordionlightbox'] +'"';
	} else {
	var postgalleryaccordion_lightbox = '';	
	}	

	if(this['options']['pg_accordiontimeout']) {
	var postgalleryaccordion_accordiontimeout = 'timeout="' + this['options']['pg_accordiontimeout'] +'"';
	} else {
	var postgalleryaccordion_accordiontimeout = '';	
	}
	
	
	
	// Image Gallery

	if(this['options']['pg_image_imgw']) {
	var postgalleryimage_width = 'width="' + this['options']['pg_image_imgw'] +'"';
	} else {
	var postgalleryimage_width = 'width="400"';	
	}
	
	if(this['options']['pg_image_imgh']) {
	var postgalleryimage_height = 'height="' + this['options']['pg_image_imgh'] +'"';
	} else {
	var postgalleryimage_height = 'height="250"';	
	}
	
	if(this['options']['pg_imagetimeout']) {
	var postgalleryimage_timeout = 'timeout="' + this['options']['pg_imagetimeout'] +'"';
	} else {
	var postgalleryimage_timeout = '';	
	}
	
	if(this['options']['gallery_id']!='') {
	var postgallery_id = 'id="' + this['options']['gallery_id'] +'"';
	} else {
	var postgallery_id = 'id="0"';
	}
	
	if(this['options']['gallery_title']!='') {
	var postgallery_title = 'title="' + this['options']['gallery_title'] +'"';
	} else {
	var postgallery_title = '';
	}	

	// iSlider

	if(this['options']['pg_islider_columns']) {
	var postgalleryislider_columns = 'columns="' + this['options']['pg_islider_columns'] +'"';
	} else {
	var postgalleryislider_columns = '';	
	}

	if(this['options']['pg_islider_height']) {
	var postgalleryislider_height = 'height="' + this['options']['pg_islider_height'] +'"';
	} else {
	var postgalleryislider_height = 'height="250"';	
	}
	
	if(this['options']['pg_islider_width']) {
	var postgalleryislider_width = 'width="' + this['options']['pg_islider_width'] +'"';
	} else {
	var postgalleryislider_width = 'width="400"';	
	}	

	if(this['options']['pg_isliderlightbox']=="yes") {
	var postgalleryislider_lightbox = 'lightbox="' + this['options']['pg_isliderlightbox'] +'"';
	} else {
	var postgalleryislider_lightbox = '';	
	}

	if(this['options']['pg_islidertimeout']) {
	var postgalleryislider_timeout = 'timeout="' + this['options']['pg_islidertimeout'] +'"';
	} else {
	var postgalleryislider_timeout = '';	
	}	
	

	// Nivo

	if(this['options']['pg_nivo_height']) {
	var postgallerynivo_height = 'height="' + this['options']['pg_nivo_height'] +'"';
	} else {
	var postgallerynivo_height = 'height="250"';	
	}
	
	if(this['options']['pg_nivo_width']) {
	var postgallerynivo_width = 'width="' + this['options']['pg_nivo_width'] +'"';
	} else {
	var postgallerynivo_width = 'width="400"';	
	}	

	if(this['options']['pg_nivolightbox']=="yes") {
	var postgallerynivo_lightbox = 'lightbox="' + this['options']['pg_nivolightbox'] +'"';
	} else {
	var postgallerynivo_lightbox = '';	
	}

	if(this['options']['pg_nivotimeout']) {
	var postgallerynivo_timeout = 'timeout="' + this['options']['pg_nivotimeout'] +'"';
	} else {
	var postgallerynivo_timeout = '';	
	}		
	
	if(postgallerynivoeffect!='') {
		postgallerynivoeffect='animation="'+postgallerynivoeffect+'"';
	}
	
	// Styled Box Width

	if(this['options']['boxwidth']) {
	var styledboxes_width = 'width="' + this['options']['boxwidth'] +'"';
	} else {
	var styledboxes_width = '';
	}

	// Reveal Width 
	if(this['options']['revealwidth']) {
	var reveal_width = 'width="' + this['options']['revealwidth'] +'"';
	} else {
	var reveal_width = '';
	}



	if(this['options']['colheight']) {
	var colheight = 'height="' + this['options']['colheight'] +'"';
	} else {
	var colheight = '';	
	}

	if(styledboxesalign) {
	var styledboxesalign = 'align="' + styledboxesalign +'"';
	}
	
	// Image Effect
	
	if(imageeffectalign) {
		imageeffectalign = 'align="' + imageeffectalign +'"';
	} else {
		imageeffectalign ='';	
	}
	
	if(imageeffectlightbox=='yes') {
		imageeffectlightbox ='lightbox="yes"';
	} else {
		imageeffectlightbox ='';	
	}

	if(this['options']['imageeffectwidth']) {
	var imageeffectwidth = 'width="' + this['options']['imageeffectwidth'] +'"';
	} else {
	var imageeffectwidth = '';	
	}

	if(this['options']['imageeffectheight']) {
	var imageeffectheight = 'height="' + this['options']['imageeffectheight'] +'"';
	} else {
	var imageeffectheight = '';	
	}
	
	if(this['options']['imageeffectlinkurl']) {
	var imageeffectlinkurl = 'link="' + this['options']['imageeffectlinkurl'] +'"';
	} else {
	var imageeffectlinkurl = '';	
	}			
	
	if(this['options']['imageeffectvidurl']) {
	var imageeffectvidurl = 'videourl="' + this['options']['imageeffectvidurl'] +'"';
	} else {
	var imageeffectvidurl = '';	
	}	

	if(this['options']['alttextoverlay']) {
	var imageeffectoverlay = 'titleoverlay="' + this['options']['alttextoverlay'] +'"';
	} else {
	var imageeffectoverlay = '';	
	}	
	
	// Video Shortcode
	
	if(videoshortcodealign) {
		videoshortcodealign = 'align="' + videoshortcodealign +'"';
	} else {
		videoshortcodealign ='';	
	}

	if(this['options']['videoshortcodewidth']) {
	var videoshortcodewidth = 'width="' + this['options']['videoshortcodewidth'] +'"';
	} else {
	var videoshortcodewidth = 'width="250"';	
	}

	
	if(this['options']['videoshortcodeurl']) {
	var videoshortcodeurl = 'url="' + this['options']['videoshortcodeurl'] +'"';
	} else {
	var videoshortcodeurl = '';	
	}	

	if(this['options']['videoshortcodeimgurl']) {
	var videoshortcodeimgurl = 'imageurl="' + this['options']['videoshortcodeimgurl'] +'"';
	} else {
	var videoshortcodeimgurl = '';	
	}	
	
	

	if(this['options']['videoshortcodeid']) {
	var videoshortcodeid = 'id="video-' + this['options']['videoshortcodeid'] +'"';
	} else {
	var videoshortcodeid = 'id="video-0"';	
	}	

	if(this['options']['videoshortcodeautoplay']=="yes") {
	var videoshortcodeautoplay = 'autoplay="' + this['options']['videoshortcodeautoplay'] +'"';
	} else {
	var videoshortcodeautoplay = '';	
	}
	
	if(this['options']['videoshortcode_shadowsize']=="yes") {
	var videoshortcode_shadowsize = 'shadow="' + this['options']['videoshortcode_shadowsize'] +'"';
	} else {
	var videoshortcode_shadowsize = '';	
	}	

	// Audio Shortcode
	
	if(audioshortcodealign) {
		audioshortcodealign = 'align="' + audioshortcodealign +'"';
	} else {
		audioshortcodealign ='';	
	}

	if(this['options']['audioshortcodewidth']) {
	var audioshortcodewidth = 'width="' + this['options']['audioshortcodewidth'] +'"';
	} else {
	var audioshortcodewidth = 'width="250"';	
	}

	if(this['options']['audioshortcodeheight']) {
	var audioshortcodeheight = 'height="' + this['options']['audioshortcodeheight'] +'"';
	} else {
	var audioshortcodeheight = 'height="188"';	
	}
	
	if(this['options']['audioshortcodeurl']) {
	var audioshortcodeurl = 'url="' + this['options']['audioshortcodeurl'] +'"';
	} else {
	var audioshortcodeurl = '';	
	}	

	if(this['options']['audioshortcodeimgurl']) {
	var audioshortcodeimgurl = 'imageurl="' + this['options']['audioshortcodeimgurl'] +'"';
	} else {
	var audioshortcodeimgurl = '';	
	}	
	
	

	if(this['options']['audioshortcodeid']) {
	var audioshortcodeid = 'id="audio-' + this['options']['audioshortcodeid'] +'"';
	} else {
	var audioshortcodeid = 'id="audio-0"';	
	}	

	if(this['options']['audioshortcodeautoplay']=="yes") {
	var audioshortcodeautoplay = 'autoplay="' + this['options']['audioshortcodeautoplay'] +'"';
	} else {
	var audioshortcodeautoplay = '';	
	}
	
	if(this['options']['audioshortcode_shadowsize']=="yes") {
	var audioshortcode_shadowsize = 'shadow="' + this['options']['audioshortcode_shadowsize'] +'"';
	} else {
	var audioshortcode_shadowsize = '';	
	}	
	

	// Button
	
	if(buttontarget) {
	var buttontarget = 'target="' + buttontarget +'"';
	}
	
	if(buttonalign) {
	var buttonalign = 'align="' + buttonalign +'"';
	}	
	
	
	if(buttoncolor) {
		var buttoncolor = 'color="' + buttoncolor +'"';	
	} else {
		var	buttoncolor = '';	
	}

	if(buttonwidth) {
		var buttonwidth = 'width="' + buttonwidth +'"';	
	} else {
		var	buttonwidth = '';	
	}


	// Contact Form

	if(this['options']['contact_id']) {
	var contact_id = 'id="' + this['options']['contact_id'] +'"';
	} else {
	var contact_id = 'id="contactform"';
	}	

	if(this['options']['contact_emailto']) {
	var contact_emailto = 'emailto="' + this['options']['contact_emailto'] +'"';
	} else {
	var contact_emailto = '';
	}	
	
	if(this['options']['contact_thankyou']) {
	var contact_thankyou = 'thankyou="' + this['options']['contact_thankyou'] +'"';
	} else {
	var contact_thankyou = '';
	}		

	
	// Post Gallery
	if(postgalleryalign) {
	postgalleryalign = 'align="' + postgalleryalign +'"';
	} else {
	postgalleryalign ='';	
	}


	if(postgalleryimage_animation) {
	postgalleryimage_animation = 'animation="' + postgalleryimage_animation +'"';
	} else {
	postgalleryimage_animation ='';	
	}
	
	
	if(postgalleryimage_tween) {
	postgalleryimage_tween = 'tween="' + postgalleryimage_tween +'"';
	} else {
	postgalleryimage_tween ='';	
	}	
	
	
	if(postgalleryimagenav) {
		postgalleryimagenav = 'navigation="' +postgalleryimagenav+'"';	
	}
	
	var postcats = [];
	jQuery("input[name^='dynshortcode_postcat']").each(function() {
     if (this.checked) { postcats.push(this.value); }
	});

	var mediacats = [];
	jQuery("input[name^='dynshortcode_mediacat']").each(function() {
     if (this.checked) { mediacats.push(this.value); }
	});	
	
	var postpcats = [];
	jQuery("input[name^='dynshortcode_postpcat']").each(function() {
     if (this.checked) { postpcats.push(this.value); }
	});

	var posttags = [];
	jQuery("input[name^='dynshortcode_posttag']").each(function() {
     if (this.checked) { posttags.push(this.value); }
	});


	var postgalleryslideset= [];
	jQuery("input[name^='dynshortcode_slideset']").each(function() {
     if (this.checked) { postgalleryslideset.push(this.value); }
	});	

	
	
	/* ------------------------------------
	:: SET SOURCE
	------------------------------------ */
	
	var gallerydata='';
	
	if(postgalleryslideset!='') {
	var	gallerydata = 'slidesetid="'+postgalleryslideset+'"';	
	}		
	
	if(datasource_selector=='sc-data-1') {
		var attachedmedia = this['options']['attachedmedia'];
		if(attachedmedia!='') {
			var gallerydata= 'attached_id="'+attachedmedia+'"';
		}
	} else if(datasource_selector=='sc-data-2') {
		if(postcats!='') {
			var gallerydata = 'categories="'+postcats+'"';
		}
	} else if(datasource_selector=='sc-data-3') {
		if(flickrset!='') {
			var gallerydata = 'flickr_set="'+flickrset+'"';
		}
	} else if(datasource_selector=='sc-data-4') {
		if(postgalleryslideset!='') {
		var	gallerydata = 'slidesetid="'+postgalleryslideset+'"';	
		}				
	} else if(datasource_selector=='sc-data-5') {
		if(posttags!="" && postpcats!="") {
			var gallerydata = 'product_categories="'+postpcats+'" product_tags="'+posttags+'"';
		} else if(postpcats!='') {
			var gallerydata = 'product_categories="'+postpcats+'"';	
		} else if(posttags!='') {
			var gallerydata = 'product_tags="'+posttags+'"';	
		}			
	} else if(datasource_selector=='sc-data-6') {
		if(mediacats!='') {
			var gallerydata = 'media_categories="'+mediacats+'"';
		}
	} 

	// Check is post format is selected
	
	if(gallerypostformat!='') {
		gallerydata=gallerydata+' post_format="'+gallerypostformat+'"';
	} 
	
	// Post Gallery Image Effect 
	
	if(postgalleryimageeffect) {
	
	postgalleryimageeffect = 'imageeffect="' + postgalleryimageeffect + '"';
	} else {
	postgallery_imageeffect ='';	
	}
	
	// Post Gallery Post Limit / Orders

	var postgallerynumposts = this['options']['postgallery_numposts'];
	
	var postgalleryexcerpt = this['options']['postgallery_excerpt'];
	
	if(postgallerynumposts) {
		postgallerynumposts = 'limit="' + postgallerynumposts +'"';	
	} else {
		postgallerynumposts ='';	
	}
	
	if(postgalleryexcerpt) {
		postgalleryexcerpt = 'excerpt="' + postgalleryexcerpt + '"';	
	} else {
		postgalleryexcerpt ='';	
	}
	
	var postgallerysortby = jQuery("#dynshortcode_postgallery_sortby option:selected").val();		
	
	if(postgallerysortby) {
		postgallerysortby = 'sortby="' + postgallerysortby +'"';
	} else {
		postgallerysortby ='';	
	}
	var postgalleryorderby = jQuery("#dynshortcode_postgallery_orderby option:selected").val();	
	
	if(postgalleryorderby) {
		postgalleryorderby = 'orderby="' + postgalleryorderby +'"';	
	} else {
		postgalleryorderby ='';	
	}


	if(postgallerycontent!='') {
	postgallerycontent = 'content="' + postgallerycontent +'"';	
	if(postgallerycontent=="text") {
	postgalleryimageeffect ="";	// Disable Image Effect for Text Only
	}
	}
	
	if(postgalleryimagealign!='') {
	postgalleryimagealign = 'image_align="' + postgalleryimagealign +'"';	
	} else {
	postgalleryimagealign ='';	
	}
	
	if(postgallerygridcontent!='') {
	postgallerygridcontent = 'content="' + postgallerygridcontent +'"';	
	if(postgallerygridcontent=="text") {
	postgallerygridcontent ="";	// Disable Image Effect for Text Only
	}
	}
	
	if(postgalleryaccordioncontent!='') {
	postgalleryaccordioncontent = 'content="' + postgalleryaccordioncontent +'"';	
	if(postgalleryaccordioncontent=="text") {
	postgalleryaccordioncontent ="";	// Disable Image Effect for Text Only
	}
	}	

	if(postgalleryaccordion_minititles!='') {
	postgalleryaccordion_minititles = 'minititles="' + postgalleryaccordion_minititles +'"';	
	} else {
	postgalleryaccordion_minititles ="";
	}
	
	
	if(postgalleryaccordion_autorotate!='') {
	postgalleryaccordion_autorotate = 'autoplay="' + postgalleryaccordion_autorotate +'"';	
	} else {
	postgalleryaccordion_autorotate ="";
	}
	
		

	if(border!='') {
	border = 'border="' + border +'"';	
	}
	
	
	if(this['options']['columnsclass']) {
	var classes = 'class="'+this['options']['columnsclass']+'"';
	} else {
	var classes='';	
	}
	
	
	
		var attrs = '';
        jQuery.each(this['options'], function(name, value){
            if (value != '') {
                attrs += ' ' + name + '="' + value + '" ';
            }
        });
		
		if(codetype=="columnlayout") { // Columns
        	
			if(columntype=="twocolumns") {
		return '[two_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['twocol_first'] + '[/two_columns] [two_columns_last ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['twocol_second'] + '[/two_columns_last] ';
			}

        	if(columntype=="threecolumns") {
				return '[three_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['threecol_first'] + '[/three_columns]  [three_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['threecol_second'] + '[/three_columns] [three_columns_last ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['threecol_third'] + '[/three_columns_last] ';
			}
			
        	if(columntype=="twothreecolumns") {
				if(twothirdpos=="left") {
				return '[twothirds_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['twothreecol_second'] + '[/twothirds_columns] [onethird_columns_last ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['twothreecol_first'] + '[/onethird_columns_last] ';	
				} else {
				return '[onethird_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['twothreecol_first'] + '[/onethird_columns] [twothirds_columns_last ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['twothreecol_second'] + '[/twothirds_columns_last]';
				}
				
			}			

        	if(columntype=="fourcolumns") {
				return '[four_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['fourcol_first'] + '[/four_columns] [four_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['fourcol_second'] + '[/four_columns] [four_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['fourcol_third'] + '[/four_columns] [four_columns_last ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['fourcol_fourth'] + '[/four_columns_last]';
			}

        	if(columntype=="threefourcolumns") {
				if(threefourthpos=="left") {
				return '[threefourths_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['threefourcol_second'] + '[/threefourths_columns] [onefourth_columns_last ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['threefourcol_first'] + '[/onefourth_columns_last]';
				} else {
				return '[onefourth_columns ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['threefourcol_first'] + '[/onefourth_columns]  [threefourths_columns_last ' + colheight + ' ' + border + ' '+ classes + ']' + this['options']['threefourcol_second'] + '[/threefourths_columns_last]';
				}
				
			}		

		} else if(codetype=="postgallery") { // Post Gallery
			if(gallerydata) {
				if(postgallerytype=="postgallery_image") {
				
			return '['+ postgallerytype +' '+ postgalleryimage_width +' '+ postgallery_id +' '+postgallery_title +' '+ postgalleryimage_height +'  '+ gallerydata +' ' + postgalleryimageeffect + ' ' + postgalleryalign +' ' + postgalleryimage_animation +' ' + postgalleryimage_tween +' '+ postgalleryimagenav +' '+ postgalleryimage_timeout +' '+ postgallerysortby +' '+ postgalleryorderby +' '+ postgallerynumposts + ' '+ postgalleryexcerpt +' /]';
				
				} else if(postgallerytype=="postgallery_slider") {
					
return '['+ postgallerytype +' '+ postgallerycontent +' '+ postgalleryslider_lightbox +' '+ postgalleryslider_vertical +' '+ gallerydata +'  '+ postgalleryslider_columns +' ' + postgallery_id +' '+postgallery_title +' '+ postgalleryimageeffect + ' ' +  postgalleryslider_imgheight +' ' +  postgalleryslider_imgwidth +' '+ postgalleryslider_width +' '+ postgalleryslider_height +' '+ postgalleryimagealign +' '+ postgallerysortby +' '+ postgalleryorderby +' '+ postgallerynumposts + ' '+ postgalleryexcerpt +' '+ postgalleryslider_timeout +' ' + postgalleryalign +'/]';
				} else if(postgallerytype=="postgallery_grid") {
					
return '['+ postgallerytype +' '+ postgallerygridcontent +' '+ postgallerygrid_columns +' '+ postgallerygrid_lightbox +' '+ gallerydata +'  ' + postgallery_id +' '+postgallery_title +' '+ postgalleryimageeffect + ' ' +  postgallerygrid_imgheight +' ' +  postgallerygrid_imgwidth +' '+ postgallerygrid_width +' '+ postgallerygrid_height +' '+ postgallerysortby +' '+ postgalleryorderby +' '+ postgallerynumposts + ' '+ postgalleryexcerpt +' '+ postgallerygrid_filter +' ' + postgalleryalign +' /]';			
				} else if(postgallerytype=="postgallery_accordion") {
					
return '['+ postgallerytype +' '+ postgalleryaccordioncontent +' '+ postgalleryaccordion_lightbox +' '+ gallerydata +'  ' + postgallery_id +' '+postgallery_title +' '+ postgalleryimageeffect + ' ' + postgalleryaccordion_imgheight +' ' + postgalleryaccordion_gallerywidth +' '+ postgalleryaccordion_autorotate +' '+ postgalleryaccordion_accordiontimeout +' '+ postgalleryaccordion_minititles +' '+ postgallerysortby +' '+ postgalleryorderby +' '+ postgallerynumposts + ' '+ postgalleryexcerpt +' ' + postgalleryalign +' /]';				
				} else if(postgallerytype=="postgallery_islider") {
					
return '['+ postgallerytype +' '+ postgalleryislider_lightbox +' '+ gallerydata +'  '+ postgalleryislider_columns +' ' + postgallery_id +' '+postgallery_title +' '+ postgalleryimageeffect + ' '+ postgalleryislider_width +' '+ postgalleryislider_height +' '+ postgallerysortby +' '+ postgalleryorderby +' '+ postgallerynumposts + ' '+ postgalleryexcerpt +' '+ postgalleryislider_timeout + ' ' + postgalleryalign +'/]';

				} else if(postgallerytype=="postgallery_nivo") {
					
return '['+ postgallerytype +' '+postgallerynivoeffect+' '+ postgallerynivo_lightbox +' '+ gallerydata +' ' + postgallery_id +' '+postgallery_title +' '+ postgalleryimageeffect + ' '+ postgallerynivo_width +' '+ postgallerynivo_height +' '+ postgallerysortby +' '+ postgalleryorderby +' '+ postgallerynumposts + ' '+ postgalleryexcerpt +' '+ postgallerynivo_timeout +' ' + postgalleryalign +'/]';

				}
			}
		} else if(codetype=="styledboxes") { // Styled Boxes
			
			return '[styledbox type="'+ styledboxes +'" '+ styledboxes_width +' '+ styledboxesalign +']'+ this['options']['boxcontent'] +'[/styledbox]';
			
		} else if(codetype=="button") { // Button
			if(buttontype=="linkbutton") {
			return '[button url="'+ this['options']['button_link'] +'" '+ buttontarget +' '+ buttonalign +' '+ buttoncolor +' '+ buttonwidth +' ]'+ this['options']['button_text'] +'[/button]';			
			} else {
			return '[droppanelbutton '+ buttoncolor +' '+ buttonwidth +' '+ buttonalign +' ]'+ this['options']['droppanelbutton_text'] +'[/droppanelbutton]';			
			}
			
		} else if(codetype=="dividers") { // Horizontal Break
			if(this['options']['divideropacity']!='') { var opacity=' opacity="'+this['options']['divideropacity']+'"'; } else { var opacity=''; }
			return '['+ hozbreak + opacity +' /]';
			
		} else if(codetype=="blockquote") { // Block Quote
			
			return '[blockquote type="'+ blockquote +'" align="'+ blockquotealign +'"]'+ this['options']['blockquote_text'] +'[/blockquote]';	
			
		} else if(codetype=="highlight") { // Highlight
			
			return '[highlight type="'+ highlight +'"]'+ this['options']['highlight_text'] +'[/highlight]';	
			
		} else if(codetype=="imgeffect") { // Image Effect
			
			
			return '[imageeffect type="'+ imageeffect +'" '+ imageeffectalign +' '+imageeffectlightbox+' '+ imageeffectwidth +' '+ imageeffectheight +'  alt="'+ this['options']['imageeffectalt'] +'" url="'+ this['options']['imageeffecturl'] +'" '+ imageeffectvidurl +' '+imageeffectlinkurl+' '+ imageeffectoverlay +']';
			
		} else if(codetype=="videoshortcode") { // Video Shortcode
			
			return '[videoembed type="'+ videotype +'" ratio="'+ videoratio +'" '+ videoshortcodealign +' '+ videoshortcodewidth +'  '+ videoshortcodeurl +' '+ videoshortcodeimgurl +' '+ videoshortcodeautoplay +' '+ videoshortcode_shadowsize +' '+videoshortcodeid+']';
			
		} else if(codetype=="audioshortcode") { // Video Shortcode
			
			return '[audioembed '+ audioshortcodealign +' '+ audioshortcodewidth +' '+ audioshortcodeurl +' '+ audioshortcodeimgurl +' '+ audioshortcodeautoplay +' '+ audioshortcode_shadowsize +' '+audioshortcodeid+']';
			
		} else if(codetype=="tabs") { // Tabs
		
		var tabsnum = this['options']['numtabs'];
		
		var tabtitles ='';
		var i=1;
		
		
		for (i=1;i<=tabsnum;i++)
		{
			if(i==tabsnum) {
				tabtitles = tabtitles + '[tabhead_last id="'+i+'" class="'+this['options']['tabsclass']+'"]  title '+ i +'  [/tabhead_last] ';
			} else {
				tabtitles = tabtitles + '[tabhead id="'+i+'" class="'+this['options']['tabsclass']+'"]  title '+ i +'  [/tabhead] ';
			}
			
		}
		
		var tabscontent ='';
		var i=1;
		for (i=1;i<=tabsnum;i++)
		{
			tabscontent = tabscontent + '[tab id="'+i+'" class="'+this['options']['tabsclass']+'"]  tabcontent '+ i +'  [/tab] ';
		}
		
		var tabs = '[tabswrap] ' + tabtitles +' '+ tabscontent + '[/tabswrap]';	
		
		return tabs;
		
		}  else if(codetype=="accordion") { // Accordion
		
		var panelsnum = this['options']['numaccordion'];
		

		var i=1;
		
		var panelcontent ='';
		var i=1;
		for (i=1;i<=panelsnum;i++)
		{
			panelcontent = panelcontent + '[panel color="'+accordioncolor+'" class="'+this['options']['accordionclass']+'"  title=" TITLE'+i+' "] content '+ i +'  [/panel] ';
		}
		
		var accordion = '[accordion '+ accordioncollapse +' ] ' + panelcontent +' [/accordion]';	
		
		return accordion;
		
		} else if(codetype=="list") { // List
		
		var listnum = this['options']['numlist'];
		

		var i=1;
		
		var createlist ='';
		var i=1;
		for (i=1;i<=listnum;i++)
		{
			createlist = createlist + '<li>content</li>\r';
		}
		
		var list = '[list style="'+ liststyle +'" color="'+ listcolor +'"]\r<ul>\r' + createlist +'</ul>\r[/list]';	
		
		return list;
		} else if(codetype=="reveal") { // Reveal
		
		
		return '[reveal '+ reveal_width +' '+ revealalign +' color="'+revealcolor+'" title="'+this['options']['revealtitle']+'" ]'+ this['options']['revealcontent'] +'[/reveal]';
		
		} else if(codetype=="dropcaps") { // Drop Caps
			
		return '[dropcap style="'+ dropcapstyle +'" color="'+ dropcapcolor +'" text="' + this['options']['dropcap'] +'" /]';	
		
		} else if(codetype=="contactform") { // Contact Form
			
		return '[enquiry_form '+ contact_id +' '+ contact_emailto +' '+ contact_thankyou +' /]';	
		
		} else if(codetype=="socialicons") { // Contact Form
		
		
		var socialalign_value =  jQuery("#dynshortcode_social_align option:selected").val();
		
		if(socialalign_value) {
		var socialalign	='align="'+socialalign_value+'"';
		} else {
		var socialalign='';	
		}
		
		// Social Icons
		var socialicons='';
		
		if(this['options']['social_share']=="yes") {
		socialshare = 'share_icon="yes"';
		} else {
		socialshare = '';
		}
		
		if(this['options']['social_digg']=="yes") {
		socialicons += '[socialicon name="digg"';
		if(this['options']['social_digg_url']!='') {
		socialicons += ' url="'+this['options']['social_digg_url']+'"';
		}
		socialicons += ' /] ';
		} 
		
		if(this['options']['social_fb']=="yes") {
		socialicons += '[socialicon name="fb"';
		if(this['options']['social_fb_url']!='') {
		socialicons += ' url="'+this['options']['social_fb_url']+'"';
		}
		socialicons += ' /] ';
		} 	
	
		if(this['options']['social_linkedin']=="yes") {
		socialicons += '[socialicon name="linkedin"';
		if(this['options']['social_linkedin_url']!='') {
		socialicons += ' url="'+this['options']['social_linkedin_url']+'"';
		}
		socialicons += ' /] ';
		}
	
		if(this['options']['social_deli']=="yes") {
		socialicons += '[socialicon name="deli"';
		if(this['options']['social_deli_url']!='') {
		socialicons += ' url="'+this['options']['social_deli_url']+'"';
		}
		socialicons += ' /] ';
		} 
	
		if(this['options']['social_reddit']=="yes") {
		socialicons += '[socialicon name="reddit"';
		if(this['options']['social_reddit_url']!='') {
		socialicons += ' url="'+this['options']['social_reddit_url']+'"';
		}
		socialicons += ' /] ';
		} 			
	
		if(this['options']['social_stumble']=="yes") {
		socialicons += '[socialicon name="stumble"';
		if(this['options']['social_stumble_url']!='') {
		socialicons += ' url="'+this['options']['social_stumble_url']+'"';
		}
		socialicons += ' /] ';
		} 	
		
		if(this['options']['social_twitter']=="yes") {
		socialicons += '[socialicon name="twitter"';
		if(this['options']['social_twitter_url']!='') {
		socialicons += ' url="'+this['options']['social_twitter_url']+'"';
		}
		socialicons += ' /] ';
		} 				
	
		if(this['options']['social_google']=="yes") {
		socialicons += '[socialicon name="google"';
		if(this['options']['social_google_url']!='') {
		socialicons += ' url="'+this['options']['social_google_url']+'"';
		}
		socialicons += ' /] ';
		} 	
	
		if(this['options']['social_rss']=="yes") {
		socialicons += '[socialicon name="rss"';
		if(this['options']['social_rss_url']!='') {
		socialicons += ' url="'+this['options']['social_rss_url']+'"';
		}
		socialicons += ' /] ';
		} 	
	
		if(this['options']['social_youtube']=="yes") {
		socialicons += '[socialicon name="youtube"';
		if(this['options']['social_youtube_url']!='') {
		socialicons += ' url="'+this['options']['social_youtube_url']+'"';
		}
		socialicons += ' /] ';
		} 	
		
		if(this['options']['social_vimeo']=="yes") {
		socialicons += '[socialicon name="vimeo"';
		if(this['options']['social_vimeo_url']!='') {
		socialicons += ' url="'+this['options']['social_vimeo_url']+'"';
		}
		socialicons += ' /] ';
		}

		if(this['options']['social_pinterest']=="yes") {
		socialicons += '[socialicon name="pinterest"';
		if(this['options']['social_pinterest_url']!='') {
		socialicons += ' url="'+this['options']['social_pinterest_url']+'"';
		}
		socialicons += ' /] ';
		}

		if(this['options']['social_email']=="yes") {
		socialicons += '[socialicon name="email"';
		if(this['options']['social_email_url']!='') {
		socialicons += ' url="'+this['options']['social_email_url']+'"';
		}
		socialicons += ' /] ';
		}				

		if(this['options']['social_soundcloud']=="yes") {
		socialicons += '[socialicon name="soundcloud"';
		if(this['options']['social_soundcloud_url']!='') {
		socialicons += ' url="'+this['options']['social_soundcloud_url']+'"';
		}
		socialicons += ' /] ';
		}	

		if(this['options']['social_instagram']=="yes") {
		socialicons += '[socialicon name="instagram"';
		if(this['options']['social_instagram_url']!='') {
		socialicons += ' url="'+this['options']['social_instagram_url']+'"';
		}
		socialicons += ' /] ';
		}					
		
		if(socialicons!='') {
			return '[socialwrap  '+socialalign+' '+socialshare+'] '+socialicons+' [/socialwrap]';	
		}
	
		} else if(codetype=="pricetable") { // Custom Style
		
		var pricetable='';
		
		for (var i = 1; i <= pricetable_columns; i++) {
			if(i==pricetable_featured) { 
			var featured ='featured="true"'; 
			var featured_color ='color="'+pricetable_color+'"';
			} else { var featured='';var featured_color='color="grey-lite"';}
			
			pricetable +='\n[plan title="Plan Title" price="40" button_text="Sign Up" button_link="" per="month" '+featured_color+' '+featured+'] \n<ul>\n<li>List Item</li>\n<li>List Item</li>\n</ul>\n[/plan]';
		}
			
		return '[pricing_table columns="'+pricetable_columns+'"]'+ pricetable +'\n[/pricing_table]';	
		
		} else if(codetype=="tooltips") { // Custom Style

		if(this['options']['tooltip_trigger_icon']=="yes") {
		var tooltip_trigger_icon = 'icon="' + this['options']['tooltip_trigger_icon'] +'"';
		} else {
		var tooltip_trigger_icon = '';	
		}			
			
		return '[tooltip position="'+tooltip_position+'" '+tooltip_trigger_icon+' color="'+tooltip_color+'" tip="'+ this['options']['tooltip_content'] +'"] '+ this['options']['tooltip_trigger'] +' [/tooltip]';	
		
		} else if(codetype=="content_animator") { // Custom Style
		
		var delay, speed, animator_id;
		
		if(!this['options']['animator_delay']) {
		  delay='0';
		} else {
		  delay=this['options']['animator_delay'];
		}

		if(!this['options']['animator_id']) {
		  animator_id='0';
		} else {
		  animator_id=this['options']['animator_id'];
		}	

		if(!this['options']['animator_speed']) {
		  speed='800';
		} else {
		  speed=this['options']['animator_speed'];
		}

		if(!this['options']['animator_margin_top']) {
		  margintop='0';
		} else {
		  margintop=this['options']['animator_margin_top'];
		}						

		if(!this['options']['animator_margin_left']) {
		  marginleft='0';
		} else {
		  marginleft=this['options']['animator_margin_left'];
		}	

		if(!this['options']['animator_margin_right']) {
		  marginright='0';
		} else {
		  marginright=this['options']['animator_margin_right'];
		}			
			
		return '[content_animator id="'+animator_id+'"  effect="'+animator_effect+'"  margin_top="'+ margintop +'" margin_left="'+ marginleft +'" margin_right="'+ marginright +'" align="'+animator_align+'" float="'+animator_float+'" direction="'+animator_direction+'"  easing="'+animator_easing+'"  delay="'+ delay +'"  speed="'+ speed +'"] '+ this['options']['animator_content'] +' [/content_animator]';	
		
		} else if(codetype=="recentposts") { // Recent Posts
		
		if(recentpostmeta=='yes') {
		 recentpostmeta = 'metadata="yes"';	
		}

		if(recentpostdate=='yes') {
		 recentpostdate = 'show_date="yes"';	
		}		
			
		return '[recent_posts content="'+ recentpostscontent +'" '+recentposts_cats+' image_effect="'+ recentpostsimageeffect +'" '+recentposts_imgwidth+' '+recentposts_imgheight+'  image_align="'+ recentpostsimagealign +'"  order="'+ recentpostssortby +'" orderby="'+ recentpostsorderby +'"  '+recentposts_excerpt+' '+recentposts_limit+' '+recentposts_offset+' '+recentpostmeta+' '+recentpostdate+' /]';	
		

		}
		
    },
    sendToEditor:function(f) {
        var collection = jQuery(f).find("input[id^=dynshortcode]:not(input:checkbox),input[id^=dynshortcode]:checkbox:checked");
        var $this = this;
        collection.each(function () {
            var name = this.name.substring(13, this.name.length-1);
            $this['options'][name] = this.value;
        });
        send_to_editor(this.generateShortCode());
        return false;
    }
};



var shortcodegenerator = new wpGenerateShortcodeAdmin();

//*********************************************/
// Copy Gallery Slide
//*********************************************/

function copy_gallery_slide() {
	var $multitable_wrap = jQuery('.selected_custom');

		var $add_next = jQuery('.selected_custom').find('.add_row');
		var $del_this = jQuery('.selected_custom').find('.del_row');
		var $id;
		
	$multitable_wrap.each(function() {
		
		$add_next.unbind('click').bind('click',function() {
			
			$id=jQuery(this).attr("id");
			
			var $count = jQuery('#table-'+$id+'.multitables').find('.slide_counter');
			var $current_table = jQuery('#table-'+$id+'.multitables');	

			$count.val(parseInt($count.val())+1);
		
			
			$newclone = jQuery('#table-'+$id+'.multitables .clone_row').clone().insertBefore(jQuery('#table-'+$id+'.multitables .clone_row'));
			$newclone.removeClass('hidden').removeClass('clone_row');
			new_reveal($newclone);
			correct_slide_id($current_table);
			copy_gallery_slide();
			slide_drag($id);
			select_fcat();

			return false;
			});

		$del_this.unbind('click').bind('click',function() {
			$id=jQuery(this).attr("tabindex");
			$id='';
			
			var $count = jQuery('#table-'+$id+'.multitables').find('.slide_counter');
			var $current_table = jQuery('#table-'+$id+'.multitables');	
			
			$count.val(parseInt($count.val())-1);
			jQuery(this).parents('.multitable').remove();
			correct_slide_id($current_table);
			return false;
			});			

});
	
}

function correct_slide_id($current_table) {
	var i=0;
	$current_table.find('.multitable').each(function(i){
	
		var $current_sub_table = jQuery(this);
		$current_sub_table.find('.changenumber').html(i+1);
		$current_sub_table.find('.correct_num').each(function(){
				var $multiply_me = '';
				var $newname = jQuery(this).attr('id').replace(/\_\d+/,'_'+i);
				if (jQuery(this).hasClass('multiply_me')) $multiply_me = 'multiply_me';
				var $iscat = jQuery(this).hasClass('selected_cats');
				var $ismedialist = jQuery(this).hasClass('get-media-list');
				var $ismediatitle = jQuery(this).hasClass('get-media-list-title');
				var $ismediadesc = jQuery(this).hasClass('get-media-list-desc');
				var $iscolorpicker = jQuery(this).hasClass('skin_manager_color');
				var $isopacslider = jQuery(this).hasClass('opacityslider');
				var $isopacslider_sec = jQuery(this).hasClass('opacvalue');					
				
				if($iscat) {
					jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num selected_cats"});
				} else if($ismedialist) {
					jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num get-media-list"});
				} else if($ismediatitle) {
					jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num get-media-list-title"});
				} else if($ismediadesc) {
					jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num get-media-list-desc"});
				} else if($iscolorpicker) {
					jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num skin_manager_color"});
				} else if($isopacslider) {
					jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num opacityslider button-secondary ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"});
				} else if($isopacslider_sec) {
					jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num opacvalue"});
				} else {
					jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num"});	
				}
			});
			get_media_list();
			
	});
}

function slide_drag($id) {
	
		jQuery(".table_sort").tableDnD({
		    onDragClass: "myDragClass",
		    onDrop: function(table, row) {
				if(!$id) {
					$id=jQuery(table).attr("tabindex");
					$id='';
				}
				var $multitable_wrap = jQuery('#table-'+$id+' .multitable');
				var i=0;
				$multitable_wrap.each(function(i) {
					var $current_sub_table = jQuery(this);
					$current_sub_table.find('.correct_num').each(function(){
							var $newname = jQuery(this).attr('name').replace(/\_\d+/,'_'+i);
							var $iscat = jQuery(this).hasClass('selected_cats');
							var $ismedialist = jQuery(this).hasClass('get-media-list');
							var $ismediatitle = jQuery(this).hasClass('get-media-list-title');
							var $ismediadesc = jQuery(this).hasClass('get-media-list-desc');							
							
							if($iscat) {
								jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num selected_cats"});
							} else if($ismedialist) {
								jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num get-media-list"});
							} else if($ismediatitle) {
								jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num get-media-list-title"});
							} else if($ismediadesc) {
								jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num get-media-list-desc"});
							} else {
								jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num"});	
							}
						});
					});
					get_media_list();

		    },
			onDragStart: function(table, row) {	
			}
		});
}


function new_reveal(newslide) {
	var reveal =jQuery(newslide).find('div.reveal');

	// Toggle classes for reveal
	jQuery(reveal).toggle(function(){
		jQuery(this).addClass("ui-state-active");}, function() {
		jQuery(this).removeClass("ui-state-active ");
	});

	
	// Reveal content
	jQuery(reveal).click(function(){
	jQuery(this).next(".reveal-content").animate({"height": "toggle","opacity":"toggle"});
	});	
	colorpic_fields(); // color picker
	opac_slider(); // enable opacity slider
}

function opac_slider() {
	jQuery('.opacityslider').each(function(idx, elm) {
		var name = elm.id.replace('_slider', '');

		var opacvalue = jQuery('#'+name).val();
		if(opacvalue=='') {
			opacvalue=100;
		} else if(opacvalue=='.') {
			opacvalue=0;
		}
		
		jQuery('#' + elm.id).slider({
		range: "max",
		min: 0,
		max: 100,
		step: 1,
		value: opacvalue,
		animate: true,
		slide: function( event, ui ) {
			if(ui.value<'1') { ui.value='.';  }
 			jQuery('#' + name).val(ui.value);
		}
		});
	});	
	
}

function reveal_gallery() {
	jQuery(".reveal-content").hide();
	
	// Toggle classes for reveal
	jQuery("div.reveal").toggle(function(){
		jQuery(this).addClass("ui-state-active");}, function() {
		jQuery(this).removeClass("ui-state-active ");
	});

	
	// Reveal content
	jQuery("div.reveal").click(function(){
	jQuery(this).next(".reveal-content").animate({"height": "toggle","opacity":"toggle"});
	});	
}

function reveal_meta() {
	jQuery(".reveal-content").hide();
	
	// Toggle classes for reveal
	jQuery("h4.revealmeta").toggle(function(){
		jQuery(this).addClass("ui-state-active");}, function() {
		jQuery(this).removeClass("ui-state-active ");
	});

	// Reveal content
	jQuery("h4.revealmeta").click(function(){
	jQuery(this).next(".reveal-content").animate({"height": "toggle"},{duration: 200} );
	});	
}

function colorpic_fields() {
jQuery('#gallery3dincolor,#gallery3dtextcolor,#font_color,#font_link,#font_hover,#side_link,#side_hover,#skin_id_layer1_bgcolor,.skin_manager_color').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
}


//*********************************************/
// Slide Set Filter Categories
//*********************************************/

function manage_data_category(){

	jQuery(".adddatacat").click(function(){
		var $newcat = jQuery('.newcategory').val();
		
		jQuery('.catselect').append('<option value="'+$newcat+'">'+$newcat+'</option>');	
		jQuery('.filter_categories_select').append('<option value="'+$newcat+'">'+$newcat+'</option>');	
		
		str='';
		
		jQuery(".filter_categories_select option").each(function () {
                str += jQuery(this).text() + ",";
              });
        str = str.substring(0, str.length - 1);  
		jQuery(".filter_categories").val(str);  
	});

	jQuery(".deldatacat").click(function(){
		
		var $delcat = jQuery(".filter_categories_select option:selected").val();
		jQuery(".catselect option[value='"+$delcat+"']").remove();	
		jQuery(".filter_categories_select option[value='"+$delcat+"']").remove();

		str='';
		
		jQuery(".filter_categories_select option").each(function () {
                str += jQuery(this).text() + ",";
              });

		str = str.substring(0, str.length - 1);
        jQuery(".filter_categories").val(str);

	});

};

function select_fcat() {
	jQuery('.catselect,#slidesetselect').change(function() {
		$var =jQuery(this).val();
		if($var) {
			var $current_cats=jQuery(this).parent().parent().find('.selected_cats').val();
			
			if($current_cats) {
				var $check_multicat = $current_cats.indexOf(',');
				
				if($check_multicat!=-1) {
				
				var $checkcat=$current_cats.split(",");
				var $contains_cat=null;
				for (var i = 0; i < $checkcat.length; i++) {
					if($checkcat[i]==$var) {
						$contains_cat=1;	
					}
				}
				} else {
					if($current_cats==$var) {
						$contains_cat=1;	
					}
				}
			} else {
				$contains_cat=2;
			}
			
			if($contains_cat!=1) {
				jQuery(this).parent().parent().find('#catselect').append('<li class="button-secondary" title="'+$var+'"><span class="cat-remove"></span>'+$var+'</li>');
				if($current_cats) {
					jQuery(this).parent().parent().find('.selected_cats').val($current_cats+','+$var);
				} else {
					jQuery(this).parent().parent().find('.selected_cats').val($var);
				}
				remove_fcat();
			}
		}
	});	
}

function remove_fcat() {
	jQuery('span.cat-remove').click(function() {
		$del_cat=jQuery(this).parent().attr('title');

		$update_cats=jQuery(this).parent().parent().parent().find('.selected_cats').val();
		
		if($update_cats) {
			var $check_multicat='';
			
			if($update_cats.search(',')) {
				$check_multicat = 2;
			} else {
				$check_multicat = -1;
			}
	
			if($check_multicat!=-1) {
			var $removecat=$update_cats.split(",");
	
				var $new_cats='';
				for (var i = 0; i < $removecat.length; i++) {
					if($removecat[i]!=$del_cat) {
						$new_cats=$new_cats+$removecat[i]+',';
					}
				}
				$new_cats = $new_cats.substring(0, $new_cats.length-1);
			
			} else {
	
					if($update_cats==$del_cat) {
						$new_cats='';	
					}			
			}
			
			jQuery(this).parent().parent().parent().find('.selected_cats').val($new_cats);
			
			jQuery(this).parent().remove();
		}
	
	});
}


// MEDIA INVOKER 

jQuery(document).ready(function($) {

	$('.custom_media_uploader').attachMediaUploader('media-upload-link', function(url, clicked_link_attr_value ){ 
	
		url = url.replace(/https?:\/\/[^\/]+/i, ""); // make path relative
		
		if(clicked_link_attr_value=='') clicked_link_attr_value='content';
		
		var fieldselct = $('#'+clicked_link_attr_value).attr('value', url);
	
	});
    
});



/*!
 * jQuery Tools v1.2.5 - The missing UI library for the Web
 * 
 * tooltip/tooltip.js
 * 
 * NO COPYRIGHTS OR LICENSES. DO WHAT YOU LIKE.
 * 
 * http://flowplayer.org/tools/
 * 
 */
(function(a){a.tools=a.tools||{version:"v1.2.5"},a.tools.tooltip={conf:{effect:"toggle",fadeOutSpeed:"fast",predelay:0,delay:30,opacity:1,tip:0,position:["top","center"],offset:[0,0],relative:!1,cancelDefault:!0,events:{def:"mouseenter,mouseleave",input:"focus,blur",widget:"focus mouseenter,blur mouseleave",tooltip:"mouseenter,mouseleave"},layout:"<div/>",tipClass:"tooltip"},addEffect:function(a,c,d){b[a]=[c,d]}};var b={toggle:[function(a){var b=this.getConf(),c=this.getTip(),d=b.opacity;d<1&&c.css({opacity:d}),c.show(),a.call()},function(a){this.getTip().hide(),a.call()}],fade:[function(a){var b=this.getConf();this.getTip().fadeTo(b.fadeInSpeed,b.opacity,a)},function(a){this.getTip().fadeOut(this.getConf().fadeOutSpeed,a)}]};function c(b,c,d){var e=d.relative?b.position().top:b.offset().top,f=d.relative?b.position().left:b.offset().left,g=d.position[0];e-=c.outerHeight()-d.offset[0],f+=b.outerWidth()+d.offset[1],/iPad/i.test(navigator.userAgent)&&(e-=a(window).scrollTop());var h=c.outerHeight()+b.outerHeight();g=="center"&&(e+=h/2),g=="bottom"&&(e+=h),g=d.position[1];var i=c.outerWidth()+b.outerWidth();g=="center"&&(f-=i/2),g=="left"&&(f-=i);return{top:e,left:f}}function d(d,e){var f=this,g=d.add(f),h,i=0,j=0,k=d.attr("title"),l=d.attr("data-tooltip"),m=b[e.effect],n,o=d.is(":input"),p=o&&d.is(":checkbox, :radio, select, :button, :submit"),q=d.attr("type"),r=e.events[q]||e.events[o?p?"widget":"input":"def"];if(!m)throw"Nonexistent effect \""+e.effect+"\"";r=r.split(/,\s*/);if(r.length!=2)throw"Tooltip: bad events configuration for "+q;d.bind(r[0],function(a){clearTimeout(i),e.predelay?j=setTimeout(function(){f.show(a)},e.predelay):f.show(a)}).bind(r[1],function(a){clearTimeout(j),e.delay?i=setTimeout(function(){f.hide(a)},e.delay):f.hide(a)}),k&&e.cancelDefault&&(d.removeAttr("title"),d.data("title",k)),a.extend(f,{show:function(b){if(!h){l?h=a(l):e.tip?h=a(e.tip).eq(0):k?h=a(e.layout).addClass(e.tipClass).appendTo(document.body).hide().append(k):(h=d.next(),h.length||(h=d.parent().next()));if(!h.length)throw"Cannot find tooltip for "+d}if(f.isShown())return f;h.stop(!0,!0);var o=c(d,h,e);e.tip&&h.html(d.data("title")),b=b||a.Event(),b.type="onBeforeShow",g.trigger(b,[o]);if(b.isDefaultPrevented())return f;o=c(d,h,e),h.css({position:"absolute",top:o.top,left:o.left}),n=!0,m[0].call(f,function(){b.type="onShow",n="full",g.trigger(b)});var p=e.events.tooltip.split(/,\s*/);h.data("__set")||(h.bind(p[0],function(){clearTimeout(i),clearTimeout(j)}),p[1]&&!d.is("input:not(:checkbox, :radio), textarea")&&h.bind(p[1],function(a){a.relatedTarget!=d[0]&&d.trigger(r[1].split(" ")[0])}),h.data("__set",!0));return f},hide:function(c){if(!h||!f.isShown())return f;c=c||a.Event(),c.type="onBeforeHide",g.trigger(c);if(!c.isDefaultPrevented()){n=!1,b[e.effect][1].call(f,function(){c.type="onHide",g.trigger(c)});return f}},isShown:function(a){return a?n=="full":n},getConf:function(){return e},getTip:function(){return h},getTrigger:function(){return d}}),a.each("onHide,onBeforeShow,onShow,onBeforeHide".split(","),function(b,c){a.isFunction(e[c])&&a(f).bind(c,e[c]),f[c]=function(b){b&&a(f).bind(c,b);return f}})}a.fn.tooltip=function(b){var c=this.data("tooltip");if(c)return c;b=a.extend(!0,{},a.tools.tooltip.conf,b),typeof b.position=="string"&&(b.position=b.position.split(/,?\s/)),this.each(function(){c=new d(a(this),b),a(this).data("tooltip",c)});return b.api?c:this}})(jQuery);

jQuery(document).ready(function(){
		jQuery('.tooltip-info').tooltip({
		position: "top center", opacity: 0.8,
		relative:true
		
		});
});


jQuery(window).load(function(){
copy_gallery_slide();
slide_drag();
reveal_gallery();
reveal_meta();
colorpic_fields();
manage_data_category();
remove_fcat();
select_fcat();
});


