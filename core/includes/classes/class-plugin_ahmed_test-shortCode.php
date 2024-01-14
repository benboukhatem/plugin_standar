<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This class contains all of the plugin related settings.
 * Everything that is relevant data and used multiple times throughout 
 * the plugin.
 * 
 * To define the actual values, we recommend adding them as shown above
 * within the __construct() function as a class-wide variable. 
 * This variable is then used by the callable functions down below. 
 * These callable functions can be called everywhere within the plugin 
 * as followed using the get_plugin_name() as an example: 
 * 
 * PLUGINAHM->settings->get_plugin_name();
 * 
 * HELPER COMMENT END
 */

/**
 * Class Plugin_ahmed_test_Settings
 *
 * This class contains all of the plugin shortCode.
 * Here you can configure the whole plugin data.
 *
 * @package		PLUGINAHM
 * @subpackage	Classes/Plugin_ahmed_test_shortCode
 * @author		test test
 * @since		1.0.0
 */
class Plugin_ahmed_test_shortCode{

	/**
	 * The plugin name
	 *
	 * @var		string
	 * @since   1.0.0
	 */
	private $plugin_name;

	/**
	 * Our Plugin_ahmed_test_shortCode constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){

		$this->plugin_name = PLUGINAHM_NAME;
	}

	/**
	 * ######################
	 * ###
	 * #### CALLABLE FUNCTIONS
	 * ###
	 * ######################
	 */

	/**
	 * Return the shortcode1
	 *
	 * @access	public
	 * @since	1.0.0
	 * @return	string The shortcode1
	 */
	public function get_plugin_shortcode1(){

		return add_shortcode( 'dotiavatar', array( $this, 'shortcode1') );
	}
    function shortcode1( $atts, $content='' ) {
		return 'test456';
	}

    /**
	 * Return the shortcode2
	 *
	 * @access	public
	 * @since	1.0.0
	 * @return	string The shortcode2
	 */
	public function get_plugin_shortcode2(){

		return add_shortcode( 'dotiavatar2', array( $this, 'shortcode2') );
	}
    function shortcode2( $atts, $content='' ) {
		return 'test45546';
	}
}
