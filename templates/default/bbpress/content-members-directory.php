<?php defined( 'ABSPATH' ) || exit; ?>

<div id="bbpress-forums" class="bbpress-wrapper bbpress-members-directory">

	<?php bbp_breadcrumb(); ?>

	<?php do_action( 'bbp_template_before_members_directory' ); ?>

	<?php bbp_get_template_part( 'filter', 'members' ); ?>

	<?php if ( gdmed_members_query()->has_results() ) : ?>

		<?php bbp_get_template_part( 'pagination', 'members' ); ?>

		<?php bbp_get_template_part( 'loop', 'members' ); ?>

		<?php bbp_get_template_part( 'pagination', 'members' ); ?>

	<?php else : ?>

		<?php bbp_get_template_part( 'feedback', 'no-members' ); ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_members_directory' ); ?>

</div>
