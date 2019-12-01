<?php
/**
 * Tareas para desinstalar el plugin
 *
 * @package kfp_plugin_name
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die();
}
delete_option( 'kfp_plugin_name_options' );
delete_option( 'kfp_plugin_name_version' );

// Código para eliminar tablas del plugin de la base de datos si las hay!
// global $wpdb;
// $wpdb->query( 'DROP TABLE IF EXISTS {$wpdb->prefix}plugin_name_table_name' );
