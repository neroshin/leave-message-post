<?php 
/**
* @package Plugin Formatting
*/
/*
Plugin Name: Leave Message Post
Plugin URI: 
Description: 
Version: 1.0.0
Author: NULL
Author URI : 
*/



if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ){
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


function activate_leave_message_plugin(){
	Includes\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_leave_message_plugin' );

// Initialize Deactivation, The code that runs during plugin deactivation
function deactivate_leave_message_plugin(){
	Includes\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_leave_message_plugin' );


// Include the Init folder, Initialize all the core classes of the plugin
if ( class_exists( 'Includes\\Init' ) ) {
	
	global $getThisTemplates;
	
	Includes\Init::load_template();
	Includes\Init::register_services();
}
