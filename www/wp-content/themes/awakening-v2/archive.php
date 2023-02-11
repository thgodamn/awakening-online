<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chic_Lite
 */

get_header(); ?>


<?php
	if ( have_posts() ) : 
    
		while ( have_posts() ) : the_post();
//			var_dump($post);
		endwhile;

	else :
		echo 'пусто';
	endif;
?>


<?php
//get_sidebar();
get_footer();
