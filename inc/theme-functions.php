<?php


// remove the p from around imgs (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bkb_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter( 'the_content', 'bkb_filter_ptags_on_images' );

// This removes the annoying […] to a Read More link
function bkb_excerpt_more($more) {
	global $post;
	// edit here if you like
	return '...  <a class="excerpt-read-more" href="'. get_permalink( $post->ID ) . '" title="Read ' . esc_attr( get_the_title( $post->ID ) ).'">Read more &raquo;</a>';
}
add_filter( 'excerpt_more', 'bkb_excerpt_more' );



/**
 * Roll you own SVG sprite icon system
 *
 * @param  $icon_name   string after 'icon-'' in icomoon
 * @return string       SVG use call to svg sprite in /svg/
 */
function get_bkb_icon($icon_name) {

  return '<svg class="icon icon-' . $icon_name .'"><use xlink:href="'.  get_stylesheet_directory() .'/svg/sprite.svg#icon-' . $icon_name .'"></use></svg>';
}


/**
 * Echo version of get_bkb_icon
 * @param  $icon_name    string after 'icon-'' in icomoon
 */
function the_bkb_icon($icon_name){
  echo get_bkb_icon($icon_name);
}

// add ie conditional html5 shim to header (uncomment add_action if needed)
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
    echo '<![endif]-->';
}
// add_action('wp_head', 'add_ie_html5_shim');


/**
 * Prevent the dreaded attachment page link by default.  Only useful for photographers.
 * In addition, Yoast SEO will redirect attachment page to file. That should wrap it up.
 */
update_option( 'image_default_link_type', 'none' )

?>
