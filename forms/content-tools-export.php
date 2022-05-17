<?php

use function Dev4Press\v38\Functions\panel;

?>

<div class="d4p-content">
    <div class="d4p-group d4p-group-information d4p-group-export">
        <h3><?php esc_html_e( "Important Information", "gd-members-directory-for-bbpress" ); ?></h3>
        <div class="d4p-group-inner">
            <p><?php esc_html_e( "With this tool you export plugin settings into plain text file (JSON serialized content). Do not modify export file! Making changes to export file will make it unusable.", "gd-members-directory-for-bbpress" ); ?></p>
        </div>
    </div>

	<?php panel()->include_accessibility_control(); ?>
</div>
