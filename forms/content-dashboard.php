<div class="d4p-content">
    <div class="d4p-group d4p-dashboard-card d4p-card-double">
        <h3><?php esc_html_e( "Plugin Status", "gd-members-directory-for-bbpress" ); ?></h3>
        <div class="d4p-group-inner">
            <span class="d4p-card-badge d4p-badge-right d4p-badge-ok"><i class="d4p-icon d4p-ui-check"></i><?php esc_html_e( "OK", "gd-members-directory-for-bbpress" ); ?></span>
            <div class="d4p-status-message"><?php esc_html_e( "Everything appears to be in order.", "gd-members-directory-for-bbpress" ); ?></div>
        </div>
    </div>

    <div class="d4p-group d4p-dashboard-card d4p-card-double">
        <h3><?php esc_html_e( "Accessing the Members Directory", "gd-members-directory-for-bbpress" ); ?></h3>
        <div class="d4p-group-inner">
            <p><?php esc_html_e( "The members directory for the bbPress powered forum, can be accessed via the URL displayed below. The directory follows the URL structure defined by bbPress, with the option to change the URL slug through plugin settings.", "gd-members-directory-for-bbpress" ); ?></p>
            <a class="button-primary" target="_blank" href="<?php echo gdmed_get_members_directory_url(); ?>"><?php echo gdmed_get_members_directory_url(); ?></a>
        </div>
    </div>

    <div class="d4p-group d4p-dashboard-card d4p-card-double">
        <h3><?php esc_html_e( "Troubleshooting", "gd-members-directory-for-bbpress" ); ?></h3>
        <div class="d4p-group-inner">
            <p><?php esc_html_e( "The plugin should work after activation without any additional changes. But, there are few things to keep in mind.", "gd-members-directory-for-bbpress" ); ?></p>
            <ul class="d4p-with-bullets d4p-full-width" style="margin-bottom: 1em">
                <li><?php esc_html_e( "If you make changes to the URL slug, make sure to clear the WordPress permalinks.", "gd-members-directory-for-bbpress" ); ?></li>
            </ul>

            <a href="options-general.php?page=gd-members-directory-for-bbpress&panel=tools&subpanel=updater" class="button-primary"><?php esc_html_e( "Plugin Recheck and Update", "gd-members-directory-for-bbpress" ); ?></a>
            <a href="options-permalink.php" class="button-secondary"><?php esc_html_e( "WordPress Permalinks", "gd-members-directory-for-bbpress" ); ?></a>
        </div>
    </div>
</div>
