<?php
/**
 * Template Name: FAQ Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header();

// Fetch ACF Hero Fields
$hero_bg          = get_field('faq_hero_image');
$hero_subtitle    = get_field('faq_hero_subtitle') ?: 'FREQUENTLY ASKED QUESTIONS';
$hero_title       = get_field('faq_hero_title') ?: 'Everything you need to know before ordering.';
$hero_description = get_field('faq_hero_description') ?: 'Browse our common questions about storage, shipping, payments, and ingredient quality.';

// Fallback background image if ACF field is empty
$default_bg = get_stylesheet_directory_uri() . '/assets/images/faq-hero-bg.jpg';
$bg_url     = $hero_bg ? $hero_bg : $default_bg;
?>

<main id="main" class="site-main faq-page-template" role="main">

    <!-- Hero Section -->
    <section class="faq-hero-section" style="background-image: url('<?php echo esc_url($bg_url); ?>');">
        <div class="faq-hero-overlay"></div>
        <div class="faq-hero-container">
            <nav class="faq-breadcrumbs">
                <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                <span class="delimiter">/</span>
                <span class="current">FAQ</span>
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
                <?php if ( have_rows('faq_list') ) : ?>
                    
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

                <?php else : ?>

                    <!-- Fallback Sample Items when ACF field is not filled yet -->
                    <div class="faq-item">
                        <button class="faq-question-btn" aria-expanded="false">
                            <span class="question-text">How should I store Madki spices?</span>
                            <span class="faq-icon" aria-hidden="true">+</span>
                        </button>
                        <div class="faq-answer-content">
                            <div class="faq-answer-inner">
                                <p>Store your spices in an airtight container away from direct sunlight, humidity, and heat source to retain maximum freshness and aroma.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question-btn" aria-expanded="false">
                            <span class="question-text">What is the shelf life of the products?</span>
                            <span class="faq-icon" aria-hidden="true">+</span>
                        </button>
                        <div class="faq-answer-content">
                            <div class="faq-answer-inner">
                                <p>Our ground spices and spice powders retain full flavor and essential oils for up to 12 months from the date of packaging when stored under proper conditions.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <button class="faq-question-btn" aria-expanded="false">
                            <span class="question-text">Do you offer shipping across India?</span>
                            <span class="faq-icon" aria-hidden="true">+</span>
                        </button>
                        <div class="faq-answer-content">
                            <div class="faq-answer-inner">
                                <p>Yes, we ship across all states and regions in India with standard delivery timelines ranging from 3 to 7 business days.</p>
                            </div>
                        </div>
                    </div>

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