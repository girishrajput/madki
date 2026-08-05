<?php
/**
 * Template Functions
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get template part with ACF data
 */
function astra_child_get_template_part($slug, $name = null, $args = array()) {
    do_action('astra_child_before_template_part', $slug, $name, $args);
    
    $template = locate_template(array(
        "template-parts/{$slug}-{$name}.php",
        "template-parts/{$slug}.php",
    ));
    
    if ($template) {
        load_template($template, false, $args);
    }
    
    do_action('astra_child_after_template_part', $slug, $name, $args);
}

/**
 * Check if ACF is active
 */
function astra_child_is_acf_active() {
    return function_exists('get_field') && function_exists('have_rows');
}

/**
 * Get ACF field with fallback
 */
function astra_child_get_field($field_name, $default = '') {
    if (!astra_child_is_acf_active()) {
        return $default;
    }
    
    $value = get_field($field_name);
    if (empty($value)) {
        return $default;
    }
    
    return $value;
}

/**
 * Display hero section
 */
function astra_child_display_hero() {
    get_template_part('template-parts/home/hero');
}

/**
 * Display about section
 */
function astra_child_display_about() {
    get_template_part('template-parts/home/about');
}

/**
 * Display featured products
 */
function astra_child_display_featured_products() {
    get_template_part('template-parts/home/featured-products');
}

/**
 * Display why choose section
 */
function astra_child_display_why_choose() {
    get_template_part('template-parts/home/why-choose');
}

/**
 * Display testimonials
 */
function astra_child_display_testimonials() {
    get_template_part('template-parts/home/testimonials');
}

/**
 * Display CTA section
 */
function astra_child_display_cta() {
    get_template_part('template-parts/home/cta');
}

/**
 * Display footer CTA
 */
function astra_child_display_footer_cta() {
    get_template_part('template-parts/home/footer-cta');
}