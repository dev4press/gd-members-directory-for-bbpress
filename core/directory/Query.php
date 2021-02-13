<?php

namespace Dev4Press\Plugin\GDMED\Directory;

use stdClass;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Query {
	private $_r = array();

	private $_f = array(
		'orderby' => 'name',
		'order'   => 'ASC',
		'search'  => '',
		'role'    => ''
	);

	/** @var null|\Dev4Press\Plugin\GDMED\Directory\MemberQuery */
	private $_query = null;

	/** @var null|\stdClass */
	private $_pager = null;

	/** @var null|\Dev4Press\Plugin\GDMED\Directory\Member|\WP_User */
	private $_member = null;

	public $members = array();
	public $members_ids = array();
	public $current_member = - 1;
	public $members_count = 0;
	public $in_the_loop = false;

	public $members_latest = array();

	public function __construct( $args = array(), $parse_request = true ) {
		$this->_parse_args( $args, $parse_request );
		$this->_run_query();
	}

	/**
	 * @param array $args
	 * @param bool  $parse_request
	 *
	 * @return Query
	 */
	public static function instance( $args = array(), $parse_request = true ) : Query {
		static $_members_query = false;

		if ( $_members_query === false ) {
			$_members_query = new Query( $args, $parse_request );
		}

		return $_members_query;
	}

	private function _parse_args( $args = array(), $parse_request = true ) {
		$default = array(
			'members_with_posts_only' => gdmed_settings()->get( 'members_with_posts_only' ),
			'members_per_page'        => gdmed_settings()->get( 'members_per_page' ),
			'members_roles_available' => gdmed_settings()->get( 'members_roles_available' ),

			'orderby' => 'name',
			'order'   => 'ASC',
			'search'  => '',
			'role'    => ''
		);

		if ( $parse_request ) {
			if ( isset( $_GET['orderby'] ) && ! empty( $_GET['orderby'] ) ) {
				$valid = array_keys( gdmed()->get_sort_orderby_values() );
				$value = d4p_sanitize_slug( $_GET['orderby'] );

				if ( in_array( $value, $valid ) ) {
					$default['orderby'] = $value;
				}
			}

			if ( isset( $_GET['order'] ) && ! empty( $_GET['order'] ) ) {
				$valid = array_keys( gdmed()->get_sort_order_values() );
				$value = strtoupper( d4p_sanitize_slug( $_GET['order'] ) );

				if ( in_array( $value, $valid ) ) {
					$default['order'] = $value;
				}
			}

			if ( isset( $_GET['search'] ) && ! empty( $_GET['search'] ) ) {
				$default['search'] = sanitize_title( $_GET['search'] );
			}

			if ( isset( $_GET['role'] ) && ! empty( $_GET['role'] ) ) {
				$valid = array_keys( gdmed()->get_filter_roles_values() );
				$value = d4p_sanitize_slug( $_GET['role'] );

				if ( in_array( $value, $valid ) ) {
					$default['role'] = $value;
				}
			}
		}

		$args = bbp_parse_args( $args, $default, 'has_members_args' );

		$this->_f = shortcode_atts( $this->_f, $args );

		$d = array(
			'fields' => 'all_with_meta',
			'paged'  => bbp_get_paged(),
			'number' => $args['members_per_page'],
			'order'  => strtolower( $args['order'] ) == 'asc' ? 'ASC' : 'DESC'
		);

		if ( ! empty( $args['search'] ) ) {
			$d['search'] = '*' . $args['search'] . '*';
		}

		if ( ! empty( $args['role'] ) ) {
			$d['role__in'] = $args['role'];
		} else {
			$d['role__in'] = $args['members_roles_available'];
		}

		$d['meta_query'] = array(
			'relation' => 'OR',
			array(
				'key'     => gdmed_db()->prefix() . '_bbp_topic_count',
				'value'   => 0,
				'type'    => 'numeric',
				'compare' => '>'
			),
			array(
				'key'     => gdmed_db()->prefix() . '_bbp_reply_count',
				'value'   => 0,
				'type'    => 'numeric',
				'compare' => '>'
			)
		);

		switch ( $args['orderby'] ) {
			default:
			case 'last_activity':
				$d['orderby']  = 'meta_value_num';
				$d['meta_key'] = gdmed_db()->prefix() . 'bbp_last_activity';
				break;
			case 'last_posted':
				$d['orderby']  = 'meta_value_num';
				$d['meta_key'] = gdmed_db()->prefix() . '_bbp_last_posted';
				break;
			case 'topics':
				$d['orderby']  = 'meta_value_num';
				$d['meta_key'] = gdmed_db()->prefix() . '_bbp_topic_count';
				break;
			case 'replies':
				$d['orderby']  = 'meta_value_num';
				$d['meta_key'] = gdmed_db()->prefix() . '_bbp_reply_count';
				break;
			case 'name':
				$d['orderby'] = 'display_name';
				break;
			case 'registered':
				$d['orderby'] = 'registered';
				break;
		}

		$this->_r = bbp_parse_args( array(), $d, 'has_members_results' );
	}

	private function _run_query() {
		$this->_query = new MemberQuery( $this->_r );
		$this->_pager = new stdClass();

		if ( empty( $this->_query->get_results() ) && $this->_query->get_total() > 0 && $this->_r['paged'] > 1 ) {
			$this->_r['paged'] = 1;

			$this->_query = new MemberQuery( $this->_r );
		}

		$this->members     = array();
		$this->members_ids = array();

		foreach ( $this->_query->get_results() as $user ) {
			$this->members[]     = new Member( $user );
			$this->members_ids[] = $user->ID;
		}

		$this->members_latest = gdmed_db()->get_users_last_posts( $this->members_ids );

		if ( ! empty( $this->members_latest ) ) {
			$to_prime = array_values( $this->members_latest );
			$to_prime = array_merge( $to_prime, gdmed_db()->get_reply_parents( $to_prime ) );

			_prime_post_caches( $to_prime );
		}

		$this->members_count  = count( $this->members );
		$this->current_member = - 1;
		$this->in_the_loop    = false;

		$this->_pager->per_page = $this->_r['number'];
		$this->_pager->current  = $this->_r['paged'];
		$this->_pager->count    = $this->members_count;
		$this->_pager->total    = $this->_query->get_total();

		if ( $this->_pager->count > 0 ) {
			$total_pages = $this->_pager->per_page == $this->_pager->total ? 1 : ceil( $this->_pager->total / $this->_pager->per_page );

			$bbp_members_pagination = apply_filters( 'gdmed_members_results_pagination', array(
				'base'    => gdmed_get_members_pagination_base(),
				'total'   => $total_pages,
				'current' => $this->_pager->current
			) );

			$this->_pager->pagination = gdmed_paginate_links( $bbp_members_pagination );
		}
	}

	/** @return null|\Dev4Press\Plugin\GDMED\Directory\Member|\WP_User */
	public function member() {
		return $this->_member;
	}

	public function the_member() {
		$this->in_the_loop = true;

		$this->next_member();
	}

	public function next_member() {
		$this->current_member ++;

		$this->_member = $this->members[ $this->current_member ];
	}

	public function have_members() : bool {
		if ( $this->current_member + 1 < $this->members_count ) {
			return true;
		} else if ( $this->current_member + 1 == $this->members_count && $this->members_count > 0 ) {
			$this->rewind_members();
		}

		$this->in_the_loop = false;

		return false;
	}

	public function rewind_members() {
		$this->current_member = - 1;

		if ( $this->members_count > 0 ) {
			$this->_member = $this->members[0];
		}
	}

	public function query() {
		return $this->_query;
	}

	public function pager() {
		return $this->_pager;
	}

	public function has_results() {
		return apply_filters( 'gdmed_has_members_results', $this->_pager->count > 0, $this->query() );
	}

	public function pagination_count() {
		echo $this->get_pagination_count();
	}

	public function get_pagination_count() {
		$total_int = $this->_pager->total;
		$ppp_int   = $this->_pager->per_page;
		$start_int = absint( ( $this->_pager->current - 1 ) * $ppp_int ) + 1;
		$to_int    = absint( $start_int + ( $ppp_int - 1 ) > $total_int ? $total_int : $start_int + ( $ppp_int - 1 ) );

		$total_num = bbp_number_format( $total_int );
		$from_num  = bbp_number_format( $start_int );
		$to_num    = bbp_number_format( $to_int );

		if ( empty( $to_num ) ) {
			$retstr = sprintf( _n( 'Viewing %1$s result', 'Viewing %1$s results', $total_int, "gd-members-directory-for-bbpress" ), $total_num );
		} else {
			$retstr = sprintf( _n( 'Viewing %2$s results (of %4$s total)', 'Viewing %1$s results - %2$s through %3$s (of %4$s total)', $this->_pager->count, "gd-members-directory-for-bbpress" ), $this->_pager->count, $from_num, $to_num, $total_num );
		}

		return apply_filters( 'gdmed_get_members_pagination_count', esc_html( $retstr ) );
	}

	public function pagination_links() {
		echo $this->get_pagination_links();
	}

	public function get_pagination_links() {
		if ( ! isset( $this->_pager->pagination ) || empty( $this->_pager->pagination ) ) {
			return '';
		}

		return apply_filters( 'gdmed_get_members_pagination_links', $this->_pager->pagination );
	}

	public function order_id() : int {
		return $this->current_member;
	}

	public function member_class() {
		echo $this->get_member_class();
	}

	public function get_member_class() : string {
		$even_odd = ( $this->order_id() % 2 ) ? 'even' : 'odd';

		$classes = array(
			'member',
			'loop-item-' . $this->order_id(),
			$even_odd,
		);

		$classes = apply_filters( 'gdmed_get_member_class', $classes, $this );

		return 'class="' . implode( ' ', $classes ) . '"';
	}

	public function get_filter_value( $name, $default = '' ) {
		if ( isset( $this->_f[ $name ] ) ) {
			return $this->_f[ $name ];
		}

		return $default;
	}
}