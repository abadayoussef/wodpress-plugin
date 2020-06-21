<?php

class Abadata{

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct(){
		if (defined('ABADATA_VERSION')) {
			$this->version = ABADATA_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'abadata';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies(){
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-abadata-loader.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-abadata-i18n.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-abadata-admin.php';
		require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-abadata-public.php';
		$this->loader = new Abadata_Loader();
	}

	private function set_locale(){
		$plugin_i18n = new Abadata_i18n();
		$this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');
	}

	private function define_admin_hooks(){

		$plugin_admin = new Abadata_Admin($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
		$this->loader->add_action("admin_menu", $plugin_admin, "abadaData_menu_sections");
		$this->loader->add_action("wp_ajax_abadata_request", $plugin_admin, "abadaData_ajax_hundler_fn");
	}

	private function define_public_hooks(){
		$plugin_public = new Abadata_Public($this->get_plugin_name(), $this->get_version());
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
	}

	public function run(){
		$this->loader->run();
	}

	public function get_plugin_name(){
		return $this->plugin_name;
	}

	public function get_loader(){
		return $this->loader;
	}

	public function get_version(){
		return $this->version;
	}
}
