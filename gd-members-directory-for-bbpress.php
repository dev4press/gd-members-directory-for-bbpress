<?php
/**
 * Plugin Name:       membersDirectory for bbPress
 * Plugin URI:        https://plugins.dev4press.com/gd-members-directory-for-bbpress/
 * Description:       Add forum members directory page into bbPress powered forums including members filtering and additional widgets for listing members in the sidebar.
 * Author:            Milan Petrovic
 * Author URI:        https://www.dev4press.com/
 * Text Domain:       gd-members-directory-for-bbpress
 * Version:           2.8
 * Requires at least: 5.9
 * Tested up to:      6.6
 * Requires PHP:      7.4
 * Requires Plugins:  bbpress
 * License:           GPLv3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 *
 * == Copyright ==
 * Copyright 2008 - 2024 Milan Petrovic (email: support@dev4press.com)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 */

use Dev4Press\v54\WordPress;

define( 'GDMED_FILE', __FILE__ );
define( 'GDMED_PATH', __DIR__ . '/' );
define( 'GDMED_URL', plugins_url( '/', __FILE__ ) );

require_once GDMED_PATH . 'vendor/autoload.php';

require_once GDMED_PATH . 'vendor/dev4press/library/core.php';

require_once GDMED_PATH . 'core/autoload.php';
require_once GDMED_PATH . 'core/bridge.php';
require_once GDMED_PATH . 'core/functions.php';

gdmed();
gdmed_settings();

if ( WordPress::instance()->is_admin() ) {
	gdmed_admin();
}
