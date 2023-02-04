<?php
function assets_header() {
    wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/assets/style/main.css',array(), '1.0.0', 'all');
    wp_enqueue_style('media-style', get_stylesheet_directory_uri() . '/assets/style/media.css',array(), '1.0.0', 'all');
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'assets_header' );

function assets_footer() {
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/script/main.js',array('jquery'), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'assets_footer');