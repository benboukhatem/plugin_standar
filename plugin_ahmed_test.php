<?php
/**
 * plugin_ahmed_test
 *
 * @package       PLUGINAHM
 * @author        test test
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   plugin_ahmed_test
 * Plugin URI:    http://localhost/testpluginNamespace/
 * Description:   test
 * Version:       1.0.0
 * Author:        test test
 * Author URI:    https://your-author-domain.com
 * Text Domain:   plugin_ahmed_test
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with plugin_ahmed_test. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 * 
 * The comment above contains all information about the plugin 
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 * 
 * The function PLUGINAHM() is the main function that you will be able to 
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 * 
 * HELPER COMMENT END
 */

// Plugin name
define( 'PLUGINAHM_NAME',			'plugin_ahmed_test' );

// Plugin version
define( 'PLUGINAHM_VERSION',		'1.0.0' );

// Plugin Root File
define( 'PLUGINAHM_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'PLUGINAHM_PLUGIN_BASE',	plugin_basename( PLUGINAHM_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'PLUGINAHM_PLUGIN_DIR',	plugin_dir_path( PLUGINAHM_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'PLUGINAHM_PLUGIN_URL',	plugin_dir_url( PLUGINAHM_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once PLUGINAHM_PLUGIN_DIR . 'core/class-plugin_ahmed_test.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  test test
 * @since   1.0.0
 * @return  object|Plugin_ahmed_test
 */
function PLUGINAHM() {
	return Plugin_ahmed_test::instance();
}

PLUGINAHM();
