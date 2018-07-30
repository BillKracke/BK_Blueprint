<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package bk_blueprint
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bkb_body_classes( $classes ) {
	global $post;
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

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
add_filter( 'body_class', 'bkb_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bkb_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', bloginfo( 'pingback_url' ), '">';
	}
}
add_action( 'wp_head', 'bkb_pingback_header' );
