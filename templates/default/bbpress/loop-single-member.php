<?php defined( 'ABSPATH' ) || exit; ?>

<?php $member = gdmed_members_query()->member(); ?>

<ul id="bbp-member-<?php echo $member->ID; ?>" <?php gdmed_members_query()->member_class(); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
    <li class="bbp-member-info">
		<?php do_action( 'bbp_theme_before_member_avatar' ); ?>

		<?php if ( gdmed_settings()->get( 'display_avatar_in_list' ) ) { ?>
            <a class="bbp-member-avatar" href="<?php bbp_user_profile_url( $member->ID ); ?>" title="<?php echo esc_attr( $member->display_name ); ?>">
				<?php echo get_avatar( $member->ID, 36 ); ?>
            </a>
		<?php } ?>

		<?php do_action( 'bbp_theme_before_member_name' ); ?>

        <a class="bbp-member-name" href="<?php bbp_user_profile_url( $member->ID ); ?>">
			<?php echo esc_html( $member->display_name ); ?>
        </a>

		<?php do_action( 'bbp_theme_after_member_name' ); ?>

        <p class="bbp-member-meta">
			<?php do_action( 'bbp_theme_before_member_meta' ); ?>

			<?php echo $member->get_meta_info(); // phpcs:ignore WordPress.Security.EscapeOutput ?>

			<?php do_action( 'bbp_theme_after_member_meta' ); ?>
        </p>
    </li>
    <li class="bbp-member-statistics">
		<?php do_action( 'bbp_theme_before_member_statistics' ); ?>

        <p><?php echo $member->get_topics_info(); // phpcs:ignore WordPress.Security.EscapeOutput ?></p>
        <p><?php echo $member->get_replies_info(); // phpcs:ignore WordPress.Security.EscapeOutput ?></p>

		<?php do_action( 'bbp_theme_after_member_statistics' ); ?>
    </li>
    <li class="bbp-member-activity">
		<?php do_action( 'bbp_theme_before_member_activity' ); ?>

        <p><?php echo $member->get_latest_activity(); // phpcs:ignore WordPress.Security.EscapeOutput ?></p>

		<?php do_action( 'bbp_theme_after_member_activity' ); ?>
    </li>
</ul>
