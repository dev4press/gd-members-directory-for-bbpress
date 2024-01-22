<?php

namespace Dev4Press\Plugin\GDMED\Directory;

use WP_User_Query;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class MemberQuery extends WP_User_Query {
	public function __construct( $query = null ) {
		if ( gdmed_settings()->get( 'query_order_fix' ) ) {
			add_action( 'pre_user_query', array( $this, 'override_pre_user_query' ) );
		}

		parent::__construct( $query );
	}

	public function override_pre_user_query( &$query ) {
		if ( ! empty( $query->query_vars['meta_key'] ) && $query->query_vars['orderby'] == 'meta_value_num' ) {
			global $wpdb;

			$query_var = $query->query_vars['meta_key'];

			$find              = $wpdb->users . " INNER JOIN " . $wpdb->usermeta . " ON (";
			$replace           = $wpdb->users . " LEFT JOIN " . $wpdb->usermeta . " ON ( " . $wpdb->usermeta . ".meta_key = '" . $query_var . "' AND ";
			$query->query_from = str_replace( $find, $replace, $query->query_from );

			$find               = $wpdb->usermeta . ".meta_key = '" . $query_var . "'";
			$replace            = "1=1";
			$query->query_where = str_replace( $find, $replace, $query->query_where );
		}
	}
}
