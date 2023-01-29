<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Chic_Lite
 */

get_header(); ?>


<?php

    while ( have_posts() ) : the_post();
        var_dump($post);

        if( is_singular() ||  ( get_post_format() != false ) ){
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">',
                'after'  => '</div>',
            ) );
        }else{
            the_excerpt();
        }
    endwhile;

?>


<?php
get_sidebar();
get_footer();
