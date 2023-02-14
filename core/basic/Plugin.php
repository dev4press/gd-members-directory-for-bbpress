<?php

namespace Dev4Press\Plugin\GDMED\Basic;

use Dev4Press\v39\Core\Plugins\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Plugin extends Core {
	public $plugin = 'gd-members-directory-for-bbpress';

	public $members_id;
	public $theme_package = 'default';

	public function __construct() {
		$this->url = GDMED_URL;

		parent::__construct();
	}

	public static function instance() : Plugin {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new Plugin();
		}

		return $instance;
	}

	public function s() {
		return gdmed_settings();
	}

	public function run() {
		$this->members_id = apply_filters( 'gdmed_members_id', 'bbp_members' );

		do_action( 'gdmed_load_settings' );

		add_action( 'widgets_init', array( $this, 'widgets_init' ) );

		do_action( 'gdmed_plugin_core_ready' );
	}

	public function widgets_init() {
		register_widget( 'Dev4Press\Plugin\GDMED\Widget\Directory' );
	}

	public function after_setup_theme() {
		if ( get_option( '_bbp_theme_package_id' ) == 'quantum' ) {
			$this->theme_package = 'quantum';
		}

		gdmed_expand();
	}

	public function get_filter_roles_values() : array {
		$available     = gdmed_settings()->get( 'members_roles_available' );
		$dynamic_roles = bbp_get_dynamic_roles();

		$roles = array(
			'' => __( "All Roles", "gd-members-directory-for-bbpress" )
		);

		foreach ( $dynamic_roles as $role => $obj ) {
			if ( in_array( $role, $available ) ) {
				$roles[ $role ] = $obj['name'];
			}
		}

		return $roles;
	}

	public function get_sort_orderby_values() : array {
		return apply_filters( 'gdmed_filter_orderby_list', array(
			'name'          => __( "Name", "gd-members-directory-for-bbpress" ),
			'last_activity' => __( "Last Activity", "gd-members-directory-for-bbpress" ),
			'last_posted'   => __( "Last Posted", "gd-members-directory-for-bbpress" ),
			'registered'    => __( "Registration", "gd-members-directory-for-bbpress" ),
			'topics'        => __( "Topics Count", "gd-members-directory-for-bbpress" ),
			'replies'       => __( "Replies Count", "gd-members-directory-for-bbpress" )
		) );
	}

	public function get_sort_order_values() : array {
		return array(
			'DESC' => __( "Descending", "gd-members-directory-for-bbpress" ),
			'ASC'  => __( "Ascending", "gd-members-directory-for-bbpress" )
		);
	}

	public function get_page_title() : string {
		return apply_filters( 'gdmed_get_page_title', __( "Members Directory", "gd-members-directory-for-bbpress" ) );
	}

	public function get_breadcrumb_title() : string {
		return apply_filters( 'gdmed_get_breadcrumb_title', __( "Members Directory", "gd-members-directory-for-bbpress" ) );
	}

	public function get_breadcrumb_for_user_title() : string {
		return apply_filters( 'gdmed_get_breadcrumb_for_user_title', __( "Members", "gd-members-directory-for-bbpress" ) );
	}
}
