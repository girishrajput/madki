<?php
/**
 * Footer CTA Area Template (Above Footer)
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
$footer_cta_heading = get_field('footer_cta_heading');
$footer_cta_description = get_field('footer_cta_description');
$footer_cta_newsletter_text = get_field('footer_cta_newsletter_text');
$footer_cta_button_text = get_field('footer_cta_button_text');
$footer_cta_button_url = get_field('footer_cta_button_url');

// Set defaults
$footer_cta_heading = !empty($footer_cta_heading) ? $footer_cta_heading : __('Subscribe to Our <span class="highlight">Newsletter</span>', 'astra-child');
$footer_cta_description = !empty($footer_cta_description) ? $footer_cta_description : __('Get the latest updates on new products, recipes, and exclusive offers.', 'astra-child');
$footer_cta_newsletter_text = !empty($footer_cta_newsletter_text) ? $footer_cta_newsletter_text : __('Enter your email address', 'astra-child');
$footer_cta_button_text = !empty($footer_cta_button_text) ? $footer_cta_button_text : __('Subscribe', 'astra-child');
$footer_cta_button_url = !empty($footer_cta_button_url) ? $footer_cta_button_url : '#';
?>

<!-- Footer CTA Section -->
<!-- <section id="footer-cta" class="footer-cta-section">
    <div class="ast-container">
        <div class="footer-cta-wrapper">
            
            <div class="footer-cta-content">
                <?php if (!empty($footer_cta_heading)) : ?>
                    <h3 class="footer-cta-heading"><?php echo wp_kses_post($footer_cta_heading); ?></h3>
                <?php endif; ?>
                
                <?php if (!empty($footer_cta_description)) : ?>
                    <p class="footer-cta-description"><?php echo esc_html($footer_cta_description); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="footer-cta-form">
                <form class="newsletter-form" method="post" action="<?php echo esc_url($footer_cta_button_url); ?>">
                    <div class="form-group">
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="<?php echo esc_attr($footer_cta_newsletter_text); ?>" 
                            required
                            aria-label="<?php esc_attr_e('Email address', 'astra-child'); ?>"
                        >
                        <button type="submit" class="submit-button">
                            <?php echo esc_html($footer_cta_button_text); ?>
                        </button>
                    </div>
                </form>
                
                <p class="form-disclaimer">
                    <?php _e('We respect your privacy. Unsubscribe anytime.', 'astra-child'); ?>
                </p>
            </div>
            
        </div>
    </div>
</section> -->