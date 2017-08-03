<?php
class template_db
{
	function createObject($Object){
		global $wpdb;
		$wpdb->insert('objectTable', $Object->toArray());
	}
	
	function readObject(){
		$object = new Object();
		//Code to read object from DB goes here
		
		return $object;
	}
	
	function updateObject($Object){
		global $wpdb;
		$wpdb->insert('objectTable', $Object->toArray(), $Object->getID());
	}
	
	function deleteObject($Object){
		global $wpdb;
		//Delete code goes here
	}

	
	
	
}

?>