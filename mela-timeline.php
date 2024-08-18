<?php

/**
* Plugin Name: Melasistema Timeline
* Plugin URI: https://melasistema.com
* Description: Vertical timeline for Worpress
* Version: 0.1
* Author: Luca Visciola
* Author URI: https://lucavisciola.com
* Text Domain: melasistema-timeline
* Domain Path: /languages
**/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Helpers
 */
include( plugin_dir_path( __FILE__ ) . '/helpers/helpers.php');

/**
 * Plugin Constants
 */

include( plugin_dir_path( __FILE__ ) . '/constants.php' );

/**
 * Models
 */
include( plugin_dir_path( __FILE__ ) . '/models/model_timeline.php');

/**
 * Shortcodes
 */
include( plugin_dir_path( __FILE__ ) . '/shortcodes/timeline.php');
