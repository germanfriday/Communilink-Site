<?php

/* ------------------------------------

:: GENERATE CUSTOM FIELDS

------------------------------------*/


$pgopts = "pgopts";

/* ------------------------------------
:: WP E-COMMERCE / WOOCOMMERCE FIELDS
------------------------------------*/

if( class_exists('WPSC_Query') || class_exists('Woocommerce') ) {

$productcats =  array(
"opentag" => '<div id="data-5" class="datasource"><strong>Select Product Categories</strong><br />',
"type" => "chkbox",
"array" => 'productcats',
"id" => "productcat",
"name" => "productcat",
"closetag" => "<br />");

$producttags = array(
"opentag" => "<strong>Select Product Tags</strong><br />",
"type" => "chkbox",
"array" => 'producttags',
"id" => "producttag",
"name" => "producttag",
"closetag" => "</div>");
} else { $productcats = $producttags =''; }

/* ------------------------------------------
:: WP E-COMMERCE / WOOCOMMERCE FIELDS *END*
-------------------------------------------*/

$meta_descriptions = array(  // Page Titles & Descriptions

"pagetitle" => array(
"opentag" => '<div class="revealbox overflow"><h4 class="revealmeta"><span class="ui-icon"></span>Page Options</h4><div class="reveal-content"><br />',
"type" => "field",
"name" => "pagetitle",
"title" => '<span class="tooltip-next">Override Page Title</span> <div class="tooltip-info" style="margin-left:30px"></div><div class="tooltip">Overrides Default Page Title. <br />Enter <em><strong>BLANK</strong></em> to disable <br />displaying title.</div><br class="clear" />',
"size" => "large"),


"pagesubtitle" => array(
"type" => "field",
"name" => "pagesubtitle",
"title" => "Page Sub Title",
"description" => '<hr />',
"size" => "large"),

"branding_alignment" => array(
"opentag" => '<hr />',
"type" => "menu",
"id" => "branding_alignment",
"name" => "branding_alignment",
"size" => "large",),

"menu_alignment" => array(
"type" => "menu",
"id" => "menu_alignment",
"name" => "menu_alignment",
"description" => '<hr />',
"size" => "large",),

"hidebreadcrumbs" => array(
"type" => "chkbox",
"name" => "hidebreadcrumbs",
"size" => "large",
"description" => "<strong>Disable</strong> Breadcrumbs <br />"),


"contentborder" => array(
"type" => "chkbox",
"name" => "contentborder",
"size" => "large",
"description" => '<strong>Disable</strong> Main Background<div class="tooltip-info" style="float:right;margin-right:30px"></div><div class="tooltip">Overrides the Main Section Skin Border/Background setting.</div><br class="clear" />'),

"disableheader" => array(
"type" => "chkbox",
"name" => "disableheader",
"size" => "large",
"description" => "<strong>Disable</strong> Header<br />"),

"hidecontent" => array(
"type" => "chkbox",
"name" => "hidecontent",
"size" => "large",
"description" => "<strong>Disable</strong> Main Content<br />"),

"disablefooter" => array(
"type" => "chkbox",
"name" => "disablefooter",
"size" => "large",
"description" => "<strong>Disable</strong> Footer<br /><br />
"),


"author" => array(
"type" => "chkbox",
"name" => "authorname",
"size" => "large",
"description" => "Publish Author Name"),

"postdate" => array(
"type" => "chkbox",
"name" => "postdate",
"size" => "large",
"description" => "Publish Date"),


"textresize" => array(
"type" => "chkbox",
"checked" => "yes",
"name" => "textresize",
"size" => "large",
"description" => "<strong>Enable</strong> Text Resizer",
"closetag" => '</div></div>'),


"customskin" => array(
"opentag" => '<div class="revealbox overflow"><h4 class="revealmeta"><span class="ui-icon"></span>Page Skin</h4><div class="reveal-content"><br />',
"type" => "menu",
"id" => "customskin",
"name" => "customskin",
"title" => "Select Skin Preset",
"size" => "large",
"description" => "Select a Skin Preset for this page.",
"closetag" => '</div></div>'),
);


$meta_post_descriptions = array(  // Page Titles & Descriptions

"posttitle" => array(
"opentag" => '<div class="revealbox overflow"><h4 class="revealmeta"><span class="ui-icon"></span>Post Options</h4><div class="reveal-content"><br />',
"type" => "field",
"name" => "posttitle",
"title" => 'Override Post Title',
"size" => "large"),

"postsubtitle" => array(
"type" => "field",
"name" => "postsubtitle",
"title" => "Post Sub Title",
"size" => "large"),

/*"textresize" => array(
"type" => "chkbox",
"checked" => "yes",
"name" => "textresize",
"size" => "large",
"description" => "<strong>Enable</strong> Text Resizer"),
*/

"hidebreadcrumbs" => array(
"type" => "chkbox",
"name" => "hidebreadcrumbs",
"size" => "large",
"description" => "<strong>Hide</strong> Breadcrumbs <br />"),

"contentborder" => array(
"type" => "chkbox",
"name" => "contentborder",
"size" => "large",
"description" => '<strong>Disable</strong> Main Background<div class="tooltip-info" style="float:right;margin-right:40px"></div><div class="tooltip">Overrides the Main Section Skin Border/Background setting.</div><br class="clear" /><br />'),

"author" => array(
"type" => "chkbox",
"name" => "authorname",
"size" => "large",
"description" => "Publish Author Name",
"closetag" => '</div></div>'),

"customskin" => array(
"opentag" => '<div class="revealbox overflow"><h4 class="revealmeta"><span class="ui-icon"></span>Post Skin</h4><div class="reveal-content"><br />',
"type" => "menu",
"id" => "customskin",
"name" => "customskin",
"title" => "Select Skin Preset",
"size" => "large",
"description" => "Use a Skin Preset for this post.",
"closetag" => '</div></div>')

);

$display_meta_intro = array( // Sidebar(s) Position

"infobar_classes" => array(
"opentag" => '<div class="revealbox overflow"><h4 class="revealmeta"><span class="ui-icon"></span>Header Infobar</h4><div class="reveal-content"><br />',
"type" => "field",
"name" => "infobar_classes",
"title" => '<strong>CSS Classes</strong>',
"size" => "large",
"closetag" => '<div class="clear"></div><br />
<strong>Header Infobar Content</strong><br />
'),

"infobartext" => array(
"type" => "textarea",
"name" => "infobartext",
"id" => "infobartext",
"class" => "xxxlarge",
"closetag" => '</div></div>'),

"intro_classes" => array(
"opentag" => '<div class="revealbox overflow"><h4 class="revealmeta"><span class="ui-icon"></span>Introduction Text</h4><div class="reveal-content"><br />',
"type" => "field",
"name" => "intro_classes",
"title" => '<strong>CSS Classes</strong>',
"size" => "large",
"closetag" => '<div class="clear"></div><br />
<strong>Introduction Content</strong><br />
'),

"introtext" => array(
"type" => "textarea",
"name" => "introtext",
"id" => "introtext",
"class" => "xxxlarge",
"closetag" => '</div></div>'),

"exit_classes" => array(
"opentag" => '<div class="revealbox overflow"><h4 class="revealmeta"><span class="ui-icon"></span>Exit Text</h4><div class="reveal-content"><br />',
"type" => "field",
"name" => "exit_classes",
"title" => '<strong>CSS Classes</strong>',
"size" => "large",
"closetag" => '<div class="clear"></div><br />
<strong>Exit Content</strong><br />
'),

"exittext" => array(
"type" => "textarea",
"name" => "exittext",
"id" => "exittext",
"class" => "xxxlarge",
"closetag" => '</div></div>')

);


$meta_sidebar_layout = array( // Sidebar(s) Position

"layout_one" => array(
"opentag" => '<div style="line-height:30px;" class="revealbox reverse">',
"type" => "radio",
"name" => "layout",
"id" => "layout_one",
"title" => "Full Width",
"image" => "layout_one.png",
"size" => "medium"),

"layout_two" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_two",
"title" => "1x Column (Left) ",
"image" => "layout_two.png",
"size" => "medium"),

"layout_three" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_three",
"title" => "2x Column (Left) ",
"image" => "layout_three.png",
"size" => "medium"),

"layout_four" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_four",
"title" => "1x Column (Right) ",
"image" => "layout_four.png",
"size" => "medium"),


"layout_five" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_five",
"title" => "2x Column (Right) ",
"image" => "layout_five.png",
"size" => "medium"), 

"layout_six" => array(
"type" => "radio",
"name" => "layout",
"id" => "layout_six",
"title" => "2x Column (Left,Right) ",
"image" => "layout_six.png",
"size" => "medium",
"closetag" => "<div class=\"clear\"></div></div>"), 

"sidebar_one" => array(
"opentag" => '<div class="columnone">',
"type" => "menu",
"id" => "columns",
"name" => "sidebar_one",
"title" => "Select <strong>Column 1</strong> Sidebar",
"image" => "Select a sidebar for Column 1.",
"size" => "xlarge",
"closetag" => "</div>"),


"sidebar_one" => array(
"opentag" => '<div class="clear"></div><div class="columnone">',
"type" => "menu",
"id" => "columns",
"name" => "sidebar_one",
"title" => "Select <strong>Column 1</strong> Sidebar",
"image" => "Select a sidebar for Column 1.",
"size" => "xlarge",
"closetag" => "<div class=\"clear\"></div></div>"),


"sidebar_two" => array(
"opentag" => '<div class="columntwo">',
"type" => "menu",
"id" => "columns",
"name" => "sidebar_two",
"title" => "Select <strong>Column 2</strong> Sidebar",
"image" => "Select a sidebar for Column 2.",
"size" => "xlarge",
"closetag" => '<div class="clear"></div></div>'),

);

