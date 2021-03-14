<?php

namespace Dev4Press\Plugin\GDMED\Directory;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Expand {
	public function __construct() {
		$wp_actions = array(
			'parse_query' => 3,
			'is_bbpress'  => 10
		);

		$bbp_actions = array(
			'add_rewrite_tags'  => 6,
			'add_rewrite_rules' => 4
		);

		$bbp_filters = array(
			'body_class'                      => 10,
			'get_template_stack'              => 10,
			'before_title_parse_args'         => 10,
			'after_get_breadcrumb_parse_args' => 10,
			'template_include_theme_supports' => 10,
			'template_include_theme_compat'   => 10,
			'default_styles'                  => 10
		);

		foreach ( $wp_actions as $class_action => $priority ) {
			add_action( $class_action, array( $this, $class_action ), $priority );
		}

		foreach ( $bbp_actions as $class_action => $priority ) {
			add_action( 'bbp_' . $class_action, array( $this, $class_action ), $priority );
		}

		foreach ( $bbp_filters as $class_action => $priority ) {
			add_filter( 'bbp_' . $class_action, array( $this, $class_action ), $priority );
		}

		if ( gdmed()->theme_package == 'quantum' ) {
			add_action( 'bbp_template_before_members_directory', array( $this, 'enqueue_style' ) );
			add_action( 'bbp_template_before_members_loop', array( $this, 'enqueue_style' ) );
		}
	}

	public static function instance() : Expand {
		static $_instance = false;

		if ( $_instance === false ) {
			$_instance = new Expand();
		}

		return $_instance;
	}

	public function add_rewrite_tags() {
		add_rewrite_tag( '%' . gdmed_get_members_rewrite_id() . '%', '([^/]+)' );
	}

	public function add_rewrite_rules() {
		$priority = 'top';

		$paged_id     = bbp_get_paged_rewrite_id();
		$members_id   = gdmed_get_members_rewrite_id();
		$members_slug = gdmed_get_members_slug();

		$paged_slug = bbp_get_paged_slug();

		$members_paged_rule = '/' . $paged_slug . '/?([0-9]{1,})/?$';
		$members_root_rule  = '/?$';

		add_rewrite_rule( $members_slug . $members_paged_rule, 'index.php?' . $members_id . '&' . $paged_id . '=$matches[1]', $priority );
		add_rewrite_rule( $members_slug . $members_root_rule, 'index.php?' . $members_id, $priority );
	}

	public function parse_query( $posts_query ) {
		if ( ! $posts_query->is_main_query() ) {
			return;
		}

		if ( true === $posts_query->get( 'suppress_filters' ) ) {
			return;
		}

		if ( is_admin() ) {
			return;
		}

		if ( isset( $posts_query->query_vars[ gdmed_get_members_rewrite_id() ] ) ) {
			$posts_query->is_home                  = false;
			$posts_query->bbp_is_members_directory = true;
			$posts_query->bbp_is_404               = false;
		}
	}

	public function body_class( $classes ) {
		if ( gdmed_is_members_directory() ) {
			if ( ! in_array( 'bbpress', $classes ) ) {
				$classes[] = 'bbpress';
			}

			$classes[] = 'bbp-members-directory';
			$classes[] = 'forum-members-directory';
		}

		return $classes;
	}

	public function is_bbpress( $retval ) : bool {
		if ( gdmed_is_members_directory() ) {
			$retval = true;
		}

		return $retval;
	}

	public function template_include_theme_supports( $template ) {
		if ( gdmed_is_members_directory() ) {
			$new_template = gdmed_get_members_directory_template();

			if ( ! empty( $new_template ) ) {
				$template = bbp_set_template_included( $new_template );
			}
		}

		return $template;
	}

	public function before_title_parse_args( $new_title ) {
		if ( gdmed_is_members_directory() ) {
			$new_title['text'] = gdmed()->get_page_title();
		}

		return $new_title;
	}

	public function after_get_breadcrumb_parse_args( $r ) : array {
		if ( gdmed_is_members_directory() ) {
			$r['current_text'] = gdmed()->get_breadcrumb_title();
		}

		return (array)$r;
	}

	public function template_include_theme_compat( $template ) : string {
		if ( gdmed_is_members_directory() ) {
			bbp_theme_compat_reset_post( array(
				'ID'             => 0,
				'post_title'     => gdmed()->get_page_title(),
				'post_author'    => 0,
				'post_date'      => 0,
				'post_content'   => gdmed_display_members_directory(),
				'post_type'      => '',
				'post_status'    => bbp_get_public_status_id(),
				'is_archive'     => true,
				'comment_status' => 'closed'
			) );

			bbp_remove_all_filters( 'the_content' );

			$template = bbp_get_theme_compat_templates();
		}

		return $template;
	}

	public function get_template_stack( $stack ) : array {
		if ( gdmed()->theme_package == 'quantum' ) {
			$stack[] = GDMED_PATH . 'templates/quantum/bbpress';
			$stack[] = GDMED_PATH . 'templates/quantum';
		}

		$stack[] = GDMED_PATH . 'templates/default/bbpress';
		$stack[] = GDMED_PATH . 'templates/default';

		return (array)$stack;
	}

	public function default_styles( $styles ) : array {
		$rtl = is_rtl() ? '-rtl' : '';
		$min = gdmed()->is_debug ? '' : '.min';

		$styles['gdmed-members-directory'] = array(
			'file'         => 'css/members' . $rtl . $min . '.css',
			'dependencies' => array()
		);

		return (array)$styles;
	}

	public function enqueue_style() {
		wp_enqueue_style( 'gdmed-members-directory' );
	}
}