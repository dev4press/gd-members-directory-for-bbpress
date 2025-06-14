<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="d4p-content">
    <div class="d4p-cards-wrapper">
        <div class="d4p-group d4p-dashboard-card d4p-card-double d4p-dashboard-status">
            <h3><?php esc_html_e( 'Plugin Status', 'gd-members-directory-for-bbpress' ); ?></h3>
            <div class="d4p-group-inner">
                <div>
                    <span class="d4p-card-badge d4p-badge-right d4p-badge-ok"><i class="d4p-icon d4p-ui-check"></i><?php esc_html_e( 'OK', 'gd-members-directory-for-bbpress' ); ?></span>
                    <div class="d4p-status-message"><?php esc_html_e( 'Everything appears to be in order.', 'gd-members-directory-for-bbpress' ); ?></div>
                </div>
            </div>
        </div>

        <div class="d4p-group d4p-dashboard-card">
            <h3><?php esc_html_e( 'Accessing the Members Directory', 'gd-members-directory-for-bbpress' ); ?></h3>
            <div class="d4p-group-inner">
                <p style="margin-bottom: 4em;"><?php esc_html_e( 'The members directory for the bbPress powered forum, can be accessed via the URL displayed below. The directory follows the URL structure defined by bbPress, with the option to change the URL slug through plugin settings.', 'gd-members-directory-for-bbpress' ); ?></p>
            </div>
            <div class="d4p-group-footer">
                <a class="button-primary" target="_blank" href="<?php echo esc_url(gdmed_get_members_directory_url()); ?>"><?php echo esc_url(gdmed_get_members_directory_url()); ?></a>
            </div>
        </div>

        <div class="d4p-group d4p-dashboard-card">
            <h3><?php esc_html_e( 'Troubleshooting', 'gd-members-directory-for-bbpress' ); ?></h3>
            <div class="d4p-group-inner">
                <p style="margin-bottom: 4em;"><?php esc_html_e( 'The plugin should work after activation without any additional changes. If you make changes to the URL slug, make sure to clear the WordPress permalinks.', 'gd-members-directory-for-bbpress' ); ?></p>
            </div>
            <div class="d4p-group-footer">
                <a href="<?php echo esc_url( admin_url( 'options-general.php?page=gd-members-directory-for-bbpress&panel=tools&subpanel=updater' ) ); ?>" class="button-primary"><?php esc_html_e( 'Plugin Recheck and Update', 'gd-members-directory-for-bbpress' ); ?></a>
                <a href="<?php echo esc_url( admin_url( 'options-permalink.php' ) ); ?>" class="button-secondary"><?php esc_html_e( 'WordPress Permalinks', 'gd-members-directory-for-bbpress' ); ?></a>
            </div>
        </div>

        <div class="d4p-group d4p-dashboard-card d4p-dashboard-card-dev4press d4p-card-double d4p-dashboard-card-no-footer" style="border-color: var(--d4p-color-layout-accent);">
            <h3 style="background: var(--d4p-color-layout-accent); color: white;">Dev4Press Pro plugins for bbPress</h3>
            <div class="d4p-group-header">
                <ul>
                    <li><a href="https://www.dev4press.com/plugins/gd-bbpress-toolbox/" target="_blank">
                            <i class="d4p-icon d4p-plugin-gd-bbpress-toolbox"></i> forumToolbox for bbPress
                        </a></li>
                    <li><a href="https://www.dev4press.com/plugins/gd-quantum-theme-for-bbpress/" target="_blank">
                            <i class="d4p-icon d4p-plugin-gd-quantum-theme-for-bbpress"></i> quantumTheme for bbPress
                        </a></li>
                    <li><a href="https://www.dev4press.com/plugins/gd-forum-notices-for-bbpress/" target="_blank">
                            <i class="d4p-icon d4p-plugin-gd-forum-notices-for-bbpress"></i> forumNotices for bbPress
                        </a></li>
                    <li><a href="https://www.dev4press.com/plugins/gd-topic-polls/" target="_blank">
                            <i class="d4p-icon d4p-plugin-gd-topic-polls"></i> topicPolls for bbPress
                        </a></li>
                    <li><a href="https://www.dev4press.com/plugins/gd-topic-prefix/" target="_blank">
                            <i class="d4p-icon d4p-plugin-gd-topic-prefix"></i> topicPrefix for bbPress
                        </a></li>
                    <li><a href="https://www.dev4press.com/plugins/gd-power-search-for-bbpress/" target="_blank">
                            <i class="d4p-icon d4p-plugin-gd-power-search-for-bbpress"></i> powerSearch for bbPress
                        </a></li>
                </ul>
                <div class="d4p-clearfix"></div>
            </div>
            <div class="d4p-group-inner">
                <h4>Discount Coupon</h4>
                <p>Buy any of the Dev4Press plugins for bbPress, or bbPress Plugins Club Membership, and save
                    <strong>10%</strong> with the discount coupon <strong>BBFREETOPRO</strong>.</p>
            </div>
            <div class="d4p-group-footer">
                <a href="https://www.dev4press.com/bbpress-club/pricing/" target="_blank" rel="noopener" class="button-primary">bbPress Plugins Club Membership</a>
            </div>
        </div>

    </div>
</div>
