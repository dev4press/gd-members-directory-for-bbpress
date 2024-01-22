<?php defined( 'ABSPATH' ) || exit; ?>

<?php do_action( 'bbp_template_before_members_loop' ); ?>

    <ul id="members-directory" class="bbp-members">

        <li class="bbp-header">

            <ul class="members-titles">
                <li class="bbp-member-info"><?php esc_html_e( 'Member Info', 'gd-members-directory-for-bbpress' ); ?></li>
                <li class="bbp-member-statistics"><?php esc_html_e( 'Statistics', 'gd-members-directory-for-bbpress' ); ?></li>
                <li class="bbp-member-activity"><?php esc_html_e( 'Latest Post', 'gd-members-directory-for-bbpress' ); ?></li>
            </ul>

        </li>

        <li class="bbp-body">

			<?php while ( gdmed_members_query()->have_members() ) : gdmed_members_query()->the_member(); ?>

				<?php bbp_get_template_part( 'loop', 'single-member' ); ?>

			<?php endwhile; ?>

        </li>

        <li class="bbp-footer">

            <ul class="members-titles">
                <li class="bbp-member-info"><?php esc_html_e( 'Member Info', 'gd-members-directory-for-bbpress' ); ?></li>
                <li class="bbp-member-statistics"><?php esc_html_e( 'Statistics', 'gd-members-directory-for-bbpress' ); ?></li>
                <li class="bbp-member-activity"><?php esc_html_e( 'Latest Activity', 'gd-members-directory-for-bbpress' ); ?></li>
            </ul>

        </li>

    </ul>

<?php do_action( 'bbp_template_after_members_loop' );
