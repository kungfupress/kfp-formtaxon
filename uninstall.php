<?php
/**
 * Tareas para desinstalar el plugin
 *
 * @package kfp_formtaxon
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die();
}
delete_option( 'kfp_formtaxon_options' );
delete_option( 'kfp_formtaxon_version' );

// Código para eliminar tablas del plugin de la base de datos si las hay!
// global $wpdb;
// $wpdb->query( 'DROP TABLE IF EXISTS {$wpdb->prefix}formtaxon_table_name' );