$meta_sidebar_select = array( // Sidebars Select


);

$meta_sidebar_border = array( // Sidebar Border Configuration

);

$meta_gallery = array( // Gallery Options

"nogallery" => array(
"opentag" => '<div style="line-height:30px;" class="revealbox reverse">',
"type" => "radio",
"name" => "gallery",
"id" => "nogallery",
"title" => "No Gallery",
"description" => "",
"image" => "blank.gif",
"size" => "medium"),

"stageslider" => array(
"type" => "radio",
"name" => "gallery",
"id" => "stageslider",
"title" => "Stage Gallery",
"description" => "",
"image" => "stagegallery.png",
"size" => "medium"),

"islider" => array(
"type" => "radio",
"name" => "gallery",
"id" => "islider",
"title" => "iSlider Gallery",
"description" => "",
"image" => "islidergallery.png",
"size" => "medium"),

"nivo" => array(
"type" => "radio",
"name" => "gallery",
"id" => "nivo",
"title" => "Nivo Gallery",
"description" => "",
"image" => "nivogallery.png",
"size" => "medium"),

"groupslider" => array(
"type" => "radio",
"name" => "gallery",
"id" => "groupslider",
"title" => "Group Slider",
"description" => "",
"image" => "groupgallery.png",
"size" => "medium"),

"gridgallery" => array(
"type" => "radio",
"name" => "gallery",
"id" => "gridgallery",
"title" => "Grid Gallery",
"description" => "",
"image" => "gridgallery.png",
"size" => "medium"),

"gallery3d" => array(
"type" => "radio",
"name" => "gallery",
"id" => "gallery3d",
"title" => "3d Gallery",
"description" => "",
"image" => "3dgallery.png",
"size" => "medium"),

"galleryaccordion" => array(
"type" => "radio",
"name" => "gallery",
"id" => "galleryaccordion",
"title" => "Accordion Gallery",
"description" => "",
"image" => "accordiongallery.png",
"size" => "medium",
"closetag" => "<div class=\"clear\"></div></div>"),


"datasource_selector" => array(
"opentag" => '
<div class="clear"></div><div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Gallery Data Source</h4><div class="reveal-content">
<div class="divborder lite">

<script type="text/javascript" charset="utf8" > // Load Sections
jQuery(document).ready(function() {
	var datasource =jQuery("#datasource_selector").val();
	toggle_shrtcode(datasource,"datasource_selector");
});
</script>

<div id="nodata"></div>',
"type" => "menu",
"id" => "datasource_selector",
"name" => "datasource_selector",
"size" => "large"),

"attachedmedia" => array(
"opentag" => '<div id="data-1" class="datasource">
<strong class="tooltip-next">Post / Page Attached Media</strong><div class="tooltip-info"></div><div class="tooltip">This option uses Media attached to the Page or Post (<em>See documentation for more information</em>). The Page / Post ID can be located within the browser URL when edting a post or page. e.g. http://domain.com/wp-admin/post.php?post=301 <br /><br />
Enter ID of <strong>301</strong></div><br class="clear" />',
"type" => "field",
"name" => "attachedmedia",
"title" => 'Enter Post / Page ID',
"size" => "large",
"class"=> "small",
"closetag" => '</div>'),


"gallerycat" => array(
"opentag" => '<div id="data-2" class="datasource">
<strong>Select Post Categories</strong><br />',
"type" => 'chkbox',
"array" => 'cats',
"id" => 'gallerycat',
"name" => 'gallerycat',
"title" => 'Gallery Category',
"size" => 'medium',
"closetag" => '<br />',
"description" => 'Select the Category to display as a Gallery.'),

"gallerypostformat" => array(
"type" => 'menu',
"id" => 'gallerypostformat',
"name" => 'gallerypostformat',
"title" => '<strong>Display &amp; Filter by Post Format</strong>',
"size" => 'large',
"closetag" => '</div>'),

"gallerymediacat" => array(
"opentag" => '<div id="data-6" class="datasource">
<strong>Select Media Categories</strong><br />',
"type" => 'chkbox',
"array" => 'mediacats',
"id" => 'gallerymediacat',
"name" => 'gallerymediacat',
"title" => 'Gallery Media Category',
"size" => 'medium',
"closetag" => '</div>',
"description" => 'Select the Category to display as a Gallery.'),

"productcat" => $productcats,

"producttag" => $producttags,

"flickrset" => array(
"opentag" => '<div id="data-3" class="datasource">',
"type" => "menu",
"id" => "flickrset",
"name" => "flickrset",
"title" => '<strong>Select a Flickr Set</strong>',
"closetag" => '</div>',
"size" => "large"),

"slidesetselect" => array(
"opentag" => '<div id="data-4" class="datasource">',
"type" => "menu",
"id" => "slidesetselect",
"name" => "slidesetselect",
"title" => '<strong>Select Slide Set ID</strong>',
"size" => "large"),

"slideset" => array(
"type" => "hidden",
"name" => "slideset",
"id" => "slideset",
"class" => "selected_cats",
"closetag" => '</div><div class="clear"></div></div></div></div>'),

"imageeffect" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Image Effects</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'menu',
"id" => 'imageeffect',
"name" => 'imageeffect',
"title" => '<strong class="tooltip-next">Select Effect</strong><div class="tooltip-info"></div><div class="tooltip">Add various effects to your Gallery images - these effects do not apply to the 3d Gallery and the Reflection Effect does not apply to Nivo, iSlider or Accordion Galleries.</div><br class="clear" />',
"size" => 'large'),

