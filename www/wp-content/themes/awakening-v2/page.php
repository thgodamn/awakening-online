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

get_header();
//global $woocommerce;
//$woocommerce->cart->add_to_cart( $product_id );



?>


<div class="page">
	<div class="container">
		<?php

        var_dump('PAGE.PHP');

		while ( have_posts() ) : the_post();
			var_dump($post);


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

        <?php echo do_shortcode('[coupon_code]'); ?>

        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo get_home_url(); ?>/checkout/" enctype="multipart/form-data" novalidate="novalidate">
            <input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="" autocomplete="email">
            <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Примечания к вашему заказу, например, особые пожелания отделу доставки." rows="2" cols="5"></textarea>
            <button type="submit" class="button alt wp-element-button" name="woocommerce_checkout_place_order" id="place_order" value="Подтвердить заказ" data-value="Подтвердить заказ">Подтвердить заказ</button>
        </form>
	</div>
</div>


<?php
//get_sidebar();
get_footer();
