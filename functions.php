<?php
// Enqueue theme styles
function clicc_enqueue_styles() {
    wp_enqueue_style('clicc-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'clicc_enqueue_styles');

// Theme setup: menus and title tag
function clicc_theme_setup() {
    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Register navigation menu
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'clicc-theme'),
    ));
}
add_action('after_setup_theme', 'clicc_theme_setup');