"lightbox" => array(
"type" => "chkbox",
"id" => "lightbox",
"name" => "lightbox",
"title" => "<strong>Enable Lightbox</strong>",
"size" => "xxlarge",
"description" => "Enable Lightbox on images, by default the image links to post/url.",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),


"gallerycssclass" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>General Settings (All Galleries)</h4><div class="reveal-content"><div style="line-height:30px;margin-top:10px;" class="divborder ">',
"type" => "field",
"name" => "gallerycssclass",
"title" => '<strong class="tooltip-next">CSS Classes</strong> <div class="tooltip-info"></div><div class="tooltip">Wrap Gallery within CSS classes. Create custom Styles using the additional styles option within the Skin Manager and copy the style name into the box below. e.g. skinset-custom-1.</div>',
"class"=> "medium",
"size" => "medium",
"closetag" => "<div class=\"clear\"></div></div>"),

"imgheight" => array(
"opentag" => '<div style="line-height:30px;margin-top:10px;" class="divborder ">',
"type" => "field",
"name" => "imgheight",
"title" => '<strong class="tooltip-next">Image Height</strong> <div class="tooltip-info"></div><div class="tooltip">Default Image Heights:<br />
<strong>Grid / Group Slider</strong> <em>160</em> <br />
<strong>Stage, 3d, Accordion, iSlider, Nivo</strong> <em>350</em></div><br class="clear" />',
"extras" => "<small class=\"description\">px</small>",
"class"=> "xsmall",
"size" => "medium"),

