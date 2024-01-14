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
 * This class contains all of the plugin get_User.
 * Here you can configure the whole plugin data.
 *
 * @package		PLUGINAHM
 * @subpackage	Classes/Plugin_ahmed_test_get_User
 * @author		test test
 * @since		1.0.0
 */
class Plugin_ahmed_test_get_User{

	/**
	 * The plugin name
	 *
	 * @var		string
	 * @since   1.0.0
	 */
	private $plugin_name;

	/**
	 * Our Plugin_ahmed_test_get_User constructor 
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
	 * Return the get_User1
	 *
	 * @access	public
	 * @since	1.0.0
	 * @return	string The get_User1
	 */
	public function get_plugin_get_User(){

		return add_shortcode( 'SHgetUser', array( $this, 'get_User') );
	}
    function get_User( $atts, $content='' ) {
		
		$atts = shortcode_atts( array(
			'name' => 'name',
			'email' => 'Email',
			'user' => 'User',
			'role' => 'Role',
			'total' => 'Role'
		), $atts);

		//print_r($atts);
		$users = get_users();
		$result = count_users();
		//echo "<pre>";
        //print_r($users) ; 
		$table ="<table>";
		$table .="</tr>";
		$table .="<th>".$atts['name']."</th>";
		$table .="<th>".$atts['email']."</th>";
		$table .="<th>".$atts['user']."</th>";
		$table .="<th>".$atts['role']."</th>";
		
		$table .="</tr>";
		foreach ( $users as $user ) {
			$table .="<tr>";
			$table .="<td>" . esc_html(  $user->user_login ) . "</td>";
			$table .="<td>" . esc_html(  $user->user_email ) . "</td>";
			$table .="<td>" . esc_html(  $user->display_name ) . "</td>";
			$user_meta = get_userdata($user->ID);
			$user_roles = $user_meta->roles;
			$table .="<td>" . esc_html(  $user_roles[0] ) . "</td>";
			
			$table .="</tr>";
			
		}
		$table .="</tr>";
		$table .="<th >".$atts['total']."</th>";
		$table .="";
		$table .="<th colspan='3'>" . esc_html(  $result['total_users'] ) . "</th>";
		$table .="</tr>";

		$table .="<table>";

		return $table;
	}

    
}
