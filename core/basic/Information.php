<?php

namespace Dev4Press\Plugin\GDMED\Basic;

use Dev4Press\v37\Core\Plugins\Information as BaseInformation;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Information extends BaseInformation {
	public $code = 'gd-members-directory-for-bbpress';

	public $version = '2.2';
	public $build = 130;
	public $edition = 'free';
	public $status = 'stable';
	public $updated = '2022.03.11';
	public $released = '2019.10.14';

	public $is_bbpress_plugin = true;

	public function __construct() {
		$this->plugins['bbpress'] = '2.6.2';
	}

	public static function instance() : Information {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new Information();
		}

		return $instance;
	}
}
