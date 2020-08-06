<?php 

/**
* 
*
*
*/

namespace Includes\Base;

use \Includes\Base\BaseController;

class PostRequest extends BaseController{

	function register() {
		 if(isset($_POST)){
			add_action( 'admin_post_action_leave_message', array($this , 'leave_message_model') );
			add_action( 'admin_post_nopriv_action_leave_message', array($this , 'leave_message_model') );
		 }
	}
	
	
	function leave_message_model() {
		global $wpdb;
		
		if($_POST['action'] == 'action_leave_message' ){
			$return_url = $_POST['return_url'];
	
			$attachfile = wp_get_attachment_metadata(  $_POST['attachfile'] , true);
			
			$attachfile['attachfile'] = wp_get_attachment_url(  $_POST['attachfile'] );
			
			$_POST['attachfile']  = json_encode($attachfile);
		
			
			unset($_POST['action']);
			unset($_POST['return_url']);
			
			$table = $wpdb->prefix.'leave_post_message';
			$data = $_POST;
			$format = array('%d','%d' ,'%d' ,'%s' ,'%s' ,'%s','%s','%s');
			$wpdb->insert($table,$data);
			
			$my_id = $wpdb->insert_id;
			
			wp_safe_redirect( $return_url );
			exit;
		
		}
		
		//request handlers should die() when they complete their task
	}

}