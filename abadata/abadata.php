<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sefeun.com
 * @since             1.0.0
 * @package           Abadata
 *
 * @wordpress-plugin
 * Plugin Name:       Abadata
 * Plugin URI:        https://sefeun.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Youssef Abada
 * Author URI:        https://sefeun.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       abadata
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}
if (!defined('ABADATA_PLUGIN_DIR')) {
	define('ABADATA_PLUGIN_DIR', plugin_dir_path(__FILE__));
}
if (!defined('ABADATA_PLUGIN_URL')) {
	define('ABADATA_PLUGIN_URL', plugins_url()."/abadata");
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('ABADATA_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-abadata-activator.php
 */
function activate_abadata()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-abadata-activator.php';
	Abadata_Activator::activate();
}




/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-abadata-deactivator.php
 */
function deactivate_abadata()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-abadata-deactivator.php';
	Abadata_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_abadata');
register_deactivation_hook(__FILE__, 'deactivate_abadata');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-abadata.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_abadata()
{

	$plugin = new Abadata();
	$plugin->run();
}
run_abadata();
