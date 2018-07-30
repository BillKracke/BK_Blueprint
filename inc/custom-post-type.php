<?php 

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bkb_flush_rewrite_rules' );

// Flush your rewrite rules
function bkb_flush_rewrite_rules() {
	flush_rewrite_rules();
}

/*** ADD CODE TO ADD CUSTOM POST TYPE BELOW ***/
