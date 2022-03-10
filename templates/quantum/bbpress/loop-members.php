<?php defined( 'ABSPATH' ) || exit; ?>

<?php do_action( 'bbp_template_before_members_loop' ); ?>

    <div id="members-directory" class="bbp-the-list bbp-members">

        <div class="bbp-item bbp-header">
            <div class="bbp-item-info bbp-member-info"><?php esc_html_e( "Member Info", "gd-members-directory-for-bbpress" ); ?></div>
            <div class="bbp-item-meta">
                <div class="bbp-item-statistics bbp-member-statistics"><?php esc_html_e( "Statistics", "gd-members-directory-for-bbpress" ); ?></div>
                <div class="bbp-item-activity bbp-member-activity"><?php esc_html_e( "Latest Post", "gd-members-directory-for-bbpress" ); ?></div>
            </div>
        </div>

        <div class="bbp-body">
            <ul class="bbp-items-list">
				<?php

				while ( gdmed_members_query()->have_members() ) :
					gdmed_members_query()->the_member();

					bbp_get_template_part( 'loop', 'single-member' );
				endwhile;

				?>
            </ul>
        </div>

    </div>


<?php do_action( 'bbp_template_after_members_loop' );
