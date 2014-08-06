<?php
/*
Plugin Name: 		Codepress Menu
Plugin URI:         http://wordpress.org/extend/plugins/codepress-menu/
Version: 			2.3.2
Description: 		Extensions for WordPress nav-menu's
Author: 			Codepress
License:			GPLv2

Copyright 2013  Codepress  info@codepress.nl

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License version 2 as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

define( 'CODEPRESS_MENU_URL', plugin_dir_url( __FILE__ ) );
define( 'CODEPRESS_MENU_DIR', plugin_dir_path( __FILE__ ) );

require CODEPRESS_MENU_DIR . '/class-codepress-menu-walker.php';

/**
 * Init Codepress Menu
 *
 * @uses apply_filters() To ignore certain theme_locations.
 * @since 1.0
 */
function codepress_menu_init( $args ) {
    $ignore = apply_filters( 'codepress_ignore_theme_locations', array() );

    if ( ! empty( $ignore ) && in_array( $args['theme_location'], $ignore ) )
        return $args;

	// check if the theme location requested exists and is set
	if ( ! empty( $args['theme_location'] ) ) {
		$found	   = false;
		$locations = get_nav_menu_locations();

		if ( ! is_array( $locations ) )
			return $args;

		foreach( $locations as $location => $id ) {
			if ( $id > 0 && $location == $args['theme_location'] )
				$found = true;
		}

		if ( ! $found )
			return $args;
	}

    $defaults = array(
        'level'  => 0,
        'walker' => new Codepress_Menu_Walker,
    );

    foreach( $defaults as $option => $default ) {
        if ( empty( $args[ $option ] ) )
            $args[ $option ] = $default;
    }

    return $args;
}
add_filter( 'wp_nav_menu_args', 'codepress_menu_init' );

/**
 * Enqueue styles and scripts for nav-menus page
 *
 * @since 2.3
 */
function codepress_menu_admin_scripts() {
	global $pagenow;

	if ( 'nav-menus.php' != $pagenow )
		return;

    wp_enqueue_script( 'codepress-menu-backend', CODEPRESS_MENU_URL . 'js/codepress-menu.js' );
	wp_enqueue_style( 'codepress-menu-backend', CODEPRESS_MENU_URL . 'css/codepress-menu.css' );
}
add_action( 'admin_print_scripts', 'codepress_menu_admin_scripts' );

/**
 * Show or hide the menu-item delete link
 *
 * @since 2.3
 */
function codepress_menu_manage_nav_menus_columns( $columns ) {
	$columns['codepress-menu-simple-delete'] = __( 'Remove' );

	return $columns;
}
add_filter( 'manage_nav-menus_columns', 'codepress_menu_manage_nav_menus_columns', 15 );