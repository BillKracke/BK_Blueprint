<?php

/** 
 *  CUSTOM BLOCKS
 * 
 * requires ACF
 * 
 * 
 * 
 * 
 */



function my_block_categories($categories, $post)
{

  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'see-above',
        'title' => 'Custom Blocks',
        'icon' => 'schedule',

      ),
    )
  );
}
add_filter('block_categories', 'my_block_categories', 10, 2);


if (!class_exists('ACF')) {

  function acf_block_callback($block)
  {
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    if (file_exists(get_theme_file_path("/blocks/{$slug}/{$slug}.php"))) {
      include(get_theme_file_path("/blocks/{$slug}/{$slug}.php"));
    }
  }

  function register_acf_block_types()
  {

    // register a testimonial block.
    acf_register_block_type(array(
      'name' => 'event-promo',
      'title' => __('Event Promotional'),
      'description' => __('Promote 2 or 3 events'),
      'render_callback' => 'acf_block_callback',
      'category' => 'see-above',
      'icon' => 'dashicons-megaphone',
      'keywords' => array('events', 'promote', 'sedona'),
      //'enqueue_style' => get_template_directory_uri() . '/blocks/event-promo/event-promo.css', //add some css
      //'enqueue_script' => get_template_directory_uri() . '/blocks/event-promo/event-promo.js', //add some js
      //'align' => false, //disable alignment toolbar

    ));
  }

  // Check if function exists and hook into setup.
  if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types', 10, 4);
  }
}