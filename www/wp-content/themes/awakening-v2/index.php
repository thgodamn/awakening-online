<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chic_Lite
 */

get_header(); ?>


	<?php
var_dump('INDEX INDEX');

	if ( have_posts() ) :

		/* Start the Loop */
		while ( have_posts() ) : the_post();

//			var_dump($post);

		endwhile;

	else :

//		var_dump('PLOHO');

	endif; ?>


<?php
//get_sidebar();
wp_footer();
get_footer();
