<?php

namespace Dev4Press\Plugin\GDMED\Basic;

use Dev4Press\Core\Plugins\Information as BaseInformation;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Information extends BaseInformation {
	public $code = 'gd-members-directory-for-bbpress';

	public $version = '2.0';
	public $build = 100;
	public $edition = 'pro';
	public $status = 'stable';
	public $updated = '2020.12.28';
	public $released = '2019.10.14';

	public function __construct() {
		$this->plugins['bbpress'] = '2.6.2';
	}
}
