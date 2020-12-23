<?php

/*
Plugin Name: GD Members Directory Pro for bbPress
Plugin URI: https://plugins.dev4press.com/gd-members-directory-for-bbpress/
Description: Easy to use plugin for adding forum members directory page into bbPress powered forums including members filtering and additional widgets for listing members in the sidebar.
Version: 1.1
Author: Milan Petrovic
Author URI: https://www.dev4press.com/
Text Domain: gd-members-directory-for-bbpress
Private: true

== Copyright ==
Copyright 2008 - 2019 Milan Petrovic (email: milan@gdragon.info)

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

$gdmed_dirname_basic = dirname(__FILE__).'/';
$gdmed_urlname_basic = plugins_url('/', __FILE__);

define('GDMED_PATH', $gdmed_dirname_basic);
define('GDMED_URL', $gdmed_urlname_basic);
define('GDMED_D4PLIB', $gdmed_dirname_basic.'d4plib/');

require_once(GDMED_D4PLIB.'core.php');

/*
require_once(GDMED_D4PLIB.'d4p.core.php');

d4p_includes(array(
    array('name' => 'settings', 'directory' => 'plugin'),
    array('name' => 'widget', 'directory' => 'plugin'),
    array('name' => 'wpdb', 'directory' => 'core'),
    array('name' => 'plugin', 'directory' => 'plugin'),
    array('name' => 'cache-wordpress', 'directory' => 'functions'),
    'functions',
    'sanitize', 
    'access', 
    'wp'
), GDMED_D4PLIB);

global $_gdmed_plugin, $_gdmed_settings;

require_once(GDMED_PATH.'core/version.php');
require_once(GDMED_PATH.'core/plugin.php');
require_once(GDMED_PATH.'core/settings.php');
require_once(GDMED_PATH.'core/compatibility.php');
require_once(GDMED_PATH.'core/functions.php');

require_once(GDMED_PATH.'core/objects/core.user-query.php');
require_once(GDMED_PATH.'core/objects/core.db.php');
require_once(GDMED_PATH.'core/objects/core.expand.php');
require_once(GDMED_PATH.'core/objects/core.member.php');
require_once(GDMED_PATH.'core/objects/core.query.php');

$_gdmed_plugin = new gdmed_core_plugin();
$_gdmed_settings = new gdmed_core_settings();

/** @return gdmed_core_plugin */
function gdmed() {
    global $_gdmed_plugin;
    return $_gdmed_plugin;
}

/** return gdmed_core_settings */
function gdmed_settings() {
    global $_gdmed_settings;
    return $_gdmed_settings;
}

if (D4P_ADMIN) {
    d4p_includes(array(
        array('name' => 'functions', 'directory' => 'admin'),
        array('name' => 'admin-basic', 'directory' => 'plugin'),
        array('name' => 'admin-options', 'directory' => 'plugin')
    ), GDMED_D4PLIB);

    require_once(GDMED_PATH.'core/admin/plugin.php');
}
