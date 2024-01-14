<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This is the main class that is responsible for registering
 * the core functions, including the files and setting up all features. 
 * 
 * To add a new class, here's what you need to do: 
 * 1. Add your new class within the following folder: core/includes/classes
 * 2. Create a new variable you want to assign the class to (as e.g. public $helpers)
 * 3. Assign the class within the instance() function ( as e.g. self::$instance->helpers = new Plugin_ahmed_test_Helpers();)
 * 4. Register the class you added to core/includes/classes within the includes() function
 * 
 * HELPER COMMENT END
 */

if ( ! class_exists( 'Plugin_ahmed_test' ) ) :

	/**
	 * Main Plugin_ahmed_test Class.
	 *
	 * @package		PLUGINAHM
	 * @subpackage	Classes/Plugin_ahmed_test
	 * @since		1.0.0
	 * @author		test test
	 */
	final class Plugin_ahmed_test {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Plugin_ahmed_test
		 */
		private static $instance;

		/**
		 * PLUGINAHM helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Plugin_ahmed_test_Helpers
		 */
		public $helpers;

		/**
		 * PLUGINAHM settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Plugin_ahmed_test_Settings
		 */
		public $settings;

		/**
		 * PLUGINAHM shortCode object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Plugin_ahmed_test_shortCode
		 */
		public $shortCode;

		/**
		 * PLUGINAHM shUser object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Plugin_ahmed_test_get_User
		 */
		public $shUser;

		

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'plugin_ahmed_test' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'plugin_ahmed_test' ), '1.0.0' );
		}

		/**
		 * Main Plugin_ahmed_test Instance.
		 *
		 * Insures that only one instance of Plugin_ahmed_test exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Plugin_ahmed_test	The one true Plugin_ahmed_test
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Plugin_ahmed_test ) ) {
				self::$instance					= new Plugin_ahmed_test;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Plugin_ahmed_test_Helpers();
				self::$instance->settings		= new Plugin_ahmed_test_Settings();
				self::$instance->shortCode		= new Plugin_ahmed_test_shortCode();
				self::$instance->base_shortCode();
				self::$instance->shUser		= new Plugin_ahmed_test_get_User();
				self::$instance->base_all_User();
				//self::$instance->base_shortCode2();

				//Fire the plugin logic
				new Plugin_ahmed_test_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'PLUGINAHM/plugin_loaded' );
				
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
	
		private function includes() {
			require_once PLUGINAHM_PLUGIN_DIR . 'core/includes/classes/class-plugin_ahmed_test-helpers.php';
			require_once PLUGINAHM_PLUGIN_DIR . 'core/includes/classes/class-plugin_ahmed_test-settings.php';
			require_once PLUGINAHM_PLUGIN_DIR . 'core/includes/classes/class-plugin_ahmed_test-shortCode.php';
			require_once PLUGINAHM_PLUGIN_DIR . 'core/includes/classes/class-plugin_ahmed_test-run.php';
			require_once PLUGINAHM_PLUGIN_DIR . 'core/includes/classes/class-plugin_ahmed_test-user.php';
			
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {

			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}
	
		public function base_shortCode() {

			//shortcode 1
			 $shortC = new self::$instance->shortCode();
			 return($shortC->get_plugin_shortcode1());

			
			
		}
        //get all user
		public function base_all_User() {

			//shortcode 1
			 $allUser = new self::$instance->shUser();

			// print_r($allUser);
			 return($allUser->get_plugin_get_User());

			
			
		}


		/*public function base_shortCode2() {

			
			 //chort code 2

			 $shortC = new self::$instance->shortCode();
			
			 return($shortC->get_plugin_shortcode2());
			
		}*/

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'plugin_ahmed_test', FALSE, dirname( plugin_basename( PLUGINAHM_PLUGIN_FILE ) ) . '/languages/' );
		}

	}


	
endif; // End if class_exists check.

