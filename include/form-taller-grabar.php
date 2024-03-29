<?php
/**
 * File: kfp-formtaxon/include/form-taller-grabar.php
 *
 * @package kfp_ftx
 */

defined( 'ABSPATH' ) || die();
// Agrega los action hooks para grabar el formulario (el primero para usuarios
// logeados y el otro para el resto)
// Lo que viene tras admin_post_ y admin_post_nopriv_ tiene que coincidir con
// el valor del campo input con nombre "action" del formulario enviado.
add_action( 'admin_post_kfp-ftx-taller', 'kfp_ftx_graba_taller' );
add_action( 'admin_post_nopriv_kfp-ftx-taller', 'kfp_ftx_graba_taller' );

/**
 * Graba los datos enviados por el formulario como un nuevo CPT kfp-taller
 *
 * @return void
 */
function kfp_ftx_graba_taller() {
	// Si viene en $_POST aprovecha uno de los campos que crea wp_nonce para volver al form.
	$url_origen = home_url( '/' );
	if ( ! empty( $_POST['_wp_http_referer'] ) ) {
		$url_origen = esc_url_raw( wp_unslash( $_POST['_wp_http_referer'] ) );
	}
	// Comprueba campos requeridos y nonce.
	if ( isset( $_POST['nombre'] )
	&& isset( $_POST['id_lugar'] )
	&& isset( $_POST['kfp-ftx-taller-nonce'] )
	&& wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kfp-ftx-taller-nonce'] ) ), 'kfp-ftx-taller' )
	) {
		$nombre      = sanitize_text_field( wp_unslash( $_POST['nombre'] ) );
		$descripcion = sanitize_text_field( wp_unslash( $_POST['descripcion'] ) );
		$id_lugar    = (int) $_POST['id_lugar'];
		$args = array(
			'post_title' => $nombre,
			'post_content' => $descripcion,
			'post_type' => 'kfp-taller',
			'post_status' => 'draft',
			'comment_status' => 'closed',
			'ping_status' => 'closed'
		);
		// Esta variable $post_id contiene el ID del nuevo registro
		// Nos viene de perlas para grabar la taxonomía
		$post_id = wp_insert_post($args);
		$term_taxonomy_ids = wp_set_object_terms( $post_id, $id_lugar, 'kfp-lugar' );
		$query_arg = array( 'kfp-ftx-resultado' => 'success' );
		wp_redirect( esc_url_raw( add_query_arg( $query_arg , $url_origen ) ) );
		exit();
	}
	$query_arg = array( 'kfp-ftx-resultado' => 'error' );
	wp_redirect( esc_url_raw( add_query_arg( $query_arg , $url_origen ) ) );
	exit();
}
