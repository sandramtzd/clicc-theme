<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
        <?php
          // Inline SVG logo
          echo file_get_contents(get_template_directory() . '/assets/images/logo.svg');
        ?>
      </a>

      <nav class="site-navigation">
        <?php
          wp_nav_menu( array(
            'theme_location' => 'header-menu',
            'menu_class' => 'nav-menu',
            'container' => false,
          ) );
        ?>
      </nav>
    </div>
  </header>