<?php
require_once __DIR__ . '/inc/ApiCheck/vendor/autoload.php';
require_once get_template_directory().'/inc/ApiCheck/Controller/Controller.php';

//require_once 'inc/assets.php';
//require_once 'inc/post_type.php';

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
    debug_logg($params);
    return $controller->postLead($params);
}

function debug_logg($value)
{
    $h = fopen("{$_SERVER['DOCUMENT_ROOT']}/debugg.log", 'a');
    ob_start();
    var_dump($value);
    fwrite($h, ob_get_clean());
    fwrite($h, "---------------------------------\n");
    fclose($h);
}

/**************
DIFFERENT MESSAGES FOR DIFFERENT PRODUCTS
 ****************/

//hook our function to the new order email
add_action('woocommerce_email_order_details', 'email_order_details_products', 1, 4);

function email_order_details_products($order, $admin, $plain, $email) {
    // getting the status of the current order
    $status = $order->get_status();
    $items = $order->get_items();
    if ($status == "completed") {
        foreach ( $items as $item ) {
            $product_id = $item['product_id'];

            //mentor
            if ( in_array( $item['product_id'], 13 ) ) {
                ?>
                <style>
                    @font-face {
                        font-family: 'Poppins';
                        font-style: normal;
                        font-weight: 400;
                        font-display: swap;
                        src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJbecmNE.woff2) format('woff2');
                        unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
                    }
                    /* latin-ext */
                    @font-face {
                        font-family: 'Poppins';
                        font-style: normal;
                        font-weight: 400;
                        font-display: swap;
                        src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJnecmNE.woff2) format('woff2');
                        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
                    }
                    /* latin */
                    @font-face {
                        font-family: 'Poppins';
                        font-style: normal;
                        font-weight: 400;
                        font-display: swap;
                        src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecg.woff2) format('woff2');
                        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
                    }

                    .email {
                        background: #2F3038;
                        background-image: url(https://awakening-online.ru/wp-content/themes/awakening-v2/images/bg.png);
                        background-repeat: no-repeat;
                        width: 100%;
                        height: 100%;
                        padding: 40px;
                        box-sizing: border-box;
                    }
                    .email__logo {
                        display: block;
                        width: 100%;
                        text-align: center;
                        padding: 0 0 50px 0;
                        box-sizing: border-box;
                    }
                    .email__box {
                        background: #202027;
                        border: 1px solid #F9F7F7;
                        border-radius: 30px;
                        padding: 40px;
                        outline: 0;
                        box-sizing: border-box;
                        margin-bottom: 60px;
                    }
                    .text {
                        color: white;
                        font-size: 25px;
                    }
                    * {
                        margin: 0;
                        padding: 0;
                        font-family: 'Poppins', sans-serif;
                        overflow-wrap: normal !important;
                        font-style: normal;
                        font-weight: 100;
                        word-break: break-word;
                    }
                    a {
                        font-style: normal;
                        font-weight: 600;
                        font-size: 21px;
                        line-height: 36px;
                        text-decoration: none;
                        transition: .2s ease-out;
                        color: #D8A72B;
                    }
                </style>
                <div class="email">
                    <a class="email__logo" href="https://awakening-online.ru/">
                        <img src="https://awakening-online.ru/wp-content/themes/awakening-v2/images/logo.png">
                    </a>
                    <div class="email__box text">
                        Благодарим вас за покупку курса «Mentor».<br>
                        Сначала вы вместе c близким просматриваете курс Awakening.<br>
                        Ссылка для просмотра курса «Awakening»<br>
                        <a href="https://youtu.be/awPyD8AkAko">https://youtu.be/awPyD8AkAko</a><br>
                        ПРОСМОТР КУРСА «Mentor» ТОЛЬКО ДЛЯ НАСТАВНИКА<br>
                        Затем вы просматриваете курс Mentor<br>
                        Ссылка для просмотра курса «Mentor».<br>
                        <a href="https://youtu.be/0-33A019op8">https://youtu.be/0-33A019op8</a><br>
                        Экзамен <a href="https://youtu.be/dcmUGJmF0vE">https://youtu.be/dcmUGJmF0vE</a><br>
                        Медитация <a href="https://youtu.be/o2JnpWqWnmU">https://youtu.be/o2JnpWqWnmU</a><br>
                        По всем вопросам обращайтесь в телегам <a href="https://t.me/awaken_supp">@awaken_supp</a><br>
                        Удачного пути к пробуждению.<br>
                    </div>
                </div>
                <?php
            }

            //awakening
            if ( in_array( $item['product_id'], 12 ) ) {
                ?>
                <style>
                    @font-face {
                        font-family: 'Poppins';
                        font-style: normal;
                        font-weight: 400;
                        font-display: swap;
                        src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJbecmNE.woff2) format('woff2');
                        unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
                    }
                    /* latin-ext */
                    @font-face {
                        font-family: 'Poppins';
                        font-style: normal;
                        font-weight: 400;
                        font-display: swap;
                        src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJnecmNE.woff2) format('woff2');
                        unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
                    }
                    /* latin */
                    @font-face {
                        font-family: 'Poppins';
                        font-style: normal;
                        font-weight: 400;
                        font-display: swap;
                        src: url(https://fonts.gstatic.com/s/poppins/v20/pxiEyp8kv8JHgFVrJJfecg.woff2) format('woff2');
                        unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
                    }

                    .email {
                        background: #2F3038;
                        background-image: url(https://awakening-online.ru/wp-content/themes/awakening-v2/images/bg.png);
                        background-repeat: no-repeat;
                        width: 100%;
                        height: 100%;
                        padding: 40px;
                        box-sizing: border-box;
                    }
                    .email__logo {
                        display: block;
                        width: 100%;
                        text-align: center;
                        padding: 0 0 50px 0;
                        box-sizing: border-box;
                    }
                    .email__box {
                        background: #202027;
                        border: 1px solid #F9F7F7;
                        border-radius: 30px;
                        padding: 40px;
                        outline: 0;
                        box-sizing: border-box;
                        margin-bottom: 60px;
                    }
                    .text {
                        color: white;
                        font-size: 25px;
                    }
                    * {
                        margin: 0;
                        padding: 0;
                        font-family: 'Poppins', sans-serif;
                        overflow-wrap: normal !important;
                        font-style: normal;
                        font-weight: 100;
                        word-break: break-word;
                    }
                    a {
                        font-style: normal;
                        font-weight: 600;
                        font-size: 21px;
                        line-height: 36px;
                        text-decoration: none;
                        transition: .2s ease-out;
                        color: #D8A72B;
                    }
                </style>
                <div class="email">
                    <a class="email__logo" href="https://awakening-online.ru/">
                        <img src="https://awakening-online.ru/wp-content/themes/awakening-v2/images/logo.png">
                    </a>
                    <div class="email__box text">
                        Благодарим вас за покупку курса «Awakening».<br>
                        Ссылка для просмотра курса <a href="https://youtu.be/Vm7HBz0WRgg">https://youtu.be/Vm7HBz0WRgg</a><br>
                        Медитация <a href="https://youtu.be/o2JnpWqWnmU">https://youtu.be/o2JnpWqWnmU</a><br>
                        По всем вопросам обращайтесь в телегам <a href="https://t.me/awaken_supp">@awaken_supp</a><br>
                        Удачного пути к пробуждению.<br>
                    </div>
                </div>
                <?php
            }
        }
    }

//    // checking if it's the order status we want (note, this is for the status of the order ... not necessarily WHAT EMAIL is being sent
//    if ( ($status == "completed") || ($status == "processing") || ($status == "on-hold") ) {
//
//        // the ID of the conference product
//        $prod_arr = array( 454 );
//
//        // getting the order products
//        $items = $order->get_items();
//
//        // starting the bought products variable
//        $bought = false;
//
//        // loop through each of the items in the order
//        foreach ( $items as $item ) {
//
//            // in case we want to access stuff about produdct ids of the ordered items (not currently used)
//            $product_id = $item['product_id'];
//            // Here you get your data from products
//            $custom_field_to_check = get_post_meta( $product_id, '_tmcartepo_data', true);
//
//            // checking each item to see if any of the ordered products is matching the conference product id
//            if ( in_array( $item['product_id'], $prod_arr ) ) {
//                // if the product is found in the order, then we say it was bought
//                $bought = true;
//            }
//
//        }
//
//        if ( $bought ) {
//            // custom text for the email
//            echo __( '<h2>Custom Title</h2>
//			<p>Hey it\'s your text right here with <a href="https://example.com" target="_blank">a link</a> too!</p>', 'fswc' );
//        }

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