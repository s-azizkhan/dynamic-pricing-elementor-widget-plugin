<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://hyperticsai.com
 * @since      1.0.0
 *
 * @package    Az_Custom_Elementor_Widget
 * @subpackage Az_Custom_Elementor_Widget/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Az_Custom_Elementor_Widget
 * @subpackage Az_Custom_Elementor_Widget/includes
 * @author     HyperticsAI <hyperticsai@gmail.com>
 */
class Az_Custom_Elementor_Widget_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'az-custom-elementor-widget',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
