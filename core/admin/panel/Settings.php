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
					'title'      => __( "Directory URL", "breadcrumbspress" ),
					'icon'       => 'ui-cog',
					'break'      => __( "Basic", "breadcrumbspress" ),
					'break-icon' => 'ui-tasks',
					'info'       => __( "These are basic settings for controling the URL for the members directory.", "breadcrumbspress" )
				),
				'query'   => array(
					'title' => __( "Query Control", "breadcrumbspress" ),
					'icon'  => 'ui-code',
					'break'      => __( "Frontend", "breadcrumbspress" ),
					'break-icon' => 'ui-tasks',
					'info'  => __( "These are basic settings for controling the members directory page query.", "breadcrumbspress" )
				),
				'display'  => array(
					'title' => __( "Display Control", "breadcrumbspress" ),
					'icon'  => 'ui-palette',
					'info'  => __( "With these settings you can control some aspects of the members directory page display.", "breadcrumbspress" )
				)
			);
	}

	public function enqueue_scripts() {
		$this->local_enqueue_scripts( $this->a() );
	}
}
