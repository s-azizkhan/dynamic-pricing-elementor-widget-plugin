<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://hyperticsai.com
 * @since             1.0.0
 * @package           Az_Custom_Elementor_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       Az Custom Elementor Widget
 * Plugin URI:        https://hyperticsai.com
 * Description:       Custom Elementor widget for WordPress.
 * Version:           1.0.0
 * Author:            HyperticsAI
 * Author URI:        https://hyperticsai.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       az-custom-elementor-widget
 * Domain Path:       /languages
 * Requires at least: 5.2
 * Requires PHP:       7.2
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
define( 'AZ_CUSTOM_ELEMENTOR_WIDGET_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-az-custom-elementor-widget-activator.php
 */
function activate_az_custom_elementor_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-az-custom-elementor-widget-activator.php';
	Az_Custom_Elementor_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-az-custom-elementor-widget-deactivator.php
 */
function deactivate_az_custom_elementor_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-az-custom-elementor-widget-deactivator.php';
	Az_Custom_Elementor_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_az_custom_elementor_widget' );
register_deactivation_hook( __FILE__, 'deactivate_az_custom_elementor_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-az-custom-elementor-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_az_custom_elementor_widget() {

	// if (!did_action('elementor/loaded')) {
    //     add_action('admin_notices', function () {
    //         echo '<div class="error"><p>Az Custom Elementor Widget requires Elementor to be installed and activated.</p></div>';
    //     });
    //     return;
    // }
	$plugin = new Az_Custom_Elementor_Widget();
	$plugin->run();

}
run_az_custom_elementor_widget();
