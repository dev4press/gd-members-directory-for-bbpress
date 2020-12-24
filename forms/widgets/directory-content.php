<?php

$list_user_roles  = gdmed()->get_filter_roles_values();
$list_sort_column = gdmed()->get_sort_orderby_values();
$list_sort_order  = gdmed()->get_sort_order_values();

?>

<h4><?php _e( "Filtering", "gd-members-directory-for-bbpress" ); ?></h4>
<table>
    <tbody>
    <tr>
        <td class="cell-left">
            <label for="<?php echo $this->get_field_id( 'role' ); ?>"><?php _e( "User Role Filter", "gd-members-directory-for-bbpress" ); ?>:</label>
			<?php d4p_render_select( $list_user_roles, array( 'id'       => $this->get_field_id( 'role' ),
			                                                  'class'    => 'widefat',
			                                                  'name'     => $this->get_field_name( 'role' ),
			                                                  'selected' => $instance['role']
			) ); ?>
        </td>
        <td class="cell-right">
            <label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( "Limit Number of Users", "gd-members-directory-for-bbpress" ); ?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="number" min="0" step="1" value="<?php echo esc_attr( $instance['limit'] ); ?>"/>
        </td>
    </tr>
    </tbody>
</table>

<h4><?php _e( "Sorting", "gd-members-directory-for-bbpress" ); ?></h4>
<table>
    <tbody>
    <tr>
        <td class="cell-left">
            <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( "Sort Method", "gd-members-directory-for-bbpress" ); ?>:</label>
			<?php d4p_render_select( $list_sort_column, array( 'id'       => $this->get_field_id( 'orderby' ),
			                                                   'class'    => 'widefat',
			                                                   'name'     => $this->get_field_name( 'orderby' ),
			                                                   'selected' => $instance['orderby']
			) ); ?>
        </td>
        <td class="cell-right">
            <label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( "Sort Order", "gd-members-directory-for-bbpress" ); ?>:</label>
			<?php d4p_render_select( $list_sort_order, array( 'id'       => $this->get_field_id( 'order' ),
			                                                  'class'    => 'widefat',
			                                                  'name'     => $this->get_field_name( 'order' ),
			                                                  'selected' => $instance['order']
			) ); ?>
        </td>
    </tr>
    </tbody>
</table>

