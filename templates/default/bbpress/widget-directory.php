<div class="gdmed-widget gdmed-widget-directory">
	<?php

	$members = gdmed_members_query( array(
		'members_per_page' => $instance['limit'],
		'orderby'          => $instance['orderby'],
		'order'            => $instance['order'],
		'role'             => $instance['role']
	), false );

	if ( $members->has_results() ) :
		while ( $members->have_members() ) : $members->the_member();
			$user = gdmed_members_query()->member();

			?>

            <div class="gdmed-directory-member">
                <a class="bbp-member-avatar" href="<?php bbp_user_profile_url( $user->ID ); ?>" title="<?php echo $user->display_name ?>">
					<?php echo get_avatar( $user->ID, 36 ); ?>
                </a>
                <a class="bbp-member-name" href="<?php bbp_user_profile_url( $user->ID ); ?>">
					<?php echo $user->display_name ?>
                </a>
                <br/><?php echo $user->get_meta_info_role(); ?>
                <p class="bbp-member-meta">
					<?php echo $user->get_meta_info_registered(); ?>
                    <br/>
					<?php echo $user->get_topics_info(); ?> &middot; <?php echo $user->get_replies_info(); ?>
                </p>
            </div>

		<?php

		endwhile;
	else :
		esc_html_e( "No members found matching the request criteria.", "gd-members-directory-for-bbpress" );
	endif;

	?>
</div>