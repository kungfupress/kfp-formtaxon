<?php
/**
 * Plugin Name
 *
 * @category Categoría
 * @package  kfp_plugin_name
 * @author   Juanan Ruiz <kungfupress@gmail.com>
 * @license  GPLv2 http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://github.com/kungfupress/plugin-name
 *
 * @wordpress-plugin
 * Plugin Name:  KFP Plugin Name
 * Plugin URI:   https://github.com/kungfupress/plugin-name
 * Description:  Descripción del plugin.
 * Version:      0.0.2
 * Author:       Juanan Ruiz
 * Author URI:   https://kungfupress.com/
 * PHP Version:  5.6
 */

defined( 'ABSPATH' ) || die();

// Constantes que afectan a todos los ficheros del plugin.
define( 'KFP_PLUGIN_NAME_DIR', plugin_dir_path( __FILE__ ) );
define( 'KFP_PLUGIN_NAME_URL', plugin_dir_url( __FILE__ ) );
define( 'KFP_PLUGIN_NAME_PLUGIN_FILE' );
$default_headers = array( 'Version' => 'Version' );
$plugin_data     = get_file_data( __FILE__, $default_headers, 'plugin' );
define( 'KFP_PLUGIN_NAME_VERSION', $plugin_data['Version'] );

// Activación del plugin.
require_once KFP_PLUGIN_NAME_DIR . 'include/activate.php';
// Inicializa el plugin.
require_once KFP_PLUGIN_NAME_DIR . 'include/plugin-init.php';
