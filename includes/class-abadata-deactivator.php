<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://sefeun.com
 * @since      1.0.0
 *
 * @package    Abadata
 * @subpackage Abadata/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Abadata
 * @subpackage Abadata/includes
 * @author     Youssef Abada <youssef.abada.x@gmail.com>
 */
class Abadata_Deactivator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate()
	{
		global $wpdb;
		$wpdb->query("drop table if exists " . Abadata_Deactivator::abadaData_table());
	}

	public static function abadaData_table()
	{
		global $wpdb;
		return $wpdb->prefix . "abadaData_table";
	}
}
