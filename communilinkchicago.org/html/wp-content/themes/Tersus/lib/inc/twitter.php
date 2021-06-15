<?php

/* ------------------------------------
:: TWITTER FEED CYCLE
------------------------------------*/

	wp_deregister_script('jquery-cycle');
	wp_register_script('jquery-cycle',get_template_directory_uri().'/js/jquery.cycle.plugin.min.js',false,array('jquery'));
	wp_enqueue_script('jquery-cycle'); 

	$twitter_user = ( !get_option("twitter_usrname") ? '' : get_option("twitter_usrname") );
	$tweet_count  = ( !get_option("twitter_feednum") ? 5 : get_option("twitter_feednum") );
	
	$twitter_array = array(
		'twitter_user' => $twitter_user,
		'tweet_count'  => $twitter_count
	);
	
	wp_deregister_script('twitter-feed');	
	wp_register_script('twitter-feed',get_template_directory_uri().'/js/twitter.feed.min.js',false,array('jquery'));
	wp_localize_script('twitter-feed', 'TWITTERFC', $twitter_array );
	wp_enqueue_script('twitter-feed');
	
?>

    <div class="tweets">
        <div class="tweettitle"><span class="twitterfollow nvcolor-wrap"><a href="http://www.twitter.com/<?php echo TWITTERUSR; ?>"><span class="nvcolor"></span><div class="social-twitter"></div></a></span></div>
        <div id="tweet_quote_wrapper">
            <div id="tweet_container"></div>
        </div>
        <br class="clear" />
    </div>