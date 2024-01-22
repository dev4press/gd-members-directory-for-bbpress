<?php

namespace Dev4Press\Plugin\GDMED\Admin\Panel;

use Dev4Press\v47\Core\UI\Admin\PanelSettings;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings extends PanelSettings {
	public $settings_class = '\\Dev4Press\\Plugin\\GDMED\\Admin\\Settings';

	public function __construct( $admin ) {
		parent::__construct( $admin );

		$this->subpanels = $this->subpanels + array(
				'rewrite' => array(
					'title'      => __( 'Directory URL', 'gd-members-directory-for-bbpress' ),
					'icon'       => 'ui-cog',
					'break'      => __( 'Basic', 'gd-members-directory-for-bbpress' ),
					'break-icon' => 'ui-tasks',
					'info'       => __( 'These are basic settings for controlling the URL for the members directory.', 'gd-members-directory-for-bbpress' ),
				),
				'query'   => array(
					'title'      => __( 'Query Control', 'gd-members-directory-for-bbpress' ),
					'icon'       => 'ui-code',
					'break'      => __( 'Frontend', 'gd-members-directory-for-bbpress' ),
					'break-icon' => 'ui-tasks',
					'info'       => __( 'These are basic settings for controlling the members directory page query.', 'gd-members-directory-for-bbpress' ),
				),
				'display' => array(
					'title' => __( 'Display Control', 'gd-members-directory-for-bbpress' ),
					'icon'  => 'ui-palette',
					'info'  => __( 'With these settings you can control some aspects of the members directory page display.', 'gd-members-directory-for-bbpress' ),
				),
			);
	}
}
