<?php
/**
 * Acciones a realizar durante la activación del plugin
 *
 * @package kfp_plugin_name
 */

defined( 'ABSPATH' ) || die();

register_activation_hook( KFP_PLUGIN_NAME_PLUGIN_FILE, 'kfp_plugin_name_activate' );
/**
 * Acciones para la activación del plugin
 *
 * @return void
 */
function kfp_plugin_name_activate() {
	$kfp_plugin_name_options = array(
		'el_mejor_plugin_del_mundo' => true,
	);
	update_option( 'kfp_plugin_name_options', $kfp_plugin_name_options );
	// Guarda o actualiza la versión del plugin en las option de WordPress.
	update_option( 'kfp_plugin_name_plugin_version', KFP_PLUGIN_NAME_VERSION );
}
