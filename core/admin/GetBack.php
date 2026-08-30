<?php

namespace Dev4Press\Plugin\GDMED\Admin;

use Dev4Press\v56\Core\Admin\GetBack as BaseGetBack;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class GetBack extends BaseGetBack {
	protected function process() : void {
		parent::process();

		do_action( 'gdmed_admin_getback_handler', $this->a()->panel );
	}
}
