<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           calSD
 *
 * @wordpress-plugin
 * Plugin Name: Cal SD Marketplace Plugin
 * Description: A classified style network of business listings
 * Version: 1.0
 * Author: Bjorn Johnson
 * Author URI: http://www.bjornjohnson.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CALSD_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_calsd() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/calsd-activator.php';
	CalSD_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_calsd() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/calsd-deactivator.php';
	CalSD_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_calsd' );
register_deactivation_hook( __FILE__, 'deactivate_calsd' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/calsd-core.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_calsd() {

	$plugin = new CalSD();
	$plugin->run();

}
run_calsd();