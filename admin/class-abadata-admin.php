<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://sefeun.com
 * @since      1.0.0
 *
 * @package    Abadata
 * @subpackage Abadata/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Abadata
 * @subpackage Abadata/admin
 * @author     Youssef Abada <youssef.abada.x@gmail.com>
 */
class Abadata_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	private $table;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		require_once plugin_dir_path(__FILE__) . '../includes/class-abadata-activator.php';
		$this->table = Abadata_Activator::abadaData_table();
	}


	function abadaData_menu_sections()
	{
		$page_title = "AbaData";
		$menu_title = "AbaData";
		$capability = "manage_options";
		$menu_slug = "aba-menus";
		$function = "show_description";
		$icon = "dashicons-list-view";
		$position = 30;
		add_menu_page($page_title, $menu_title, $capability, $menu_slug . '-show-description', array($this, $function), $icon, $position);
		add_submenu_page($menu_slug . '-show-description', "Show Description", "Show Description", $capability, $menu_slug . '-show-description', array($this, $function));
		add_submenu_page($menu_slug . '-show-description', "Update Description", "Update Description", $capability, $menu_slug . '-update-description', array($this, 'update_description'));
	}

	public function show_description()
	{
		include_once(ABADATA_PLUGIN_DIR ."/admin/partials/show-data.php");
	}

	public function update_description()
	{
		include_once(ABADATA_PLUGIN_DIR ."/admin/partials/add-data.php");
	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style("bootstrap.min.css", plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script("validate.min.js", plugin_dir_url(__FILE__) . 'js/jquery.validate.min.js', array('jquery'), $this->version, true);
		wp_enqueue_script("costume.js", plugin_dir_url(__FILE__) . 'js/costume.js', array('jquery'), $this->version, true);

		wp_localize_script("costume.js", "abadata_ajax_url", admin_url("admin-ajax.php"));
	}

	public function abadaData_ajax_hundler_fn(){
		global $wpdb;
		$param = isset($_REQUEST['param']) ? $_REQUEST['param'] : "";
		if(!empty($param) && $param == "sava_data"){
			$wpdb->update($this->table, array(
				"title" => $_REQUEST['title'],
				"description" => $_REQUEST['desc'],
				"version" => $_REQUEST['version']
			), array( 'id' => 1 ), array( '%s','%s','%s'), array( '%d' ));
		}
		
		echo "updated successfully :)";
		wp_die();
	}
}
