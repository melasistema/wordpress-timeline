<?php

$plugin_data = get_file_data( __FILE__, array( 'Version' => 'Version' ), false );
$plugin_version = $plugin_data['Version'];

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if(!defined('MELATIMELINE_CURRENT_VERSION')) {
	define ( 'MELATIMELINE_CURRENT_VERSION', $plugin_version );
}
if(!defined('MELATIMELINE_BASE_URL')) {
	define('MELATIMELINE_BASE_URL', plugin_dir_url(__FILE__));
}
if(!defined('MELATIMELINE_BASE_DIR')) {
	define('MELATIMELINE_BASE_DIR', dirname(__FILE__));
}
