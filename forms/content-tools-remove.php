<?php

use function Dev4Press\v39\Functions\panel;

?>
<div class="d4p-content">
    <div class="d4p-group d4p-group-information">
        <h3><?php esc_html_e( "Important Information", "gd-members-directory-for-bbpress" ); ?></h3>
        <div class="d4p-group-inner">
			<?php esc_html_e( "This tool can remove plugin settings saved in the WordPress options table added by the plugin.", "gd-members-directory-for-bbpress" ); ?>
            <br/><br/>
			<?php esc_html_e( "Deletion operations are not reversible, and it is highly recommended to create database backup before proceeding with this tool.", "gd-members-directory-for-bbpress" ); ?>
			<?php esc_html_e( "If you choose to remove plugin settings, once that is done, all settings will be reinitialized to default values if you choose to leave plugin active.", "gd-members-directory-for-bbpress" ); ?>
        </div>
    </div>

    <div class="d4p-group d4p-group-tools">
        <h3><?php esc_html_e( "Remove plugin settings", "gd-members-directory-for-bbpress" ); ?></h3>
        <div class="d4p-group-inner">
            <label>
                <input type="checkbox" class="widefat" name="gdmedtools[remove][settings]" value="on"/> <?php esc_html_e( "Main Settings", "gd-members-directory-for-bbpress" ); ?>
            </label>
        </div>
    </div>

    <div class="d4p-group d4p-group-tools">
        <h3><?php esc_html_e( "Disable Plugin", "gd-members-directory-for-bbpress" ); ?></h3>
        <div class="d4p-group-inner">
            <label>
                <input type="checkbox" class="widefat" name="gdmedtools[remove][disable]" value="on"/> <?php esc_html_e( "Disable plugin", "gd-members-directory-for-bbpress" ); ?>
            </label>
        </div>
    </div>

	<?php panel()->include_accessibility_control(); ?>
</div>
