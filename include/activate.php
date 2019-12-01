<?php
/**
 * File: kfp-formtaxon/include/activate.php
 * Acciones a realizar durante la activación del plugin
 *
 * @package kfp_formtaxon
 */

defined( 'ABSPATH' ) || die();

register_activation_hook( KFP_FORMTAXON_PLUGIN_FILE, 'kfp_formtaxon_activate' );
/**
 * Acciones para la activación del plugin
 *
 * @return void
 */
function kfp_formtaxon_activate() {
	$kfp_formtaxon_options = array(
		'el_mejor_plugin_del_mundo' => true,
	);
	update_option( 'kfp_formtaxon_options', $kfp_formtaxon_options );
	// Guarda o actualiza la versión del plugin en las option de WordPress.
	update_option( 'kfp_formtaxon_plugin_version', KFP_FORMTAXON_VERSION );
}
