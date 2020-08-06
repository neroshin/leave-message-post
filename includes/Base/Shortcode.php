<?php 

/**
* Trigger this file on Plugin uninstall
*
*
*/

namespace Includes\Base;

use \Includes\Base\BaseController;

class Shortcode extends BaseController{

	function register() {
		add_shortcode( 'Leave_messsage', array( $this , 'template' ) );
	}

	function template(){
		// require admin template
			global $getThisTemplates ,  $wpdb;
			
			$the_ID = get_the_ID();
			$post_message = $wpdb->get_results("SELECT * FROM `wp_leave_post_message` WHERE `post_id`  = $the_ID ORDER BY id DESC" , ARRAY_A );
			// print_r($post_message);
			
 
			
			ob_start();
			
			if ( is_single()) {
				
				
				
				include($getThisTemplates['form.template']);
			}
			else{
				echo "Not Available in this post type";
			}
			
			$output = ob_get_clean();
			
			return $output; 
		
	}
}