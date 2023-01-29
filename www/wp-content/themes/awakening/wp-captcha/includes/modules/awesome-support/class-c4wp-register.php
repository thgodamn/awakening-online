<?php
/**
 * The functionality that handles the display of the Captcha form on the Awesome Support Register Form.
 * @package  	WP Captcha
 * @subpackage  WP Captcha/modules/awesome-support/class-c4wp-register
 * @author   	Devnath verma <devnathverma@gmail.com>
 */

/**
 * Class responsible for generating the display of the Captcha on Awesome Support Register Form.
 * Gets called only if the "display captcha on Awesome Support Register Form" option is checked in the back-end
 * @package  	WP Captcha
 * @version  	1.0.0
 * @author   	Devnath verma <devnathverma@gmail.com>
 */
 
class C4WP_Awesome_Support_Register {
	
	// @type defaults variables
	public $c4wp_plugin_options;

	/**
	 * Initialize the class and set its properties.
	 */
	public function __construct( $c4wp_plugin_options ) {
		
		$this->c4wp_plugin_options 	=  	$c4wp_plugin_options;
		
		// adds the required HTML for the captcha to the Awesome Support Register Form
		add_action( 'wpas_after_registration_fields', array( $this, 'c4wp_display_captcha' ), 10, 0 );
		
		// validate the captcha answer on Awesome Support Register Form
		add_filter( 'wpas_register_account_errors', array( $this, 'c4wp_validation_check' ), 10, 3 );	
	}
	
	/**
	 * Generate captcha to Provide a public-facing view for the plugin on Awesome Support Register Form.
	 * @package  WP Captcha
	 * @version  1.0.0
	 * @author   Devnath verma <devnathverma@gmail.com>
	 */
	public function c4wp_display_captcha( ) {
		
		WP_CAPTCHA()->c4wp_object->c4wp_display_captcha();
	}
	
	/**
	 * This function checks validations of the captcha posted with Awesome Support Register Form.
	 * @package  WP Captcha
	 * @version  1.0.0
	 * @author   Devnath verma <devnathverma@gmail.com>
	 */
	public function c4wp_validation_check( $user_login, $user_email, $c4wp_errors ) {
		
		if ( ! empty( $_POST ) ) {
			
			$c4wp_empty_messages  = '<strong>' . __( 'Error', 'wp-captcha' ) . '</strong> : '.$this->c4wp_plugin_options['c4wp_options']['other_settings']['captcha_empty_messages'];
			$c4wp_errors_messages = '<strong>' . __( 'Error', 'wp-captcha' ) . '</strong> : '.$this->c4wp_plugin_options['c4wp_options']['other_settings']['captcha_error_messages'];
		
			if ( $this->c4wp_plugin_options['c4wp_options']['captcha_enable_for'] == 'mathematical_captcha' ) {
			
				if ( ! isset( $_POST['c4wp_user_input_captcha'] ) || empty( $_POST['c4wp_user_input_captcha'] ) ) {
			
					return new WP_Error( 'c4wp_error_messages', $c4wp_empty_messages );
					
				} else if ( $_POST['c4wp_user_input_captcha'] != WP_CAPTCHA()->c4wp_object->c4wp_captcha_decode( $_POST['c4wp_random_input_captcha'] ) ) {
					
					return new WP_Error( 'c4wp_error_messages', $c4wp_errors_messages );
				
				} else {
					
					return $c4wp_errors;
				}
			
			} else if ( $this->c4wp_plugin_options['c4wp_options']['captcha_enable_for'] == 'image_captcha' ) {
				
				if ( ! isset( $_POST['c4wp_user_input_captcha'] ) || empty( $_POST['c4wp_user_input_captcha'] ) ) {
			
					return new WP_Error( 'c4wp_error_messages', $c4wp_empty_messages );
					
				} else if ( !in_array( $_POST['c4wp_user_input_captcha'], $_SESSION['c4wp_random_input_captcha'], true ) ) {
					
					return new WP_Error( 'c4wp_error_messages', $c4wp_errors_messages );
				
				} else {
					
					unset($_SESSION['c4wp_random_input_captcha']);
					return $c4wp_errors;
				}
			
			} else if ( $this->c4wp_plugin_options['c4wp_options']['captcha_enable_for'] == 'icon_captcha' ) {
			
				if ( ! isset( $_POST['c4wp_user_input_captcha'] ) || empty( $_POST['c4wp_user_input_captcha'] ) ) {
			
					return new WP_Error( 'c4wp_error_messages', $c4wp_empty_messages );
					
				} else if ( $_POST['c4wp_user_input_captcha'] != $_POST['c4wp_random_input_captcha'] ) {
					
					return new WP_Error( 'c4wp_error_messages', $c4wp_errors_messages );
				
				} else {
					
					return $c4wp_errors;
				}
			
			} else {
				
				if ( ! isset( $_POST['g-recaptcha-response'] ) || empty( $_POST['g-recaptcha-response'] ) ) {
					
					return new WP_Error( 'c4wp_error_messages', $c4wp_empty_messages );
				
				} else if ( isset( $_POST['g-recaptcha-response'] ) && WP_CAPTCHA()->c4wp_object->c4wp_validate_captcha( $_POST['g-recaptcha-response'] ) == false ) {
					
					return new WP_Error( 'c4wp_error_messages', $c4wp_errors_messages );
				
				} else {
		
					return $c4wp_errors;
				}
			}
		}
	}
}