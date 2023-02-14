<?php

namespace Dev4Press\Plugin\GDMED\Directory;

use Dev4Press\v39\Core\Plugins\DBLite;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class DB extends DBLite {
	public static function instance() : DB {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new DB();
		}

		return $instance;
	}

	public function get_users_last_posts( $user_ids ) : array {
		$user_ids = $this->clean_ids_list( $user_ids );

		if ( empty( $user_ids ) ) {
			return array();
		}

		$sql = "SELECT `post_author`, max(`ID`) AS post_id FROM " . $this->wpdb()->posts . " WHERE `post_author` IN (" . join( ',', $user_ids ) . ") AND post_type IN ('" . bbp_get_topic_post_type() . "', '" . bbp_get_reply_post_type() . "') AND `post_status` IN ('" . bbp_get_public_status_id() . "', '" . bbp_get_closed_status_id() . "') GROUP BY `post_author`";
		$raw = $this->get_results( $sql );

		return wp_list_pluck( $raw, 'post_id', 'post_author' );
	}

	public function get_reply_parents( $reply_ids ) : array {
		$reply_ids = $this->clean_ids_list( $reply_ids );

		if ( empty( $reply_ids ) ) {
			return array();
		}

		$sql = "SELECT `post_parent` FROM " . $this->wpdb()->posts . " WHERE `ID` IN (" . join( ', ', $reply_ids ) . ") AND `post_type` = '" . bbp_get_reply_post_type() . "'";
		$raw = $this->get_results( $sql );

		return wp_list_pluck( $raw, 'post_parent' );
	}
}
