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
function bkb_icon($icon_name) {

  include get_stylesheet_directory() . '/components/icons/' . $icon_name . '.svg';  
  
  }