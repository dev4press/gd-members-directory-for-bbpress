<?php

use Dev4Press\v56\Core\Quick\WPR;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="d4p-install-block">
    <h4>
		<?php esc_html_e( 'Permalinks rewrite rules', 'gd-members-directory-for-bbpress' ); ?>
    </h4>
    <div>
		<?php

		flush_rewrite_rules();

		esc_html_e( 'Rewrite rules flushed.', 'gd-members-directory-for-bbpress' );

		?>
    </div>
</div>
