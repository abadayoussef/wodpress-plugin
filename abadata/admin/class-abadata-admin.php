<?php

class Abadata_Admin {
	private $plugin_name;
	private $version;
	private $table;

	public function __construct($plugin_name, $version){
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		require_once plugin_dir_path(__FILE__) . '../includes/class-abadata-activator.php';
		$this->table = Abadata_Activator::abadaData_table();
	}

	function abadaData_menu_sections(){
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

	public function show_description(){
		include_once(ABADATA_PLUGIN_DIR ."/admin/partials/show-data.php");
	}

	public function update_description(){
		include_once(ABADATA_PLUGIN_DIR ."/admin/partials/add-data.php");
	}

	public function enqueue_styles(){
		wp_enqueue_style("bootstrap.min.css", plugin_dir_url(__FILE__) . 'css/bootstrap.min.css', array(), $this->version, 'all');
	}

	public function enqueue_scripts(){
		wp_enqueue_script("validate.min.js", plugin_dir_url(__FILE__) . 'js/jquery.validate.min.js', array('jquery'), $this->version, true);
		wp_enqueue_script("costume.js", plugin_dir_url(__FILE__) . 'js/costume.js', array('jquery'), $this->version, true);

		wp_localize_script("costume.js", "abadata_ajax_url", admin_url("admin-ajax.php"));
	}

	public function abadaData_ajax_hundler_fn(){
		global $wpdb;
		$wpdb->update(
		$this->table,
		array("title" => $_REQUEST['title'],"description" => $_REQUEST['desc'],"version" => $_REQUEST['version']),
		array( 'id' => 1 ), array( '%s','%s','%s'), array( '%d' ));
		
		echo "updated successfully :)";
		wp_die();
	}
}
