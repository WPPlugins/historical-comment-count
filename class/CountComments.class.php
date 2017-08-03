<?php

class CountComments extends Object {
	
	function wp_admin_init()
	{
		add_management_page(
			__('CommentCount'), 
			__('CommentCount'), 
			7, 
			basename(__FILE__), 
			array(&$this, 'wp_admin_options')
		);
	}
	
	function wp_admin_options()
	{
		global $wpdb;
		$permitted_units = array(
			'day'	=>true,
			'week'	=>true,
			'month'	=>true,
			'year'	=>true
		);
		
		if(!$permitted_units[$_GET['unit']]) $unit = "month";
		else $unit = $_GET['unit'];
		
		if(!is_numeric($_GET['limit']) OR $_GET['limit'] > 50 OR $_GET['limit'] < 1)
			$limit = 12;
		else
			$limit = $_GET['limit'];
		
		$timestamp = time();
		for($i=0; $i<$limit; $i++)
		{
			$timestamp = strtotime("-$i month");
			$datestamp = date("Y-m", $timestamp);
			$query = "SELECT count(*) AS `result` FROM `wp_comments` WHERE comment_date LIKE '" . $datestamp . "%' AND comment_approved = '1';";
			$numbers[$datestamp]['sql'] = $query;
			$result = $wpdb->get_results($query);
			$numbers[$datestamp]['count'] = $result[0]->result;
		}
		
		ksort($numbers);

		include($this->path . "/html/wp_admin_options.php");
	}
	
}

?>