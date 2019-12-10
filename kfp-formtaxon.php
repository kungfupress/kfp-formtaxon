<?php
/**
 * Formulario con Taxonomia
 *
 * @category Categoría
 * @package  kfp_ftx
 * @author   Juanan Ruiz <kungfupress@gmail.com>
 * @license  GPLv2 http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://github.com/kungfupress/kfp-formtaxon
 *
 * @wordpress-plugin
 * Plugin Name:  KFP FormTaxon
 * Plugin URI:   https://github.com/kungfupress/kfp-formtaxon
 * Description:  Ejemplo de utilización de una categoría personalizada desde un formulario
 * Version:      0.1.0
 * Author:       Juanan Ruiz
 * Author URI:   https://kungfupress.com/
 * PHP Version:  5.6
 */

defined( 'ABSPATH' ) || die();

// Constantes que afectan a todos los ficheros del plugin.
define( 'KFP_FTX_DIR', plugin_dir_path( __FILE__ ) );
define( 'KFP_FTX_URL', plugin_dir_url( __FILE__ ) );
define( 'KFP_FTX_VERSION', '0.1.0' );

// Crea CPT y taxonomia.
require_once KFP_FTX_DIR . 'include/plugin-init.php';

// Agrega shortcode [kfp_ftx_crear_taller] con formulario para crear talleres.
require_once KFP_FTX_DIR . 'include/form-taller-shortcode.php';

// Agrega función para que admin-post.php capture el envío de un nuevo taller desde un formulario.
require_once KFP_FTX_DIR . 'include/form-taller-grabar.php';