"imgwidth" => array(
"type" => "field",
"name" => "imgwidth",
"title" => '<strong class="tooltip-next">Image Width</strong> <div class="tooltip-info"></div><div class="tooltip">Default Gallery Widths:<br />
 <strong>Stage, Nivo, 3d</strong> <em>960</em> <br />
<strong>iSlider</strong> <em>768</em> <br />
Grid and Group Slider widths are determined by the number of columns.</div><br class="clear" />',
"extras" => "<small class=\"description\">px</small>",
"size" => "medium",
"class"=> "xsmall"),

"galleryheight" => array(
"type" => "field",
"name" => "galleryheight",
"title" => '<div class="tooltip-next">Group Slider, 3d Gallery, Grid Row <strong>Height</strong></div> <div class="tooltip-info"></div><div class="tooltip">For Group Slider and Grid galleries adjust the height to accommodate text and image content. For 3d Gallery, increase to accomodate larger image heights.<br /><br /> Default Grid Row Height &amp; Group Slider Gallery Heights are set to 435. 3d Gallery is 450. </div><br class="clear" />',
"extras" => '<small class=\"description\">px</small>',
"size" => "xlarge",
"class" =>"xsmall",
"closetag" => "<div class=\"clear\"></div></div>"),

"stagetimeout" => array(
"opentag" => '<div style="line-height:30px;margin-top:10px;" class="divborder">',
"type" => "field",
"name" => "stagetimeout",
"title" => '<strong class="tooltip-next">Slide Timeout</strong><div class="tooltip-info"></div><div class="tooltip">Timeout to next slide - applies to Stage, 3d, Accordion, Group Slider, iSlider, Nivo Galleries. Default is 10.</div><br class="clear" />',
"size" => "medium",
"class" => "xsmall",
"extras" => "<small class=\"description\">seconds</small>"),

"groupgridcontent" => array(
"type" => 'menu',
"id" => 'groupgridcontent',
"name" => 'groupgridcontent',
"title" => '<strong>Group Slider</strong>,<strong>Grid</strong>,<strong>Accordion</strong> Content',
"size" => 'large'),

"stageplaypause" => array(
"type" => "menu",
"id" => "stageplaypause",
"name" => "stageplaypause",
"title" => "<strong>Stage, Nivo Gallery Navigation</strong><br />",
"size" => "xlarge",
"class" => "small",
"extras" => "<small class=\"description\">seconds</small>",
"closetag" => "<div class=\"clear\"></div></div>"),

"gallerynpostexcerpt" => array(
"opentag" => "<div style=\"line-height:30px;\" class=\"divborder lite\">",
"type" => "field",
"name" => "gallerynpostexcerpt",
"class" =>"xsmall",
"title" => '<strong>Exceprt Word Limit</strong> <br />',
"extras" => '<small class="description">(Default 55 words)</small>',
"size" => "large"),

"gallerynumposts" => array(
"type" => "field",
"name" => "gallerynumposts",
"class" =>"xsmall",
"title" => '<strong class="tooltip-next">Limit Number of Posts to Display</strong> <div class="tooltip-info"></div><div class="tooltip">Applies to Posts only and to all Galleries except the Grid Gallery.</div><br class="clear" />',
"size" => "xlarge",
"closetag" => "<div class=\"clear\"></div>"),

"gallerysortby" => array(
"type" => "menu",
"id" => "gallerysortby",
"name" => "gallerysortby",
"title" => "<strong>Sort Posts By</strong> (Optional)",
"size" => "large"),

"galleryorderby" => array(
"type" => "menu",
"id" => "galleryorderby",
"name" => "galleryorderby",
"title" => "<strong>Order Posts By</strong> (Optional)",
"size" => "large",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"accordionautoplay" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Accordion Options</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'menu',
"id" => 'accordionautoplay',
"name" => 'accordionautoplay',
"title" => '<strong>Accordion Auto Rotate</strong>',
"size" => 'xlarge'),

"accordiontitles" => array(
"type" => 'menu',
"id" => 'accordiontitles',
"name" => 'accordiontitles',
"title" => '<strong>Accordion Startup Mini Titles</strong>',
"size" => 'xlarge',
"closetag" => "<div class=\"clear\"></div></div></div></div>"),


"gridcolumns" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Group Slider &amp; Grid Options</h4><div class="reveal-content"><div style="margin-top:10px;line-height:30px;" class="divborder">',
"type" => "menu",
"id" => "gridcolumns",
"name" => "gridcolumns",
"title" => '<strong class="tooltip-next">Grid / Group Slider Columns</strong><div class="tooltip-info"></div><div class="tooltip">Enter the number of Columns you want to display on a single row.</div><br class="clear" />',
"size" => "large",
"class" =>"xsmall"),

"gridshowposts" => array(
"type" => "field",
"name" => "gridshowposts",
"title" => '<strong class="tooltip-next">Grid Gallery Show Posts</strong><div class="tooltip-info"></div><div class="tooltip">Paginate number of Posts per page (6 Default).</div><br class="clear" />',
"size" => "large",
"class" =>"xsmall",
"closetag" => "<div class=\"clear\"></div>"),

"groupsliderpos" => array(
"type" => "menu",
"id" => "groupsliderpos",
"name" => "groupsliderpos",
"title" => "<strong>Group Slider &amp; Grid Position</strong>",
"size" => "large"),

"gridfilter" => array(
"type" => "chkbox",
"name" => "gridfilter",
"checked" => "no",
"title" => '<strong class="tooltip-next">Grid Gallery Category Filtering</strong><div class="tooltip-info"></div><div class="tooltip">Animated Filtering of Posts/Slide Sets by Category. Pagination will be disabled.</div><br class="clear" />',
"size" => "large",
"description" => "Enable Category Filtering",
"closetag" => "<div class=\"clear\"></div></div>"),

