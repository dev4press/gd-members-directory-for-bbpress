<?php

namespace Dev4Press\Plugin\GDMED\Widget;

use Dev4Press\v42\WordPress\Legacy\Widget;
use Dev4Press\v42\Core\Quick\Sanitize;
use Dev4Press\v42\Core\UI\Widgets;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Directory extends Widget {
	public $results_cacheable = true;

	public $widget_base = 'd4p_gdmed_directory';

	public $defaults = array(
		'title'   => 'Members Directory',
		'role'    => '',
		'orderby' => 'name',
		'order'   => 'ASC',
		'limit'   => 5
	);

	public function __construct( $id_base = false, $name = '', $widget_options = array(), $control_options = array() ) {
		$this->widget_name        = 'GD Members Directory';
		$this->widget_description = __( "Show list of forum members.", "gd-members-directory-for-bbpress" );

		parent::__construct( $id_base, $name, $widget_options, $control_options );
	}

	public function the_form( $instance ) : array {
		$this->widgets_render = Widgets::instance( $this->widget_base, gdmed_admin() );

		return array(
			'content' => array(
				'name'    => __( "Content", "gd-members-directory-for-bbpress" ),
				'include' => array( 'directory-content' )
			)
		);
	}

	public function update( $new_instance, $old_instance ) : array {
		$instance = parent::update( $new_instance, $old_instance );

		$instance[ 'limit' ]   = absint( $new_instance[ 'limit' ] );
		$instance[ 'orderby' ] = Sanitize::slug( $new_instance[ 'orderby' ] );
		$instance[ 'order' ]   = Sanitize::slug( $new_instance[ 'order' ] );
		$instance[ 'role' ]    = Sanitize::slug( $new_instance[ 'role' ] );

		return $instance;
	}

	public function the_render( $instance, $results = false ) {
		include( bbp_locate_template( 'widget-directory.php' ) );
	}

	public function store_instance( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->get_defaults() );

		gdmed()->store_widget_instance( $instance );
	}
}