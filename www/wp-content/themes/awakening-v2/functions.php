<?php

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/main.js',array('jquery'), '1.0.0', 'all');
    wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/assets/style/main.css',array(), '1.0.0', 'all');
});

add_filter( 'woocommerce_checkout_fields' , 'disable_checkout_fields' );

function disable_checkout_fields( $fields ) {

    unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
//    unset($fields['order']['order_comments']);
//    unset($fields['billing']['billing_email']);
//    unset($fields['account']['account_username']);
//    unset($fields['account']['account_password']);
//    unset($fields['account']['account_password-2']);

    return $fields;

}

//статус заказа "в обработке" и оплачен - переводим в выполнено
add_filter( 'woocommerce_payment_complete_order_status', 'update_order_status', 10, 2 );

function update_order_status( $order_status, $order_id ) {

    $order = new WC_Order( $order_id );

    if ( 'processing' == $order_status && 'pending' == $order->status  ) {
        return 'completed';
    }
    return $order_status;

}

//в корзине только 1 товар
add_filter( 'woocommerce_add_cart_item_data', '_empty_cart' );

function _empty_cart( $cart_item_data ) {

    WC()->cart->empty_cart();

    return $cart_item_data;
}

//убрать стили woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

//убрать похожие товары
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//убрать lightbox на странице single-product у image
function remove_product_image_link( $html ) {
    return preg_replace( "!<(a|/a).*?>!", '', $html );
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'remove_product_image_link', 10, 2 );