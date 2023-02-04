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
$host  = $_SERVER['HTTP_HOST'];
error_reporting(0);

get_header(); ?>
<?php

	if ( have_posts() ) :

		while ( have_posts() ) : the_post();
			var_dump($post);
		endwhile;

	else :

		header("HTTP/1.0 404 Not Found");
	?>
	<div class="err404">
        <img class="err404__image" src="<?php echo get_template_directory_uri().'/images/404.png'; ?>" />
    </div>
<?php endif; ?>


<?php
//get_sidebar();
get_footer();
wp_footer();

