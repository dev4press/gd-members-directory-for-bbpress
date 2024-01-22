<?php

namespace Dev4Press\Plugin\GDMED\Basic;

use Dev4Press\v47\Core\Plugins\Information as BaseInformation;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Information extends BaseInformation {
	public $code = 'gd-members-directory-for-bbpress';

	public $version = '2.6';
	public $build = 180;
	public $edition = 'free';
	public $status = 'stable';
	public $updated = '2024.02.16';
	public $released = '2019.10.14';

	public $is_bbpress_plugin = true;

	public $github_url = 'https://github.com/dev4press/gd-members-directory-for-bbpress';
	public $wp_org_url = 'https://wordpress.org/plugins/gd-members-directory-for-bbpress/';
}
