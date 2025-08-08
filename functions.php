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

    // Toggle menu JavaScript (Your original script)
    wp_enqueue_script(
        'toggle-menu',
        get_template_directory_uri() . '/assets/js/toggle-menu.js',
        array(), // no dependencies
        filemtime(get_template_directory() . '/assets/js/toggle-menu.js'),
        true // load in footer
    );

    // Pass template URL to JavaScript (Your original script)
    wp_localize_script('toggle-menu', 'theme_vars', array(
        'template_url' => get_template_directory_uri()
    ));

    // Custom script for the carousel dots and scrolling logic (New script)
    wp_enqueue_script(
        'news-carousel-js',
        get_template_directory_uri() . '/assets/js/news-carousel.js',
        array(), // no dependencies
        filemtime(get_template_directory() . '/assets/js/news-carousel.js'),
        true // load in footer
    );
}
add_action('wp_enqueue_scripts', 'clicc_enqueue_assets');

// Theme setup: title tag and menus
function clicc_theme_setup() {
    // Let WordPress manage the <title> tag
    add_theme_support('title-tag');

    // Register navigation menu
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'clicc-theme'),
        'footer-sitemap' => __('Footer Sitemap Menu', 'clicc-theme'), 
    ));

    // Enable post thumbnails
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'clicc_theme_setup');

//Form

add_action('admin_post_nopriv_submit_contact_form', 'handle_contact_form');
add_action('admin_post_submit_contact_form', 'handle_contact_form');

function handle_contact_form() {
    // Honeypot check
    if (!empty($_POST['website'])) {
        wp_die('Spam detected.');
    }

    // Sanitize inputs
    $first_name = sanitize_text_field($_POST['first_name'] ?? '');
    $last_name  = sanitize_text_field($_POST['last_name'] ?? '');
    $email      = sanitize_email($_POST['email'] ?? '');
    $message    = sanitize_textarea_field($_POST['message'] ?? '');

    // Validate required fields
    if (!$first_name || !$email || !$message || !is_email($email)) {
        wp_die('Please fill out all fields correctly.');
    }

    // === Verify reCAPTCHA ===
    $recaptcha_secret = RECAPTCHA_SECRET_KEY;
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $verify_response = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
        'body' => [
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response
        ]
    ]);

    $response_body = json_decode(wp_remote_retrieve_body($verify_response));

    if (empty($response_body->success)) {
        wp_die('reCAPTCHA verification failed. Please try again.');
    }

    // Send email
    $to = 'info@communitylinkchildcare.com';
    $subject = "Contact from $first_name $last_name";
    $body = "Email: $email\n\nMessage:\n$message";
    $headers = ['Content-Type: text/plain; charset=UTF-8'];

    wp_mail($to, $subject, $body, $headers);

    // Redirect
    wp_redirect(home_url('/thank-you'));
    exit;
}


if ( ! function_exists( 'community_link_childcare_reading_time' ) ) {
    function community_link_childcare_reading_time() {
        $content = get_post_field( 'post_content', get_the_ID() );
        $word_count = str_word_count( strip_tags( $content ) );
        $reading_time = ceil( $word_count / 200 ); // Average reading speed: 200 words per minute
        return $reading_time;
    }
}


