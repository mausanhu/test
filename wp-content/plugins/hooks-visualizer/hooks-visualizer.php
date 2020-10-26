<?php
/**
 * Plugin Name: Hooks Visualizer
 * Description: A Visual Guide for Hook positions available in GeneratePress and OceanWp Theme
 * Plugin URI: https://www.webtechstreet.com/
 * Author: WebTechStreet
 * Version: 0.2
 * License:      GNU General Public License v2 or later
 * License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wts-hv
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'WTS_HV_URL', plugins_url( '/', __FILE__ ) );
define( 'WTS_HV_PATH', plugin_dir_path( __FILE__ ) );

require(WTS_HV_PATH. 'includes/bootstrap.php');
