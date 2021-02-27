<?php
/**
 * Displays the site navigation.
 *
 * @package volunteer
 */
?>

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
