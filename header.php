<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container">
      <div class="mobile-header-left">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" aria-label="Home">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/logo.svg'); ?>
        </a>

        <a href="tel:0123456789" class="phone-icon" aria-label="Call us">
          <?php echo file_get_contents(get_template_directory() . '/assets/icons/phone.svg'); ?>
        </a>
      </div>

      <button id="menu-toggle" class="menu-toggle" aria-label="Toggle navigation" aria-expanded="false">
        <?php echo file_get_contents(get_template_directory() . '/assets/icons/hamburger.svg'); ?>
      </button>

      <nav class="site-navigation" id="main-nav" role="navigation" aria-label="Primary Navigation">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'header-menu',
            'menu_class'     => 'nav-menu',
            'container'      => false,
          ));
        ?>
      </nav>
    </div>
  </header>