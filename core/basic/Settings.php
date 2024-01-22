<?php

namespace Dev4Press\Plugin\GDMED\Basic;

use Dev4Press\v47\Core\Plugins\Settings as BaseSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings extends BaseSettings {
	public $base = 'gdmed';

	public $settings = array(
		'core'     => array(
			'activated' => 0
		),
		'settings' => array(
			'rewrite_default'         => true,
			'rewrite_custom'          => 'users',
			'query_order_fix'         => true,
			'members_per_page'        => 25,
			'members_with_posts_only' => true,
			'members_roles_available' => array(
				'bbp_keymaster',
				'bbp_moderator',
				'bbp_participant',
				'bbp_spectator'
			),
			'display_roles_filter'    => true,
			'display_avatar_in_list'  => true
		)
	);

	protected function constructor() {
		$this->info = new Information();

		add_action( 'gdmed_load_settings', array( $this, 'init' ), 2 );
	}
}
