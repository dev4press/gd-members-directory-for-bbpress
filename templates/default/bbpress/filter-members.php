<?php defined( 'ABSPATH' ) || exit; ?>

<?php do_action( 'bbp_template_before_members_filter_form' ); ?>

<form method="get" class="bbp-members-directory-filter">

    <?php do_action( 'bbp_template_before_members_filter_form_inside' ); ?>

    <div class="bbp-members-filter">

        <?php if (gdmed_settings()->get('display_roles_filter')) { ?>

            <label for="gdmed-filter-role" class="screen-reader-text"><?php _e("Filter by role", "gd-members-directory-for-bbpress"); ?></label>
            <?php gdmed_form_select(gdmed()->get_filter_roles_values(), gdmed_members_query()->get_filter_value('role'), array('id' => 'gdmed-filter-role', 'name' => 'role')); ?>

        <?php } ?>

        <label for="gdmed-filter-search" class="screen-reader-text"><?php _e("Search members", "gd-members-directory-for-bbpress"); ?></label>
        <input id="gdmed-filter-search" name="search" value="<?php echo esc_attr(gdmed_members_query()->get_filter_value('search')); ?>" />

        <button type="submit"><?php _e("Filter", "gd-members-directory-for-bbpress"); ?></button>

    </div>

    <div class="bbp-members-sort">

        <label for="gdmed-sort-orderby" class="screen-reader-text"><?php _e("Sort by", "gd-members-directory-for-bbpress"); ?></label>
        <?php gdmed_form_select(gdmed()->get_sort_orderby_values(), gdmed_members_query()->get_filter_value('orderby'), array('id' => 'gdmed-sort-orderby', 'name' => 'orderby'), array('onchange' => 'this.form.submit()')); ?>

        <label for="gdmed-sort-order" class="screen-reader-text"><?php _e("Sort order", "gd-members-directory-for-bbpress"); ?></label>
        <?php gdmed_form_select(gdmed()->get_sort_order_values(), gdmed_members_query()->get_filter_value('order'), array('id' => 'gdmed-sort-order', 'name' => 'order'), array('onchange' => 'this.form.submit()')); ?>

    </div>

    <?php do_action( 'bbp_template_before_members_filter_form_inside' ); ?>

</form>

<?php do_action( 'bbp_template_after_members_filter_form' ); ?>