"sliderimagealign" => array(
"opentag" => '<div style="line-height:30px;" class="divborder lite">',
"type" => 'menu',
"id" => 'sliderimagealign',
"name" => 'sliderimagealign',
"title" => '<strong>Group Slider Image Alignment</strong>',
"size" => 'xlarge'),

"sliderlayout" => array(
"type" => 'menu',
"id" => 'sliderlayout',
"name" => 'sliderlayout',
"title" => '<strong>Group Slider Layout Format</strong>',
"size" => 'xlarge',
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"nivoeffect" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Nivo Options</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'menu',
"id" => 'nivoeffect',
"name" => 'nivoeffect',
"title" => '<strong>Nivo Transition Effect</strong>',
"size" => 'xlarge',
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"stagetransition" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Stage Options</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'menu',
"id" => 'stagetransition',
"name" => 'stagetransition',
"title" => '<strong>Slide Transition</strong>',
"size" => 'xlarge'),

"stagetween" => array(
"type" => 'menu',
"id" => 'stagetween',
"name" => 'stagetween',
"title" => '<strong>Slide Animation Tweening</strong>',
"size" => 'xlarge',
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"gallery3dsegments" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>3d Options</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'field',
"name" => 'gallery3dsegments',
"title" => 'Pieces<br /><small class="description">(Default 15)</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtween" => array(
"type" => 'menu',
"id" => 'gallery3dtween',
"name" => 'gallery3dtween',
"title" => 'Transition <br /><small class="description">(Optional)</small>',
"size" => 'large'),


"gallery3dtweentime" => array(
"type" => 'field',
"name" => 'gallery3dtweentime',
"title" => 'Transition Time<br /><small class="description">(Default 1.2)</small>',
"extras" => '<small class="description">seconds</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtweendelay" => array(
"type" => 'field',
"name" => 'gallery3dtweendelay',
"title" => 'Delay<br /><small class="description">(Default 0.1)</small>',
"extras" => '<small class="description">seconds</small>',
"class" => 'xsmall',
"size" => 'medium',
),

"gallery3dzdistance" => array(
"type" => 'field',
"name" => 'gallery3dzdistance',
"title" => 'Depth Offset<br /><small class="description">(-200 to 700)</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dexpand" => array(
"type" => 'field',
"name" => 'gallery3dexpand',
"title" => 'Cube Distance<br /><small class="description">(Default 20)</small>',
"class" => 'xsmall',
"size" => 'medium',
"closetag" => '<div class="clear"></div></div>'),

"gallery3dxpos" => array(
"opentag" => '<div style="line-height:30px;" class="divborder lite">',
"type" => 'field',
"name" => 'gallery3dxpos',
"title" => 'Controls X Postion<br /><small class="description">(Default 470)</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dypos" => array(
"type" => 'field',
"name" => 'gallery3dypos',
"title" => 'Controls Y Postion<br /><small class="description">(Default 280)</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtextcolor" => array(
"type" => 'field',
"name" => 'gallery3dtextcolor',
"title" => 'Text Background Color<br /><small class="description">(Default 111111)</small>',
"extras" => '<span class="color_icon">&nbsp;</span>',
"size" => 'large'),

"gallery3dincolor" => array(
"type" => 'field',
"name" => 'gallery3dincolor',
"title" => 'Text Color<br /><small class="description">(Default 111111)</small>',
"extras" => '<span class="color_icon">&nbsp;</span>',
"size" => 'large',
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

);

