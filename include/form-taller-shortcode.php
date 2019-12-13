<?php
/**
 * File: kfp-formtaxon/include/form-taller-shortcode.php
 *
 * @package kfp_ftx
 */

defined( 'ABSPATH' ) || die();

add_shortcode( 'kfp_ftx_form_taller', 'kfp_ftx_form_taller' );
/**
 * Implementa formulario para crear un nuevo taller.
 *
 * @return string
 */
function kfp_ftx_form_taller() {
	// Trae los lugares existentes en la base de datos.
	// Esta variable contiene un array de objetos de tipo taxonomy.
	$lugares = get_terms(
		'kfp-lugar',
		array(
			'orderby'    => 'term_id',
			'hide_empty' => 0,
		)
	);
	ob_start();
	if ( filter_input( INPUT_GET, 'kfp-ftx-resultado', FILTER_SANITIZE_STRING ) === 'success' ) {
		echo '<h4>Se ha grabado el taller correctamente</h4>';
	}
	if ( filter_input( INPUT_GET, 'kfp-ftx-resultado', FILTER_SANITIZE_STRING ) === 'error' ) {
		echo '<h4>Se ha producido un error al grabar el taller</h4>';
	}
	?>
	<form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
		<?php wp_nonce_field( 'kfp-ftx-taller', 'kfp-ftx-taller-nonce' ); ?>
		<input type="hidden" name="action" value="kfp-ftx-taller">
		<div class="form-input">
			<label for="nombre">Taller</label>
			<input type="text" name="nombre" id="nombre" required>
		</div>
		<div class="form-input">
			<label for="id_lugar">Lugar</label>
			<select name="id_lugar" required>
				<option value="">Selecciona el lugar</option>
				<?php
				foreach ( $lugares as $lugar ) {
					echo(
						'<option value="' . esc_attr( $lugar->term_id ) . '">'
						. esc_attr( $lugar->name ) . '</option>'
					);
				}
				?>
			</select>
		</div>
		<div class="form-input">
			<label for="descripcion">Descripción</label>
			<textarea name="descripcion" id="descripcion"></textarea>
		</div>
		<div class="form-input">
			<input type="submit" value="Enviar">
		</div>
	</form>
	<?php
	return ob_get_clean();
}
