<?php

namespace Dev4Press\Plugin\GDMED\Admin;

use Dev4Press\v42\Core\Admin\GetBack as BaseGetBack;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GetBack extends BaseGetBack {
	protected function process() {
		parent::process();

		do_action( 'gdmed_admin_getback_handler', $this->a()->panel );
	}
}
