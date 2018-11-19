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

/* Custom SVG Icon Library Solution */
require get_template_directory() . '/inc/svg-icons.php';

/* Support for ancient browsers, if needed  lt IE9 */
// require get_template_directory() . '/inc/ancient-support.php';


/******** IMAGE SIZES ********/

// add_image_size( 'slug', 600, 400, true );

function bkb_custom_image_sizes( $sizes ) {
   return array_merge( $sizes, array(
       'slug' => __('600px by 400px')
   ) );
}
//add_filter( 'image_size_names_choose', 'bkb_custom_image_sizes' );


/******** THEME SPECIFIC SUPPORTS ********/

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
    // add_theme_support( 'post-formats' , array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );
  }
endif;
add_action( 'after_setup_theme', 'bkb_setup' );


/******** NAVIGATION ********/

function bkb_register_nav() {

	register_nav_menus( array(
		'primary' => 'Primary',
	) );
}
add_action('after_setup_theme', 'bkb_register_nav' );


/******** WIDGET AREAS ********/
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
 * Enqueue scripts and styles.
 */
function bkb_scripts_and_styles() {
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), null );

	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/js/theme-min.js', array('jquery'), null , true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bkb_scripts_and_styles' );


function bkb_admin_scripts() {
    wp_enqueue_script( 'admin-js', get_stylesheet_directory_uri() . '/js/admin-min.js', array(), '170201', true );
}
add_action( 'admin_enqueue_scripts', 'bkb_admin_scripts' );


