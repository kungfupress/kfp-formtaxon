<?php
/**
 * File: kfp-formtaxon/include/plugin-init.php
 *
 * @package kfp_formtaxon
 */

defined( 'ABSPATH' ) || die();

add_action( 'plugins_loaded', 'kfp_formtaxon_init' );
/**
 * Inicializa el plugin
 *
 * @return void
 */
function kfp_formtaxon_init() {
	$translation_path = 'kfp-plugin-name/languages';
	load_plugin_textdomain( 'kfp-plugin-name', false, $translation_path );
}
