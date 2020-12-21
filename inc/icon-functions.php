<?php
/**
 * Volunteer SVG Icon helper functions
 *
 * @package volunteer
 * @since 1.0.0
 */

/**
 * Gets the SVG code for a given icon.
 */
function volunteer_get_icon_svg( $icon, $size = 24 ) {
	return volunteer_SVG_Icons::get_svg( 'ui', $icon, $size );
}

/**
 * Gets the SVG code for a given social icon.
 */
function volunteer_get_social_icon_svg( $icon, $size = 24 ) {
	return volunteer_SVG_Icons::get_svg( 'social', $icon, $size );
}

/**
 * Detects the social network from a URL and returns the SVG code for its icon.
 */
function volunteer_get_social_link_svg( $uri, $size = 24 ) {
	return volunteer_SVG_Icons::get_social_link_svg( $uri, $size );
}

/**
 * Display SVG icons in social links menu.
 *
 * @param  string  $item_output The menu item output.
 * @param  WP_Post $item        Menu item object.
 * @param  int     $depth       Depth of the menu.
 * @param  array   $args        wp_nav_menu() arguments.
 * @return string  $item_output The menu item output with social icon.
 */
function volunteer_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		$svg = volunteer_get_social_link_svg( $item->url, 26 );
		if ( empty( $svg ) ) {
			$svg = volunteer_get_icon_svg( 'link' );
		}
		$item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'volunteer_nav_menu_social_icons', 10, 4 );

/**
 * Add a button to top-level menu items that has sub-menus.
 * An icon is added using CSS depending on the value of aria-expanded.
 *
 * @since 1.0.0
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 *
 * @return string Nav menu item start element.
 */
function volunteer_add_sub_menu_toggle( $output, $item, $depth, $args ) {
	if ( 0 === $depth && in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add toggle button.
		$output .= '<button class="sub-menu-toggle" aria-expanded="false" onClick="volunteerExpandSubMenu(this)">';
		$output .= '<span class="icon-minus">' . volunteer_get_icon_svg( 'plus', 16 ) . '</span>';
		$output .= '<span class="screen-reader-text">' . esc_html__( 'Open menu', 'volunteer' ) . '</span>';
		$output .= '</button>';
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'volunteer_add_sub_menu_toggle', 10, 4 );