<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gdmed_use_pretty_urls() : bool {
	if ( function_exists( 'bbp_use_pretty_urls' ) ) {
		return bbp_use_pretty_urls();
	}

	global $wp_rewrite;

	return $wp_rewrite->using_permalinks();
}

function gdmed_paginate_links( $args = array() ) : string {
	$render = '';

	if ( function_exists( 'bbp_paginate_links' ) ) {
		$render = bbp_paginate_links( $args );
	} else {

		$add_args = empty( $args['add_args'] ) && bbp_get_view_all()
			? array( 'view' => 'all' )
			: false;

		$r = bbp_parse_args( $args, array(
			'base'               => '',
			'total'              => 1,
			'current'            => bbp_get_paged(),
			'prev_next'          => true,
			'prev_text'          => is_rtl() ? '&rarr;' : '&larr;',
			'next_text'          => is_rtl() ? '&larr;' : '&rarr;',
			'mid_size'           => 1,
			'end_size'           => 3,
			'add_args'           => $add_args,
			'show_all'           => false,
			'type'               => 'plain',
			'format'             => '',
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => ''
		), 'paginate_links' );

		$render = gdmed_make_first_page_canonical( paginate_links( $r ) );
	}

	return $render ? (string) $render : '';
}

function gdmed_make_first_page_canonical( $pagination_links = '' ) {
	$retval = $pagination_links;

	if ( ! empty( $pagination_links ) ) {
		$retval = gdmed_use_pretty_urls()
			? str_replace( bbp_get_paged_slug() . '/1/', '', $pagination_links )
			: preg_replace( '/&#038;paged=1(?=[^0-9])/m', '', $pagination_links );
	}

	return apply_filters( 'bbp_make_first_page_canonical', $retval, $pagination_links );
}

function gdmed_get_root_url() : string {
	if ( function_exists( 'bbp_get_root_url' ) ) {
		return bbp_get_root_url();
	}

	return bbp_get_forums_url();
}

function gdmed_get_members_rewrite_id() : string {
	return gdmed()->members_id;
}

function gdmed_get_members_directory_template() : string {
	$templates = array(
		'members-directory.php'
	);

	return bbp_get_query_template( 'members_directory', $templates );
}

function gdmed_get_members_slug( $default = 'users' ) : string {
	if ( gdmed_settings()->get( 'rewrite_default' ) ) {
		$slug = get_option( '_bbp_user_slug', $default );
	} else {
		$slug = gdmed_settings()->get( 'rewrite_custom' );
	}

	return apply_filters( 'gdmed_get_members_slug', bbp_maybe_get_root_slug() . $slug );
}

function gdmed_is_members_directory() : bool {
	global $wp_query;

	$retval = false;

	if ( ! empty( $wp_query->bbp_is_members_directory ) && ( true === $wp_query->bbp_is_members_directory ) ) {
		$retval = true;
	}

	if ( empty( $retval ) && bbp_is_query_name( gdmed_get_members_rewrite_id() ) ) {
		$retval = true;
	}

	if ( empty( $retval ) && isset( $_REQUEST[ gdmed_get_members_rewrite_id() ] ) && empty( $_REQUEST[ gdmed_get_members_rewrite_id() ] ) ) {
		$retval = true;
	}

	return (bool) apply_filters( 'gdmed_is_members_directory', $retval );
}

function gdmed_get_members_pagination_base() : string {
	if ( gdmed_use_pretty_urls() ) {
		if ( is_page() || is_single() ) {
			$base = get_permalink();
		} else {
			$base = gdmed_get_members_directory_url();
		}

		$base = trailingslashit( $base ) . user_trailingslashit( bbp_get_paged_slug() . '/%#%/' );
	} else {
		$base = add_query_arg( 'paged', '%#%' );
	}

	return apply_filters( 'gdmed_get_members_pagination_base', $base );
}

function gdmed_display_members_directory( $attr = array(), $content = '' ) : string {
	if ( ! empty( $content ) ) {
		return $content;
	}

	bbp_set_query_name( gdmed_get_members_rewrite_id() );
	ob_start();

	bbp_get_template_part( 'content', 'members-directory' );

	bbp_reset_query_name();

	return ob_get_clean();
}

function gdmed_get_user_roles() : array {
	$roles = array();

	$dynamic_roles = bbp_get_dynamic_roles();

	foreach ( $dynamic_roles as $role => $obj ) {
		$roles[ $role ] = $obj['name'];
	}

	return $roles;
}

function gdmed_members_directory_url() {
	echo esc_url( gdmed_get_members_directory_url() );
}

function gdmed_get_members_directory_url() : string {
	if ( gdmed_use_pretty_urls() ) {
		$url = gdmed_get_root_url() . gdmed_get_members_slug();

		$url = user_trailingslashit( $url );
		$url = home_url( $url );
	} else {
		$url = add_query_arg( array(
			gdmed_get_members_rewrite_id() => 1
		), home_url( '/' ) );
	}

	return apply_filters( 'gdmed_get_members_directory_url', $url );
}

function gdmed_form_select_attributes( $args = array(), $attr = array() ) : array {
	$defaults = array(
		'name'     => '',
		'id'       => '',
		'class'    => '',
		'style'    => '',
		'multi'    => false,
		'readonly' => false
	);
	$args     = wp_parse_args( $args, $defaults );

	/**
	 * @var string $name
	 * @var string $id
	 * @var string $class
	 * @var string $style
	 * @var bool   $multi
	 * @var bool   $readonly
	 */
	extract( $args );

	$name = $multi ? $name . '[]' : $name;

	$attributes = array(
		'id="' . $id . '"',
		'name="' . $name . '"'
	);

	if ( $class != '' ) {
		$attributes[] = 'class="' . $class . '"';
	}

	if ( $style != '' ) {
		$attributes[] = 'style="' . $style . '"';
	}

	if ( $multi ) {
		$attributes[] = 'multiple';
	}

	if ( $readonly ) {
		$attributes[] = 'readonly';
	}

	foreach ( $attr as $key => $value ) {
		$attributes[] = $key . '="' . esc_attr( $value ) . '"';
	}

	return $attributes;
}

function gdmed_form_select( $values, $s, $args = array(), $attr = array(), $echo = true ) : string {
	$attributes = gdmed_form_select_attributes( $args, $attr );
	$selected   = is_null( $s ) ? array_keys( $values ) : (array) $s;

	$render = '<select ' . join( ' ', $attributes ) . '>';

	foreach ( $values as $value => $display ) {
		$sel    = in_array( $value, $selected ) ? ' selected="selected"' : '';
		$render .= '<option value="' . $value . '"' . $sel . '>' . $display . '</option>';
	}

	$render .= '</select>';

	if ( $echo ) {
		echo $render;
	}

	return $render;
}
