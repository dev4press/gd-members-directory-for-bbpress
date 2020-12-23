<?php defined( 'ABSPATH' ) || exit; ?>

<?php do_action( 'bbp_template_before_pagination_loop' ); ?>

    <div class="bbp-pagination">
        <div class="bbp-pagination-count"><?php gdmed_members_query()->pagination_count(); ?></div>
        <div class="bbp-pagination-links"><?php gdmed_members_query()->pagination_links(); ?></div>
    </div>

<?php do_action( 'bbp_template_after_pagination_loop' );
