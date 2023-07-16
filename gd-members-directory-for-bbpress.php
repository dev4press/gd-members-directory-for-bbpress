<?php

/*
Plugin Name:       GD Members Directory for bbPress
Plugin URI:        https://plugins.dev4press.com/gd-members-directory-for-bbpress/
Description:       Easy to use plugin for adding forum members directory page into bbPress powered forums including members filtering and additional widgets for listing members in the sidebar.
Author:            Milan Petrovic
Author URI:        https://www.dev4press.com/
Text Domain:       gd-members-directory-for-bbpress
Version:           2.5
Requires at least: 5.5
Tested up to:      6.3
Requires PHP:      7.3
License:           GPLv3 or later
License URI:       https://www.gnu.org/licenses/gpl-3.0.html

== Copyright ==
Copyright 2008 - 2023 Milan Petrovic (email: support@dev4press.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>
*/

use Dev4Press\v42\WordPress;

$gdmed_dirname_basic = dirname( __FILE__ ) . '/';
$gdmed_urlname_basic = plugins_url( '/', __FILE__ );

define( 'GDMED_PATH', $gdmed_dirname_basic );
define( 'GDMED_URL', $gdmed_urlname_basic );
define( 'GDMED_D4PLIB', $gdmed_dirname_basic . 'd4plib/' );

require_once( GDMED_D4PLIB . 'core.php' );

require_once( GDMED_PATH . 'core/autoload.php' );
require_once( GDMED_PATH . 'core/bridge.php' );
require_once( GDMED_PATH . 'core/functions.php' );

gdmed();

gdmed_settings();

if ( WordPress::instance()->is_admin() ) {
	gdmed_admin();
}
