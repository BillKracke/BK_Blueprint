<?php

// Set a more robust Contenet Width -- uses constant defined in functions.php
function bkb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bkb_content_width', CONTENT_WIDTH);
}
add_action( 'after_setup_theme', 'bkb_content_width', 0 );

// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bkb_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter( 'the_content', 'bkb_filter_ptags_on_images' );

/**
 * Prevent the dreaded attachment page link by default.  Only useful for photographers.
 * In addition, Yoast SEO will redirect attachment page to file. That should wrap it up.
 */
update_option( 'image_default_link_type', 'none' );


