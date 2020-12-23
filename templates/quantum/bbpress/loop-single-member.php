<?php defined( 'ABSPATH' ) || exit; ?>

<?php $member = gdmed_members_query()->member(); ?>

<li id="bbp-member-<?php echo $member->ID; ?>" <?php gdmed_members_query()->member_class(); ?>>
    <div class="bbp-item bbp-row bbp-member-info">
        <div class="bbp-item-info bbp-member-info">
			<?php do_action( 'bbp_theme_before_member_avatar' ); ?>

			<?php if ( gdmed_settings()->get( 'display_avatar_in_list' ) ) { ?>
                <a class="bbp-member-avatar" href="<?php bbp_user_profile_url( $member->ID ); ?>" title="<?php echo $member->display_name ?>">
					<?php echo get_avatar( $member->ID, 44 ); ?>
                </a>
			<?php } ?>

			<?php do_action( 'bbp_theme_before_member_name' ); ?>

            <a class="bbp-member-name" href="<?php bbp_user_profile_url( $member->ID ); ?>">
				<?php echo $member->display_name ?>
            </a>

			<?php do_action( 'bbp_theme_after_member_name' ); ?>

            <p class="bbp-member-meta">
				<?php do_action( 'bbp_theme_before_member_meta' ); ?>

				<?php echo $member->get_meta_info(); ?>

				<?php do_action( 'bbp_theme_after_member_meta' ); ?>
            </p>

            <div class="bbp-forum-counts gdqnt-visible-md gdqnt-visible-sm">
				<?php echo $member->get_topics_info(); ?> &middot; <?php echo $member->get_replies_info(); ?>
            </div>
        </div>
        <div class="bbp-item-meta">
            <div class="bbp-item-statistics bbp-member-statistics">
				<?php do_action( 'bbp_theme_before_member_statistics' ); ?>

                <p><?php echo $member->get_topics_info(); ?></p>
                <p><?php echo $member->get_replies_info(); ?></p>

				<?php do_action( 'bbp_theme_after_member_statistics' ); ?>
            </div>
            <div class="bbp-item-activity bbp-member-activity">
				<?php do_action( 'bbp_theme_before_member_activity' ); ?>

                <p><?php echo $member->get_latest_activity(); ?></p>

				<?php do_action( 'bbp_theme_after_member_activity' ); ?>
            </div>
        </div>
    </div>
</li>
