<?php
/**
 * Theme Setup Configuration
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Setup theme defaults and register support for various WordPress features
 */
function astra_child_theme_setup() {
    /*
     * Make theme available for translation.
     */
    load_child_theme_textdomain('astra-child', get_stylesheet_directory() . '/languages');
    
    /*
     * Add support for post thumbnails
     */
    add_theme_support('post-thumbnails');
    
    /*
     * Add support for custom logo
     */
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    /*
     * Add support for title tag
     */
    add_theme_support('title-tag');
    
    /*
     * Add support for HTML5 features
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    /*
     * Add support for responsive embeds
     */
    add_theme_support('responsive-embeds');
    
    /*
     * Register navigation menus
     */
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'astra-child'),
        'footer'  => __('Footer Menu', 'astra-child'),
    ));
    
    /*
     * Set default image sizes
     */
    set_post_thumbnail_size(1200, 630, true);
    add_image_size('astra-child-hero', 1200, 800, false);
    add_image_size('astra-child-product', 600, 600, true);
    add_image_size('astra-child-thumbnail', 300, 300, true);
}
add_action('after_setup_theme', 'astra_child_theme_setup');

/**
 * Set content width based on the theme's design and stylesheet
 */
function astra_child_content_width() {
    $GLOBALS['content_width'] = apply_filters('astra_child_content_width', 1200);
}
add_action('after_setup_theme', 'astra_child_content_width', 0);