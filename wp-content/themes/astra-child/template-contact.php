<?php
/**
 * Template Name: Contact Page
 * Description: Custom contact page template with dynamic ACF & Theme Options integration.
 * 
 * @package Astra_Child
 */

get_header(); 

// Fetch ACF Field Values with fallbacks to Theme Options
$hero_image     = get_field('contact_hero_image');
$hero_subtitle  = get_field('contact_hero_subtitle') ?: __( 'Get In Touch', 'astra-child' );
$hero_title     = get_field('contact_hero_title') ?: __( 'Contact Madki Sales & Distributorship', 'astra-child' );
$contact_intro  = get_field('contact_intro_text') ?: __( 'Whether you are a retailer, regional distributor, or culinary business, reach out to our team for bulk orders, dealership inquiries, and product details.', 'astra-child' );

$address        = get_field('contact_address') ?: madki_get_option('site_address', '12, Spice Avenue, Jaipur, Rajasthan 302001, India');
$phone          = get_field('contact_phone') ?: madki_get_option('site_phone', '+91 98765 43210');
$email          = get_field('contact_email') ?: madki_get_option('site_email', 'info@madkimasala.com');
$whatsapp       = get_field('whatsapp_number') ?: madki_get_option('site_whatsapp', '919876543210');
$form_shortcode = get_field('contact_form_shortcode');
$hero_bg_url    = astra_child_get_image_url( $hero_image );

$social_fb      = madki_get_option( 'social_facebook' );
$social_ig      = madki_get_option( 'social_instagram' );
$social_yt      = madki_get_option( 'social_youtube' );
$social_li      = madki_get_option( 'social_linkedin' );
$social_tw      = madki_get_option( 'social_twitter' );
?>

<main class="site-main contact-page-template">

    <!-- Hero Section -->
    <section class="contact-hero-section" style="background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);<?php echo $hero_bg_url ? ' background-image: url(\'' . esc_url($hero_bg_url) . '\'); background-size: cover;' : ''; ?>">
        <div class="contact-hero-container">
            <span class="contact-hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></span>
            <h1 class="contact-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="contact-body-section">
        <div class="contact-container">
            
            <div class="contact-grid">
                
                <!-- Left Column: Contact Cards -->
                <div class="contact-info-col">
                    <p class="contact-intro"><?php echo esc_html( $contact_intro ); ?></p>

                    <div class="contact-card-box" style="background: #FFF; border: 1px solid #E2E8F0; border-radius: 16px; padding: 32px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
                        
                        <?php if ( $address ) : ?>
                            <div class="info-item">
                                <div style="font-size: 1.5rem;">📍</div>
                                <div>
                                    <h4 style="font-size: 1.05rem; font-weight: 700; color: #1E293B; margin: 0 0 4px 0;">Our Factory &amp; Office</h4>
                                    <p style="margin: 0; color: #475569; font-size: 0.92rem;"><?php echo esc_html( $address ); ?></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $phone ) : ?>
                            <div class="info-item" style="margin-top: 24px;">
                                <div style="font-size: 1.5rem;">📞</div>
                                <div>
                                    <h4 style="font-size: 1.05rem; font-weight: 700; color: #1E293B; margin: 0 0 4px 0;">Phone Inquiry</h4>
                                    <p style="margin: 0;"><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>" style="color: #C0392B; font-weight: 600; text-decoration: none;"><?php echo esc_html( $phone ); ?></a></p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $whatsapp ) : ?>
                            <div class="info-item" style="margin-top: 24px;">
                                <div style="font-size: 1.5rem;">💬</div>
                                <div>
                                    <h4 style="font-size: 1.05rem; font-weight: 700; color: #1E293B; margin: 0 0 4px 0;">WhatsApp Distributor Support</h4>
                                    <p style="margin: 0;">
                                        <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $whatsapp); ?>?text=Hi!%20I%20want%20to%20inquire%20about%20Madki%20Masala%20distributorship." target="_blank" rel="noopener noreferrer" style="color: #25D366; font-weight: 600; text-decoration: none;">
                                            Chat on WhatsApp
                                        </a>
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( $email ) : ?>
                            <div class="info-item" style="margin-top: 24px;">
                                <div style="font-size: 1.5rem;">✉️</div>
                                <div>
                                    <h4 style="font-size: 1.05rem; font-weight: 700; color: #1E293B; margin: 0 0 4px 0;">Email Us</h4>
                                    <p style="margin: 0;"><a href="mailto:<?php echo esc_attr( $email ); ?>" style="color: #C0392B; font-weight: 600; text-decoration: none;"><?php echo esc_html( $email ); ?></a></p>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                    <!-- Social Icons Row -->
                    <?php if ( $social_fb || $social_ig || $social_yt || $social_li || $social_tw ) : ?>
                        <div style="margin-top: 30px;">
                            <h4 style="font-size: 1rem; font-weight: 700; color: #1E293B; margin-bottom: 12px;">Connect with us on Social Media</h4>
                            <div class="social-icons-row" style="display: flex; gap: 12px;">
                                <?php if ( $social_fb ) : ?><a href="<?php echo esc_url( $social_fb ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Facebook">FB</a><?php endif; ?>
                                <?php if ( $social_ig ) : ?><a href="<?php echo esc_url( $social_ig ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="Instagram">IG</a><?php endif; ?>
                                <?php if ( $social_yt ) : ?><a href="<?php echo esc_url( $social_yt ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="YouTube">YT</a><?php endif; ?>
                                <?php if ( $social_li ) : ?><a href="<?php echo esc_url( $social_li ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="LinkedIn">IN</a><?php endif; ?>
                                <?php if ( $social_tw ) : ?><a href="<?php echo esc_url( $social_tw ); ?>" target="_blank" rel="noopener noreferrer" class="social-icon-link" aria-label="X Twitter">X</a><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="contact-form-card">
                    <h3 style="font-size: 1.5rem; font-weight: 700; color: #1E293B; margin-top: 0; margin-bottom: 20px;">Send Us a Message</h3>
                    
                    <?php if ( $form_shortcode ) : ?>
                        <?php echo do_shortcode( $form_shortcode ); ?>
                    <?php else : ?>
                        <form action="" method="post" class="custom-contact-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" name="contact_name" placeholder="Your Full Name *" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="contact_phone" placeholder="Phone / WhatsApp Number *" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="email" name="contact_email" placeholder="Your Email Address *" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="contact_city" placeholder="City / Location">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="contact_message" rows="5" placeholder="Tell us about your business or inquiry *" required></textarea>
                            </div>
                            <button type="submit" class="submit-btn" style="width: 100%;">
                                Send Message &rarr;
                            </button>
                        </form>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>