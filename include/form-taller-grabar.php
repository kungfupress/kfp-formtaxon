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
// el value del campo input con name "action" del formulario enviado.
add_action( 'admin_post_kfp-ftx-taller', 'kfp_ftx_graba_taller' );
add_action( 'admin_post_nopriv_kfp-ftx-taller', 'kfp_ftx_graba_taller' );

/**
 * Graba los datos enviados por el formulario como un nuevo CPT kfp-taller
 *
 * @return void
 */
function kfp_ftx_graba_taller() {
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
		// Nos viene de perlas para grabar los metadatos
		$post_id = wp_insert_post($args);
	}
}
