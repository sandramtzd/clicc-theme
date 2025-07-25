<?php
function clicc_enqueue_styles() {
    wp_enqueue_style('clicc-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'clicc_enqueue_styles');

function clicc_register_menus() {
  register_nav_menus( array(
    'header-menu' => __( 'Header Menu', 'clicc-theme' ),
  ) );
}
add_action( 'init', 'clicc_register_menus' );

