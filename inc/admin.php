<?php

// Remove Dashboard Widgets
function bkb_remove_dashboard_widgets() {
    global $wp_meta_boxes;
 
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    // unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    // unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
 
} 
add_action('wp_dashboard_setup', 'bkb_remove_dashboard_widgets' );

// Add a custom widget
function bkb_custom_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'bkb_custom_dashboard_help');
    }
function bkb_custom_dashboard_help() {
    echo '<p>Custom text/HTML here</p>';
    }
// add_action('wp_dashboard_setup', 'bkb_custom_dashboard_widgets');


// Change Footer Text
function bkb_remove_footer_admin () {
    echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Designed by ';
    }
// add_filter('admin_footer_text', 'bkb_remove_footer_admin');

function bkb_hide_profile_fields( $contactmethods ) {
    unset($contactmethods['aim']);
    unset($contactmethods['jabber']);
    unset($contactmethods['yim']);
    return $contactmethods;
    }
add_filter('user_contactmethods','bkb_hide_profile_fields',10,1);



/* REMOVE SEARCH */
/* If you aren't using search, deactivate it for security */

// add_action( 'parse_query', 'bkb_filter_query' );
// add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

function bkb_filter_query( $query, $error = true ) {
    if ( is_search() ) {
    $query->is_search = false;
    $query->query_vars[s] = false;
    $query->query[s] = false;
    // to error
    if ( $error == true )
    $query->is_404 = true;
    }
}
    