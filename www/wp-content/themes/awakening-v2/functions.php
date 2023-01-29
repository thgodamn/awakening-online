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