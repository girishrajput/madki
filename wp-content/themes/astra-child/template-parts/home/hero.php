<?php
/**
 * Hero Section Template
 * 
 * @package Astra_Child
 * @subpackage Template_Parts
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get hero fields
$hero_small_title      = get_field('hero_small_title');
$hero_title            = get_field('hero_title');
$hero_description      = get_field('hero_description');
$hero_background_image = get_field('hero_background_image');
$hero_product_image    = get_field('hero_product_image');
$hero_floating_spice   = get_field('hero_floating_spice');
$hero_button_text      = get_field('hero_button_text');
$hero_button_link      = get_field('hero_button_link');
$hero_decorative       = get_field('hero_decorative_element');

// Set defaults if fields are empty
$hero_small_title = !empty($hero_small_title) ? $hero_small_title : __('Premium Quality', 'astra-child');
$hero_title = !empty($hero_title) ? $hero_title : __('Pure Indian <span class="highlight">Spices</span>', 'astra-child');
$hero_description = !empty($hero_description) ? $hero_description : __('Experience the authentic taste of India with our handpicked, premium quality spices that bring traditional flavors to your kitchen.', 'astra-child');
$hero_button_text = !empty($hero_button_text) ? $hero_button_text : __('Explore Products', 'astra-child');
$hero_button_link = !empty($hero_button_link) ? $hero_button_link : '#products';

// Background image style
$bg_style = '';
if (!empty($hero_background_image) && isset($hero_background_image['url'])) {
    $bg_style = 'style="background-image: url(' . esc_url($hero_background_image['url']) . ');"';
}

// Product image URL
$product_image_url = '';
if (!empty($hero_product_image) && isset($hero_product_image['url'])) {
    $product_image_url = esc_url($hero_product_image['url']);
}

// Floating spice URL
$floating_spice_url = '';
if (!empty($hero_floating_spice) && isset($hero_floating_spice['url'])) {
    $floating_spice_url = esc_url($hero_floating_spice['url']);
}

// Decorative element URL
$decorative_url = '';
if (!empty($hero_decorative) && isset($hero_decorative['url'])) {
    $decorative_url = esc_url($hero_decorative['url']);
}
?>

<!-- Hero Section -->
<section id="hero-section" class="hero-section" <?php echo $bg_style; ?>>
    <div class="hero-overlay"></div>
    
    <div class="ast-container">
        <div class="hero-content-wrapper">
            
            <!-- Left Content -->
            <div class="hero-content">
                <?php if (!empty($hero_small_title)) : ?>
                    <span class="hero-small-title"><?php echo esc_html($hero_small_title); ?></span>
                <?php endif; ?>
                
                <?php if (!empty($hero_title)) : ?>
                    <h1 class="hero-main-title"><?php echo wp_kses_post($hero_title); ?></h1>
                <?php endif; ?>
                
                <?php if (!empty($hero_description)) : ?>
                    <p class="hero-description"><?php echo esc_html($hero_description); ?></p>
                <?php endif; ?>
                
                <?php if (!empty($hero_button_text) && !empty($hero_button_link)) : ?>
                    <a href="<?php echo esc_url($hero_button_link); ?>" class="hero-cta-button">
                        <?php echo esc_html($hero_button_text); ?>
                        <svg class="button-arrow" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M4.16667 10H15.8333" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M10 4.16667L15.8333 10L10 15.8333" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
            
            <!-- Right Image -->
            <?php if (!empty($product_image_url)) : ?>
                <div class="hero-product-image">
                    <img 
                        src="<?php echo esc_url($product_image_url); ?>" 
                        alt="<?php echo esc_attr__('Premium Spice Product', 'astra-child'); ?>"
                        loading="lazy"
                        width="500"
                        height="500"
                    >
                </div>
            <?php endif; ?>
            
            <!-- Floating Spice -->
            <?php if (!empty($floating_spice_url)) : ?>
                <div class="hero-floating-spice">
                    <img 
                        src="<?php echo esc_url($floating_spice_url); ?>" 
                        alt="<?php echo esc_attr__('Decorative Spice', 'astra-child'); ?>"
                        loading="lazy"
                    >
                </div>
            <?php endif; ?>
            
            <!-- Decorative Element -->
            <?php if (!empty($decorative_url)) : ?>
                <div class="hero-decorative">
                    <img 
                        src="<?php echo esc_url($decorative_url); ?>" 
                        alt="<?php echo esc_attr__('Decorative Element', 'astra-child'); ?>"
                        loading="lazy"
                    >
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</section>