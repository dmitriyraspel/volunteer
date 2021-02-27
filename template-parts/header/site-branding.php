<?php
/**
 * Displays header site branding
 *
 * @package volunteer
 */

$volunteer_blog_info = get_bloginfo( 'name' );
$volunteer_description = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
//$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<div class="site-branding">
	<?php
	the_custom_logo();
	if ( is_front_page() && is_home() ) :
		?>
		<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<?php
	else :
		?>
		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		<?php
	endif;
	
	if ( $volunteer_description || is_customize_preview() ) :
		?>
		<p class="site-description"><?php echo $volunteer_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
	<?php endif; ?>
</div><!-- .site-branding -->