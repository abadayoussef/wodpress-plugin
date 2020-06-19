<?php

/**
 * Fired during plugin activation
 *
 * @link       https://sefeun.com
 * @since      1.0.0
 *
 * @package    Abadata
 * @subpackage Abadata/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Abadata
 * @subpackage Abadata/includes
 * @author     Youssef Abada <youssef.abada.x@gmail.com>
 */
class Abadata_Activator
{


	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate()
	{
		require_once(ABSPATH . "wp-admin/includes/upgrade.php");
		global $wpdb;
		if (count($wpdb->get_var("show tables like '" . Abadata_Activator::abadaData_table() . "'")) == 0) {

			$query = 'CREATE TABLE `' . Abadata_Activator::abadaData_table() . '` (
					 `id` int(11) NOT NULL AUTO_INCREMENT,
					 `title` varchar(150) DEFAULT NULL,
					 `description` varchar(3000) DEFAULT NULL,
					 `version` varchar(20) DEFAULT NULL,
					 PRIMARY KEY (`id`)
					 ) ' . $wpdb->get_charset_collate();
			dbDelta($query);
			$wpdb->insert(Abadata_Activator::abadaData_table(), array(
				"title" => 'Abadata Plugin',
				"description" => "A simple demo plugin made for this brief, all what you can see here just this description and the version state of it, and the other sub-menu you can update this description, i hope you like it :)",
				"version" => "Realize"
			));
		}
	}

	public static function abadaData_table()
	{
		global $wpdb;
		return $wpdb->prefix . "abadaData_table";
	}
}
