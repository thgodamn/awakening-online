<?php
/**
 * Chic Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Chic_Lite
 */

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/main.js',array('jquery'), '1.0.0', 'all');
    wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/assets/style/main.css',array(), '1.0.0', 'all');
});

//define theme version
$chic_lite_theme_data = wp_get_theme();
if( ! defined( 'CHIC_LITE_THEME_VERSION' ) ) define( 'CHIC_LITE_THEME_VERSION', $chic_lite_theme_data->get( 'Version' ) );
if( ! defined( 'CHIC_LITE_THEME_NAME' ) ) define( 'CHIC_LITE_THEME_NAME', $chic_lite_theme_data->get( 'Name' ) );
if( ! defined( 'CHIC_LITE_THEME_TEXTDOMAIN' ) ) define( 'CHIC_LITE_THEME_TEXTDOMAIN', $chic_lite_theme_data->get( 'TextDomain' ) );

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

/**
 * Custom Functions.
 */
require get_template_directory() . '/inc/custom-functions.php';

/**
 * Standalone Functions.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Template Functions.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions for selective refresh.
 */
require get_template_directory() . '/inc/partials.php';

/**
 * Fontawesome
 */
require get_template_directory() . '/inc/fontawesome.php';

/**
 * Custom Controls
 */
require get_template_directory() . '/inc/custom-controls/custom-control.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Newsletter .
 */
require get_template_directory() . '/inc/newsletter-functions.php';

/**
 * Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Metabox
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Typography Functions
 */
require get_template_directory() . '/inc/typography.php';

/**
 * Dynamic Styles
 */
require get_template_directory() . '/css/style.php';

/**
 * Plugin Recommendation
*/
require get_template_directory() . '/inc/tgmpa/recommended-plugins.php';

/**
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';

/**
 * Add theme compatibility function for woocommerce if active
*/
if( chic_lite_is_woocommerce_activated() ){
    require get_template_directory() . '/inc/woocommerce-functions.php';    
}

/**
 * Toolkit Filters
*/
if( chic_lite_is_rara_theme_companion_activated() )
require get_template_directory() . '/inc/toolkit-functions.php';

/**
 * Add theme compatibility function for Delicious Recipes if active
*/
if( chic_lite_is_delicious_recipe_activated() ){
    require get_template_directory() . '/inc/recipe-functions.php';    
}

/*my functions*/
add_action( 'wp_head', 'ilc_favicon');
function ilc_favicon(){
    echo "<link rel='shortcut icon' href='" . get_stylesheet_directory_uri() . "/images/favicon.png' />" . "\n";
}

/*delete dashboard from my accont*/
add_filter( 'woocommerce_account_menu_items', 'remove_my_account_dashboard' );
function remove_my_account_dashboard( $menu_links ){
	
	unset( $menu_links['dashboard'] );
	unset( $menu_links['downloads'] );
	return $menu_links;
	
}
/*redirect to order*/
add_action('template_redirect', 'redirect_to_orders_from_dashboard' );

function redirect_to_orders_from_dashboard(){

	if( is_account_page() && empty( WC()->query->get_current_endpoint() ) ){
		wp_safe_redirect( wc_get_account_endpoint_url( 'orders' ) );
		exit;
	}

}