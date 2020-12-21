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
?>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>" role="banner">
	<div class="site-header__inner">

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
			$volunteer_description = get_bloginfo( 'description', 'display' );
			if ( $volunteer_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $volunteer_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'twentytwentyone' ); ?>">
		
		
		<div class="menu-button-container">	
						<button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<span class="screen-reader-text"><?php esc_html_e('Primary Menu', 'fondph'); ?></span>
							<div class="burger">
								<div class="burger__inner">
								</div>
							</div>
						</button>
					</div><!-- /.menu-button-container -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'menu-wrapper',
				'container_class' => 'primary-menu-container',
				'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'     => false,
			)
		);
		?>
	</nav><!-- #site-navigation -->

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) { 
		?>
		<div class="header-widget-wrapper">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
	<?php } 
	?>
		
	</div><!-- /.site-header__inner -->
</header><!-- #masthead -->
