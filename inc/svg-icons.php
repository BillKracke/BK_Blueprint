<?php

/* A roll your own solution for easily including SVG icons
 * that integrates with the 'icons' in 'components'.
 * All it does is ensure that the approprate CSS classes are 
 * added to an inline SVG based on a string
 */

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