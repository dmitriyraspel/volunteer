<?php

/**
 * Displays Social menu
 *
 * @package volunteer
 */

?>

<nav aria-label="<?php esc_attr_e('Social Links Menu', 'volunteer'); ?>" class="social-navigation reset-list-style">
   <ul class="social-navigation-wrapper">
      <?php
      wp_nav_menu(
         array(
            'theme_location' => 'social',
            'items_wrap'     => '%3$s',
            'container'      => false,
            'depth'          => 1,
            'link_before'    => '<span class="screen-reader-text">',
            'link_after'     => '</span>',
            'fallback_cb'    => false,
         )
      );
      ?>
   </ul><!-- .social-navigation-wrapper -->
</nav><!-- .social-navigation -->