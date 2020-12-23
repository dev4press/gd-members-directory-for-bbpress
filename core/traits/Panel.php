<?php

namespace Dev4Press\Plugin\GDMED\Traits;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait Panel {
	/** @param $admin \Dev4Press\Plugin\GDMED\Admin\Plugin */
	protected function local_enqueue_scripts( $admin ) {
		$admin->css( 'admin' );
		$admin->js( 'admin' );
	}
}
