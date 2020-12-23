<?php

namespace Dev4Press\Plugin\GDMED\Admin\Panel;

use Dev4Press\Core\UI\Admin\PanelSettings;
use Dev4Press\Plugin\GDMED\Traits\Panel as TraitPanel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Settings extends PanelSettings {
	use TraitPanel;

	public $settings_class = '\\Dev4Press\\Plugin\\GDMED\\Admin\\Settings';

	public function __construct( $admin ) {
		parent::__construct( $admin );

		$this->subpanels = $this->subpanels + array(
				'rewrite' => array(
					'title'      => __( "Directory URL", "gd-members-directory-for-bbpress" ),
					'icon'       => 'ui-cog',
					'break'      => __( "Basic", "gd-members-directory-for-bbpress" ),
					'break-icon' => 'ui-tasks',
					'info'       => __( "These are basic settings for controling the URL for the members directory.", "gd-members-directory-for-bbpress" )
				),
				'query'   => array(
					'title'      => __( "Query Control", "gd-members-directory-for-bbpress" ),
					'icon'       => 'ui-code',
					'break'      => __( "Frontend", "gd-members-directory-for-bbpress" ),
					'break-icon' => 'ui-tasks',
					'info'       => __( "These are basic settings for controling the members directory page query.", "gd-members-directory-for-bbpress" )
				),
				'display' => array(
					'title' => __( "Display Control", "gd-members-directory-for-bbpress" ),
					'icon'  => 'ui-palette',
					'info'  => __( "With these settings you can control some aspects of the members directory page display.", "gd-members-directory-for-bbpress" )
				)
			);
	}

	public function enqueue_scripts() {
		$this->local_enqueue_scripts( $this->a() );
	}
}
