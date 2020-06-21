<?php

class Abadata_Deactivator{

	public static function deactivate(){
		global $wpdb;
		$wpdb->query("drop table if exists " . $wpdb->prefix . "abadaData_table");
	}
}
