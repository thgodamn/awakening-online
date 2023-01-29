<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Chic_Lite
 */

get_header(); ?>


<div class="page">
	<div class="container">
		<?php

		while ( have_posts() ) : the_post();

//			var_dump($post);
			if( is_singular() || ( get_post_format() != false ) ){
				the_content();
				wp_link_pages( array(
					'before' => '<div class="page-links">',
					'after'  => '</div>',
				) );
			}else{
				the_excerpt();
			}


		endwhile; // End of the loop.
		?>
	</div>
</div>


<?php
//get_sidebar();
get_footer();
