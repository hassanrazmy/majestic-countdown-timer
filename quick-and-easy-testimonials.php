<?php
/**
 *
 * @link              http://hassan-raza.com/
 * @since             1.0.0
 * @package           Majestic_Countdown_Timer
 *
 * @wordpress-plugin
 * Plugin Name:       Majestic Countdown Timer
 * Plugin URI:        TODO: github URL pending////////////////////////
 * Description:       This plugin provides an easy way to add a countdown timer to your web site.
 * Version:           1.0.0
 * Author:            M Hassan Raza
 * Author URI:        http://hassan-raza.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       majestic-countdown-timer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'MCT_BASE', plugin_basename(__FILE__) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-majestic-countdown-timer-activator.php
 */
function activate_majestic_countdown_timer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-majestic-countdown-timer-activator.php';
	Majestic_Countdown_Timer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-majestic-countdown-timer-deactivator.php
 */
function deactivate_majestic_countdown_timer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-majestic-countdown-timer-deactivator.php';
	Majestic_Countdown_Timer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_majestic_countdown_timer' );
register_deactivation_hook( __FILE__, 'deactivate_majestic_countdown_timer' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-majestic-countdown-timer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_name() {

	$plugin = new Majestic_Countdown_Timer();
	$plugin->run();

}
run_plugin_name();
