<?php
/*
Plugin Name: wp-latestpost-short
Plugin URI: https://github.com/benjick/wp-latestpost-short
Description: Adds the shorttag [latest_post]
Version: 0.1
Author: Max Malm
Author URI: http://benjick.se
*/


function latest_post_func() {
	query_posts('showposts=1');
	while (have_posts()){
		the_post();
		$content .= "<p class='title'><a href='" . get_permalink() . "'>" . get_the_title() . "</a></p>\n" .
				"<p class='content'>" . get_the_content() . "</p>";
	}
	wp_reset_query();
	
	if(isset($content)) {
		return "<div class='latest'>\n$content\n</div>";
	}
	else {
		return "<div class='latest'>No latest post found</div>\n";
	}
}

add_shortcode('latest_post', 'latest_post_func');
?>