<?php

namespace Dev4Press\Plugin\GDMED\Admin;

use Dev4Press\v42\Core\Admin\Submenu\Plugin as BasePlugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin extends BasePlugin {
	public $plugin = 'gd-members-directory-for-bbpress';
	public $plugin_prefix = 'gdmed';
	public $plugin_menu = 'GD Members Directory';
	public $plugin_title = 'GD Members Directory for bbPress';

	public $buy_me_a_coffee = true;
	public $auto_mod_interface_colors = true;
	public $has_widgets = true;

	public function constructor() {
		$this->url  = GDMED_URL;
		$this->path = GDMED_PATH;
	}

	public function after_setup_theme() {
		$this->setup_items = array(
			'install' => array(
				'title' => __( "Install", "gd-members-directory-for-bbpress" ),
				'icon'  => 'ui-traffic',
				'type'  => 'setup',
				'info'  => __( "Before you continue, make sure plugin installation was successful.", "gd-members-directory-for-bbpress" ),
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\Install'
			),
			'update'  => array(
				'title' => __( "Update", "gd-members-directory-for-bbpress" ),
				'icon'  => 'ui-traffic',
				'type'  => 'setup',
				'info'  => __( "Before you continue, make sure plugin was successfully updated.", "gd-members-directory-for-bbpress" ),
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\Update'
			)
		);

		$this->menu_items = array(
			'dashboard' => array(
				'title' => __( "Dashboard", "gd-members-directory-for-bbpress" ),
				'icon'  => 'ui-home',
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\Dashboard'
			),
			'about'     => array(
				'title' => __( "About", "gd-members-directory-for-bbpress" ),
				'icon'  => 'ui-info',
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\About'
			),
			'settings'  => array(
				'title' => __( "Settings", "gd-members-directory-for-bbpress" ),
				'icon'  => 'ui-cog',
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\Settings'
			),
			'tools'     => array(
				'title' => __( "Tools", "gd-members-directory-for-bbpress" ),
				'icon'  => 'ui-wrench',
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\Tools'
			)
		);
	}

	public function run_getback() {
		new GetBack( $this );
	}

	public function run_postback() {
		new PostBack( $this );
	}

	public function settings() {
		return gdmed_settings();
	}

	public function plugin() {
		return gdmed();
	}

	public function settings_definitions() : Settings {
		return Settings::instance();
	}
}
