<?php
/**
 * Template Name: Home Page
 * 
 * @package Astra_Child
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    
    <?php
    // Load homepage sections
    get_template_part('template-parts/home/hero');
    get_template_part('template-parts/home/about');
    get_template_part('template-parts/home/featured-products');
    get_template_part('template-parts/home/why-choose');
    get_template_part('template-parts/home/testimonials');
    get_template_part('template-parts/home/cta');
    get_template_part('template-parts/home/footer-cta');
    ?>
    
</main>

<?php get_footer(); ?>