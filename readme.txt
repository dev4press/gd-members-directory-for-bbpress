=== GD Members Directory for bbPress ===
Contributors: GDragoN
Donate link: https://buymeacoffee.com/millan
Tags: dev4press, bbpress, members, directory, widget, filter, search, users
Stable tag: 2.6
Requires at least: 5.8
Tested up to: 6.4
Requires PHP: 7.4
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Easy to use plugin for adding forum members directory page into bbPress powered forums including members filtering and additional widgets for listing members in the sidebar.

== Description ==
Easy to use plugin for adding forum members directory page into bbPress powered forums including members filtering and additional widgets for listing members in the sidebar. The plugin adds new URL endpoint based on the existing bbPress 'users' profile URL, and using theme compatibility method (the same as in bbPress), it adds the members directory with additional filters and sorting options.

The plugin has few settings to control the number of users per page, URL endpoint slug and a few more things. The plugin features are listed here:

* Members list shows various user information
* Options to a filter list by role or keyword
* Change results sorting (activity, registration, name...)
* Full RTL support for the directory styling
* Simple Widget for showing a list of members

Plugin default templates and styling are based on the default bbPress theme package. And, like with bbPress, all the templates used by the plugin can be replaced via theme. The plugin has full support for [GD Quantum Theme Pro for bbPress](https://plugins.dev4press.com/gd-quantum-theme-for-bbpress/) plugin by Dev4Press, including additional templates and styling.

= Quick Overview Video =
https://www.youtube.com/watch?v=IoU_s5-cBfU

= Home and GitHub =
* Learn more: [GD Members Directory for bbPress](https://plugins.dev4press.com/gd-members-directory-for-bbpress/) Website
* Contribute: [GD Members Directory for bbPress](https://github.com/dev4press/gd-members-directory-for-bbpress) on GitHub

= Documentation and Support =
To get help with the plugin, you can use WordPress.org support forums, or you can use Dev4Press.com support forums.

* Documentation: [GD Members Directory for bbPress](https://support.dev4press.com/kb/product/gd-members-directory-for-bbpress/)
* Support Forum: [Dev4Press Support](https://support.dev4press.com/forums/forum/plugins/gd-members-directory-for-bbpress/)

= More free dev4Press.com plugins for bbPress =
* [GD Forum Manager](https://wordpress.org/plugins/gd-forum-manager-for-bbpress/) - quick and bulk forums and topics edit
* [GD Power Search](https://wordpress.org/plugins/gd-power-search-for-bbpress/) - add advanced search to the bbPress topics
* [GD Topic Polls](https://wordpress.org/plugins/gd-topic-polls/) - add polls to the bbPress topics
* [GD bbPress Attachments](https://wordpress.org/plugins/gd-bbpress-attachments/) - attachments for topics and replies
* [GD bbPress Tools](https://wordpress.org/plugins/gd-bbpress-tools/) - various expansion tools for forums

== Installation ==
= General Requirements =
* PHP: 7.4 or newer
* bbPress 2.6 or newer

= WordPress Requirements =
* WordPress: 5.8 or newer

= Basic Installation =
* Plugin folder in the WordPress plugins folder should be `gd-members-directory-for-bbpress`.
* Upload `gd-members-directory-for-bbpress` folder to the `/wp-content/plugins/` directory.
* Activate the plugin through the 'Plugins' menu in WordPress.
* Plugin settings are available under WordPress 'Settings' panel

== Frequently Asked Questions ==
= Where can I configure the plugin? =
Open the WordPress 'Settings' menu, there you will find 'GD Members Directory' panel.

== Changelog ==
= Version: 2.6 / february 12 2024 =
* New: tested with WordPress 6.4
* New: tested with PHP 8.3
* Edit: many improvements to the default styling
* Edit: admin interface improvements related to a shared library
* Edit: Dev4Press Library 4.7
* Edit: changes related to WordPress and PHP code standards
* Fix: few small fixes related to the main query objects

= Version: 2.5 / july 16 2023 =
* New: tested with WordPress 6.2 and 6.3
* Edit: Dev4Press Library 4.2

= Version: 2.4 / february 14 2023 =
* New: updated plugin system requirements
* New: various updates for the plugin interface
* New: tested with WordPress 6.1
* New: tested with PHP 8.0, 8.1 and 8.2
* Edit: d4pLib 3.9.3
* Fix: dashboard shows wrong Directory URL in some cases
* Fix: function to determine Directory URL returns wrong value

= Version: 2.3 / may 17 2022 =
* New: tested with WordPress 6.0
* Edit: few minor updates for the plugin interface
* Edit: d4pLib 3.8
* Fix: wrong class reference for one of the panels

= Version: 2.2 / march 11 2022 =
* New: tested with WordPress 5.9
* New: improved admin side interface through updated shared library
* Edit: few more improvements to core PHP code
* Edit: many improvements to sanitation and escaping on echo
* Edit: more string translations using escape functions
* Edit: updated plugin requirements
* Edit: d4pLib 3.7.4
* Fix: wrong function for getting topic post date

= Version: 2.1.2 / july 26 2021 =
* New: tested with WordPress 5.8
* Edit: d4pLib 3.4.3
* Fix: several issues with WordPress 5.8 Block Widgets

= Version: 2.1.1 / july 6 2021 =
* Fix: showing all members (with no posts) not working

= Version: 2.1 / april 5 2021 =
* Edit: various updates to the plugin code
* Edit: d4pLib 3.4.1
* Fix: problem with the function to generate pagination
* Fix: various typos or other wording issues
* Fix: wrong names for some of the core functions

= Version: 2.0.1 / february 15 2021 =
* Edit: d4pLib 3.4

= Version: 2.0 / december 29 2020 =
* New: the plugin is now available for free
* New: mostly rewritten with autoloader and namespaces
* Edit: few improvements to the main members query
* Edit: d4pLib 3.3.1
* Fix: members search issue when using paged results

= Version: 1.1 / november 18 2019 =
* Edit: default styling for Quantum theme updated
* Edit: support for all Quantum theme variants
* Fix: few minor issues with the default Quantum styling

= Version: 1.0.2 / november 14 2019 = 
* New: bbPress 2.5.x compatibility functions
* Fix: several missing functions under bbPress 2.5.x

= Version: 1.0.1 / october 30 2019 =
* Edit: responsive styling for the filter and order elements
* Fix: quantum theme template had wrong header title
* Fix: minor styling issues with the filter elements
* Fix: broken links on the main settings page

= Version: 1.0 / october 14 2019 = 
* New: first official version

== Upgrade Notice ==
= 2.6 =
Various updates and improvements

= 2.5 =
Various updates and improvements

= 2.4 =
Various updates and improvements

= 2.3 =
Various updates and improvements

= 2.2 =
Various updates and improvements

== Screenshots ==
1. Members Directory page
2. Members Directory page when using GD Quantum Theme Pro for bbPress
3. Responsive view for the Members Directory page
4. Members Directory widget
5. Plugin main admin panel
6. Plugin settings admin panel
