<div class="d4p-content">
    <div class="d4p-cards-wrapper">
        <div class="d4p-group d4p-dashboard-card d4p-card-double d4p-dashboard-status">
            <h3><?php esc_html_e( "Plugin Status", "gd-members-directory-for-bbpress" ); ?></h3>
            <div class="d4p-group-inner">
                <div>
                    <span class="d4p-card-badge d4p-badge-right d4p-badge-ok"><i class="d4p-icon d4p-ui-check"></i><?php esc_html_e( "OK", "gd-members-directory-for-bbpress" ); ?></span>
                    <div class="d4p-status-message"><?php esc_html_e( "Everything appears to be in order.", "gd-members-directory-for-bbpress" ); ?></div>
                </div>
            </div>
        </div>

        <div class="d4p-group d4p-dashboard-card">
            <h3><?php esc_html_e( "Accessing the Members Directory", "gd-members-directory-for-bbpress" ); ?></h3>
            <div class="d4p-group-inner">
                <p style="margin-bottom: 4em;"><?php esc_html_e( "The members directory for the bbPress powered forum, can be accessed via the URL displayed below. The directory follows the URL structure defined by bbPress, with the option to change the URL slug through plugin settings.", "gd-members-directory-for-bbpress" ); ?></p>
            </div>
            <div class="d4p-group-footer">
                <a class="button-primary" target="_blank" href="<?php echo gdmed_get_members_directory_url(); ?>"><?php echo gdmed_get_members_directory_url(); ?></a>
            </div>
        </div>

        <div class="d4p-group d4p-dashboard-card">
            <h3><?php esc_html_e( "Troubleshooting", "gd-members-directory-for-bbpress" ); ?></h3>
            <div class="d4p-group-inner">
                <p style="margin-bottom: 4em;"><?php esc_html_e( "The plugin should work after activation without any additional changes. If you make changes to the URL slug, make sure to clear the WordPress permalinks.", "gd-members-directory-for-bbpress" ); ?></p>
            </div>
            <div class="d4p-group-footer">
                <a href="<?php echo admin_url( 'options-general.php?page=gd-members-directory-for-bbpress&panel=tools&subpanel=updater' ); ?>" class="button-primary"><?php esc_html_e( "Plugin Recheck and Update", "gd-members-directory-for-bbpress" ); ?></a>
                <a href="<?php echo admin_url( 'options-permalink.php' ); ?>" class="button-secondary"><?php esc_html_e( "WordPress Permalinks", "gd-members-directory-for-bbpress" ); ?></a>
            </div>
        </div>
    </div>
</div>
