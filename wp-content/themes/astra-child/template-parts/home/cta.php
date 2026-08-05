<?php
/**
 * Red CTA Banner Template
 * 
 * @package Astra_Child
 * @subpackage Template_Parts
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get ACF fields
$cta_background = get_field('cta_background');
$cta_background_color = get_field('cta_background_color');
$cta_heading = get_field('cta_heading');
$cta_description = get_field('cta_description');
$cta_button_text = get_field('cta_button_text');
$cta_button_url = get_field('cta_button_url');

// Set defaults
$cta_background_color = !empty($cta_background_color) ? $cta_background_color : '#C0392B';
$cta_heading = !empty($cta_heading) ? $cta_heading : __('Ready to Experience the <span class="highlight">Authentic Taste</span>?', 'astra-child');
$cta_description = !empty($cta_description) ? $cta_description : __('Discover our premium collection of Indian spices and bring the flavors of India to your kitchen today.', 'astra-child');
$cta_button_text = !empty($cta_button_text) ? $cta_button_text : __('Shop Now', 'astra-child');
$cta_button_url = !empty($cta_button_url) ? $cta_button_url : '#';

// Background style
$bg_style = 'background-color: ' . esc_attr($cta_background_color) . ';';
if (!empty($cta_background) && isset($cta_background['url'])) {
    $bg_style .= ' background-image: url(' . esc_url($cta_background['url']) . ');';
    $bg_style .= ' background-size: cover;';
    $bg_style .= ' background-position: center;';
    $bg_style .= ' background-blend-mode: overlay;';
}
?>

<!-- CTA Banner Section -->
<section id="cta-banner" class="cta-banner-section" style="<?php echo $bg_style; ?>">
    <div class="cta-overlay"></div>
    
    <div class="ast-container">
        <div class="cta-wrapper">
            
            <div class="cta-content text-center">
                <?php if (!empty($cta_heading)) : ?>
                    <h2 class="cta-heading"><?php echo wp_kses_post($cta_heading); ?></h2>
                <?php endif; ?>
                
                <?php if (!empty($cta_description)) : ?>
                    <p class="cta-description"><?php echo esc_html($cta_description); ?></p>
                <?php endif; ?>
                
                <?php if (!empty($cta_button_text) && !empty($cta_button_url)) : ?>
                    <a href="<?php echo esc_url($cta_button_url); ?>" class="cta-button">
                        <?php echo esc_html($cta_button_text); ?>
                        <svg class="button-arrow" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M4.16667 10H15.8333" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M10 4.16667L15.8333 10L10 15.8333" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
            
            <!-- Decorative Spice Elements -->
            <div class="cta-spices">
                <span class="spice-item spice-1">🌶️</span>
                <span class="spice-item spice-2">🌿</span>
                <span class="spice-item spice-3">🌾</span>
                <span class="spice-item spice-4">🌺</span>
            </div>
            
        </div>
    </div>
</section>