<?php

namespace Dev4Press\Plugin\GDMED\Admin;

use Dev4Press\Core\Options\Element as EL;
use Dev4Press\Core\Options\Settings as BaseSettings;
use Dev4Press\Core\Options\Type;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings extends BaseSettings {
	protected function value( $name, $group = 'settings', $default = null ) {
		return gdmed_settings()->get( $name, $group, $default );
	}

	protected function init() {
		$this->settings = array(
			'rewrite' => array(
				'rewrite_basic' => array(
					'name'     => __( "URL Rewrite", "breadcrumbspress" ),
					'sections' => array(
						array(
							'label'    => '',
							'name'     => '',
							'class'    => '',
							'settings' => array(
								EL::i( 'settings', 'rewrite_default', __( "Use bbPress default slug", "breadcrumbspress" ), __("Use the slug from the bbPress default settings for the single user base.", "gd-members-directory-for-bbpress"), Type::BOOLEAN, $this->value( 'rewrite_default', 'settings' ) )
							)
						),
						array(
							'label'    => __("Custom URL slug", "gd-members-directory-for-bbpress"),
							'name'     => '',
							'class'    => '',
							'settings' => array(
								EL::i( 'settings', 'rewrite_custom', __( "Slug", "breadcrumbspress" ), __("If the previous option is disabled, set the slug to be used for the directory URL.", "gd-members-directory-for-bbpress"), Type::SLUG, $this->value( 'rewrite_custom', 'settings' ) )
							)
						)
					)
				)
			),
			'query'   => array(
				'query_basic' => array(
					'name'     => __( "Query Basics", "breadcrumbspress" ),
					'sections' => array(
						array(
							'label'    => '',
							'name'     => '',
							'class'    => '',
							'settings' => array(
								EL::i( 'settings', 'members_with_posts_only', __( "Members with posts only", "breadcrumbspress" ), __("Directory should include only users that have posted in the forums.", "gd-members-directory-for-bbpress"), Type::BOOLEAN, $this->value( 'members_with_posts_only', 'settings' ) ),
								EL::i( 'settings', 'members_per_page', __("Members listed per page", "gd-members-directory-for-bbpress"), __("Number of members to show on a single directory page.", "gd-members-directory-for-bbpress"), Type::ABSINT, $this->value( 'members_per_page', 'settings' ) )
							)
						)
					)
				),
				'query_filter' => array(
					'name'     => __( "Query Filters", "breadcrumbspress" ),
					'sections' => array(
						array(
							'label'    => '',
							'name'     => '',
							'class'    => '',
							'settings' => array(
								EL::i( 'settings', 'members_roles_available', __( "User roles", "gd-members-directory-for-bbpress"), __("Only users with selected roles will be available in the members directory.", "gd-members-directory-for-bbpress"), Type::CHECKBOXES, $this->value( 'members_roles_available', 'settings' ) )->data('array', gdmed_get_user_roles())->args(array('class' => 'gdmed-roles'))
							)
						)
					)
				),
				'query_advanced' => array(
					'name'     => __( "Query Advanced", "breadcrumbspress" ),
					'sections' => array(
						array(
							'label'    => '',
							'name'     => '',
							'class'    => '',
							'settings' => array(
								EL::i( 'settings', 'query_order_fix', __("Fix the Order issue", "gd-members-directory-for-bbpress"), __("Built-in WordPress query has a problem when ordering data by meta fields, not showing the users that don't have particular meta field set. Because of that, ordering by last activity and few other things can return only few users as a result. This fix modifies SQL query to get proper results.", "gd-members-directory-for-bbpress"), Type::BOOLEAN, $this->value( 'query_order_fix', 'settings' ) )
							)
						)
					)
				)
			),
			'display'  => array(
				'display_filter' => array(
					'name'     => __( "Directory Filtering", "breadcrumbspress" ),
					'sections' => array(
						array(
							'label'    => '',
							'name'     => '',
							'class'    => '',
							'settings' => array(
								EL::i( 'settings', 'display_roles_filter', __("Display roles filter", "gd-members-directory-for-bbpress"), __("Show dropdown list of user roles to filter the list of members.", "gd-members-directory-for-bbpress"), Type::BOOLEAN, $this->value( 'display_roles_filter', 'settings' ) )
							)
						)
					)
				),
				'display_directory' => array(
					'name'     => __( "Directory Display", "breadcrumbspress" ),
					'sections' => array(
						array(
							'label'    => '',
							'name'     => '',
							'class'    => '',
							'settings' => array(
								EL::i( 'settings', 'display_avatar_in_list', __("Display member avatars", "gd-members-directory-for-bbpress"), __("Show avatar for all members in the list.", "gd-members-directory-for-bbpress"), Type::BOOLEAN, $this->value( 'display_avatar_in_list', 'settings' ) )
							)
						)
					)
				)
			)
		);
	}
}
