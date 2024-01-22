<?php

use function Dev4Press\v47\Functions\panel;

?>

<div class="d4p-content">
    <div class="d4p-setup-wrapper">
        <div class="d4p-update-info">
			<?php

			include_once( GDMED_PATH . 'forms/setup/rules.php' );

			gdmed_settings()->set( 'install', false, 'info' );
			gdmed_settings()->set( 'update', false, 'info', true );

			?>

            <div class="d4p-install-block">
                <h4>
					<?php esc_html_e( 'All Done', 'gd-members-directory-for-bbpress' ); ?>
                </h4>
                <div>
					<?php esc_html_e( 'Installation completed.', 'gd-members-directory-for-bbpress' ); ?>
                </div>
            </div>

            <div class="d4p-install-confirm">
                <a class="button-primary" href="<?php echo panel()->a()->panel_url( 'about' ) ?>&install"><?php esc_html_e( 'Click here to continue', 'gd-members-directory-for-bbpress' ); ?></a>
            </div>
        </div>
    </div>
</div>