<?php

class Samwise_Walker extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth, $args ) {
	
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$classes[] = 'menu-item-level-' . $depth;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$attributes .= sprintf( ' class="menu-item-link menu-item-link-level-%d"', $depth );

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		if ( strlen ( $item->description ) ) {
			$item_output .= '<span class="description">' . $item->description . '</span>';
		}
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function start_lvl ( &$output, $depth, $args ) {
		$output .= sprintf('<div class="sub-menu-wrapper sub-menu-wrapper-level-%1$d"><ul class="sub-menu sub-menu-level-%1$d">', ($depth + 1) );
	}

	function end_lvl( &$output, $depth, $args ) {
		$output .= '</ul></div>';
	}
}