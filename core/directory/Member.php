<?php

namespace Dev4Press\Plugin\GDMED\Directory;

use WP_User;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @property int|mixed $ID
 * @property string    $user_registered
 */
class Member {
	/** @var WP_User|null */
	private $_user;

	public function __construct( WP_User $user ) {
		$this->_user = $user;
	}

	public function __get( $key ) {
		return $this->_user->$key;
	}

	public function role() : string {
		return bbp_get_user_role( $this->ID );
	}

	public function registration_timestamp() {
		return strtotime( $this->user_registered );
	}

	public function get_meta_info( $sep = ' &middot; ' ) : string {
		$items = array(
			'role'       => $this->get_meta_info_role(),
			'registered' => $this->get_meta_info_registered()
		);

		return join( $sep, $items );
	}

	public function get_meta_info_role() : string {
		return '<span class="role ' . esc_attr( $this->role() ) . '">' . bbp_get_dynamic_role_name( $this->role() ) . '</span>';
	}

	public function get_meta_info_registered() : string {
		return '<span class="registration">' . sprintf( _x( "Registered on: %s", "User meta, registration date", "gd-members-directory-for-bbpress" ), date( 'F j, Y', $this->registration_timestamp() ) ) . '</span>';
	}

	public function get_topics_info() : string {
		$count = get_user_option( '_bbp_topic_count', $this->ID );

		if ( $count == 0 ) {
			return sprintf( _x( "Topics: %s", "User statistics column, topics count", "gd-members-directory-for-bbpress" ), '<strong>0</strong>' );
		} else {
			return sprintf( _x( "Topics: %s", "User statistics column, topics count", "gd-members-directory-for-bbpress" ), '<a href="' . bbp_get_user_topics_created_url( $this->ID ) . '"><strong>' . $count . '</strong></a>' );
		}
	}

	public function get_replies_info() : string {
		$count = get_user_option( '_bbp_reply_count', $this->ID );

		if ( $count == 0 ) {
			return sprintf( _x( "Replies: %s", "User statistics column, replies count", "gd-members-directory-for-bbpress" ), '<strong>0</strong>' );
		} else {
			return sprintf( _x( "Replies: %s", "User statistics column, replies count", "gd-members-directory-for-bbpress" ), '<a href="' . bbp_get_user_replies_created_url( $this->ID ) . '"><strong>' . $count . '</strong></a>' );
		}
	}

	public function get_latest_activity() : string {
		if ( isset( gdmed_members_query()->members_latest[ $this->ID ] ) ) {
			$id = gdmed_members_query()->members_latest[ $this->ID ];

			if ( bbp_is_reply( $id ) ) {
				$url   = bbp_get_reply_url( $id );
				$title = bbp_get_reply_title_fallback( bbp_get_reply_title( $id ), $id );
				$what  = _x( "Reply: %s on %s", "Latest post column, title and date", "gd-members-directory-for-bbpress" );
				$date  = bbp_get_reply_post_date( $id );
			} else {
				$url   = get_permalink( $id );
				$title = bbp_get_topic_title( $id );
				$what  = _x( "Topic: %s on %s", "Latest post column, title and date", "gd-members-directory-for-bbpress" );
				$date  = bbp_get_topic_post_date( $id );
			}

			return sprintf( $what, '<a href="' . esc_url( $url ) . '">' . $title . '</a>', $date );
		} else {
			return __( "No activity found", "gd-members-directory-for-bbpress" );
		}
	}
}