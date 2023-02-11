<?php
require_once __DIR__ . '/inc/ApiCheck/vendor/autoload.php';
require_once get_template_directory().'/inc/ApiCheck/Controller/Controller.php';

//require_once 'inc/assets.php';
//require_once 'inc/post_type.php';

add_action('wp_enqueue_scripts', function() {
//    wp_enqueue_script('input-mask', get_stylesheet_directory_uri() . '/assets/js/jquery-input-mask-phone-number.js',array('jquery'), '1.0.0', 'all');
    wp_enqueue_script('input-mask-2', get_stylesheet_directory_uri() . '/assets/js/jquery.inputmask.min.js',array('jquery'), '1.0.0', 'all');
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



//add REST - route
add_action( 'rest_api_init', 'register_api_route' );
function register_api_route() {
    register_rest_route( 'v1', 'post/lead', array(
            'methods' => 'POST',
            'callback' => 'postLead',
        )
    );
}

add_action( 'phpmailer_init', 'send_smtp_email' );
function send_smtp_email( $phpmailer ) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = 'smtp.timeweb.ru';
    $phpmailer->CharSet    = 'UTF-8';
    $phpmailer->Port       = '465';
    $phpmailer->SMTPSecure = 'ssl';
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Username   = 'info@awakening-online.ru';
    $phpmailer->Password   = 'c8usWHCY';
    $phpmailer->From       = 'info@awakening-online.ru';
    $phpmailer->FromName   = 'Awakening';
    $phpmailer->isHTML( true );
    $phpmailer->addReplyTo('info@awakening-online.ru', 'Awakening');
}

//REST post form
function postLead(WP_REST_Request $request) {
    $controller = new Controller();
    $params = $request->get_params();
//    debug_logg($params);
    return $controller->postLead($params);
}

//function debug_logg($value)
//{
//    $h = fopen("{$_SERVER['DOCUMENT_ROOT']}/debugg.log", 'a');
//    ob_start();
//    var_dump($value);
//    fwrite($h, ob_get_clean());
//    fwrite($h, "---------------------------------\n");
//    fclose($h);
//}

function debug_log($msg, $die = false)
{
    $msg = '[ ' . date('Y-m-d H:i:s') . ' ] ' . print_r($msg, true) . PHP_EOL;

    error_log($msg, 3, ABSPATH . '/debug.log');

    if ($die) {
        die;
    }
}


//add_action( 'woocommerce_before_calculate_totals', 'rudr_custom_price_refresh' );
//function rudr_custom_price_refresh( $cart_object ) {
//
//    foreach ( $cart_object->get_cart() as $item ) {
//        if( array_key_exists( 'misha_custom_price', $item ) ) {
//            $item[ 'data' ]->set_price( $item[ 'misha_custom_price' ] );
//        }
//    }
//
//}