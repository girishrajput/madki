<?php
/**
 * Enqueue Scripts & Styles
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue child theme styles and scripts
 */
function astra_child_enqueue_scripts() {
    // Get theme version for cache busting
    $theme_version = wp_get_theme()->get('Version');
    
    // Parent theme styles
    wp_enqueue_style('astra-parent-style', get_template_directory_uri() . '/style.css', array(), $theme_version);
    
    // Child theme main CSS
    wp_enqueue_style(
        'astra-child-main',
        get_stylesheet_directory_uri() . '/assets/css/main.css',
        array('astra-parent-style'),
        $theme_version
    );
    
    // Child theme home CSS (only on front page)
    if (is_front_page()) {
        wp_enqueue_style(
            'astra-child-home',
            get_stylesheet_directory_uri() . '/assets/css/home.css',
            array('astra-child-main'),
            $theme_version
        );
    }
    
    // Google Fonts
    wp_enqueue_style(
        'astra-child-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;0,800;1,400&family=Poppins:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );
    
    // Main JavaScript
    wp_enqueue_script(
        'astra-child-main',
        get_stylesheet_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        $theme_version,
        true
    );
    
    // Localize script for AJAX or other variables
    wp_localize_script('astra-child-main', 'astraChild', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('astra_child_nonce'),
        'homeUrl' => home_url('/'),
    ));
}
add_action('wp_enqueue_scripts', 'astra_child_enqueue_scripts');

/**
 * Add defer and async attributes to scripts
 */
function astra_child_add_script_attributes($tag, $handle) {
    if ('astra-child-main' === $handle) {
        $tag = str_replace(' src', ' defer src', $tag);
    }
    return $tag;
}
add_filter('script_loader_tag', 'astra_child_add_script_attributes', 10, 2);

/**
 * Preload critical assets
 */
function astra_child_preload_assets() {
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php
}
add_action('wp_head', 'astra_child_preload_assets', 1);