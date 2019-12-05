<?php
/**
 * Formulario con Taxonomia
 *
 * @category Categoría
 * @package  kfp_formtaxon
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
define( 'KFP_FORMTAXON_DIR', plugin_dir_path( __FILE__ ) );
define( 'KFP_FORMTAXON_URL', plugin_dir_url( __FILE__ ) );

// Inicializa el plugin.
require_once KFP_FORMTAXON_DIR . 'include/plugin-init.php';
