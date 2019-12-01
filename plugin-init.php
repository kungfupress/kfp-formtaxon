<?php
/**
 * File: kfp-plugin-name/include/plugin-init.php
 *
 * @package kfp_plugin_name
 */

defined( 'ABSPATH' ) || die();

add_action( 'plugins_loaded', 'kfp_plugin_name_init' );
/**
 * Inicializa el plugin
 *
 * @return void
 */
function kfp_plugin_name_init() {
	$translation_path = 'kfp-plugin-name/languages';
	load_plugin_textdomain( 'kfp-plugin-name', false, $translation_path );
}
