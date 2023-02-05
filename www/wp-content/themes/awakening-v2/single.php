<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Chic_Lite
 */

get_header(); ?>


<div class="single">
    <div class="single__title course__title"><?php echo the_title(); ?></div>
    <div class="single__wrapper container">
        <?php
//        while ( have_posts() ) : the_post();
//            var_dump($post);

//            WC()->cart->add_to_cart( $product_id );
//            WC()->cart->add_to_cart( $product_id, $quantity, $variation_id );
//            WC()->cart->add_to_cart( 14, 1, 0, array(), array( 'misha_custom_price' => 1000 ) );

//            if( is_singular() ||  ( get_post_format() != false ) ){
//                the_content();
//                wp_link_pages( array(
//                    'before' => '<div class="page-links">',
//                    'after'  => '</div>',
//                ) );
//            }else{
//                the_excerpt();
//            }
//        endwhile;
        ?>

        <div class="single__col">

            <div class="single__image">
                <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="" />
            </div>

            <a href="<?php
            $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]');
            echo '/checkout/'.$add_to_cart;
            ?>" class="button desktop">
                <span class="number black mr"><?php $product = wc_get_product( $post->ID ); echo $product->get_price(); ?></span> рублей
            </a>

        </div>

        <div class="single__col">
            <div class="single__box text">
                <?php echo $post->post_content; ?>
            </div>
        </div>

        <a href="<?php
        $add_to_cart = do_shortcode('[add_to_cart_url id="'.$post->ID.'"]');
        echo '/checkout/'.$add_to_cart;
        ?>" class="button mobile">
            <span class="number black mr"><?php $product = wc_get_product( $post->ID ); echo $product->get_price(); ?></span> рублей
        </a>


    </div>
</div>


<?php
//get_sidebar();
get_footer();
