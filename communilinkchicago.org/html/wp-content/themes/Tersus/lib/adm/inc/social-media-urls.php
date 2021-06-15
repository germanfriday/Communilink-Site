<?php
/*	Get Social Media Links	*/
if(get_option('sociallink_digg')) {
$sociallink_digg = get_option('sociallink_digg');	
} else {
$sociallink_digg = 'http://www.digg.com/submit?phase=2&amp;url=[get_permalink]&amp;title=[get_the_title]';	
}

if(get_option('sociallink_fb')) {
$sociallink_fb = get_option('sociallink_fb');	
} else {
$sociallink_fb = 'http://www.facebook.com/sharer.php?u=[get_permalink]&amp;t=[get_the_title]';	
}

if(get_option('sociallink_linkedin')) {
$sociallink_linkedin = get_option('sociallink_linkedin');	
} else {
$sociallink_linkedin = 'http://www.linkedin.com/shareArticle?mini=true&amp;url=&amp;title=[get_the_title]&amp;source=[get_blogurl]';	
}

if(get_option('sociallink_deli')) {
$sociallink_deli = get_option('sociallink_deli');	
} else {
$sociallink_deli = 'http://del.icio.us/post?url=[get_permalink]&amp;title=[get_the_title]';	
}

if(get_option('sociallink_reddit')) {
$sociallink_reddit = get_option('sociallink_reddit');	
} else {
$sociallink_reddit = 'http://www.reddit.com/submit?url=[get_permalink]';	
}

if(get_option('sociallink_stumble')) {
$sociallink_stumble = get_option('sociallink_stumble');	
} else {
$sociallink_stumble = 'http://www.stumbleupon.com/submit?url=[get_permalink]&amp;title=[get_the_title]';	
}

if(get_option('sociallink_twitter')) {
$sociallink_twitter = get_option('sociallink_twitter');	
} else {
$sociallink_twitter = 'http://twitter.com/share?text=[get_the_title]&amp;url=[get_permalink]';	
}

if(get_option('sociallink_google')) {
$sociallink_google = get_option('sociallink_google');	
} else {
$sociallink_google = 'https://m.google.com/app/plus/x/?v=compose&content=[get_the_title] - [get_permalink]';	
}


if(get_option('sociallink_rss')) {
$sociallink_rss = get_option('sociallink_rss');	
} else {
$sociallink_rss = '[get_permalink]feed/rss/';	
}

if(get_option('sociallink_youtube')) {
$sociallink_youtube = get_option('sociallink_youtube');	
} else {
$sociallink_youtube = 'http://www.youtube.com/user/';	
}

if(get_option('sociallink_vimeo')) {
$sociallink_vimeo = get_option('sociallink_vimeo');	
} else {
$sociallink_vimeo = 'http://vimeo.com/';	
}

if(get_option('sociallink_pinterest')) {
$sociallink_pinterest = get_option('sociallink_pinterest');	
} else {
$sociallink_pinterest = 'http://pinterest.com/';	
}

if(get_option('sociallink_email')) {
$sociallink_email = get_option('sociallink_email');	
} else {
$sociallink_email = 'mailto:example@email.com';	
}

if(get_option('sociallink_soundcloud')) {
$sociallink_soundcloud = get_option('sociallink_soundcloud');	
} else {
$sociallink_soundcloud = 'http://soundcloud.com';	
}

if(get_option('sociallink_instagram')) {
$sociallink_instagram = get_option('sociallink_instagram');	
} else {
$sociallink_instagram = 'http://instagram.com';	
}