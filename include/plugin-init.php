<?php
/**
 * File: kfp-formtaxon/include/plugin-init.php
 *
 * @package kfp_formtaxon
 */

defined( 'ABSPATH' ) || die();

add_action( 'init', 'kfp_cpt_taller', 10 );
/**
 * Crea el CPT Taller con lo mínimo que se despacha en CPTs
 *
 * @return void
 */
function kfp_cpt_taller() {
	$args = array(
		'public' => true,
		'label'  => 'Taller',
	);
	register_post_type( 'kfp-taller', $args );
}

add_action( 'init', 'kfp_taxonomy_lugares', 0 );
/**
 * Registra la taxonomía con lo mínimo indispensable
 *
 * @return void
 */
function kfp_taxonomy_lugares() {
	$args = array(
		'label'             => 'Lugar',
		'hierarchical'      => true,
		'show_admin_column' => true,
	);
	register_taxonomy( 'kfp-lugar', array( 'kfp-taller' ), $args );
}

add_action( 'init', 'kfp_lugares_add', 1 );
/**
 * Agrega algunos lugares de ejemplo por defecto
 *
 * @return void
 */
function kfp_lugares_add() {
	$lugares = array(
		'Escuela de Ingenieros Informáticos',
		'Facultad de Derecho',
		'Facultad de Bellas Artes',
		'Facultad de Medicina',
		'Rectorado',
	);
	foreach ( $lugares as $lugar ) {
		wp_insert_term( $lugar, 'kfp-lugar' );
	}
}
