<?php

/**
 * The header – displays all of the <head> section
 * and everything up until <div id="content" class=".site-content">
 *
 * @package bk_blueprint
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo('charset'); ?>">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Responsive and mobile friendly stuff -->
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">


  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <div id="page-wrapper" class="site-wrapper">

    <div class="is-visually-hidden skip-link">
      <a href="#content" title="Skip to content">Skip to main content</a>
    </div>

    <header class="site-header" role="banner">
      <div class="site-branding">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
          <?php bloginfo('name'); ?>
        </a>
      </div><!-- .site-branding -->

      <nav id="site-navigation" class="main-navigation" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
          Menu
        </button>

        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
      </nav><!-- #site-navigation.main-navigation -->
    </header><!-- #masthead -->

    <main id="content" class="site-content">