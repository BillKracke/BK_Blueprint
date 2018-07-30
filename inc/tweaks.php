<?php

add_action( 'after_setup_theme', 'bkb_content_width', 0 );
add_filter( 'the_content', 'bkb_filter_ptags_on_images' );
// add_filter( 'excerpt_more', 'bkb_excerpt_more' );
add_filter( 'body_class', 'bkb_body_classes' );

/**
 * Prevent the dreaded attachment page link by default.  Only useful for photographers.
 * In addition, Yoast SEO will redirect attachment page to file. That should wrap it up.
 */
update_option( 'image_default_link_type', 'none' );





// Set a more robust Contenet Width -- uses constant defined in functions.php
function bkb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bkb_content_width', CONTENT_WIDTH);
}


// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bkb_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

// This removes the annoying […] to a Read More link
function bkb_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="Read ' . esc_attr( get_the_title( $post->ID ) ).'">Read more &raquo;</a>';
}


function bkb_body_classes( $classes ) {
    global $post;
    
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

  // Adds page-slug to pages
	if ( is_page() ) {
		$classes[] = 'page-' . $post->post_name;
	}

  // add class if sidebar
	if (is_active_sidebar('sidebar')) {
    // add 'class-name' to the $classes array
    $classes[] = 'has_sidebar';
  }

	return $classes;
}


