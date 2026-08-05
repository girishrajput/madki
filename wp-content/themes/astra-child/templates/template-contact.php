<?php
/**
 * Template Name: Contact Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    
    <div class="ast-container">
        <div class="contact-page-wrapper">
            
            <!-- Page Header -->
            <header class="page-header">
                <h1 class="page-title"><?php _e('Get in Touch', 'astra-child'); ?></h1>
                <p class="page-subtitle"><?php _e('We\'d love to hear from you. Please reach out with any questions or feedback.', 'astra-child'); ?></p>
            </header>
            
            <div class="contact-grid">
                
                <!-- Contact Information -->
                <div class="contact-info">
                    <h2><?php _e('Contact Information', 'astra-child'); ?></h2>
                    
                    <div class="info-item">
                        <span class="info-icon">📍</span>
                        <div>
                            <h4><?php _e('Address', 'astra-child'); ?></h4>
                            <p><?php echo esc_html(get_option('astra_child_address', '123 Spice Street, Mumbai, India')); ?></p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-icon">📞</span>
                        <div>
                            <h4><?php _e('Phone', 'astra-child'); ?></h4>
                            <p><a href="tel:<?php echo esc_attr(get_option('astra_child_phone', '+91-123-456-7890')); ?>">
                                <?php echo esc_html(get_option('astra_child_phone', '+91-123-456-7890')); ?>
                            </a></p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-icon">✉️</span>
                        <div>
                            <h4><?php _e('Email', 'astra-child'); ?></h4>
                            <p><a href="mailto:<?php echo esc_attr(get_option('astra_child_email', 'info@madkimasala.com')); ?>">
                                <?php echo esc_html(get_option('astra_child_email', 'info@madkimasala.com')); ?>
                            </a></p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <span class="info-icon">🕐</span>
                        <div>
                            <h4><?php _e('Working Hours', 'astra-child'); ?></h4>
                            <p><?php echo esc_html(get_option('astra_child_hours', 'Mon-Sat: 9:00 AM - 6:00 PM')); ?></p>
                        </div>
                    </div>
                    
                    <!-- Social Links -->
                    <div class="social-links">
                        <h4><?php _e('Follow Us', 'astra-child'); ?></h4>
                        <div class="social-icons">
                            <a href="#" aria-label="Facebook"><span class="social-icon">📘</span></a>
                            <a href="#" aria-label="Instagram"><span class="social-icon">📸</span></a>
                            <a href="#" aria-label="YouTube"><span class="social-icon">▶️</span></a>
                            <a href="#" aria-label="Twitter"><span class="social-icon">🐦</span></a>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="contact-form-wrapper">
                    <h2><?php _e('Send us a Message', 'astra-child'); ?></h2>
                    
                    <?php if (function_exists('wpforms_display')) : ?>
                        <?php wpforms_display(get_option('astra_child_contact_form_id', '')); ?>
                    <?php else : ?>
                        <form class="contact-form" method="post" action="#">
                            <div class="form-group">
                                <label for="contact-name"><?php _e('Your Name', 'astra-child'); ?> <span class="required">*</span></label>
                                <input type="text" id="contact-name" name="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact-email"><?php _e('Your Email', 'astra-child'); ?> <span class="required">*</span></label>
                                <input type="email" id="contact-email" name="email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="contact-subject"><?php _e('Subject', 'astra-child'); ?></label>
                                <input type="text" id="contact-subject" name="subject">
                            </div>
                            
                            <div class="form-group">
                                <label for="contact-message"><?php _e('Message', 'astra-child'); ?> <span class="required">*</span></label>
                                <textarea id="contact-message" name="message" rows="5" required></textarea>
                            </div>
                            
                            <button type="submit" class="submit-button"><?php _e('Send Message', 'astra-child'); ?></button>
                        </form>
                    <?php endif; ?>
                </div>
                
            </div>
            
        </div>
    </div>
    
</main>

<?php get_footer(); ?>