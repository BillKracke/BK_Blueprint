<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bk_blueprint
 */

get_header(); ?>

	<div id="primary" class="primary-content">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				// trying something a little bit crazy here
				// what if we moved everything into the template parts folder?
				// check inc/extras.php -- we add the slug to body class for styling ex. page-about
				// this way everything can libe in template parts.  Keep it tidy.

				$post_type = get_post_type();

				get_template_part( 'template-parts/' . $post_type , get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
