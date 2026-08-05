<?php
/**
 * Helper Functions
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get image URL from ACF image field with fallback
 */
function astra_child_get_image_url($image_field, $size = 'full') {
    if (empty($image_field)) {
        return '';
    }
    
    if (is_array($image_field) && isset($image_field['url'])) {
        return esc_url($image_field['url']);
    }
    
    if (is_numeric($image_field)) {
        $image = wp_get_attachment_image_src($image_field, $size);
        if ($image) {
            return esc_url($image[0]);
        }
    }
    
    return '';
}

/**
 * Sanitize and output ACF text field
 */
function astra_child_sanitize_text($field, $default = '') {
    if (empty($field)) {
        return $default;
    }
    return sanitize_text_field($field);
}

/**
 * Sanitize and output ACF textarea field
 */
function astra_child_sanitize_textarea($field, $default = '') {
    if (empty($field)) {
        return $default;
    }
    return sanitize_textarea_field($field);
}

/**
 * Sanitize URL
 */
function astra_child_sanitize_url($url, $default = '#') {
    if (empty($url)) {
        return $default;
    }
    return esc_url($url);
}

/**
 * Get ACF repeater rows with proper escaping
 */
function astra_child_get_repeater_rows($field_name) {
    if (!function_exists('get_field')) {
        return array();
    }
    
    $rows = get_field($field_name);
    if (empty($rows) || !is_array($rows)) {
        return array();
    }
    
    return $rows;
}

/**
 * Generate star rating HTML
 */
function astra_child_get_star_rating($rating, $max = 5) {
    $rating = floatval($rating);
    if ($rating < 0 || $rating > $max) {
        $rating = 0;
    }
    
    $full_stars = floor($rating);
    $half_star = ($rating - $full_stars) >= 0.5;
    $empty_stars = $max - $full_stars - ($half_star ? 1 : 0);
    
    $html = '<div class="star-rating" role="img" aria-label="' . sprintf(__('Rated %s out of %s', 'astra-child'), $rating, $max) . '">';
    
    // Full stars
    for ($i = 0; $i < $full_stars; $i++) {
        $html .= '<span class="star full">★</span>';
    }
    
    // Half star
    if ($half_star) {
        $html .= '<span class="star half">★</span>';
    }
    
    // Empty stars
    for ($i = 0; $i < $empty_stars; $i++) {
        $html .= '<span class="star empty">★</span>';
    }
    
    $html .= '</div>';
    
    return $html;
}

/**
 * Check if current page is front page
 */
function astra_child_is_front_page() {
    return is_front_page();
}