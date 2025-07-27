<?php
// Enqueue theme styles and scripts
function clicc_enqueue_assets() {
    // Main stylesheet with version (use filemtime for cache busting)
    wp_enqueue_style(
        'clicc-style', 
        get_stylesheet_uri(), 
        array(), 
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    // Toggle menu JavaScript
    wp_enqueue_script(
        'toggle-menu',
        get_template_directory_uri() . '/assets/js/toggle-menu.js',
        array(), // no dependencies
        filemtime(get_template_directory() . '/assets/js/toggle-menu.js'),
        true // load in footer
    );

    // Pass template URL to JavaScript
    wp_localize_script('toggle-menu', 'theme_vars', array(
        'template_url' => get_template_directory_uri()
    ));
}
add_action('wp_enqueue_scripts', 'clicc_enqueue_assets');

// Theme setup: title tag and menus
function clicc_theme_setup() {
    // Let WordPress manage the <title> tag
    add_theme_support('title-tag');

    // Register navigation menu
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'clicc-theme'),
    ));
}
add_action('after_setup_theme', 'clicc_theme_setup');