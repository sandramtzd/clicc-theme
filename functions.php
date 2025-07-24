<?php
function clicc_enqueue_styles() {
    wp_enqueue_style('clicc-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'clicc_enqueue_styles');