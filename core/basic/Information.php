<?php

namespace Dev4Press\Plugin\GDMED\Basic;

use Dev4Press\Core\Plugins\Information as BaseInformation;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Information extends BaseInformation {
	public $code = 'gd-members-directory-for-bbpress';

	public $version = '2.1.2';
	public $build = 117;
	public $edition = 'pro';
	public $status = 'stable';
	public $updated = '2021.07.26';
	public $released = '2019.10.14';

	public $is_bbpress_plugin = true;

	public function __construct() {
		$this->plugins['bbpress'] = '2.6.2';
	}
}
