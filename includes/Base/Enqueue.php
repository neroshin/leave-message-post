<?php 

/**
* Trigger this file on Plugin uninstall
*
* 
*/

namespace Includes\Base;

use \Includes\Base\BaseController;

class Enqueue extends BaseController{

	public function register() {
		//add_action( 'admin_enqueue_scripts', array( $this, 'enqueueAdmin'));
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueuePage') );
		
	}

	public function enqueueAdmin(){
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle-admin', '', __FILE__ );
	}

	public function enqueuePage(){
		// enqueue all our scripts
		// wp_enqueue_style( 'bootstrap-min-css', '', __FILE__ );
		
		wp_enqueue_script( 'jquery3.5.1', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', __FILE__ );
		
		
		wp_enqueue_script( 'pluginScripts',  $this->plugin_url.'/assets/scripts/pluginScripts.js', __FILE__ );
		
	
		wp_enqueue_media();
		
	}

}