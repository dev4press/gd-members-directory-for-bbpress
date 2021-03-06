<?php

use Dev4Press\Plugin\GDMED\Admin\Plugin as AdminPlugin;
use Dev4Press\Plugin\GDMED\Basic\Plugin;
use Dev4Press\Plugin\GDMED\Basic\Settings;
use Dev4Press\Plugin\GDMED\Directory\DB;
use Dev4Press\Plugin\GDMED\Directory\Expand;
use Dev4Press\Plugin\GDMED\Directory\Query;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @return \Dev4Press\Core\Plugins\Core|\Dev4Press\Plugin\GDMED\Basic\Plugin
 */
function gdmed() {
	return Plugin::instance();
}

/**
 * @return \Dev4Press\Core\Plugins\Settings|\Dev4Press\Plugin\GDMED\Basic\Settings
 */
function gdmed_settings() {
	return Settings::instance();
}

/**
 * @return \Dev4Press\Core\Plugins\DBLite|\Dev4Press\Plugin\GDMED\Directory\DB
 */
function gdmed_db() {
	return DB::instance();
}

/**
 * @return \Dev4Press\Core\Admin\Menu\Plugin|\Dev4Press\Core\Admin\Plugin|\Dev4Press\Core\Admin\Submenu\Plugin|\Dev4Press\Plugin\GDMED\Admin\Plugin
 */
function gdmed_admin() {
	return AdminPlugin::instance();
}

/**
 * @return \Dev4Press\Plugin\GDMED\Directory\Expand
 */
function gdmed_expand() : Expand {
	return Expand::instance();
}

/**
 * @param array $args
 * @param bool  $parse_request
 *
 * @return \Dev4Press\Plugin\GDMED\Directory\Query
 */
function gdmed_members_query( $args = array(), $parse_request = true ) : Query {
	return Query::instance( $args, $parse_request );
}