$meta_social = array( // Social Options

"twitter" => array(
"type" => "menu",
"id" => "twitter",
"name" => "twitter",
"title" => "Enable Twitter",
"size" => "large",
"description" => "Select where to place twitter feed."),

"socialicons" => array(
"type" => "chkbox",
"name" => "socialicons",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Enable</strong> Social Icons"),

"socialdigg" => array(
"type" => "chkbox",
"name" => "socialdigg",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Digg"),

"socialfb" => array(
"type" => "chkbox",
"name" => "socialfb",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Facebook"),

"sociallinkedin" => array(
"type" => "chkbox",
"name" => "sociallinkedin",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> LinkedIn"),

"socialdeli" => array(
"type" => "chkbox",
"name" => "socialdeli",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Delicious"),

"socialreddit" => array(
"type" => "chkbox",
"name" => "socialreddit",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Reddit"),

"socialstumble" => array(
"type" => "chkbox",
"name" => "socialstumble",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Stumble Upon"),

"socialtwitter" => array(
"type" => "chkbox",
"name" => "socialtwitter",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Twitter"),

"socialgoogle" => array(
"type" => "chkbox",
"name" => "socialgoogle",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Google Plus"),

"socialrss" => array(
"type" => "chkbox",
"name" => "socialrss",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> RSS"),

"socialyoutube" => array(
"type" => "chkbox",
"name" => "socialyoutube",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> YouTube"),

"socialvimeo" => array(
"type" => "chkbox",
"name" => "socialvimeo",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Vimeo"),

"socialpinterest" => array(
"type" => "chkbox",
"name" => "socialpinterest",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Pinterest"),

"socialinstagram" => array(
"type" => "chkbox",
"name" => "socialinstagram",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Instagram"),

"socialsoundcloud" => array(
"type" => "chkbox",
"name" => "socialsoundcloud",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Soundcloud"),

"socialemail" => array(
"type" => "chkbox",
"name" => "socialemail",
"checked" => "yes",
"size" => "large",
"description" => "<strong>Disable</strong> Email"),

"disableheart" => array(
"type" => "chkbox",
"name" => "disableheart",
"checked" => "no",
"size" => "large",
"description" => "<strong>Disable</strong> Share Icon <br /><small class=\"description\">(Individual Icons will be displayed instead)</small>"),

);

$meta_archive_cats = array( // Social Options
"archivecat" => array(
"opentag" => "<em><strong>Select Categories for Blog Template.</strong></em><br /><br /><small class=\"description\">Select \"Blog\" from \"Template\" under \"Page Attributes\" Meta Box.</small><br /><br /><div>",
"type" => "chkbox",
"array" => "cats",
"id" => "archivecat",
"name" => "archivecat",
"title" => "Select Blog Category",
"size" => "medium",
"closetag" => "</div>"),
);


$meta_post_gallery = array( // Post Gallery Options

"gallerytext" => array(
"opentag" => 'Please see documentation for help with Gallery Options.<br /><br /><div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Image / Media Source</h4><div class="reveal-content"><br /><div style="padding-top:10px;" class="divborder">',
"type" => "text",
"title" => "URL of Video File",
"extras" => "<div style=\"padding-top:4px;\"><a style=\"margin-left:15px;\" class=\"button\" href=\"media-upload.php?post_id=298&amp;type=image&amp;TB_iframe=true\" id=\"add_image\" class=\"thickbox\" title=\"Add a Video\" onclick=\"return false;\">Get Video</a></div>",
"description" => ""),


"cleargalone" => array(
"type" => "clear"),


"previewimgurl" => array(
"type" => "field",
"name" => "previewimgurl",
"title" => '<strong class="tooltip-next">URL of Image File</strong> <div class="tooltip-info"></div><div class="tooltip">Leave blank if you wish to use the first image in the post as the gallery image.</div><br class="clear" />',
"class" => "large floatleft",
"extras" => '<div style="padding-top:4px;">
<a href="'. site_url() .'/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="previewimgurl" class="thickbox button custom_media_uploader" title="Add an Image" style="margin-left:15px;">Upload / Insert</a></div><div class="clear"></div>',
"size" => "xxlarge"),

"movieurl" => array(
"type" => "field",
"name" => "movieurl",
"title" => '<strong class="tooltip-next">URL of Video / Media File</strong> <div class="tooltip-info"></div><div class="tooltip">If you wish to embed a video or display alternative media within a lightbox, enter the URL of the file here ( A "URL of Image" or set a <em>featured image</em> is required as a cover image. )</div><br class="clear" />',
"class" => "large floatleft",
"extras" => '<div style="padding-top:4px;">
<a href="'. site_url() .'/wp-admin/media-upload.php?TB_iframe=1" media-upload-link="movieurl" class="thickbox button custom_media_uploader" title="Add a Video" style="margin-left:15px;">Upload / Insert</a></div><div class="clear"></div>',
"size" => "xxlarge",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"cleargalthree" => array(
"type" => "clear"),

"videotype" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Embed Media / Timeout Options</h4><div class="reveal-content"><br /><div style="padding-top:10px;" class="divborder">',
"type" => "menu",
"id" => "videotype",
"name" => "videotype",
"class" => "medium",
"title" => '<strong class="tooltip-next">Embed Media Type</strong> <div class="tooltip-info"></div><div class="tooltip">Enter the URL in URL of Media File and select type here.</div><br class="clear" />',
"size" => "large"),

"videoratio" => array(
"type" => "menu",
"id" => "videoratio",
"name" => "videoratio",
"class" => "medium",
"title" => '<strong class="tooltip-next">Video Ratio</strong> <div class="tooltip-info"></div><div class="tooltip">Change the Ratio to match your video.</div><br class="clear" />',
"size" => "large"),


"videoautoplay" => array(
"type" => "chkbox",
"name" => "videoautoplay",
"title" => '<strong class="tooltip-next">AutoPlay Media</strong> <div class="tooltip-info"></div><div class="tooltip">Autoplay media when gallery slide becomes visible.</div><br class="clear" />',
"size" => "large"),


"slidetimeout" => array(
"type" => "field",
"name" => "slidetimeout",
"title" => '<strong class="tooltip-next">Gallery Slide Timeout</strong> <div class="tooltip-info"></div><div class="tooltip">Enter the amount of time this slide is visible. e.g. video length</div><br class="clear" />',
"size" => "large",
"class" => "xsmall",
"extras" => "<small class=\"description\">seconds</small>",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"postshowimage" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Additional Settings</h4><div class="reveal-content"><br /><div style="padding-top:10px;" class="divborder">',
"type" => "menu",
"id" => "postshowimage",
"name" => "postshowimage",
"title" => '<strong class="tooltip-next">Show Image in Post/Archive</strong> <div class="tooltip-info"></div><div class="tooltip">Override default setting in <a href="admin.php?page=blog">Blog Options</a></div><br class="clear" />',
"size" => "large"),


"cssclasses" => array(
"type" => "field",
"name" => "cssclasses",
"class" => "medium",
"title" => "CSS Classes",
"title" => '<strong class="tooltip-next">CSS Classes</strong> <div class="tooltip-info"></div><div class="tooltip">Add CSS class if you wish to customise this particular slide. Separate the CSS names by spaces.</div><br class="clear" />',
"closetag" => "<div class=\"clear\"></div></div>"),

"galexturl" => array(
"opentag" => "<div style=\"padding-top:10px;padding-bottom:10px;\" class=\"divborder lite\">",
"type" => "field",
"name" => "galexturl",
"class" => "medium",
"title" => '<strong class="tooltip-next">Link Post to alternative URL</strong> <div class="tooltip-info"></div><div class="tooltip">Link to a page instead of this post or external site.</div><br class="clear" />',
"size" => "large"),

"disablegallink" => array(
"type" => "chkbox",
"name" => "disablegallink",
"title" => '<strong class="tooltip-next">Disable Post Link</strong> <div class="tooltip-info"></div><div class="tooltip">Disables link to Post and external URL\'s.</div><br class="clear" />',
"size" => "large"),

"disablereadmore" => array(
"type" => "chkbox",
"name" => "disablereadmore",
"title" => '<strong class="tooltip-next">Disable Read More Only</strong> <div class="tooltip-info"></div><div class="tooltip">Disables Read More Text.</div><br class="clear" />',
"size" => "large"),

"imgzoomcrop" => array(
"opentag" => '<div class="clear"></div>',
"type" => "menu",
"id" => "imgzoomcrop",
"name" => "imgzoomcrop",
"title" => '<strong class="tooltip-next">Image Crop Settings</strong> <div class="tooltip-info"></div><div class="tooltip">Default is Crop, If the image is disproportionate to the gallery, select Zoom.</div><br class="clear" />',
"size" => "large",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"stagegallery" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>Stage Gallery Options</h4><div class="reveal-content"><br /><div style="padding-top:10px;" class="divborder">',
"type" => "menu",
"id" => "stagegallery",
"name" => "stagegallery",
"title" => '<strong>Gallery Image Content</strong>',
"size" => "large"),

"displaytitle" => array(
"type" => "menu",
"id" => "displaytitle",
"name" => "displaytitle",
"title" => '<strong class="tooltip-next">Display Post Title on Image</strong> <div class="tooltip-info"></div><div class="tooltip">Displays title and sub title on top of gallery image.</div><br class="clear" />',
"size" => "large",
"closetag" => "<div class=\"clear\"></div></div></div></div>"),

"gallery3dsegments" => array(
"opentag" => '<div class="revealbox"><h4 class="revealmeta"><span class="ui-icon"></span>3d Gallery Options</h4><div class="reveal-content"><div style="line-height:30px;" class="divborder lite">',
"type" => 'field',
"name" => 'gallery3dsegments',
"title" => '<strong class="tooltip-next">Pieces</strong> <div class="tooltip-info"></div><div class="tooltip">(Default 15)</div><br class="clear" />',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtween" => array(
"type" => 'menu',
"id" => 'gallery3dtween',
"name" => 'gallery3dtween',
"title" => '<strong class="tooltip-next">Transition</strong> <div class="tooltip-info"></div><div class="tooltip">(Optional)</div><br class="clear" />',
"size" => 'large'),


"gallery3dtweentime" => array(
"type" => 'field',
"name" => 'gallery3dtweentime',
"title" => '<strong class="tooltip-next">Transition Time</strong> <div class="tooltip-info"></div><div class="tooltip">(Default 1.2)</div><br class="clear" />',
"extras" => '<small class="description">seconds</small>',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dtweendelay" => array(
"type" => 'field',
"name" => 'gallery3dtweendelay',
"title" => '<strong class="tooltip-next">Delay</strong> <div class="tooltip-info"></div><div class="tooltip">(Default 0.1)</div><br class="clear" />',
"extras" => '<small class="description">seconds</small>',
"class" => 'xsmall',
"size" => 'medium',
),

"gallery3dzdistance" => array(
"type" => 'field',
"name" => 'gallery3dzdistance',
"title" => '<strong class="tooltip-next">Depth Offset</strong> <div class="tooltip-info"></div><div class="tooltip">(-200 to 700)</div><br class="clear" />',
"class" => 'xsmall',
"size" => 'medium'),

"gallery3dexpand" => array(
"type" => 'field',
"name" => 'gallery3dexpand',
"title" => '<strong class="tooltip-next">Cube Distance</strong> <div class="tooltip-info"></div><div class="tooltip">(Default 20)</div><br class="clear" />',
"class" => 'xsmall',
"size" => 'medium',
"closetag" => '<div class="clear"></div></div></div></div>'),




);


/***************************************************************/
/*	Generate Custom Fields *END*	  						  */
/***************************************************************/


/***************************************************************/
/*	Generate META boxes				  						  */
/***************************************************************/

function create_meta_box() {
global $pgopts;

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-description', 'Page Content Configuration', 'display_meta_descriptions', 'page', 'side', 'high' );
add_meta_box( 'new-meta-post-description', 'Post Content Configuration', 'display_meta_post_descriptions', 'post', 'side', 'high' );
add_meta_box( 'new-meta-intro', 'Custom Areas', 'display_meta_intro', 'page', 'normal', 'high' );
add_meta_box( 'new-meta-layout', 'Page Layout Configuration', 'display_meta_layout', 'page', 'normal', 'high' );
add_meta_box( 'new-meta-post-layout', 'Page Layout Configuration', 'display_meta_layout', 'post', 'normal', 'high' );

/*if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-select', 'Column Configuration', 'display_meta_select', 'page', 'normal', 'high' );
}

if( function_exists( 'add_meta_box' ) ) {
add_meta_box( 'new-meta-post-select', 'Column Configuration', 'display_meta_select', 'post', 'normal', 'high' );
}*/

add_meta_box( 'new-meta-gallery', 'Add Page Gallery', 'display_meta_gallery', 'page', 'normal', 'high' );
add_meta_box( 'new-meta-social', 'Social Options', 'display_meta_social', 'page', 'side', 'low' );
add_meta_box( 'new-meta-social', 'Social Options', 'display_meta_social', 'post', 'side', 'low' );
add_meta_box( 'new-meta-archive', 'Blog Categories', 'display_meta_archive', 'page', 'side', 'low' );
add_meta_box( 'post-gallery-options', 'Post Image / Gallery Options', 'display_meta_post_gallery', 'post', 'normal', 'high' );
add_meta_box( 'post-gallery-options', 'Post Image / Gallery Options', 'display_meta_post_gallery', 'portfolio', 'normal', 'high' );
}

}

function display_meta_descriptions() {
global $post, $meta_descriptions, $pgopts, $num_sidebars;
?>

<div class="form-wrap">
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_descriptions as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 

function display_meta_post_descriptions() {
global $post, $meta_post_descriptions, $pgopts, $num_sidebars;

?>

<div class="form-wrap">
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_post_descriptions as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
     
</div>
<div class="clear"></div>

<?php } 



function display_meta_layout() {
global $post, $meta_sidebar_layout, $pgopts, $num_sidebars;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_sidebar_layout as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 

function display_meta_intro() {
global $post, $display_meta_intro, $pgopts;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach( $display_meta_intro as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 


/*function display_meta_select() {
global $post, $meta_sidebar_select,$meta_sidebar_border, $pgopts, $num_sidebars;
?>

<div class="form-wrap">
    <p>Select a sidebar for the relevant column (See <strong>Layout Configuration</strong> above). Sidebars are configured under <strong>Widgets</strong>. Also select the border configuration for both Sidebars.</p><br />

    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_sidebar_select as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?> 
     <div class="clear"></div>  
     
     <?php 
      foreach($meta_sidebar_border as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?>  
     
     <div class="clear"></div>
     
     <p><strong>Note! </strong>If a single Sidebar layout option is selected in the <strong>Layout Configuration</strong>, the "Column 2 Sidebar" option is ignored.</p>
</div>
<div class="clear"></div>

<?php }*/


function display_meta_gallery() {
global $post, $meta_gallery, $pgopts;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_gallery as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 


function display_meta_social() {
global $post, $meta_social, $pgopts;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_social as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 


function display_meta_archive() {
global $post, $meta_archive_cats, $pgopts;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_archive_cats as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 


function display_meta_post_gallery() {
global $post, $meta_post_gallery, $pgopts;
?>

<div class="form-wrap">
    
    <?php wp_nonce_field( plugin_basename( __FILE__ ), $pgopts . '_wpnonce', false, true );
    
      foreach($meta_post_gallery as $meta_box) {
      $data = maybe_unserialize(get_post_meta($post->ID, $pgopts, true));
        
		  require NV_FILES . '/adm/inc/meta_config.php';
        
     } ?>    
</div>
<div class="clear"></div>

<?php } 


function save_options( $post_id ) {
global $post, $meta_descriptions, $meta_post_descriptions, $meta_sidebar_layout, $meta_sidebar_select,$display_meta_intro, $meta_sidebar_border, $meta_gallery, $meta_archive_cats, $meta_social, $meta_post_gallery,  $pgopts;



foreach( $meta_descriptions as $meta_box ) {

if(isset($meta_box[ 'name' ])) $meta_name = $meta_box[ 'name' ]; else $meta_name ='';
if(isset($_POST[ $meta_name ])) $data[ $meta_name ] = $_POST[ $meta_name ];

}

foreach( $meta_post_descriptions as $meta_box ) {
	
if(isset($meta_box[ 'name' ])) $meta_name = $meta_box[ 'name' ]; else $meta_name ='';
if(isset($_POST[ $meta_name ])) $data[ $meta_name ] = $_POST[ $meta_name ];

}

foreach( $meta_sidebar_layout as $meta_box ) {

if(isset($meta_box[ 'name' ])) $meta_name = $meta_box[ 'name' ]; else $meta_name ='';
if(isset($_POST[ $meta_name ])) $data[ $meta_name ] = $_POST[ $meta_name ];

}

/*foreach( $meta_sidebar_select as $meta_box ) {
$data[ $meta_box[ 'name' ] ] = $_POST[ $meta_box[ 'name' ] ];
}*/


foreach( $display_meta_intro as $meta_box ) {

if(isset($meta_box[ 'name' ])) $meta_name = $meta_box[ 'name' ]; else $meta_name ='';
if(isset($_POST[ $meta_name ])) $data[ $meta_name ] = $_POST[ $meta_name ];

}


foreach( $meta_gallery as $meta_box ) {

if(isset($meta_box[ 'name' ])) $meta_name = $meta_box[ 'name' ]; else $meta_name ='';
if(isset($_POST[ $meta_name ])) $data[ $meta_name ] = $_POST[ $meta_name ];

}

foreach( $meta_archive_cats as $meta_box ) {
	
if(isset($meta_box[ 'name' ])) $meta_name = $meta_box[ 'name' ]; else $meta_name ='';
if(isset($_POST[ $meta_name ])) $data[ $meta_name ] = $_POST[ $meta_name ];

}

foreach( $meta_social as $meta_box ) {
	
if(isset($meta_box[ 'name' ])) $meta_name = $meta_box[ 'name' ]; else $meta_name ='';
if(isset($_POST[ $meta_name ])) $data[ $meta_name ] = $_POST[ $meta_name ];

}

foreach( $meta_post_gallery as $meta_box ) {
	
if(isset($meta_box[ 'name' ])) $meta_name = $meta_box[ 'name' ]; else $meta_name ='';
if(isset($_POST[ $meta_name ])) $data[ $meta_name ] = $_POST[ $meta_name ];

}

if ( !wp_verify_nonce( $_POST[ $pgopts . '_wpnonce' ], plugin_basename(__FILE__) ) )
return $post_id;

if ( !current_user_can( 'edit_post', $post_id ))
return $post_id;

update_post_meta( $post_id, $pgopts, $data );

$postopts = "Order";

if(isset($_POST["orderbynum"])) $postorder = $_POST["orderbynum"];

if(empty($postorder)) $postorder='';

update_post_meta( $post_id, $postopts, $postorder );

}

/***************************************************************/
/*	Generate META boxes				  						  */
/***************************************************************/