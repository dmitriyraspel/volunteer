<?php
/**
 * Displays header-top
 *
 * @package volunteer
 */


if ( ! is_active_sidebar( 'sidebar-4' ) ) {
	return;
}
?>

<div class="header-top-widgets-area">
	<?php dynamic_sidebar( 'sidebar-4' ); ?>
</div><!-- #secondary -->