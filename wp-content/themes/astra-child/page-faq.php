<?php
/**
 * Template Name: FAQ Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header();

// Fetch ACF Hero Fields
$hero_bg           = astra_child_get_field( 'faq_hero_image' );
$hero_subtitle     = astra_child_get_field( 'faq_hero_subtitle' );
$hero_title        = astra_child_get_field( 'faq_hero_title', get_the_title() );
$hero_description  = astra_child_get_field( 'faq_hero_description' );
$breadcrumb_home   = astra_child_get_field( 'faq_breadcrumb_home', __( 'Home', 'astra-child' ) );
$breadcrumb_current = astra_child_get_field( 'faq_breadcrumb_current', get_the_title() );

// Fallback background image if ACF field is empty
$default_bg = get_stylesheet_directory_uri() . '/assets/images/faq-hero-bg.jpg';
$bg_url     = astra_child_get_image_url( $hero_bg );
$bg_url     = $bg_url ? $bg_url : $default_bg;
?>

<main id="main" class="site-main faq-page-template" role="main">

    <!-- Hero Section -->
    <section class="faq-hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');">
        <div class="faq-hero-overlay"></div>
        <div class="faq-hero-container">
            <nav class="faq-breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html( $breadcrumb_home ); ?></a>
                <span class="delimiter">/</span>
                <span class="current"><?php echo esc_html( $breadcrumb_current ); ?></span>
            </nav>

            <span class="faq-hero-subtitle"><?php echo esc_html($hero_subtitle); ?></span>
            <h1 class="faq-hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="faq-hero-description"><?php echo esc_html($hero_description); ?></p>
        </div>
    </section>

    <!-- FAQ Accordion Section -->
    <section class="faq-accordion-section">
        <div class="faq-container">
            
            <div class="faq-accordion-wrapper">
                <?php if ( function_exists( 'have_rows' ) && have_rows('faq_list') ) : ?>
                    
                    <?php 
                    $index = 0;
                    while ( have_rows('faq_list') ) : the_row(); 
                        $question = get_sub_field('faq_question');
                        $answer   = get_sub_field('faq_answer');
                        $index++;
                    ?>
                        <div class="faq-item">
                            <button class="faq-question-btn" aria-expanded="false">
                                <span class="question-text"><?php echo esc_html($question); ?></span>
                                <span class="faq-icon" aria-hidden="true">+</span>
                            </button>
                            <div class="faq-answer-content">
                                <div class="faq-answer-inner">
                                    <?php echo wp_kses_post($answer); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>

                <?php endif; ?>
            </div>

        </div>
    </section>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqButtons = document.querySelectorAll('.faq-question-btn');

    faqButtons.forEach(button => {
        button.addEventListener('click', () => {
            const faqItem = button.parentElement;
            const isOpen = faqItem.classList.contains('active');

            // Close all other open accordion items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
                item.querySelector('.faq-question-btn').setAttribute('aria-expanded', 'false');
            });

            // Toggle selected item
            if (!isOpen) {
                faqItem.classList.add('active');
                button.setAttribute('aria-expanded', 'true');
            }
        });
    });
});
</script>

<?php get_footer(); ?>
