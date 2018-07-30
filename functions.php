<?php
/**
 * Functions and definitions.
 *
 * @package bk_blueprint
 */


/******** CONSTANTS ********/
// set up some constants here for easy customization without hunting down functions

define('CONTENT_WIDTH', 800);


/******** LINE EM UP ********/

/* Cleanup*/
require get_template_directory() . '/inc/cleanup.php';

/* WordPress default tweaks */
require get_template_directory() . '/inc/tweaks.php';

/* Support for ancient browsers, if needed */
// require get_template_directory() . '/inc/ancient-support.php';



/* Custom SVG Icon Library Solution */
require get_template_directory() . '/inc/svg-icons.php';






 /* Queue up custom functions */
 require get_template_directory() . '/inc/theme-functions.php';


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Handy, but almost everything is responsive / limited to max-width:100%
 *
 * Priority 0 to make it available to lower priority callbacks.
 */




if ( ! function_exists( 'bkb_setup' ) ) :

  function bkb_setup() {

  	add_editor_style();


    // THEME SUPPORT
  	add_theme_support( 'automatic-feed-links' );
  	add_theme_support( 'title-tag' );
  	add_theme_support( 'post-thumbnails' );
  	add_theme_support( 'html5', array(
  		'search-form',
  		'comment-form',
  		'comment-list',
  		'gallery',
  		'caption',
  	) );

  	add_theme_support( 'customize-selective-refresh-widgets' );

    /* Uncomment for POST FORMATS -- for God's sake, don't use all of them */
    // add_theme_support( 'post-formats' , array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') )





  }
endif;
add_action( 'after_setup_theme', 'bkb_setup' );



/**
 * Register Nav
 */

function bkb_register_nav() {
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', '_s' ),
	) );
}
add_action('after_setup_theme', 'bkb_register_nav' );


/**
 * Register widget areas
 */
function bkb_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar-1',
		'description'   => 'Add widgets here.',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bkb_widgets_init' );


/**
 * Image Sizes
 */
add_image_size( 'slug', 600, 400, true );

/**
 * To make image sizes available in media library
 * Uncomment add_filter below
 */
function bkb_custom_image_sizes( $sizes ) {
   return array_merge( $sizes, array(
       'slug' => __('600px by 400px')
   ) );
}
//add_filter( 'image_size_names_choose', 'bkb_custom_image_sizes' );




/**
 * Enqueue scripts and styles.
 */
function bkb_scripts_and_styles() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), '170201' );

	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/js/theme-min.js', array(), '170201', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bkb_scripts_and_styles' );


function bkb_admin_scripts() {
    wp_enqueue_script( 'admin-js', get_stylesheet_directory_uri() . '/js/admin-min.js', array(), '170201', true );

}

add_action( 'admin_enqueue_scripts', 'bkb_admin_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
