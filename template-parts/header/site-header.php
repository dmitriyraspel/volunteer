<?php
/**
 * Displays the site header.
 *
 * @package volunteer
 */

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
// $wrapper_classes .= true === get_theme_mod( 'display_title_and_tagline', true ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
$wrapper_classes .= is_active_sidebar( 'sidebar-4' ) ? ' has-widget-top' : '';
$wrapper_classes .= is_active_sidebar( 'sidebar-3' ) ? ' has-widget' : '';

?>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) { 
	?>
		<div class="header-top-widgets-area">
			<?php dynamic_sidebar( 'sidebar-4' ); ?>
		</div>
	<?php } 
	?>

	<div class="site-header__inner">

	<?php get_template_part( 'template-parts/header/site-branding' ); ?>
	<?php get_template_part( 'template-parts/header/site-nav' ); ?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) { 
	?>
		<div class="header-widgets-wrapper">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
	<?php } 
	?>
		
	</div><!-- /.site-header__inner -->
</header><!-- #masthead -->
