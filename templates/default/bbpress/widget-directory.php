<div class="gdmed-widget gdmed-widget-directory">
	<?php

	do_action( 'bbp_template_start_widget_directory' );

	$instance = gdmed()->widget_instance();

	$members = gdmed_members_query( array(
		'members_per_page' => $instance['limit'],
		'orderby'          => $instance['orderby'],
		'order'            => $instance['order'],
		'role'             => $instance['role'],
	), false );

	if ( $members->has_results() ) :
		while ( $members->have_members() ) :
			$members->the_member();

			$user = gdmed_members_query()->member();

			?>

            <div class="gdmed-directory-member">
                <a class="bbp-member-avatar" href="<?php bbp_user_profile_url( $user->ID ); ?>" title="<?php echo esc_attr( $user->display_name ); ?>">
					<?php echo get_avatar( $user->ID, 36 ); ?>
                </a>
                <a class="bbp-member-name" href="<?php bbp_user_profile_url( $user->ID ); ?>">
					<?php echo esc_html( $user->display_name ); ?>
                </a>
                <br/><?php echo $user->get_meta_info_role(); // phpcs:ignore WordPress.Security.EscapeOutput
				?>
                <p class="bbp-member-meta">
					<?php echo $user->get_meta_info_registered(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                    <br/>
					<?php echo $user->get_topics_info() . ' &middot; ' . $user->get_replies_info(); // phpcs:ignore WordPress.Security.EscapeOutput ?>
                </p>
            </div>

		<?php

		endwhile;
	else :
		esc_html_e( 'No members found matching the request criteria.', 'gd-members-directory-for-bbpress' );
	endif;

	do_action( 'bbp_template_end_widget_directory' );

	?>
</div>