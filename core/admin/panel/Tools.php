<?php

namespace Dev4Press\Plugin\GDMED\Admin\Panel;

use Dev4Press\Core\UI\Admin\PanelTools;
use Dev4Press\Plugin\GDMED\Traits\Panel as TraitPanel;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Tools extends PanelTools {
	use TraitPanel;

	public function enqueue_scripts() {
		$this->local_enqueue_scripts( $this->a() );
	}
}
