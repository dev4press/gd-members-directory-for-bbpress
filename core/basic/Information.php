<?php

namespace Dev4Press\Plugin\GDMED\Basic;

use Dev4Press\v39\Core\Plugins\Information as BaseInformation;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Information extends BaseInformation {
	public $code = 'gd-members-directory-for-bbpress';

	public $version = '2.4';
	public $build = 150;
	public $edition = 'free';
	public $status = 'stable';
	public $updated = '2023.02.14';
	public $released = '2019.10.14';

	public $is_bbpress_plugin = true;
}
