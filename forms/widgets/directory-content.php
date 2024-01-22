<?php

use Dev4Press\v47\Core\UI\Elements;

$list_user_roles  = gdmed()->get_filter_roles_values();
$list_sort_column = gdmed()->get_sort_orderby_values();
$list_sort_order  = gdmed()->get_sort_order_values();

?>

<h4><?php esc_html_e( 'Filtering', 'gd-members-directory-for-bbpress' ); ?></h4>
<table>
    <tbody>
    <tr>
        <td class="cell-left">
            <label for="<?php echo esc_attr( $this->get_field_id( 'role' ) ); ?>"><?php esc_html_e( 'User Role Filter', 'gd-members-directory-for-bbpress' ); ?>:</label>
			<?php Elements::instance()->select( $list_user_roles, array(
				'id'       => $this->get_field_id( 'role' ),
				'class'    => 'widefat',
				'name'     => $this->get_field_name( 'role' ),
				'selected' => $instance['role'],
			) ); ?>
        </td>
        <td class="cell-right">
            <label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"><?php esc_html_e( 'Limit Number of Users', 'gd-members-directory-for-bbpress' ); ?>:</label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>" type="number" min="0" step="1" value="<?php echo esc_attr( $instance['limit'] ); ?>"/>
        </td>
    </tr>
    </tbody>
</table>

<h4><?php esc_html_e( 'Sorting', 'gd-members-directory-for-bbpress' ); ?></h4>
<table>
    <tbody>
    <tr>
        <td class="cell-left">
            <label for="<?php echo esc_attr( $this->get_field_id( 'orderby' ) ); ?>"><?php esc_html_e( 'Sort Method', 'gd-members-directory-for-bbpress' ); ?>:</label>
			<?php Elements::instance()->select( $list_sort_column, array(
				'id'       => $this->get_field_id( 'orderby' ),
				'class'    => 'widefat',
				'name'     => $this->get_field_name( 'orderby' ),
				'selected' => $instance['orderby'],
			) ); ?>
        </td>
        <td class="cell-right">
            <label for="<?php echo esc_attr( $this->get_field_id( 'order' ) ); ?>"><?php esc_html_e( 'Sort Order', 'gd-members-directory-for-bbpress' ); ?>:</label>
			<?php Elements::instance()->select( $list_sort_order, array(
				'id'       => $this->get_field_id( 'order' ),
				'class'    => 'widefat',
				'name'     => $this->get_field_name( 'order' ),
				'selected' => $instance['order'],
			) ); ?>
        </td>
    </tr>
    </tbody>
</table>

