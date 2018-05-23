<?php
/**
 * Plugin Name: Genesis Simple Hook Guide
 * Plugin URI: https://github.com/srikat/Genesis-Simple-Hook-Guide
 * Description: Find Genesis action hooks easily and select them by a single click at their actual locations in your Genesis theme.
 * Version: 0.0.4
 * Author: Sridhar Katakam
 * Author URI: https://sridharkatakam.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: srikat/Genesis-Simple-Hook-Guide
 * Text Domain: genesis-simple-hook-guide
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

register_activation_hook( __FILE__, 'gshg_activation_check' );
/**
 * Check if Genesis is the parent theme.
 */
function gshg_activation_check() {
	$theme_info = wp_get_theme();

	$genesis_flavors = array(
		'genesis',
		'genesis-trunk',
	);

	if ( ! in_array( $theme_info->Template, $genesis_flavors, true ) ) {
		deactivate_plugins( plugin_basename( __FILE__ ) ); // Deactivate ourself.
		$message = sprintf(
			/* translators: %s: URL to Genesis Framework. */
			__( 'Sorry, you can\'t activate this plugin unless you have installed <a href="%s">Genesis</a>.', 'genesis-simple-hook-guide' ),
			esc_url( 'https://my.studiopress.com/themes/genesis/' )
		);
		wp_die( $message );
	}
}

add_action( 'admin_bar_menu', 'gshg_admin_bar_links', 100 );
/**
 * Add admin bar items.
 */
function gshg_admin_bar_links() {
	global $wp_admin_bar;

	if ( is_admin() || false === function_exists( 'genesis' ) ) {
		return;
	}

	$wp_admin_bar->add_menu(
		array(
			'id' => 'gshg',
			'title' => __( 'Genesis Hooks', 'genesis-simple-hook-guide' ),
			'href' => '',
			'position' => 0,
		)
	);
	$wp_admin_bar->add_menu(
		array(
			'id'	   => 'gshg_action',
			'parent'   => 'gshg',
			'title'    => __( 'Action Hooks', 'genesis-simple-hook-guide' ),
			'href'     => esc_url( add_query_arg( 'gshg_hooks', 'show' ) ),
			'position' => 10,
		)
	);
	$wp_admin_bar->add_menu(
		array(
			'id'	   => 'gshg_clear',
			'parent'   => 'gshg',
			'title'    => __( 'Clear', 'genesis-simple-hook-guide' ),
			'href'     => esc_url( remove_query_arg(
				array(
					'gshg_hooks',
				)
			) ),
			'position' => 10,
		)
	);

}

// add_action( 'admin_enqueue_scripts', 'gshg_hooks_stylesheet' );
add_action( 'wp_enqueue_scripts', 'gshg_hooks_script_and_styles' );
/**
 * Load stylesheet.
 */
function gshg_hooks_script_and_styles() {
	$gshg_plugin_css_url = plugins_url( 'style.css', __FILE__ );
	$gshg_plugin_js_url = plugins_url( 'general.js', __FILE__ );

	if ( 'show' === filter_input( INPUT_GET, 'gshg_hooks', FILTER_SANITIZE_STRING ) ) {
		wp_enqueue_style( 'gshg-styles', $gshg_plugin_css_url );
		wp_enqueue_script( 'gshg-scripts', $gshg_plugin_js_url );
	}
}

add_action( 'all', 'gshg_print_hooks_on_page' );
/**
 * Print the hooks.
 */
function gshg_print_hooks_on_page() {
	// BAIL without hooking into anything if on the admin page or if not displaying anything.
	if ( is_admin() || ! ( 'show' === filter_input( INPUT_GET, 'gshg_hooks', FILTER_SANITIZE_STRING ) ) ) {
		return;
	}

	global $wp_actions;
	$filter = current_filter();

	if ( 'genesis_' === substr( $filter, 0, 8 ) ) {
		if ( isset( $wp_actions[ $filter ] ) ) {
			printf( '<div id="%1$s" class="genesis-hook"><input type="text" readonly value="%1$s" /></div>', $filter );
		}
	}
}
