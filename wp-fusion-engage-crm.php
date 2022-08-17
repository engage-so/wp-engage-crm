<?php

/**
Plugin Name: WP Fusion - Engage CRM
Description: Boostrap for connecting WP Fusion to a custom CRM
Plugin URI: https://engage.so/
Version: 1.0.1
Author: Engage Messaging
Author URI: https://engage.so/
*/

/**
 * @copyright Copyright (c) 2021. All rights reserved.
 *
 * @license   Released under the GPL license http://www.opensource.org/licenses/gpl-license.php
 *
 * **********************************************************************
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * **********************************************************************
 */

// deny direct access.
if ( ! function_exists( 'add_action' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}


if ( ! class_exists( 'WPF_Engage' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-wpf-engage.php';
}

/**
 * Add our custom CRM class to the list of registered CRMs
 *
 * @since  1.0.0
 *
 * @param  array $crms   The array of registered CRM modules.
 * @return array $crms The array of registered CRM modules.
 */
function wpf_engage_crm( $crms ) {

	$crms['engage'] = 'WPF_Engage';
	return $crms;

}

add_filter( 'wpf_crms', 'wpf_engage_crm' );
