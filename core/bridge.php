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

function gdmed() : Plugin {
	return Plugin::instance();
}

function gdmed_settings() : Settings {
	return Settings::instance();
}

function gdmed_db() : DB {
	return DB::instance();
}

function gdmed_admin() : AdminPlugin {
	return AdminPlugin::instance();
}

function gdmed_expand() : Expand {
	return Expand::instance();
}

function gdmed_members_query( array $args = array(), bool $parse_request = true ) : Query {
	return Query::instance( $args, $parse_request );
}
