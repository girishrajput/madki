<?php
/**
 * About Brand Section Template
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
$about_section_title   = get_field('about_section_title');
$about_heading         = get_field('about_heading');
$about_description     = get_field('about_description');
$about_image           = get_field('about_image');
$about_signature       = get_field('about_signature');
$about_cta_text        = get_field('about_cta_text');
$about_cta_link        = get_field('about_cta_link');

// Set defaults
$about_section_title = !empty($about_section_title) ? $about_section_title : __('About Madki Masala', 'astra-child');
$about_heading = !empty($about_heading) ? $about_heading : __('Preserving the <span class="highlight">Authentic Taste</span> of India', 'astra-child');
$about_description = !empty($about_description) ? $about_description : __('For generations, we have been sourcing the finest spices from the heart of India. Our commitment to quality and authenticity ensures every spice blend brings the true essence of Indian cuisine to your table.', 'astra-child');
$about_cta_text = !empty($about_cta_text) ? $about_cta_text : __('Learn More About Us', 'astra-child');
$about_cta_link = !empty($about_cta_link) ? $about_cta_link : '#';

// Image URLs
$about_image_url = astra_child_get_image_url($about_image);
$signature_url   = astra_child_get_image_url($about_signature);
?>

<!-- About Section -->
<section id="about-section" class="about-section">
    <div class="ast-container">
        <div class="about-wrapper">
            
            <!-- Section Title -->
            <?php if (!empty($about_section_title)) : ?>
                <div class="section-header">
                    <span class="section-tag"><?php echo esc_html($about_section_title); ?></span>
                </div>
            <?php endif; ?>
            
            <div class="about-grid">
                
                <!-- About Content -->
                <div class="about-content">
                    <?php if (!empty($about_heading)) : ?>
                        <h2 class="about-heading"><?php echo wp_kses_post($about_heading); ?></h2>
                    <?php endif; ?>
                    
                    <?php if (!empty($about_description)) : ?>
                        <div class="about-description">
                            <?php echo wp_kses_post(wpautop($about_description)); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($signature_url)) : ?>
                        <div class="about-signature">
                            <img 
                                src="<?php echo esc_url($signature_url); ?>" 
                                alt="<?php echo esc_attr__('Brand Signature', 'astra-child'); ?>"
                                loading="lazy"
                                width="200"
                                height="80"
                            >
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($about_cta_text) && !empty($about_cta_link)) : ?>
                        <a href="<?php echo esc_url($about_cta_link); ?>" class="about-cta-button">
                            <?php echo esc_html($about_cta_text); ?>
                            <svg class="button-arrow" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M4.16667 10H15.8333" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <path d="M10 4.16667L15.8333 10L10 15.8333" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- About Image -->
                <?php if (!empty($about_image_url)) : ?>
                    <div class="about-image-wrapper">
                        <div class="about-image">
                            <img 
                                src="<?php echo esc_url($about_image_url); ?>" 
                                alt="<?php echo esc_attr__('About Madki Masala', 'astra-child'); ?>"
                                loading="lazy"
                                width="600"
                                height="500"
                            >
                            <div class="image-decoration">
                                <span class="decoration-dot"></span>
                                <span class="decoration-dot"></span>
                                <span class="decoration-dot"></span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</section>