<?php 

/**
* Trigger this file on Plugin uninstall
*
* 
*/

namespace Includes\Base;

class Activate {

	public static function activate(){
		
		flush_rewrite_rules();
		self::create_plugin_database_table();
	}
	
	private static function create_plugin_database_table(){
		
		global $table_prefix, $wpdb;

		$tblname = 'leave_post_message';
		$wp_leave_post_message = $table_prefix . "$tblname ";
		$charset_collate = $wpdb->get_charset_collate();
		#Check to see if the table exists already, if not, then create it

		
		$query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $wp_leave_post_message ) );

		if ( ! $wpdb->get_var( $query ) == $wp_leave_post_message ) {
			$sql = "CREATE TABLE ". $wp_leave_post_message . " ( ";
					$sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
					$sql .= "  `user_id`  int(11)   NOT NULL, ";
					$sql .= "  `post_id`  int(11)   NOT NULL, ";
					$sql .= "  `name`  varchar(255)   NOT NULL, ";
					$sql .= "  `email`  varchar(255)   NOT NULL, ";
					$sql .= "  `message`  varchar(255)   NOT NULL, ";
					$sql .= "  `attachfile`  varchar(1000)   NOT NULL, ";
					$sql .= "  `post_type`  varchar(255)   NOT NULL, ";
					$sql .= "  PRIMARY KEY (`id`) "; 
					$sql .= ")  $charset_collate;";
		}
			
			
			
			require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
			dbDelta($sql);
		
	}
}