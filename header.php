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
      <!-- Logo -->
      <div class="site-header-left">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" aria-label="Home">
          <?php echo file_get_contents(get_template_directory() . '/assets/images/logo.svg'); ?>
        </a>
      </div>

      <!-- Navigation -->
      <nav class="site-navigation" id="main-nav" role="navigation" aria-label="Primary Navigation">
        <?php
          wp_nav_menu([
            'theme_location' => 'header-menu',
            'menu_class'     => 'nav-menu',
            'container'      => false,
          ]);
        ?>
      </nav>

      <!-- Mobile Icons -->
      <div class="mobile-header-right">
        <a href="tel:0123456789" class="mobile-header-icon phone-icon" aria-label="Call us">
          <?php echo file_get_contents(get_template_directory() . '/assets/icons/phone.svg'); ?>
        </a>

        <button id="menu-toggle" class="menu-toggle mobile-header-icon" aria-label="Toggle menu" aria-expanded="false">
          <?php echo file_get_contents(get_template_directory() . '/assets/icons/hamburger.svg'); ?>
        </button>
      </div>
    </div>
  </header>