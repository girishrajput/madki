<?php
/**
 * Template Name: Contact Page1
 * Description: Custom contact page template utilizing ACF fields.
 */

get_header(); 

// Fetch ACF Field Values
$hero_image         = get_field('contact_hero_image');
$hero_subtitle      = get_field('contact_hero_subtitle');
$hero_title         = get_field('contact_hero_title');
$contact_intro      = get_field('contact_intro_text');
$address            = get_field('contact_address');
$phone              = get_field('contact_phone');
$email              = get_field('contact_email');
$whatsapp           = get_field('whatsapp_number');
$form_shortcode     = get_field('contact_form_shortcode');
$map_iframe         = get_field('google_map_iframe');
?>

<main class="site-main contact-page">

    <!-- Hero Section -->
    <section class="contact-hero" style="    background-color: #1f1f1f; background-image: url('<?php echo esc_url($hero_image['url'] ?? ''); ?>');">
        <div class="container hero-content">
            <?php if ( $hero_subtitle ) : ?>
                <span class="hero-subtitle"><?php echo esc_html( $hero_subtitle ); ?></span>
            <?php endif; ?>

            <?php if ( $hero_title ) : ?>
                <h1 class="contact-hero-title"><?php echo esc_html( $hero_title ); ?></h1>
            <?php else : ?>
                <h1 class="contact-hero-title"><?php the_title(); ?></h1>
            <?php endif; ?>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="contact-details-section">
        <div class="container">
            
            <?php if ( $contact_intro ) : ?>
                <div class="contact-intro">
                    <p><?php echo nl2br( esc_html( $contact_intro ) ); ?></p>
                </div>
            <?php endif; ?>

            <div class="contact-grid">
                
                <!-- Info Cards / Sidebar -->
                <div class="contact-info">
                    <?php if ( $address ) : ?>
                        <div class="info-item">
                            <i class="icon-map-pin"></i>
                            <div>
                                <h3>Address</h3>
                                <p><?php echo esc_html( $address ); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $phone ) : ?>
                        <div class="info-item">
                            <i class="icon-phone"></i>
                            <div>
                                <h3>Phone</h3>
                                <p><a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>"><?php echo esc_html( $phone ); ?></a></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $email ) : ?>
                        <div class="info-item">
                            <i class="icon-envelope"></i>
                            <div>
                                <h3>Email</h3>
                                <p><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ( $whatsapp ) : ?>
                        <div class="info-item">
                            <i class="icon-whatsapp"></i>
                            <div>
                                <h3>WhatsApp</h3>
                                <p>
                                    <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', $whatsapp); ?>" target="_blank" rel="noopener noreferrer">
                                        <?php echo esc_html( $whatsapp ); ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Contact Form -->
                <div class="contact-form-wrapper">
                    <?php if ( $form_shortcode ) : ?>
                        <?php echo do_shortcode( $form_shortcode ); ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>

    <!-- Google Map Embed Section -->
    <?php if ( $map_iframe ) : ?>
        <section class="contact-map">
            <div class="map-container">
                <?php echo $map_iframe; // Render iframe markup ?>
            </div>
        </section>
    <?php endif; ?>

</main>

<?php 
get_footer();