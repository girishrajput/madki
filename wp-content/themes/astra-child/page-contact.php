<?php
/**
 * Template Name: Contact Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header();

// 1. Retrieve ACF Fields with defaults matching the design layout
$hero_bg          = get_field('contact_hero_image');
$hero_subtitle    = get_field('contact_hero_subtitle') ?: 'CONTACT US';
$hero_title       = get_field('contact_hero_title') ?: 'We’d love to hear from you.';
$intro_text       = get_field('contact_intro_text') ?: 'Whether it’s a product enquiry, business partnership, or feedback, our team is ready to help.';
$address          = get_field('contact_address') ?: '12, Spice Avenue, Jaipur, Rajasthan';
$phone            = get_field('contact_phone') ?: '+91 98765 43210';
$email            = get_field('contact_email') ?: 'hello@madkimasala.com';
$whatsapp         = get_field('whatsapp_number') ?: '919876543210';

// Your active Contact Form 7 shortcode as default fallback
$form_shortcode   = get_field('contact_form_shortcode') ?: '[contact-form-7 id="e1c4f43" title="Contact form 1"]';
$map_iframe       = get_field('google_map_iframe');

// Clean WhatsApp link number
$wa_clean_number = preg_replace('/[^0-9]/', '', $whatsapp);
$default_bg      = get_stylesheet_directory_uri() . '/assets/images/contact-hero-bg.jpg';
$bg_url          = $hero_bg ? $hero_bg : $default_bg;
?>

<main id="main" class="site-main contact-page-template" role="main">

    <!-- Hero Section -->
    <section class="contact-hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');">
        <div class="contact-hero-overlay"></div>
        <div class="contact-hero-container">
            <nav class="contact-breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="delimiter">/</span>
                <span class="current">Contact</span>
            </nav>

            <span class="contact-hero-subtitle"><?php echo esc_html($hero_subtitle); ?></span>
            <h1 class="contact-hero-title"><?php echo esc_html($hero_title); ?></h1>
        </div>
    </section>

    <!-- Main Content: Info & CF7 Form -->
    <section class="contact-body-section">
        <div class="contact-container">
            <div class="contact-grid">
                
                <!-- Left Details & WhatsApp CTA -->
                <div class="contact-info-col">
                    <p class="contact-intro"><?php echo esc_html($intro_text); ?></p>

                    <div class="contact-details-list">
                        <p><strong>Address:</strong> <?php echo esc_html($address); ?></p>
                        <p><strong>Phone:</strong> <a href="tel:<?php echo esc_attr($wa_clean_number); ?>"><?php echo esc_html($phone); ?></a></p>
                        <p><strong>Email:</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                    </div>

                    <div class="contact-whatsapp-wrapper">
                        <a href="https://wa.me/<?php echo esc_attr($wa_clean_number); ?>" target="_blank" rel="noopener noreferrer" class="whatsapp-btn">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                            </svg>
                            Chat on WhatsApp
                        </a>
                    </div>
                </div>

                <!-- Right Form Card -->
                <div class="contact-form-col">
                    <div class="contact-form-card">
                        <?php echo do_shortcode( $form_shortcode ); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="contact-map-section">
        <div class="contact-container">
            <div class="map-card-wrapper">
                <?php if ( $map_iframe ) : ?>
                    <?php echo $map_iframe; ?>
                <?php else : ?>
                    <div class="map-placeholder">
                        <p>Google Map Placeholder</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>