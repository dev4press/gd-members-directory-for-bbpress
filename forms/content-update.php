<div class="d4p-content">
    <div class="d4p-update-info">
		<?php

		gdmed_settings()->set( 'install', false, 'info' );
		gdmed_settings()->set( 'update', false, 'info', true );

		?>

        <div class="d4p-install-block">
            <h4>
				<?php _e( "All Done", "gd-members-directory-for-bbpress" ); ?>
            </h4>
            <div>
				<?php _e( "Update completed.", "gd-members-directory-for-bbpress" ); ?>
            </div>
        </div>

        <div class="d4p-install-confirm">
            <a class="button-primary" href="<?php echo d4p_panel()->a()->panel_url( 'about' ) ?>&update"><?php _e( "Click here to continue", "gd-members-directory-for-bbpress" ); ?></a>
        </div>
    </div>
</div>