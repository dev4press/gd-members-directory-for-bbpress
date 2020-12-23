<?php

namespace Dev4Press\Plugin\GDMED\Admin;

use Dev4Press\Core\Admin\Submenu\Plugin as BasePlugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin extends BasePlugin {
	public $plugin = 'gd-members-directory-for-bbpress';
	public $plugin_prefix = 'gdmed';
	public $plugin_menu = 'GD Members Directory';
	public $plugin_title = 'GD Members Directory for bbPress';

	public function constructor() {
		$this->url  = GDMED_URL;
		$this->path = GDMED_PATH;
	}

	public function after_setup_theme() {
		$this->setup_items = array(
			'install' => array(
				'title' => __( "Install", "breadcrumbspress" ),
				'icon'  => 'ui-traffic',
				'type'  => 'setup',
				'info'  => __( "Before you continue, make sure plugin installation was successful.", "breadcrumbspress" ),
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\Install'
			),
			'update'  => array(
				'title' => __( "Update", "breadcrumbspress" ),
				'icon'  => 'ui-traffic',
				'type'  => 'setup',
				'info'  => __( "Before you continue, make sure plugin was successfully updated.", "breadcrumbspress" ),
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\Update'
			)
		);

		$this->menu_items = array(
			'settings'  => array(
				'title' => __( "Settings", "breadcrumbspress" ),
				'icon'  => 'ui-cog',
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\Settings'
			),
			'about'     => array(
				'title' => __( "About", "breadcrumbspress" ),
				'icon'  => 'ui-info',
				'class' => '\\Dev4Press\\Plugin\\GDMED\\Admin\\Panel\\About'
			),
			'tools'     => array(
				'title' => __( "Tools", "breadcrumbspress" ),
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

	public function settings_definitions() {
		return Settings::instance();
	}
}
